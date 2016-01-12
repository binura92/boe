<?php session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
?>
<html>
<head>
<script type="text/javascript" src="JS/sendWarning.js"></script>
</head>
<body>
<?php 
include_once "dbconnect.php";
/*$adminId=$_SESSION['admin'];
$sql="SELECT first_name, last_name FROM admin_user WHERE adminNo='$adminId'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $aUserd = $row['first_name']." ".$row['last_name'];

    }
}
else{
    $aUserd = "You are not log yet";
}
*/
?>
<h1><?php //echo $aUserd ?> BOE Statics</h1>
<?php
$sql="SELECT COUNT(Registation_ID) AS number_of_users FROM registered_user";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $nou = $row['number_of_users'];
    }
}
$sql="SELECT COUNT(adminNo) AS number_of_admins FROM admin_user";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $noa = $row['number_of_admins'];
    }
}
$sql="SELECT COUNT(Story_ID) AS number_of_post FROM story";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $nop = $row['number_of_post'];
    }
}
?>

<table border="1" style="width:100%">
  <tr>
    <td>Number of Registered Users</td>
    <td><?php echo $nou; ?></td>		

  </tr>
  <tr>
    <td>Number of Admins</td>
    <td><?php echo $noa; ?></td>		

  </tr>
 <tr>
    <td>Number of Posts</td>
    <td><?php echo $nop; ?></td>		

  </tr>
</table>
</body>
</html>