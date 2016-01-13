<html>
    <head>
        <title>.:BE:.</title>
        <link href="../css/inquiry.css" type="text/css" rel="stylesheet">
    </head>
    <body>        
        <?php
        session_start();
        $id = $_SESSION['id'];
        include_once("template_top.php");
        ?>
        <div id="mainbucketinc">
            <div class="warningshowbuket">
                <?php
                $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
                $sql2 = "SELECT* FROM warning WHERE Receiver='$id'";
                $query = mysqli_query($con, $sql2);
                $row = mysqli_fetch_assoc($query);
                $title = $row['Title'];
                $description = $row['Description'];
                echo("<h2 class='warningleft'> Title : </h2><h2 class='warningright'> " . $title . "</h2><br>");
                echo ("<h2 class='warningleft'> Description : </h2><h2 class='warningright'>" . $description ."</h2><br>");
                ?>
            </div>
        </div>
    </body>
</html>