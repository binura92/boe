<?php
include_once './databaseConnection.php';

$id = $_POST["id"];
$fid = $_POST["fid"];

$sql1 = "DELETE FROM friend_add WHERE (Registation_ID = '$id' and F_Registation_ID = '$fid') or (Registation_ID = '$fid' and F_Registation_ID = '$id')";

$query1 = mysqli_query($con, $sql1);

if($query1){
    echo "1";
}
else{
    echo "0";
}


