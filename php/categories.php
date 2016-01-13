<html>
    <head>
        <link href="../css/storycatagorypage.css" type="text/css" rel="stylesheet">
    </head>    
</html>
<?php
session_start();
if (isset($_SESSION['login'])) {
    $id = $_SESSION['id'];
} else {
    header('Location: ../index.html');
    exit();
}
?>
<?php
include_once("../php/template_top.php");
include_once './databaseConnection.php';

//Selecting categories
$sql1 = "SELECT * FROM category";
$query1 = mysqli_query($con, $sql1);
?>
<?php
//To check whether category picture is present or not
function setDefaultCategoryPic($catPic) {
    $dir = '../images/categories/';
    $files1 = scandir($dir);
    $picAvailable = false;
    foreach ($files1 as $x) {
        if ($x == $catPic){
            $picAvailable = true;
            break;
        }
    }
    if ($picAvailable == FALSE) {
        $catPic = 'defaultPic.jpg';
    }
    return $catPic;
}

?>

    <div id="wapper">
        <div id="marginsetwapper">
            <?php while ($res = mysqli_fetch_assoc($query1)) { 
                $catPic = $res['Category_ID'] . ".jpg";
                $catPic = setDefaultCategoryPic($catPic);
            ?>
            <div id="catwapper">
                <?php echo "<div id='cat' class='catSelectBox' style='background-image:url(../images/categories/$catPic); background-size: 100% 100%; margin-right:25px;'>"; ?>
                <div id="catname">
                    <?php
                    echo "<a href='StoryCategoryPage.php?cid=" . $res['Category_ID'] . "'><h4>" . $res['Category_Title'] . "</h4></a>";
                    ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

