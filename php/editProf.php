<?php
session_start();
if (isset($_SESSION['login'])) {
    $id = $_SESSION['id'];
} else {
    header('Location: ../index.html');
    exit();
}
?>
<?php
include_once("template_top.php");

$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
$sql = "SELECT * FROM registered_user WHERE Registation_ID = '$id'";
$query = mysqli_query($con, $sql);
$numrows = mysqli_num_rows($query);
if ($numrows > 0) {
    $row = mysqli_fetch_assoc($query);
    $fname = $row['First_Name'];
    $lname = $row['Last_Name'];
    $email = $row['Email_Address'];
    $pass = $row['Password'];
    $gender = $row['Gender'];
    $city = $row['City'];
    $status = $row['Status'];
    if ($gender == "M") {
        $gender = "Male";
    } else {
        $gender = "Female";
    }
}

function displayImage() {
    $id = $_SESSION['id'];
    $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
    $sql3 = "SELECT * FROM registered_user WHERE Registation_ID = '$id'";
    $query = mysqli_query($con, $sql3);
    $row = mysqli_fetch_assoc($query);
    return $row["Profpic"];
}
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
            <?php echo "<div id='cover' style='background-image: url(../images/covers/$id.jpg);'>" ?>
                <div id="profilepic">
<?php
$dir = '../profilePic/';
$files1 = scandir($dir);
$picAvailable = false;
foreach ($files1 as $x) {
    if ($x == $id . '.jpg') {
        $picAvailable = true;
        break;
    }
}
?>
                    <?php if ($picAvailable == true) { ?>
                        <img src='<?php echo('../profilePic/' . $id . '.jpg') ?>' class='profilepic'/>
                    <?php } else { ?>
                        <img src="../images/defaultPic.jpg" class='profilepic'/>
                    <?php } ?>    
                    <ul>
                        <li><?php echo $fname . ' ' . $lname; ?></li>
                        <li>Lives in <?php echo $city; ?></li>
                    </ul>
                </div>       
            </div>
            <div id="profileNavi">
                <ul>
                    <li><a href="profile.php">My Experiences</a></li>
                    <li><a href="editProf.php">About</a></li>
                    <li><a href="#">My Categories</a></li>
                    <li><a href="friendPage.php">Friends</a></li>
                    <li><a href="#">+More</a></li>
                </ul>
            </div>
            <div id="editInfo">
                <span>First Name</span><br/>  
                <input type="text" id="editTxtFname" class="editinfoinputbox" value= <?php echo $fname; ?> /><br/><br/>
                <span>Last Name</span><br/> 
                <input type="text" id="editTxtLname" class="editinfoinputbox" value= <?php echo $lname; ?> /><br/><br/>
                <span>City</span><br/>
                <input type="text" id="editTxtCity" class="editinfoinputbox" value= <?php echo $city; ?> /><br/><br/>
                <span>Relationship Status</span><br/>
                <select id="cmbEditStatus" class="editinfoinputbox">
                    <option value= <?php echo $status; ?>><?php echo $status; ?></option>
<?php
if ($status == "Single") {
    echo '<option value="Married">Married</option>';
} else {
    echo '<option value="Single">Single</option>';
}
?>
                </select><br/><br/>

                <span>Gender</span><br/>				
                <select id="cmbEditGender"  class="editinfoinputbox">
                    <option value= <?php echo $gender; ?>><?php echo $gender; ?></option>
<?php
if ($gender == "Male") {
    echo '<option value="Female">Female</option>';
} else {
    echo '<option value="Male">Male</option>';
}
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
                    <input type="password" class="editinfoinputbox changepwitems" id="txtCurrentPassword"/><br/><br/>
                    <span>New Password</span><br/>
                    <input type="password" class="editinfoinputbox changepwitems" id="txtNewPassword" onKeyUp="checkNewPassword()"/>
                    <span id="newPasswordStatus"></span><br/><br/>
                    <span>Re-type New Password</span><br/>
                    <input type="password"  class="editinfoinputbox changepwitems" id="txtConfirmNewPassword" onKeyUp="checkNewPasswordMatch()"/>
                    <span id="newConfirmPasswordStatus"></span>
                    <br/><br/>
                    <button id="saveNewPassword" class="changepwbtns" onClick="saveNewPassword()">Save Changes</button>
                    <button id="cancelNewPassword" class="changepwbtns" onClick="cancelNewPassword()">Cancel</button>
                    <div id="saveNewPasswordStatus"></div>
                </div>
            </div>

            <div id="image">
<?php if ($picAvailable == true) { ?>
                    <img src='<?php echo('../profilePic/' . $id . '.jpg') ?>' width="200"/>
<?php } else { ?>
                    <img src="../images/defaultPic.jpg" width="200"/>
                <?php } ?>
                <div id="imageSelection">
                    <form id="propicform" method="post" enctype="multipart/form-data">
                        <input type="file" name="file"/>
                        <br/><br/>
                        <input type="submit" name="btnPicSubmit" class="coverbellowbuttons" value="Upload"/>
                    </form>
                </div> 
            </div>
            <div id="imageStatus" style="margin-left:10px;">
<?php
if (isset($_FILES['file'])) {
    $name = $_FILES['file']['name'];
    $tem_name = $_FILES['file']['tmp_name'];
    $type = $_FILES['file']['type'];
    $location = '../profilePic/';
    $file_name = $id . '.jpg';

    if (isset($name)) {
        if (!empty($name)) {
            echo("Image uploaded successfully");
            if ($type == 'image/jpeg') {
                move_uploaded_file($tem_name, $location . $file_name);
            } else {
                echo("Please choose an image");
            }
        } else {
            echo("Please choose a file");
        }
    }
}
?>
            </div> 
        <hr>
    <div id="changeCover">
        <div id="coverSelection">
                    <form id="coverpicform" method="post" enctype="multipart/form-data">
                        <input type="file" name="file1"/>
                        <br/><br/>
                        <input type="submit" name="btnCoverSubmit" class="coverbellowbuttons" value="Upload"/>
                    </form>
                </div> 
            </div>
        
            <div id="coverStatus" style="margin-left:10px;">
        <?php
        if (isset($_FILES['file1'])) {
        $name = $_FILES['file1']['name'];
        $tem_name = $_FILES['file1']['tmp_name'];
        $type = $_FILES['file1']['type'];
        $location = '../images/covers/';
        $file_name = $id . '.jpg';

        if (isset($name)) {
               if (!empty($name)) {
                   echo("Image uploaded successfully");
                   if ($type == 'image/jpeg') {
                       move_uploaded_file($tem_name, $location . $file_name);
                   } else {
                       echo("Please choose an image");
                   }
               } else {
                   echo("Please choose a file");
               }
           }
       }?>
            </div>
        </div>
    </body>
</html>
