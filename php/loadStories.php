<?php
$id = $_POST["id"];
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";
$sql3 = "SELECT * From Story where Author_ID = '$id' ORDER BY Story_ID DESC";
$result = mysqli_query($con, $sql3);
while($row = mysqli_fetch_assoc($result)){
	echo "<hr/>";
	echo "<h3>".$row["Title"],"</h3>"."<br/>";
	echo $row["Body"]."<br/>";
}
echo "<hr>";
?>