<?php

$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
if (mysqli_connect_error())
{
	echo "Error in Connection";	
}
session_start();
$S_ID = $_SESSION['id'];
$rName = $_POST["rName"];
$R_ID = $_POST["R_ID"];
$title = $_POST["title"];
$mBody = $_POST["mBody"];

//echo $mBody;
$sql = "INSERT INTO message(Title, Body, Sender_ID, Receiver_ID) VALUES ('$title', '$mBody', '$S_ID', '$R_ID')" ;
if($query = mysqli_query($con, $sql)){
	echo(1);
}else{
	echo(0);
}
?>