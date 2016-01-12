<?php
session_start();
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$iuserName=$_POST["iuserName"];
$iuserPass=$_POST["iuserPass"];
$icuserPass=$_POST["icuserPass"];
$adminId=$_POST["adminId"];
//echo $first_name;
//echo $first_name;
if ($first_name==''|| $last_name==''||$iuserName=='' || $iuserPass=='' || $icuserPass==''){
    exit("Please Fill");
    echo "yes";
    echo $adminId;
    //echo $adminId;
}


if($iuserPass!=$icuserPass){
    exit("Password Confirmation is not correct ");
}

//echo $adminId;
include_once "dbconnect.php";
$sql = "SELECT 	adminNo	FROM admin_user WHERE aUser ='$iuserName'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    echo "User is already in";
}
else{
    $iuserPass=md5($iuserPass);
    $sql="INSERT INTO admin_user (first_name, last_name, aUser, aPass, pAdmin) VALUES ('$first_name', '$last_name', '$iuserName','$iuserPass','$adminId')";
    //echo "Yes";
    //echo $sql;
    //echo $adminId;
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "New User is created successfully";
    } else {
        echo "Some thing is wrong";
    }
}
?>