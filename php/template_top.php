<head>
    <title>.:BE:.</title>
    <link href="../css/stylesheet.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script src="../js/ajax.js"></script>
</head>
<div id="headder">	
    <img src="../images/logo.png" alt="BE" height="60" width="60">
    <div id="headNavi">
        <form name="postStory" class="search">
            <input id="searchFriend" onKeyUp="ajaxFunction(this.value);" type="text" name="search" placeholder="Search Friend" class="search"/>
            <input type="text" id="result" hidden=""/>
            <div id="dis">  </div>
        </form>
        <div id="naviItems">
            <a class="t1 t" href="homePage.php">Home</a>
            <a class="t2 t" href="categories.php">Categories</a>
            <a class="t3 t" href="profile.php">Profile</a>
            <a class="t4 t" href="aboutbe.php">About BE</a>
            <a class="t5 t" href="#">Help</a>
        </div>
        <div id="naviIcon">
            <img src="../images/navigationIcon/friendrequest.png" alt="Friend Request" height="40" width="40">
            <img src="../images/navigationIcon/message.png" alt="Message" height="40" width="40" id="MsgIcon">
            <img src="../images/navigationIcon/notification.png" alt="Notifications" height="40" width="40">
            <img src="../images/navigationIcon/setting.png" alt="Settings" height="40" width="40" id="SettingsIcon">
        </div> 
    </div>       
</div>
<div id="MsgBar">
    <div id="NewMsg" class="MsgBarBorders">
        <h5>+New</h5>
    </div>
    <div id="Inbox" class="MsgBarBorders" onclick="inbox()">
        <h5>Inbox</h5>
    </div>
    <div id="Outbox" class="MsgBarBorders" onclick="outbox()">
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


    </div>
    <div id="OutboxView">

    </div>  
    <div id="OutboxExtendClose">
        <h5>close</h5>
    </div>
</div> 
<div id="LogOutBar">
    <a href="logout.php"><Div id="LogOut" class="LogOutBorer">
            <h5>Log Out</h5>
        </Div></a>
    <div id="LogOutclose" class="LogOutBorer">
        <h5>Close</h5>
    </div>    	
</div>