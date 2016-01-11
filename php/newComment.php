<?php
require './databaseConnection.php';
session_start();
$ID = $_SESSION['id'];
$storyID = $_POST['story_ID'];
$comment =$_POST['comment'];
$comment = mysql_real_escape_string($comment);

$sql = "INSERT INTO story_comment (Story_ID, Author_ID, Comment) VALUES ('$storyID','$ID','$comment');";
$sql2 = "UPDATE story SET lastUpdate = now()";
if($query = mysqli_query($con, $sql) && $query1 = mysqli_query($con, $sql2)){
	echo(1);
}else{
	echo(0);
}

?>

