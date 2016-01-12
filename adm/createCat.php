<?php
session_start();
$adminId=$_POST["adminId"];
$catName= ucwords(strtolower($_POST["catName"]));
if ($catName==''){
    exit("Please Fill");
}
//echo $adminId;
include_once "dbconnect.php";
$sql = "SELECT Category_ID FROM category WHERE Category_Title ='$catName'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    echo "There is already that category";
}
else{
    $sql="INSERT INTO category (Category_Title, Admin_ID) VALUES ('$catName',$adminId)";
    //echo $adminId;
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "New Category is created successfully";
    } else {
        echo "There is something wrong. Please try again";
    }
}
?>