<?php
session_start();
$id = $_SESSION['id'];
?>
<?php 
	include_once("template_top.php");
?>
<?php
$con = mysqli_connect("localhost","root","","bookofexperiences");
$sql = "SELECT * FROM registered_user WHERE Registation_ID = '$id'";
$query = mysqli_query($con, $sql);
$numrows = mysqli_num_rows($query);
if($numrows>0){
	$row = mysqli_fetch_assoc($query);
	$fname = $row['First_Name'];
	$lname = $row['Last_Name'];
	$email = $row['Email_Address'];
	$pass = $row['Password'];
	$gender = $row['Gender'];
	$city = $row['City'];
	$status = $row['Status'];
	if($gender=="M")
		$gender = "Male";
	else
		$gender = "Female";
}
function displayImage(){
        $id = $_SESSION['id'];
        $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
        $sql3 = "SELECT * FROM registered_user WHERE Registation_ID = '$id'";
        $query = mysqli_query($con, $sql3);	
        $row = mysqli_fetch_assoc($query);
       	return $row["Profpic"];
    }
$_SESSION['id'] = $id;
?>
<html>
<head> 
<link href="../css/stylesheet.css" type="text/css" rel="stylesheet">
<link href="../css/stylesheetfriend.css" type="text/css" rel="stylesheet">
<script src="../js/ajax.js"></script> 
<script src="../js/main.js"></script> 
<script src="../js/updateProfile.js"></script>
<link href="../css/editProf.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body onLoad="display()">
    <div id="wapper">
        <div id="cover">
            <div id="profilepic">
          
                <img src='<?php echo('../profilePic/'.$id.'.jpg')?>' class='profilepic'/>
                <ul>
                  <li><?php echo $fname.' '.$lname; ?></li>
                  <li>Lives in <?php echo $city; ?></li>
                </ul>
            </div>        
        </div>
        <div id="profileNavi">
            <ul>
                <li><a href="#">My Experiences</a></li>
                <li><a href="editProf.php">About</a></li>
                <li><a href="#">My Categories</a></li>
                <li><a href="#">Friends</a></li>
                <li><a href="#">+More</a></li>
            </ul>
        </div>
        <div id="FriendlistBucket">
            <div id="AllFriendlist">

            </div>
            <div id="MyFriendlist">

            </div>
            <div id="MyFriendRequests">

            </div>
        </div>
    </div>
</body>
	  