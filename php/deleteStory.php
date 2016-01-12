<?php

require_once './databaseConnection.php';
$storyID= $_GET['txt'];

$sql = "UPDATE story SET view = 0 WHERE Story_ID = $storyID;";

if($query = mysqli_query($con, $sql)){
    echo '1';
}  else {
    echo '0';
}




?>