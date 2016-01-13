<?php

session_start();
$id = $_SESSION['id'];
?>

<?php

$currentPass = md5($_POST["cur"]);
$newPass = $_POST["n"];
$confirmNewPass = $_POST["conf"];
$newPass_hash = md5($newPass);

$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
//Query to get the details of a user by giving the id
$sql1 = "SELECT * FROM registered_user where Registation_ID = '$id'";
$query1 = mysqli_query($con, $sql1);
$row = mysqli_fetch_assoc($query1);
$pass = $row['Password'];
if ($pass == $currentPass) {
    //Query to update the password
    $sql2 = "UPDATE registered_user SET Password='$newPass_hash'";
    $query2 = mysqli_query($con, $sql2);
    if ($query2) {
        echo "Password updated";
    } else {
        echo "Password update failed";
    }
} else {
    echo "Current password is incorrect";
}
?>