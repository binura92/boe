<?php
session_start();
if (isset($_SESSION['login'])) {
    $id = $_SESSION['id'];
} else {
    header('Location: ../index.html');
    exit();
}
?>
<html>
    <head>
        <link href="../css/catstyle.css" type="text/css" rel="stylesheet">
    </head>
</html>
<?php
include_once './databaseConnection.php';
include_once("template_top.php");

$sql1 = "SELECT s.* FROM friend_add f JOIN story s ON (f.F_Registation_ID = s.Author_ID OR f.Registation_ID = s.Author_ID) WHERE f.Registation_ID = '$id' and f.Confirmation = 1 and f.SenderID = '$id' and Type != 'pr' ORDER BY lastUpdate DESC";

$query1 = mysqli_query($con, $sql1);

if ($query1) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($query1)) {
        $storyID = $row["Story_ID"];
        $storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID=" . $storyID . ";";
        $sqlstoryDetails = mysqli_query($con, $storyDetails);
        $runStory = mysqli_fetch_assoc($sqlstoryDetails);
        $author = $runStory['First_Name'] . ' ' . $runStory['Last_Name'];
        $title = $runStory['Title'];
        $body = $runStory['Body'];
        $publishDate = $runStory['Publish_Date'];
        echo "<main id='acc'>
                <section id='item." . $i . "'>
                <a href='#item." . $i . "' style='font-family:Verdana, Geneva, sans-serif'>" . $title . "</a>
                <div id='postDet'>Posted by <b>" . $author . "</b></div>
                <p>" . $body . "</p><hr/>
                </section>   		
                </main>";
        $i++;
    }
}


