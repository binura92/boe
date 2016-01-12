<?php

$id = $_POST["id"];
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql3 = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Author_ID = '$id' and view= 1 ORDER BY Story_ID DESC ";
$result = mysqli_query($con, $sql3);
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $storyID = $row["Story_ID"];
    $catID = $row["Category_ID"];
    $sqlFindCat = "SELECT Category_Title FROM category WHERE Category_ID = $catID";
    $queryFindCat = mysqli_query($con, $sqlFindCat);
    $resFindCat = mysqli_fetch_assoc($queryFindCat);
    $author = $row['First_Name'] . ' ' . $row['Last_Name'];
    $title = $row['Title'];
    $catName = $resFindCat["Category_Title"];

    echo "<main id='acc'>
                <section id='item." . $i . "'>
                <a href='#item." . $i . "' style='font-family:Verdana, Geneva, sans-serif' onclick =viewStory($storyID) ><b>" . $title . "</b></a>
                <div id='postDet'>Posted by <b>" . $author . "</b><br><a href='StoryCategoryPage.php?cid=$catID'>".$catName."</a></br></div>
              
                    <hr/>
                    
                </section>   		
                </main>";
}

$i++;
?>