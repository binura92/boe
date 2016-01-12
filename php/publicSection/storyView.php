<?php
require_once './databaseConnection.php';
function setDefaultProfilePic($profilePic) {
    $dir = '../../profilePic/';
    $files1 = scandir($dir);
    $picAvailable = false;
    foreach ($files1 as $x) {
        if ($x == $profilePic) {
            $picAvailable = true;
            break;
        }
    }
    if ($picAvailable == FALSE) {
        $profilePic = 'defaultPic.jpg';
    }
    return $profilePic;
}
$storyID = $_GET['txt'];
$out = "";
$storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID = $storyID ;";
$sqlstoryDetails = mysqli_query($con, $storyDetails);
$runStory = mysqli_fetch_assoc($sqlstoryDetails);
$author = $runStory['First_Name'] . ' ' . $runStory['Last_Name'];
$title = $runStory['Title'];
$body = $runStory['Body'];
$publishDate = $runStory['Publish_Date'];

$profilePic = $runStory['Registation_ID'] . ".jpg";
$profilePic = setDefaultProfilePic($profilePic);

$out.= "<p class='storytitlebold'>" . $title . "</P>" . "<br><p class='pbyname'> Posted by <div class='profilepicofuser'  style='background-image:url(../../profilePic/$profilePic);'></div> <a>" . $author . "</a></p><br>" . "<hr/>" . "<p class='postedstory'>" . $body . "</P><hr/>";

echo $out;



?>


