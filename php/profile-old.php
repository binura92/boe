
<?php
session_start();
include_once("template_top.php");
//include_once("check_login_status.php");
if(isset($_GET["u"])){
	$id = $_GET["u"];
	$_SESSION['id'] = $id;
}
else{
	$id = $_SESSION['id'];
}

//select the user from the database
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
$sql = "SELECT * FROM registered_user WHERE Registation_ID='$id' LIMIT 1";
$query = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($query);
if($num_rows>0){
	$row = mysqli_fetch_assoc($query);
	$id = $row['Registation_ID'];
	$fname = $row['First_Name'];
	$lname = $row['Last_Name'];
	$email = $row['Email_Address'];
	$gender = $row['Gender'];
	$rStatus = $row['Status'];
	$city = $row['City'];
}
$_SESSION['id'] = $id;

function displayImage(){
        $id = $_SESSION['id'];
        $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
        $sql3 = "SELECT * FROM registered_user WHERE Registation_ID = '$id'";
        $query = mysqli_query($con, $sql3);	
        $row = mysqli_fetch_assoc($query);
        echo '<img height="250" width="250" src="data:image;base64, '.$row["Profpic"].'">';
    }


?>
<html>
<head>
<title>Untitled Document</title>
<style>
#editHover:hover{
	background-color:#FFF;
}
#logoutHover:hover{
	background-color:#CCC;	
}
</style>
</head>
<body>
<div id="wrapper">
	<div id="left" style="background-color:#CCC; border-style:ridge; width:300px; height:500px; margin-top:3px;">
    	<div id="picture" style="padding:10px;">
        	<?php displayImage(); ?>
        </div>
    	<div id="info" style="padding-left:20px; font-size:18px; margin-top:-10px; font-family:Tahoma, Geneva, sans-serif;">
            <p style="font-size:24px; font-weight:bold;"><?php echo $fname.' '.$lname; ?></p>
            <p><?php echo $email; ?></p>
            <p><?php if($gender == "M")
						echo "Male";
					 else
					 	echo "Female";
				?></p>
            <p><?php echo $rStatus; ?></p>
            <p><?php echo $city; ?></p>
		</div>
        <div id="edit_prof" style="float:right; margin-top:-25px; margin-right:5px; font-family:Georgia, 'Times New Roman', Times, serif;">
        	<a id="editHover" href="editProf.php" style="text-decoration:none; padding:5px; color:#999; font-weight:700;">| Edit |</a>
        </div>
    </div>
    
    <div id="right" style="float:right; margin-top:-490px; margin-right:10px; font-size:18px; font-family:Tahoma, Geneva, sans-serif;">
    	<a id="logoutHover" href="logout.php" style="text-decoration:none; color:#000; border-style:groove; padding:3px; border-color:#CCC;">Logout</a>
    </div>
</div>
</body>
</html>			