<?php 
//echo ''.$_POST["userName"].' '.$_POST["userPass"].'';

session_start();
/*echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<responce>";*/
include_once "dbconnect.php";
$aUserd = $_POST["userName"];
$aPassd = md5($_POST["userPass"]);
$sql = "SELECT aPass, adminNo FROM admin_user WHERE aUser ='$aUserd'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		if ($row["aPass"]==$aPassd){
			echo $row["adminNo"];

			
			}
		else{
			echo 0;
			}
		}
	}
else{
	echo 0;
	}
//echo "</responce>";
function abc(){
	header( 'Location:aDash.php' );
	}

?>