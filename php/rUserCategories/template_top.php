<head>
		<title>.:BE:.</title>
		<link href="../../css/stylesheet.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../../js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="../../js/script.js"></script>
        <script src="../../js/ajax.js"></script>
</head>
<div id="headder">	
    <img src="../../images/logo.png" alt="BE" height="60" width="60">
    <div id="headNavi">
        <form name="postStory" action="../postStory.php" class="search">
            <input id="searchFriend" onKeyUp="ajaxFunction(this.value);" type="text" name="search" placeholder="Search Friend" class="search"/>
            <input id="result" hidden=""  />
            <div id="dis">  </div>
        </form>
        <div id="naviItems">
            <a class="t1 t" href="#">Home</a>
            <a class="t2 t" href="../rUserCategories.php">Categories</a>
            <a class="t3 t" href="../profile.php">Profile</a>
            <a class="t4 t" href="../aboutbe.php">About BE</a>
            <a class="t5 t" href="#">Help</a>
        </div>
        <div id="naviIcon">
            <img src="../../images/navigationIcon/friendrequest.png" alt="Friend Request" height="40" width="40">
            <img src="../../images/navigationIcon/message.png" alt="Message" height="40" width="40" id="MsgIcon">
            <img src="../../images/navigationIcon/notification.png" alt="Notifications" height="40" width="40">
            <img src="../../images/navigationIcon/setting.png" alt="Settings" height="40" width="40" id="SettingsIcon">
        </div> 
    </div>       
</div>
<div id="MsgBar">
    	<div id="NewMsg" class="MsgBarBorders">
        	<h5>+New</h5>
        </div>
    	<div id="Inbox" class="MsgBarBorders">
        	<h5>Inbox</h5>
        </div>
        <div id="Outbox" class="MsgBarBorders">
        	<h5>Outbox</h5>
        </div>
        <div id="MsgBarClose" class="MsgBarBorders">
        	<h5>close</h5>
        </div>   
    </div>
    
    <div id="NewMessage">
    	<form name="newmessage" methot="get">
			<input type="text" id="Rname" placeholder="Receiver Name" class="RSearchBox1 TextBoxMSG" onKeyUp="mSearchFriend(this.value);" />
            <input type="text" id="R_ID" hidden="" /> 
            <div id="disFriend">  </div> 
            <input type="text" id="Title" placeholder="Title" class="RSearchBox2 TextBoxMSG"/>
            <textarea id="msgBody" placeholder="Write message" cols="30" rows="18" class="MSGContent TextBoxMSG"></textarea>
            <div id="msgStatus" ></div>
           	<input type="button" onclick="sendMsg()" value="Send" id="MSGSendButton" class="MsgSendButtons">
            <input type="reset" value="Cancel" id="MSGCancelButton" class="MsgSendButtons">
      </form>    
</div>  
<div id="InboxExtend">
	<div id="InboxExtendHeadder">
    	<h5>Inbox</h5>
    </div>
    <div id="InboxList">
            <?php
		
			//session_start();
			$ID = $_SESSION['id'];
		//view
			
			$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
			$sql3 = "SELECT distinct First_Name, Last_Name, Sender_ID, Title FROM registered_user INNER JOIN message ON registered_user.Registation_ID=message.Sender_ID  WHERE Receiver_ID= $ID  ORDER BY Date";
			$query3 = mysqli_query($con,$sql3);
			echo('');
			echo('<select id="selectMsg" size="10" onchange="loadMsgInbox()">');
			while($row3 = mysqli_fetch_assoc($query3)){ 
				$mSender_ID = $row3['Sender_ID'];
				$mTitle = $row3['Title'];
				$mSenderName = $row3['First_Name'].' '.$row3['Last_Name'];
					
				echo('<option  value="'.$mSender_ID.'@'.$mTitle.'" >'.$mSenderName.' -->'.$mTitle.'</option>');

			}
			echo('</select>');
			echo('');
				
	 
	 ?>
    
    </div>
    <div id="InboxView">
    
    </div>  
    <div id="InboxExtendClose">
        <h5>close</h5>
    </div>
</div> 
<div id="OutboxExtend">
	<div id="OutboxExtendHeadder">
    	<h5>Outbox</h5>
    </div>
    <div id="OutboxList">
    	            <?php
				//view
					
					$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
					$sql4 = "SELECT distinct First_Name, Last_Name, Receiver_ID , Title FROM registered_user INNER JOIN message ON registered_user.Registation_ID=message.Receiver_ID   WHERE Sender_ID= $ID  ORDER BY Date";
					$query4 = mysqli_query($con,$sql4);
					echo('');
					echo('<select id="selectMsgOutbox" size="10" onchange="loadMsgOutbox()">');
					while($row4 = mysqli_fetch_assoc($query4)){ 
						$mReceiver_ID  = $row4['Receiver_ID'];
						$mTitle = $row4['Title'];
						$mReceiverName = $row4['First_Name'].' '.$row4['Last_Name'];
							
						echo('<option  value="'.$mReceiver_ID.'@'.$mTitle.'" >'.$mReceiverName.' -->'.$mTitle.'</option>');
		
					}
					echo('</select>');
					echo('');
						
			 
			 		?>
    
    </div>
    <div id="OutboxView">
    
    </div>  
    <div id="OutboxExtendClose">
        <h5>close</h5>
    </div>
</div> 
<div id="LogOutBar">
    <a href="../logout.php"><Div id="LogOut" class="LogOutBorer">
        <h5>Log Out</h5>
    </Div></a>
    <div id="LogOutclose" class="LogOutBorer">
        <h5>Close</h5>
    </div>    	
</div>