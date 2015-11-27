<?php 
	include_once("template_top.php");
?>
<?php
session_start();
$id = $_SESSION['id'];
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
<script src="../js/ajax.js"></script> 
<script src="../js/main.js"></script> 
<script src="../js/updateProfile.js"></script>
<link href="../css/editProf.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body onLoad="display()">
  <div id="wapper">
      <div id="cover">
          <div id="profilepic">
          <?php
              echo "<img src='data:image;base64,".displayImage()."' alt='Profile Picture' class='profilepic'/>";
          ?>
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
      <div id="editInfo">
     	<span>First Name</span><br/>  
        <input type="text" id="editTxtFname" value= <?php echo $fname; ?> /><br/><br/>
        <span>Last Name</span><br/> 
        <input type="text" id="editTxtLname" value= <?php echo $lname; ?> /><br/><br/>
        <span>City</span><br/>
        <input type="text" id="editTxtCity" value= <?php echo $city; ?> /><br/><br/>
     	<span>Relationship Status</span><br/>
        <select id="cmbEditStatus">
        	<option value= <?php echo $status; ?>><?php echo $status; ?></option>
            <?php
            if($status == "Single")
                echo '<option value="Married">Married</option>';
            else
                echo '<option value="Single">Single</option>';
            ?>
         </select><br/><br/>
   
         <span>Gender</span><br/>				
         <select id="cmbEditGender">
            <option value= <?php echo $gender; ?>><?php echo $gender; ?></option>
            <?php
            if($gender == "Male")
                echo '<option value="Female">Female</option>';
            else
                echo '<option value="Male">Male</option>';
            ?>
          </select><br/><br/>
     
         <button id="btnUpdate" onClick="update()">Update</button>
     	
   	  	<div id="editResponse"></div>
        
      </div>
      <div id="changePassword">
        <button id="btnChangePassword" onClick="viewChangePassword()">Change Password</button>
        <div id="changePasswordDisplay">
        	<br/>
            <span>Current Password</span><br/>
            <input type="password" id="txtCurrentPassword"/><br/><br/>
            <span>New Password</span><br/>
            <input type="password" id="txtNewPassword" onKeyUp="checkNewPassword()"/>
            <span id="newPasswordStatus"></span><br/><br/>
            <span>Re-type New Passoword</span><br/>
            <input type="password" id="txtConfirmNewPassword" onKeyUp="checkNewPasswordMatch()"/>
            <span id="newConfirmPasswordStatus"></span>
            <br/><br/>
            <button id="saveNewPassword" onClick="saveNewPassword()">Save Changes</button>
            <button id="cancelNewPassword" onClick="cancelNewPassword()">Cancel</button>
            <div id="saveNewPasswordStatus"></div>
        </div>
      </div>
       
 
	  <?php
        if(isset($_POST["btnPicSubmit"]))
        {
            if(empty($_FILES["image"]["tmp_name"])){
                echo "Please select an image";
            }
            else{
                $image = addslashes($_FILES['image']['tmp_name']);
                $name = addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);
                saveImage($image);
            }
        }
        
        function saveImage($image){
            
            $id = $_SESSION['id'];
            $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
            $sql2 = "UPDATE registered_user SET Profpic='$image' WHERE Registation_ID = '$id'";
            $query = mysqli_query($con, $sql2);
            if($query){
                //echo "Image uploaded";	
            }
            else{
                echo "Image not uploaded";	
            }
        }
        
        function displayNewImage(){
            $id = $_SESSION['id'];
            $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
            $sql3 = "SELECT * FROM registered_user WHERE Registation_ID = '$id'";
            $query = mysqli_query($con, $sql3);	
            $row = mysqli_fetch_assoc($query);
            echo '<img height="250" width="250" src="data:image;base64, '.$row["Profpic"].'">';
        }
        
      ?>
      <div id="image">
        <?php displayNewImage(); ?>
        <div id="imageSelection">
          <form id="propicform" method="post" enctype="multipart/form-data">
            <input type="file" name="image"/>
            <br/><br/>
            <input type="submit" name="btnPicSubmit" value="Upload"/>
          </form>
        </div> 
     </div> 
  </div>
</body>
</html>