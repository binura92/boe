<?php
session_start();
?>
<html>
<head>
<title>.::BOE::.</title>
<link href="../css/homePageStyles.css" type="text/css" rel="stylesheet" media="screen"/>
</head>
<body>
<div id="wrapper">
	<?php
		include_once("../includes/template_top.php");
	?>
    <div id="left-bar">
    <?php
		$email = $_POST["txtEmail"];
		$pass = $_POST["txtPassword"];
		$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
		$query1 = mysqli_query($con, "SELECT * FROM registered_user WHERE Email_Address = '$email' AND Password = '$pass'");
		$numrows = mysqli_num_rows($query1);
		if($numrows > 0){
			$row = mysqli_fetch_assoc($query1);
			$uname = $row['First_Name'];
			$id = $row['Registation_ID'];
			echo "<strong>$uname</strong>";
			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;
			$_SESSION['id'] = $id;
		}
		else
		{
			echo "Incorrect Email or Password";
		}
	?>
    </div>
</div>
</body>
</html>