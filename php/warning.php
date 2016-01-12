<html>
    <head>
        <title>.:BE:.</title>
    </head>
    <body>
        <?php
        session_start();
        $id = $_SESSION['id'];
        ?>
        <?php
        include_once("template_top.php");
        $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
        $sql2 = "SELECT* FROM warning WHERE Receiver='$id'";
        $query = mysqli_query($con, $sql2);
        $row = mysqli_fetch_assoc($query);
        $title = $row['Title'];
        $description = $row['Description'];
        echo("<h2> Title : " . $title . "</h2>");
        echo ("<h3> Description : " .$description ."</h3>");
        ?>

    </body>
</html>