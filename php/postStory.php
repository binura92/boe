<?php
session_start();
$id = $_SESSION['id'];
?>
<?php
$title = $_POST["title"];
$content = $_POST["content"];
$privacy = $_POST["privacy"];
$cat = $_POST["cat"];
$con = mysqli_connect("localhost","root","","bookofexperiences");
$sql = "INSERT INTO story (Title, Body, Category_ID, Type, Publish_Date, Author_ID, Like_Count, Dislike_Feed) VALUES ('$title','$content', '$cat', '$privacy', now(), '$id', 0, 0)";
mysqli_query($con, $sql);
$sql2 = "SELECT Title, Body from Story where Author_ID = $id ORDER BY Story_ID DESC";
$result = mysqli_query($con, $sql2);
$row=mysqli_fetch_assoc($result);
echo "<hr/>";
echo "<h3>".$row["Title"]."</h3>";
echo $row["Body"]."<br/>";
echo "<hr/>";
?>