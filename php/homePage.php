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
        <script type="text/javascript" src="../js/story.js"></script>
    </head>
    <body>
        <div id="storyView">
            <div id="story">

            </div>

            <div id="feedback">

            </div>

            <div id="comment">
                <div id="oldComment">

                </div>

                <div id="newComment">

                </div>

                <div id="storyViewClose" onclick="storyViewClose()">
                    <h5>close</h5>
                </div>
            </div>

        </div>
        <div id="reportDiv">
            <h4>Choose a reason</h4>

            <label><input type="radio" id="reportOption1"  name="aaa" value="1"/>It's annoying or not interesting</label><br>
            <label><input type="radio" id="reportOption2" name="aaa" value="2"/>I think it shouldn't be on BE</label><br>
            <label><input type="radio" id="reportOption3" name="aaa" value="3"/>It's spam<br></label>
            <input type="text" id="storyID" style="visibility: hidden"/>
            <input type="button" onclick="report()" id="sendR" value="send"/>
            <input type="reset" onclick="cancleReport()" value="cancel"/>

        </div>
    </body>
</html>
<?php
include_once './databaseConnection.php';
include_once("template_top.php");

//$sql1 = "SELECT s.* FROM friend_add f JOIN story s ON (f.F_Registation_ID = s.Author_ID OR f.Registation_ID = s.Author_ID) WHERE f.Registation_ID = '$id' and f.Confirmation = 1 and f.SenderID = '$id' and Type != 'pr' ORDER BY lastUpdate DESC";
//$sql1 = "SELECT s.* FROM friend_add f JOIN story s ON (f.F_Registation_ID = s.Author_ID OR f.Registation_ID = s.Author_ID) JOIN registered_user r ON s.Author_ID = r.Registation_ID WHERE f.Registation_ID = '$id' and f.Confirmation = 1 and f.SenderID = '$id' and Type != 'pr' and view= 1 and User_Level = 1 ORDER BY lastUpdate DESC";
$sql1 = "SELECT s.Story_ID, s.Category_ID from story s WHERE (s.Author_ID = ANY(SELECT f.F_Registation_ID FROM friend_add f JOIN registered_user r ON f.F_Registation_ID = r.Registation_ID WHERE Confirmation = 1 and f.Registation_ID = $id and r.User_Level = 1 and s.Type != 'pr') OR s.Author_ID = $id) and s.view = 1 ORDER BY lastUpdate DESC;";

$query1 = mysqli_query($con, $sql1);

if ($query1) {
    
    $i = 0;
    while ($row = mysqli_fetch_assoc($query1)) {
       
        $storyID = $row["Story_ID"];
        $catID = $row["Category_ID"];
        $storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID= '$storyID';";
        $sqlstoryDetails = mysqli_query($con, $storyDetails);
        $sqlFindCat = "SELECT Category_Title FROM category WHERE Category_ID = $catID";
        $queryFindCat = mysqli_query($con, $sqlFindCat);
        $runStory = mysqli_fetch_assoc($sqlstoryDetails);
        $resFindCat = mysqli_fetch_assoc($queryFindCat);
        $authorID = $runStory["Registation_ID"];
        $author = $runStory['First_Name'] . ' ' . $runStory['Last_Name'];
        $title = $runStory['Title'];
        $body = $runStory['Body'];
        $publishDate = $runStory['Publish_Date'];
        $catName = $resFindCat["Category_Title"];
        
        echo "<main id='acc'>
                <section id='item." . $i . "'>
                <a href='#item." . $i . "' style='font-family:Verdana, Geneva, sans-serif' onclick =viewStory($storyID)><b>" . $title . "</b></a>
                <div id='postDet'>Posted by <b><a href='friendProfile.php?u=$authorID'>" . $author . "</a></b><br><a href='StoryCategoryPage.php?cid=$catID'>".$catName."</a><br><a>".$publishDate."</a></br></div>
                <hr/>
                </section>   		
                </main>";
        $i++;
    }
}
