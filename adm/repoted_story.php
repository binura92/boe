<!--Check is user login-->
<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
$adminId=$_SESSION['admin'];
//echo $adminId;
?>
<html>
<head>
<script type="text/javascript" src="JS/sendWarning.js"></script>
</head>
<body>
<form method="post" action="send_warning.php">
<input type="submit" name="submit" value="Send Warning"/>
<!--<input type="button" id="sendWarnigi" name="sendWarning" value="Send Warning" onClick="send_warning()"/>-->
<span id="feedBack"></span>
<table border="1" style="width:100%">
  <tr>
    <td>Story Title</td>
    <td>Number of Reporters</td>
    <td>Story</td>	
    <td>Select</td>	
  </tr>
<br/>
<?php
//Include database connection
include 'dbconnect.php';
//Sql query to get data from database
$sql = "SELECT COUNT(reports.Report_ID) AS number_of_reporters, story.Story_ID AS sid, story.Title AS Title2,story.Body AS body2 FROM reports LEFT JOIN story ON reports.Story_ID= story.Story_ID  WHERE reports.warning='not' GROUP BY reports.Story_ID ORDER BY number_of_reporters DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "<tr><td>".$row['Title2']."</td><td>".$row['number_of_reporters']."</td><td>".$row['body2']."</td><td><input type='checkbox' name= 'send_warning[]' class='send_warning' name='send_warning' value=".$row['sid']." /></td></tr>";
        
		
		}
	}
else{
	echo "<tr><td colspan='4'><h1>No Reported Story</h1></td></tr>";
	}
?>
</table>
</form>
</body>
</html>