<?php

require_once './databaseConnection.php';
$storyID = $_GET['txt'];

$sql = "SELECT Feedback_ID FROM feedback WHERE Feedback = 'U' and Story_ID = '$storyID';";
//
if ($query = mysqli_query($con, $sql)) {
    $count = mysqli_num_rows($query);

    echo $count;
} else {
    echo '-1';
}

$sql1 = "";
?>
