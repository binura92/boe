<?php
session_start();
$log_id = $_SESSION['id'];
require_once './databaseConnection.php';
$storyID = $_GET['txt'];
$out = "";
//check this story is delete
$view = 1;
$checkSql = "SELECT view FROM story WHERE Story_ID = $storyID ;";
$checkResult = mysqli_query($con, $checkSql);
while($run = mysqli_fetch_array($checkResult)){
    $view = $run['view'];
}
if($view == 0){
    exit();
}


$storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID = $storyID ;";
$sqlstoryDetails = mysqli_query($con, $storyDetails);
$runStory = mysqli_fetch_assoc($sqlstoryDetails);
$authorID = $runStory["Registation_ID"];
$author = $runStory['First_Name'] . ' ' . $runStory['Last_Name'];
$title = $runStory['Title'];
$body = $runStory['Body'];
$publishDate = $runStory['Publish_Date'];

$deleteBtn = "";
if($log_id == $authorID){
    $deleteBtn="<button id ='deleteBtn' onclick='deleteStory($storyID)' style='z-index: 10;'>Delete</button>";
}
$out.= "<p class='storytitlebold'>" .$title. "</P>"."<br><p class='pbyname'> Posted by <a href='friendProfile.php?u=$authorID'>".$author."</a></p><br>"."<hr/>"."<p class='postedstory'>".$body."</P>".$deleteBtn."<hr/>";


echo $out;



?>

<p ></p>

