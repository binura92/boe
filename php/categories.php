<?php

include_once './databaseConnection.php';

$sql1 = "SELECT * FROM category";
$query1 = mysqli_query($con, $sql1);

while($res = mysqli_fetch_assoc($query1)){
    echo "<a href='StoryCategoryPage.php?cid=".$res['Category_ID']."'>".$res['Category_Title']."<br><br></a>";
}
