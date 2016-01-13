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
                $sql = "SELECT Warning_ID FROM warning WHERE Receiver='$id'";
                $query1 = mysqli_query($con, $sql);
                if ($query1) {
                    // output data of each row
                    if(mysqli_num_rows($query1)>0){
                    while ($row = mysqli_fetch_assoc($query1)) {
                        $wID = $row["Warning_ID"];
                        $sql2 = " SELECT * FROM registered_user INNER JOIN warning ON registered_user.Registation_ID=warning.Receiver WHERE Warning_ID=" . $wID . ";";
                        $query = mysqli_query($con, $sql2);
                        $row = mysqli_fetch_assoc($query);
                        $title = $row['Title'];
                        $description = $row['Description'];

                        echo("<h2> Title : " . $title . "</h2>");
                        echo ("<h3> Description : " . $description . "</h3>");
                    }
                } else {
                    echo ("<h2>You haven't any warnings</h2>");
                }}
                ?>
            </div>
        </div>

    </body>
</html>