<?php
  
session_start(); //to ensure you are using same session
$id = $_SESSION['id'];
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
$sql = "UPDATE registered_user SET loginStatus=false WHERE Registation_ID = '$id'";
$query = mysqli_query($con,$sql);
session_destroy(); //destroy the session
header("location: ../index.html"); //to redirect back to "index.php" after logging out
exit();


?>