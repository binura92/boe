<?php

$mID=$_GET['txt'];

$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
if (mysqli_connect_error())
{
	echo "Error in Connection";	
}

$sql = "UPDATE message SET view = 1 WHERE Message_ID = $mID" ;
if($query = mysqli_query($con, $sql)){
	echo(1);
}else{
	echo(0);
}

?>