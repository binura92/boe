<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <?php
				//view
					session_start();
					$ID = $_SESSION['id'];
					$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
					$sql4 = "SELECT distinct First_Name, Last_Name, Receiver_ID , Title FROM registered_user INNER JOIN message ON registered_user.Registation_ID=message.Receiver_ID   WHERE Sender_ID= $ID  ORDER BY Date DESC";
					$query4 = mysqli_query($con,$sql4);
					$out='';
					$out.='<select id="selectMsgOutbox" size="10" onchange="loadMsgOutbox()">';
					while($row4 = mysqli_fetch_assoc($query4)){ 
						$mReceiver_ID  = $row4['Receiver_ID'];
						$mTitle = $row4['Title'];
						$mReceiverName = $row4['First_Name'].' '.$row4['Last_Name'];
							
						$out.='<option  value="'.$mReceiver_ID.'@'.$mTitle.'" >'.$mReceiverName.' -->'.$mTitle.'</option>';
		
					}
					$out.='</select>';
					echo($out);
						
			 
			 		?>
</body>
</html>