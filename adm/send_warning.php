<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
$adminId=$_SESSION['admin'];
//echo $adminId;
include 'dbconnect.php';
if (empty($_POST['send_warning'])){
	exit("Please Select Stories to send Warnings");
	}
else{
	$war=$_POST['send_warning'];
	foreach($war as $item){
		$sql= "SELECT Author_ID, Title  FROM story WHERE Story_ID=".$item;
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$aid=$row['Author_ID'];
				$dis = "Post that you publish under Title ".$row['Title']." is reported as a violation of BOE term and reference";
				$sql2="INSERT INTO warning(Receiver, Sender, Title, Description) VALUES ('$aid',$adminId,'Warning','$dis')";
				$conn->query($sql2);
					
				}
			}
		$sql3="UPDATE reports SET warning='Warned' WHERE Story_ID=".$item;
		$conn->query($sql3);
		
		}
	echo "<span style='color:red;'>You sucessfully send worning</span>";
	echo "<br/>";
	echo "<a href='repoted_story.php' style='font-style:None'><input type='button' value='Return to Reports'/></a>";
	}

?>