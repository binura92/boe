<?Php

require "DB_Connection.php";  // database connection
//////////////////////////////// Main Code sarts /////////////////////////////////////////////

$key = $_GET['txt'];
$pos = strpos($key,"@");
$Receiver_ID=substr($key,0,$pos);
$title = substr($key,$pos+1);
if(!ctype_alnum($Receiver_ID)){
echo "Data Error";
exit;
}

$msg="";

if(strlen($Receiver_ID)>0 and strlen($Receiver_ID) <7 ){
	$sql="SELECT Registation_ID, First_Name, Last_Name, Sender_ID, Receiver_ID, Title, Body, Date FROM registered_user INNER JOIN message ON registered_user.Registation_ID=message.Receiver_ID  WHERE Receiver_ID = $Receiver_ID and Title = '$title' ORDER BY Date DESC";
	foreach ($dbo->query($sql) as $nt) {
		$msg .="<div> Title : $nt[Title] <br> Message : $nt[Body] <br> Receiver : $nt[First_Name] <br> Date : $nt[Date] <br> --------------<br>  </div>";
	}
}

echo $msg;
?>