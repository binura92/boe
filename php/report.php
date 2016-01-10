<?php
require './databaseConnection.php';
session_start();
$ID = $_SESSION['id'];
$storyID = $_POST['story_ID'];
$description = $_POST['description'];
$sql = "INSERT INTO reports (Reporter_ID, Story_ID,Description) VALUES ('$ID','$storyID','$description');";
if($query = mysqli_query($con, $sql)){
	echo(1);
}else{
	echo(0);
}
?>

