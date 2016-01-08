<?php

require_once './databaseConnection.php';
$storyID= $_GET['txt'];
$out ="";
$sql = "SELECT First_Name, Last_Name, Comment,Time FROM registered_user INNER JOIN story_comment ON registered_user.Registation_ID=story_comment.Author_ID  WHERE Story_ID = $storyID  ORDER BY Time";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $author = $row['First_Name']." ".$row['Last_Name'];
    $comment = $row['Comment'];
    $time = $row['Time'];
    $out .= "<div id ='commentLine'>".$author."-->".$comment."(".$time.")<br> </div>";
}



echo $out;
?>