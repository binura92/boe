<html>
	<head>
		<title>.:BE:.</title>
		<link href="../css/stylesheet.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
        <script type="text/javascript" src="../js/ajax.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/story.js"></script>
	</head>
<body>

<?php
$con = mysqli_connect("localhost","root","","bookofexperiences");
$sql2 ="SELECT Category_Title FROM category WHERE Category_ID=3";
$query = mysqli_query($con, $sql2);
$row = mysqli_fetch_assoc($query);
	$scategory = $row['Category_Title'];

	echo("<h1>". $scategory. "<h1/>");
	echo("<hr><br>");


?>

<?php
$con = mysqli_connect("localhost","root","","bookofexperiences");
$sql = "SELECT Story_ID FROM story WHERE Category_ID=3 ORDER BY Publish_Date";
			$result = $con->query($sql);
			if ($result->	num_rows > 0) {
    			// output data of each row
    			while($row = $result->fetch_assoc()) {
					$storyID = $row["Story_ID"];
					$storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID=".$storyID.";";
					$sqlstoryDetails = mysqli_query($con, $storyDetails);
					$runStory = mysqli_fetch_assoc($sqlstoryDetails);
					$author = $runStory['First_Name'].' '.$runStory['Last_Name'];
					$title = $runStory['Title'];	
					$body = $runStory['Body'];
					$publishDate = $runStory['Publish_Date'];
					
						
					echo("<h2> Title : " .$title."</h2>");
					//echo('<img src="'.$profilePic.'" width="50"><br>');
					echo("Author : ". $author."<br>");
					echo("Date :". $publishDate."<br/>");
					echo("<h3><p>".$body."</p></h3>");
					echo("<p><hr><br><p/>");
					
					
				}

			}else {
				echo "0 results";
			}
?> 

</body>
</html>