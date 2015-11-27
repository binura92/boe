<html>
<head>
<title>.::BOE::.</title>
<link href="../css/homePageStyles.css" type="text/css" rel="stylesheet" media="screen"/>
</head>
<body>
<div id="wrapper">
	<?php
		include_once("template_top.php");
	?>
    <?php
	  session_start();
	  $id = $_SESSION['id'];
	?>
    <div id="left-bar">
    <?php
		//$email = $_POST["txtEmail"];
		//$pass = $_POST["txtPassword"];
		$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
		$query1 = mysqli_query($con, "SELECT * FROM registered_user WHERE Email_Address = '$email' AND Password = '$pass'");
		$numrows = mysqli_num_rows($query1);
		if($numrows > 0){
			$row = mysqli_fetch_assoc($query1);
			$uname = $row['First_Name'];
			$id = $row['Registation_ID'];
			echo "<strong>$uname</strong>";
			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;
			$_SESSION['id'] = $id;
		}
		else
		{
			echo "Incorrect Email or Password";
		}
	?>
    </div>
</div>
<div id = "middle-bar"> 
	<div id = "sto">
    	<?php
			$sql = "SELECT Story_ID FROM story ORDER BY lastUpdate";
			$result = $con->query($sql);
			if ($result->	num_rows > 0) {
    			// output data of each row
    			while($row = $result->fetch_assoc()) {
					$storyID = $row["Story_ID"];
					$storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID=".$storyID.";";
					$sqlstoryDetails = mysqli_query($con, $storyDetails);
					$runStory = mysqli_fetch_assoc($sqlstoryDetails);
					$author = $runStory['First_Name'].' '.$runStory['Last_Name'];
					$profilePic = $runStory['Profpic'];
					$title = $runStory['Title'];	
					$body = $runStory['Body'];
					$category_ID = $runStory['Category_ID'];
					$type = $runStory['Type'];
					$publishDate = $runStory['Publish_Date'];
					$likeCount = $runStory['Like_Count'];
					$dislikeCount = $runStory['Dislike_Feed'];
						
        			echo('<img src="'.$profilePic.'" width="50">');
					echo("Author : ". $author."<br>");
					echo("<h2> Title : " .$title."</h2>");
					echo("<p>".$body."</p>");
					echo('<input type="button" id="like" value="Like" onClick="like()">');
					echo('<input type="button" id="disLike" value="Unlike" onClick="disLike()">');
					echo("<br> Like = ".$likeCount."  Unlike = ".$dislikeCount);
					echo("<hr><br>");
				}
			}else {
				echo "0 results";
			}		 
		?>
    </div>
</div>
</body>
</html>