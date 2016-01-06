<?php
session_start();

if(isset($_GET["u"])){
	$fid = $_GET["u"];
	$_SESSION['fid'] = $fid;
}

$id = $_SESSION['id'];

include_once './databaseConnection.php';

//select the user from the database

$sql = "SELECT * FROM registered_user WHERE Registation_ID='$fid' LIMIT 1";
$sql2 = "SELECT Category_ID,Category_Title From category";
$result = mysqli_query ($con,$sql2);
$query = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($query);
if($num_rows>0){
	$row = mysqli_fetch_assoc($query);
	$fid = $row['Registation_ID'];
	$fname = $row['First_Name'];
	$lname = $row['Last_Name'];
	$email = $row['Email_Address'];
	$gender = $row['Gender'];
	$rStatus = $row['Status'];
	$city = $row['City'];
	$image = $row["Profpic"];
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>.:BE:.</title>
		<link href="../css/stylesheet.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
        <script type="text/javascript" src="../js/ajax.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/story.js"></script>
        <script type="text/javascript" src="../js/editor.js"></script>
        <style>
		.butt {
			width:23px;;
			height:23px;
			border:1px #000 solid;
			background-repeat:no-repeat; 
			background-position:center;
			margin:2px;;
			}
        </style>
        
        <script>
            function sendFRequest(){
                
                var id = <?php echo json_encode($id);?>;
                var fid = <?php echo json_encode($fid);?>;
                //alert(id);
                //alert(fid);
                var xhttp = new XMLHttpRequest();
                
                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState === 4 && xhttp.status === 200){
                        var output = xhttp.responseText;
                        alert(output);
                        if(output === "1"){
                            document.getElementById("btnAddFriend").style.display = "none";
                            document.getElementById("requestStatus").innerHTML = "Friend Request Sent";
                        }
                    }
                };
                xhttp.open("POST","friendRequestHandle.php",true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id="+id+"&fid="+fid);
            }
        </script>
        
	</head>
<body>
	<?php include_once("template_top.php"); ?>
    <div id="wapper">
    	<div id="cover">
        	<div id="profilepic">
              <img src='<?php echo('../profilePic/'.$fid.'.jpg')?>' class='profilepic'/>
              <ul>
                  <li><?php echo $fname.' '.$lname; ?></li>
                  <li>Lives in <?php echo $city; ?></li>
              </ul>
          </div>       
        </div>
        <div id="middleSection">
            <button id="btnAddFriend" onclick="sendFRequest()">Add Friend</button>
            <div id="requestStatus">
                <button id="btnCancelRequest" onclick="cancelFRequest()">Cancel Request</button>
            </div>
        </div>
        
    </div>
</body>
</html>

