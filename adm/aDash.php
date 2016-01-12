<?php session_start();
if(isset($_GET["u"])){
    $admin = $_GET["u"];
    $_SESSION['admin'] = $admin;
	//echo "ASD";
	header('Location:aDashd.php');
}