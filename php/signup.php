<?php
//email check
if(isset($_POST["emailcheck"])){
	$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
	if (mysqli_connect_error())
	{
		echo "Error in Connection";	
	}
	$emailCheck = $_POST["emailcheck"];
	$sql = "SELECT Email_Address FROM registered_user WHERE Email_Address='$emailCheck' LIMIT 1";
	$query = mysqli_query($con, $sql);
	$emailCheck = mysqli_num_rows($query);
	if($emailCheck < 1){
		echo '<strong style="color:#009900;"> OK </strong>';
		exit();
	}
	else{
		echo '<strong style="color:#F00;"> EXISTS </strong>';	
		exit();
	}
}

?>

<?php
//Registration
if(isset($_POST["e"])){
	$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
	if (mysqli_connect_error())
	{
		echo "Error in Connection";	
	}
	$f = $_POST["f"];
	$l = $_POST["l"];
	$e = $_POST["e"];
	$p1 = $_POST["p1"];
	$g = $_POST["g"];
	$s = $_POST["s"];
	$c = $_POST["c"];
	
	$p_hash = md5($p1);
	$query1 = mysqli_query($con, "SELECT * FROM registered_user WHERE Email_Address = '$e'");
	$numrows = mysqli_num_rows($query1);
	if($numrows==0){
		$sql = "INSERT INTO registered_user(User_Level, First_Name, Last_Name, Email_Address, Password, Gender, Status, City) VALUES (1, '$f', '$l', '$e', '$p_hash', '$g', '$s', '$c')" ;
		$query = mysqli_query($con, $sql);
		
		if(!file_exists("user/$e")){
			mkdir("user/$e", 0755);
		}
		
		echo 1;
		exit();
	}
	else
	{
		echo 0;
		exit();
	}
}	
?>