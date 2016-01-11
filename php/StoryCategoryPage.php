<?php
session_start();
if (isset($_SESSION['login']) && isset($_GET["cid"])) {
    $id = $_SESSION['id'];
}else if(isset($_SESSION['login'])){
    header('Location: ../filenotfound.php');
} else {
    header('Location: ../index.html');
    exit();
}
?>
<html>
    <head>
        <title>.:BE:.</title>
        <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
        <script type="text/javascript" src="../js/story.js"></script>
        <link href="../css/catstyle.css" type="text/css" rel="stylesheet">
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
            <input type="reset" onclick="cancleReport()" value="cancle"/>
            
        </div>
        <?php
        $cid = $_GET["cid"];
        include_once("template_top.php");
        $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
        $sql2 = "SELECT Category_Title FROM category WHERE Category_ID='$cid'";
        $query = mysqli_query($con, $sql2);
        $row = mysqli_fetch_assoc($query);
        $scategory = $row['Category_Title'];

        echo("<h3>" . $scategory . "<h3/>");
        echo("<hr><br>");

        $sql = "SELECT Story_ID FROM story WHERE Category_ID='$cid' and (Type != 'pr' or Author_ID = '$id') ORDER BY Publish_Date DESC";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $storyID = $row["Story_ID"];
                $storyDetails = "SELECT * FROM registered_user INNER JOIN story ON registered_user.Registation_ID=story.Author_ID WHERE Story_ID=" . $storyID . ";";
                $sqlstoryDetails = mysqli_query($con, $storyDetails);
                $runStory = mysqli_fetch_assoc($sqlstoryDetails);
                $author = $runStory['First_Name'] . ' ' . $runStory['Last_Name'];
                $title = $runStory['Title'];
                $body = $runStory['Body'];
                $publishDate = $runStory['Publish_Date'];
                $profilePic = $runStory['Profpic'];
                $div_ID = "storyComment" . $storyID;
                echo "<main id='acc'>
                <section id='item." . $i . "'>
                <a href='#item." . $i . "' style='font-family:Verdana, Geneva, sans-serif' onclick =viewStory($storyID) >" . $title . "</a>
                <div id='postDet'>Posted by <b>" . $author . "</b></div>
              
                    <hr/>
                    
                </section>   		
                </main>";
                echo "<span id=$div_ID></span>";
                $i++;
                /* <div id = $div_ID>

                  </div> */
            }
        } else {
            echo "0 results";
        }
        ?> 

    </body>
</html>	  