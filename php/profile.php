<?php
session_start();

if(isset($_GET["u"])){
	$id = $_GET["u"];
	$_SESSION['id'] = $id;
}
else{
	$id = $_SESSION['id'];
}

//select the user from the database
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
$sql = "SELECT * FROM registered_user WHERE Registation_ID='$id' LIMIT 1";
$sql2 = "SELECT Category_ID,Category_Title From category";
$result = mysqli_query ($con,$sql2);
$query = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($query);
if($num_rows>0){
	$row = mysqli_fetch_assoc($query);
	$id = $row['Registation_ID'];
	$fname = $row['First_Name'];
	$lname = $row['Last_Name'];
	$email = $row['Email_Address'];
	$gender = $row['Gender'];
	$rStatus = $row['Status'];
	$city = $row['City'];
	$image = $row["Profpic"];
}
$_SESSION['id'] = $id;
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
        
	</head>
<body onLoad="iFrameon()">
	<?php include_once("template_top.php"); ?>
    <div id="wapper">
    	<div id="cover">
            <div id="profilepic">
                <?php
                    $dir    = '../profilePic/';
                    $files1 = scandir($dir);
                    $picAvailable = false;
                    foreach($files1 as $x){
                        if($x == $id.'.jpg'){
                            $picAvailable = true;
                            break;
                        }
                    }
                ?>
                <?php if($picAvailable == true){ ?>
                    <img src='<?php echo('../profilePic/'.$id.'.jpg')?>' class='profilepic'/>
                <?php } else { ?>
                    <img src="../images/defaultPic.jpg" class='profilepic'/>
                <?php } ?>    
                <ul>
                  <li><?php echo $fname.' '.$lname; ?></li>
                  <li>Lives in <?php echo $city; ?></li>
                </ul>
          </div>       
        </div>
        <div id="profileNavi">
        	<ul>
            	<li><a href="profile.php">My Experiences</a></li>
                <li><a href="editProf.php">About</a></li>
                <li><a href="#">My Categories</a></li>
                <li><a href="friendPage.php">Friends</a></li>
                <li><a href="#">+More</a></li>
            </ul>
        </div>
        <div style="border:1px #000 solid; background-color:#FFF; border-color:#000; border-width:medium;">
		<form name="editor" id="editor">
			<input type="text" name="subject" id="storyTitle" style="width:300px; height:25px; border-color:#000; border-width:medium;" placeholder="Title" >
            <!-- Get category from category table and put them in to drop down box-->   
            <?php
			echo "<select name='category' id='storyCategory' style='height:33px; border-color:#000; border-width:medium;'>";
			while ($row = mysqli_fetch_array($result)){
				echo "<option value='".$row['Category_ID']."'>".$row['Category_Title']."</option>";
			}
			echo "</select>";
			?>
			<br />
            
            <!-- Editing button -->
			<div id="buttons" style="width: 100%; border-top:1px #000 solid; height:28px; margin:1px; float:left;">
			<input type="button" name="bold" class="butt" onClick="abold()" style="background:url(../images/editorImages/b.png);"/>
			<input type="button" name="ith" class="butt" onClick="iitalic()" style="background:url(../images/editorImages/i.png);"/>
            <input type="button" name="underline" class="butt" onClick="underl()" style="background:url(../images/editorImages/u.png);"/>
            <input type="button" name="left" class="butt" onClick="jleft()" style="background:url(../images/editorImages/l.png);"/>
            <input type="button" name="center" class="butt" onClick="jcent()" style="background:url(../images/editorImages/c.png)"/>
            <input type="button" name="right" class="butt" onClick="jright()" style="background:url(../images/editorImages/r.jpg)"/>
            <input type="button" name="justy" class="butt" onClick="jjusty()" style="background:url(../images/editorImages/j.png)"/>
            </div>
            
            <!-- Story editor-->
			<textarea style="display: none;" name="story" id="storyBody" cols="100" rows="50"></textarea>
			<iframe name="reachtext" id="reachtext" style="width: 100%; height: 60%; border: black 1px solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:0px; border-right:0px;"></iframe>
            <div id="privacy">
            <select id="storyPrivacy">
                <option value="pu">Public</option>
                <option value="pr">Private</option>
            </select>
            </div>
            
            <input type="button" value="Post Story" class="storyPostBtn" id="btnPostStory" onClick="post()"/>
            <br/>
          			
		</form>
     	<div id="storyStatus"></div>
		</div>
    <!-- WYSIWYG Editor end-->
        <div id="profileNewNewsFeed" style="padding:10px;"></div>
		<div id="profilePastNewsFeed" style="padding:10px;">
                <script type="text/javascript">
			var id = <?php echo json_encode($id); ?>;
			//alert(id);
			
			if(id == ""){
				_("profilePastNewsFeed").innerHTML = "";	
			}
			else{
				
				var ajax = ajaxObj("POST", "loadStories.php");
				
				ajax.onreadystatechange = function(){
					if(ajaxReturn(ajax) == true){
						_("profilePastNewsFeed").innerHTML = ajax.responseText;
					}
				}
			}
			ajax.send("id=" +id);
		</script>
        </div>

    </div>
</body>
</html>