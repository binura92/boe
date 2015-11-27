<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
$user_ok = false;
$log_id = "";
$log_email = "";
$log_password = "";

//user verify function
function verify($con, $id, $e, $p){
	$sql = "SELECT ip FROM registered_user WHERE Registation_ID='$id' AND Email_Address='$e' AND Password='$p' LIMIT 1";
	$query = mysqli_query($con, $sql);
	$numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	}
}

if(isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])){
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['id']);
	$log_email = preg_replace('#[^a-z0-9]#i', '', $_SESSION['email']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	
	//verify user
	$user_ok = verify($con, $log_id, $log_email, $log_password);
}

else if(isset($_COOKIE["id"]) && isset($_COOKIE["email"]) && isset($_COOKIE["password"])){
	$_SESSION['id'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
    $_SESSION['email'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['email']);
    $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);
	$log_id = $_SESSION['id'];
	$log_email = $_SESSION['email'];
	$log_password = $_SESSION['password'];
	// Verify the user
	$user_ok = verify($con, $log_id, $log_email, $log_password);
	if($user_ok == true){
		// Update their lastlogin datetime field
		$sql2 = "UPDATE registered_user SET lastLogin=now() WHERE Registation_ID='$log_id' LIMIT 1";
        $query = mysqli_query($con, $sql2);
	}
}
?>