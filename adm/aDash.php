<?php session_start();
if(isset($_GET["u"])){
    $admin = $_GET["u"];
    $_SESSION['admin'] = $admin;
    //echo $_SESSION['admin'];

}
else{
    header('Location:index.php');
}

?>

<html>
<head>
    <?php echo"<title>Admin DashBoard:".$_SESSION['admin']."</title>" ?>
    <link rel="stylesheet" type="text/css" href="CSS/aDash.css"/>
</head>
<body>
<div id="container">
    <div id="adHeadder"><h1>Admin Dashboard</h1> <h3>Login as:<?php echo $_SESSION['admin'] ?></h3></div>
    <div id="adHeadNevi">
        <a href="aDetails.php" target="content">Details</a>
        <a href="cAdmin.php" target="content">Create Admin</a>
        <a href="cCat.php" target="content">Create Category</a>
    </div>
    <div id="adContente"><iframe name="content" style="width:100%; height:100%; border: 0px;" src="aDetails.php"></iframe></div>
</div>

</body>
</html>