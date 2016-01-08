<?php
session_start();
$id = $_SESSION['id'];
?>
<?php include_once './databaseConnection.php'; ?>
<?php 
	include_once("template_top.php");
?>
<?php
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
        $con = mysqli_connect('localhost', 'root', '', 'bookofexperiences');
        $sql = "SELECT * FROM registered_user WHERE Registation_ID = '$id'";
        $query = mysqli_query($con, $sql);	
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
            <div id="AllFriendlist" style="color: black;">
                <?php 
                    $sql1 = "SELECT * FROM registered_user";
                    $query1 = mysqli_query($con, $sql1);
                    if($query1){
                        
                        while($res = mysqli_fetch_assoc($query1)){
                            echo "<a href='friendProfile.php?u=".$res['Registation_ID']."'>".$res["First_Name"]." ".$res["Last_Name"]."<br><br></a>";
                        }
                    }
                ?>
            </div>
            <div id="MyFriendlist">

            </div>
            <div id="MyFriendRequests">
                <h3>Friend Requests</h3>
                <?php
                $sql2 = "SELECT * FROM friend_add WHERE F_Registation_ID = '$id' and senderID != '$id'";
                $query2 = mysqli_query($con, $sql2);
                if($query2){
                    $num_rows = mysqli_num_rows($query2);
                    if($num_rows != 0){
                        while($row = mysqli_fetch_assoc($query2)){
                            $friendID = $row["SenderID"];
                            $sql3 = "SELECT First_Name, Last_Name from registered_user WHERE Registation_ID = '$friendID'";
                            $query3 = mysqli_query($con, $sql3);
                            if($query3){
                                $res = mysqli_fetch_assoc($query3);
                                $fname = $res["First_Name"];
                                $lname = $res["Last_Name"];
                                echo $fname." ".$lname."<br>";
                            }

                        }

                    }
                    else{
                        echo "No friend requests";
                    }

                }

                ?>
            </div>
        </div>
    </div>
</body>
	  