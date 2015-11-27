<?php session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
?>
<html>
<head>

</head>
<body>
<?php
include_once "dbconnect.php";
$adminId=$_SESSION['admin'];
$sql="SELECT aUser FROM admin_user WHERE adminNo='$adminId'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $aUserd = $row['aUser'];

    }
}
else{
    $aUserd = "You are not log yet";
}

?>
<h4>User Name:<?php echo $aUserd ?></h4>

</body>
</html>