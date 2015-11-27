<html>
	<head>
		<title>.:BE:.</title>
		<script type="text/javascript" src="../../js/jquery-1.11.3.js"></script>
		<link href="../../css/catstyle.css" type="text/css" rel="stylesheet">
	</head>
<body>
<?php
include_once("story_top.php");
$con = mysqli_connect("localhost","root","","bookofexperiences");
$sql2 ="SELECT Category_Title FROM category WHERE Category_ID=1";
$query = mysqli_query($con, $sql2);
$row = mysqli_fetch_assoc($query);
	$scategory = $row['Category_Title'];

	echo("<h3>". $scategory. "<h3/>");
	echo("<hr><br>");


?>

<?php
$con = mysqli_connect("localhost","root","","bookofexperiences");
$sql = "SELECT Story_ID FROM story WHERE Category_ID=1 ORDER BY Publish_Date DESC";
			$result = $con->query($sql);
			if ($result->	num_rows > 0) {
    			// output data of each row
				$i = 1;
    			while($row = $result->fetch_assoc()) {
					$storyID = $row["Story_ID"];
					$storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID=".$storyID.";";
					$sqlstoryDetails = mysqli_query($con, $storyDetails);
					$runStory = mysqli_fetch_assoc($sqlstoryDetails);
					$author = $runStory['First_Name'].' '.$runStory['Last_Name'];
					$title = $runStory['Title'];	
					$body = $runStory['Body'];
					$publishDate = $runStory['Publish_Date'];
					$profilePic = $runStory['Profpic'];
					echo "<main id='acc'>
							<section id='item.".$i."'>
								<a href='#item.".$i."' style='font-family:Verdana, Geneva, sans-serif'	>".$title."</a>
								<div id='postDet'>Posted by <b>".$author."</b></div>
    								<p>".$body."</p><hr/>
							 </section>   		
						   </main>";	
					$i++;
			}
			}else {
				echo "0 results";
			}
?> 
    
</body>
</html>