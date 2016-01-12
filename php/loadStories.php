<?php

$id = $_POST["id"];
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql3 = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Author_ID = '$id' ORDER BY Story_ID DESC ";
$result = mysqli_query($con, $sql3);
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $storyID = $row["Story_ID"];
    $author = $row['First_Name'] . ' ' . $row['Last_Name'];
    $title = $row['Title'];


    echo "<main id='acc'>
                <section id='item." . $i . "'>
                <a href='#item." . $i . "' style='font-family:Verdana, Geneva, sans-serif' onclick =viewStory($storyID) >" . $title . "</a>
                <div id='postDet'>Posted by <b>" . $author . "</b></div>
              
                    <hr/>
                    
                </section>   		
                </main>";
}

$i++;
?>