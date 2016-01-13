<?php
include_once './databaseConnection.php';

$id = $_POST["id"];
$fid = $_POST["fid"];

/* When friend request is accepted the two rows which are inserted when friend request is sent should be updated
   in such a way that Confirmation column should become 1 */

$sql1 = "UPDATE friend_add SET Confirmation = 1 WHERE Registation_ID = $id and F_Registation_ID = $fid";
    
$sql2 = "UPDATE friend_add SET Confirmation = 1 WHERE Registation_ID = $fid and F_Registation_ID = $id";

$result1 = mysqli_query($con, $sql1);
$result2 = mysqli_query($con, $sql2);

if($result1 && $result2){
    echo 1;
}
else{
    echo 0;
}
