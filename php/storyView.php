<?php
require_once './databaseConnection.php';
$storyID = $_GET['txt'];
$out = "";
$storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID = $storyID ;";
$sqlstoryDetails = mysqli_query($con, $storyDetails);
$runStory = mysqli_fetch_assoc($sqlstoryDetails);
$authorID = $runStory["Registation_ID"];
$author = $runStory['First_Name'] . ' ' . $runStory['Last_Name'];
$title = $runStory['Title'];
$body = $runStory['Body'];
$publishDate = $runStory['Publish_Date'];


$out.= "<p class='storytitlebold'>" .$title. "</P>"."<br><p class='pbyname'> Posted by <a href='friendProfile.php?u=$authorID'>".$author."</a></p><br>"."<hr/>"."<p class='postedstory'>".$body."</P>"."<hr/>";

echo $out;



?>


