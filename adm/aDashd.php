<?php session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
	}
    //echo $_SESSION['admin'];
	
include 'dbconnect.php';
$sql = "SELECT first_name, last_name FROM admin_user WHERE 	adminNo=".$_SESSION['admin'];
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$admin_name=$row['first_name']." ".$row['last_name'];
			
			
			}
		}
	

//include 'dbconnect.php';
//$sql = "first_name FROM MyGuests";
?>
<html>
<head>
<title><?php echo $admin_name;?></title>
<link href="CSS/new style.css" rel="stylesheet">
</head>
<body>
<nav id="nav01">
<ul id='menu'>
<li><a href='aDetails.php' target='content'>HOME</a></li>
<li><a href='cCat.php' target='content'>Add category</a></li>
<li><a href='cAdmin.php' target='content'>Create Admin</a></li>
<li><a href='repoted_story.php' target="content">Report</a></li>
<li><a href='help.php' target="content">Help</a></li>
<li><a href="logout.php" target="content">logout</a></li>

</ul>
</nav>
<div id="adContente"><iframe name="content" style="width:100%; height:100%; border: 0px;" src="aDetails.php"></iframe></div>
</body>
</html>

