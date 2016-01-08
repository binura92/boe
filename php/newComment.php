<?php
require './databaseConnection.php';
session_start();
$ID = $_SESSION['id'];
$storyID = $_POST['story_ID'];
$comment =$_POST['comment'];

$sql = "INSERT INTO story_comment (Story_ID, Author_ID, Comment) VALUES ('$storyID','$ID','$comment');";

if($query = mysqli_query($con, $sql)){
	echo(1);
}else{
	echo(0);
}

?>

