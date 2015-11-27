<?php
session_start();
$id = $_SESSION['id'];
?>
<?php
	$f = $_POST["f"];
	$l = $_POST["l"];
	$c = $_POST["c"];
	$r = $_POST["r"];
	$g = $_POST["g"];
	
	$con = mysqli_connect("localhost","root","","bookofexperiences");
	$sql2 = "UPDATE registered_user SET First_Name='$f', Last_Name='$l', City='$c', Status='$r', Gender='$g' WHERE Registation_ID = '$id'";
	$query2 = mysqli_query($con, $sql2);
	if($query2){
		echo 1;	
	}
?>