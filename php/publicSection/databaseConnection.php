<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bookofexperiences";

$con = mysqli_connect($host, $user, $password, $database);

if(!$con){
    die("Connection Failed");
}
