<?php
session_start();
$id = $_SESSION['id'];
?>
<?php

/* @var $_POST type */
$inTitle = $_POST["inTitle"];
$inContent = $_POST["inContent"];



$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
if (mysqli_connect_error()) {
    echo "Error in Connection";
}  else {
    echo 'conect ok';
}

//insert the inquries to the database

    $sql2 = "INSERT INTO inquiry(user_ID, title, content ) VALUES ('$id', '$inTitle', '$inContent')";
    $query2 = mysqli_query($con, $sql2);
    if ($query2) {
        echo "Inquiry is successfully posted";
    } else {
        echo "Failed...";
    }

?>