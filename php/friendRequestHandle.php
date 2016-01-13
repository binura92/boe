<?php

include_once './databaseConnection.php';

$id = $_POST["id"];
$fid = $_POST["fid"];

//Insert Values to the friend_add table.. two rows should be added 

$sql1 = "INSERT INTO friend_add values('$id','$fid',now(),0,'$id')";
$sql2 = "INSERT INTO friend_add values('$fid','$id',now(),0,'$id')";

$query1 = mysqli_query($con, $sql1);
$query2 = mysqli_query($con, $sql2);

if ($query1 && $query2) {
    echo 1;
} else {
    echo 0;
}

