<?php
include_once './databaseConnection.php';

$id = $_POST["id"];
$fid = $_POST["fid"];

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