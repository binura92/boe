<?php
include 'dbconnect.php';
$sql="SELECT Category_Title FROM category ORDER BY Category_Title";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo $row['Category_Title']."<br/>";
		}
	}
else{
	echo 'There are no any Category';
	}
?>