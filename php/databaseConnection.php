<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bookofexperiences";

//Create connection
$con = mysqli_connect($host, $user, $password, $database);

if(!$con){
    die("Connection Failed");
}
