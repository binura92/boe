<?php session_start(); ?>

<?php
if (isset($_GET["u"]) && isset($_SESSION['login'])) {
    $fid = $_GET["u"];
    $id = $_SESSION["id"];
    $_SESSION["friendID"] = $fid;
} elseif (isset($_SESSION['login'])) {
    header('Location: ../filenotfound.php');
} else {
    header('Location: ../index.html');
    exit();
}

include_once './databaseConnection.php';

//select the user from the database

$sql = "SELECT * FROM registered_user WHERE Registation_ID='$fid' LIMIT 1";
$sql2 = "SELECT Category_ID,Category_Title From category";
$result = mysqli_query($con, $sql2);
$query = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($query);
if ($num_rows > 0) {
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
<<<<<<< HEAD
	<head>
		<title>.:BE:.</title>
		<link href="../css/stylesheet.css" type="text/css" rel="stylesheet">
                <link href="../css/catstyle.css" type="text/css" rel="stylesheet">
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
        
=======
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

>>>>>>> b1a98ca622adf8b003a4e48d01c0c18132d975d0
        <script>
            function sendFRequest() {

                var id = <?php echo json_encode($id); ?>;
                var fid = <?php echo json_encode($fid); ?>;
                //alert(id);
                //alert(fid);
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        var output = xhttp.responseText;
                        alert(output);
                        if (output === "1") {
                            document.getElementById("btnAddFriend").style.display = "none";
                            document.getElementById("middleSection").innerHTML = "Friend Request Sent<br><button onclick='cancelFRequest()'>Cancel Request</button>";
                        }
                    }
                };
                xhttp.open("POST", "friendRequestHandle.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + id + "&fid=" + fid);
            }

            function cancelFRequest() {
                var id = <?php echo json_encode($id); ?>;
                var fid = <?php echo json_encode($fid); ?>;
                //alert(id);
                //alert(fid);
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        var output = xhttp.responseText;
                        //alert(output);
                        if (output === "1") {
                            document.getElementById("middleSection").innerHTML = "<button id='btnAddFriend' onclick='sendFRequest()'>Add Friend</button>";
                        }
                    }
                };
                xhttp.open("POST", "cancelFriendRequestHandle.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + id + "&fid=" + fid);
            }

            function acceptRequest() {
                var id = <?php echo json_encode($id); ?>;
                var fid = <?php echo json_encode($fid); ?>;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        var output = xhttp.responseText;
                        if (output === "1") {
                            document.getElementById("middleSection").innerHTML = "<button onclick='cancelFRequest()'>Unfriend</button>";

                        }

                    }
                };
                xhttp.open("POST", "acceptFriendRequestHandle.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + id + "&fid=" + fid);
            }

        </script>

    </head>
    <body>
        <?php include_once("template_top.php"); ?>
        <div id="wapper">
            <div id="cover">
                <div id="profilepic">
                    <?php
                    $dir = '../profilePic/';
                    $files1 = scandir($dir);
                    $picAvailable = false;
                    foreach ($files1 as $x) {
                        if ($x == $fid . '.jpg') {
                            $picAvailable = true;
                            break;
                        }
                    }
                    ?>
                    <?php if ($picAvailable == true) { ?>
                        <img src='<?php echo('../profilePic/' . $fid . '.jpg') ?>' class='profilepic'/>
                    <?php } else { ?>
                        <img src="../images/defaultPic.jpg" class='profilepic'/>
                    <?php } ?>    
                    <ul>
                        <li><?php echo $fname . ' ' . $lname; ?></li>
                        <li>Lives in <?php echo $city; ?></li>
                    </ul>
                </div>       
            </div>
            <?php
            $sql3 = "SELECT * FROM friend_add WHERE F_Registation_ID = '$fid' and Registation_ID = '$id'";
            $result3 = mysqli_query($con, $sql3);
            $num_rows3 = mysqli_num_rows($result3);
            ?>

            <div id="middleSection">

                <?php if ($num_rows3 == 0): ?>
                    <button id="btnAddFriend" onclick="sendFRequest()">Add Friend</button>
                    <?php
                else:
                    $row = mysqli_fetch_assoc($result3);
                    if ($row['Confirmation'] == 0 and $row['SenderID'] == $id) {
                        echo "Friend Request Sent<br>";
                        echo "<button onclick='cancelFRequest()'>Cancel Request</button>";
                    } else if ($row['Confirmation'] == 1) {
                        echo "<div id='profileNavi'>
                <ul>
                    <li><a href='friendProfile.php'>My Experiences</a></li>
                    <li><a href='friendDetails.php?f=$fid'>About</a></li>
                </ul>
            </div>";
                        echo "<button onclick='cancelFRequest()'>Unfriend</button>";
                        test();
                    } else {
                        echo "<button onclick='acceptRequest()'>Accept Request</button> <button onclick='cancelFRequest()'>Reject Request</button>";
                    }

                endif;
                ?>
            </div>
        </div>
        <?php

        function test() {
            $fid = $_GET["u"];
            ?>
            <div id="profilePastNewsFeed" style="padding:10px;">
                <script type="text/javascript">
<<<<<<< HEAD
			var fid = <?php echo json_encode($fid);?>;
			//alert(id);
			
			if(fid === ""){
				_("profilePastNewsFeed").innerHTML = "";	
			}
			else{
				
                            var ajax = ajaxObj("POST", "loadStories.php");
				
                            ajax.onreadystatechange = function(){
				if(ajaxReturn(ajax) === true){
                                    _("profilePastNewsFeed").innerHTML = ajax.responseText;
                                }
                            };
			}
			ajax.send("id=" +fid);
		</script>
                </div>
    
     <div id="storyView">
            <div id="story">

            </div>

            <div id="feedback">

            </div>

            <div id="comment">
                <div id="oldComment">

                </div>

                <div id="newComment">

                </div>

                <div id="storyViewClose" onclick="storyViewClose()">
                    <h5>close</h5>
                </div>
            </div>

        </div>
        <div id="reportDiv">
            <h4>Choose a reason</h4>
            
            <label><input type="radio" id="reportOption1"  name="aaa" value="1"/>It's annoying or not interesting</label><br>
            <label><input type="radio" id="reportOption2" name="aaa" value="2"/>I think it shouldn't be on BE</label><br>
            <label><input type="radio" id="reportOption3" name="aaa" value="3"/>It's spam<br></label>
            <input type="text" id="storyID" style="visibility: hidden"/>
            <input type="button" onclick="report()" id="sendR" value="send"/>
            <input type="reset" onclick="cancleReport()" value="cancle"/>
            
        </div>
    <?php } ?>
</body>

>>>>>>> b1a98ca622adf8b003a4e48d01c0c18132d975d0
</html>

