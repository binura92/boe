<?php
session_start();
$iuserName=$_POST["iuserName"];
$iuserPass=$_POST["iuserPass"];
$icuserPass=$_POST["icuserPass"];
$adminId=$_POST["adminId"];
//echo $adminId;
if ($iuserName=='' || $iuserPass=='' || $icuserPass==''){
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
    $sql="INSERT INTO admin_user (aUser, aPass, pAdmin) VALUES ('$iuserName','$iuserPass','$adminId')";
    echo "Yes";
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