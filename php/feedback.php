<?php
require './databaseConnection.php';
session_start();
$ID = $_SESSION['id'];
$storyID = $_POST['story_ID'];
$feedback =$_POST['feedback'];

$sql1 = "SELECT * FROM feedback WHERE Story_ID = '$storyID' and User_ID  = '$ID';";
$query1 = mysqli_query($con, $sql1);
if(mysqli_num_rows($query1)>0){
    echo '0';
}else{
    $sql2 = "INSERT INTO feedback(User_ID, Story_ID, Feedback) VALUES ('$ID','$storyID','$feedback');";
    if ($query2 = mysqli_query($con, $sql2)){
        echo '1';
    }  else {
        echo '2';
    }
    
}


?>