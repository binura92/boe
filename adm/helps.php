<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
$adn=$_SESSION['admin'];
$pro=$_POST['pro'];
$sol=$_POST['sol'];
$adn=$_SESSION['admin'];
include 'dbconnect.php';
$sql="INSERT INTO help(helpTitle, helpDescription, adminID) VALUES ('$pro','$sol','$adn')";
if ($conn->query($sql) === TRUE){
	echo "New Help Statement Update";
	}

?>