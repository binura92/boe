<?php

//include_once("check_login_status.php");
//If user is already logged in
//if($user_ok == true){
//echo $log_id;
//header("location: profile.php?u=".$_SESSION['id']);	
//exit();
//}
?>

<?php

$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
//Ajax calls login execute
if (isset($_POST["e"])) {
    $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
    $e = mysqli_real_escape_string($con, $_POST["e"]);
    $p = md5($_POST["p"]);
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    if ($e == "" || $p == "") {
        echo "login_failed";
        exit();
    } else {
        $sql1 = "SELECT * FROM registered_user WHERE Email_Address = '$e' AND Password = '$p' AND User_Level = 1 LIMIT 1;";
        $query1 = mysqli_query($con, $sql1);
        $num_rows = mysqli_num_rows($query1);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($query1);
            $id = $row['Registation_ID'];
            $fname = $row['First_Name'];
            $lname = $row['Last_Name'];
            $dbEmail = $row['Email_Address'];
            $dbPass = $row['Password'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['login'] = true;
            $sql2 = "UPDATE registered_user SET ip='$ip', lastLogin=now(), loginStatus=true WHERE Registation_ID='$id' LIMIT 1";
            $query2 = mysqli_query($con, $sql2);
            echo $id;
            exit();
        } else {
            echo 0;
        }
    }
}
?>
