<html>
    <head>
        <style>
            #wapper{
                background-color: #f7f9f9;
                position: relative;
                width: 980px;
                margin: 0 auto;
            }
            #catwapper{
                width:900px;
                position:relative;
                left:85px;
            }
            #catname{
                background-color:#fff;
                width:inherit;
                height:25px;
                opacity:0.5;
                position:relative;
                top:150px;
            }
            #catname a{
                text-decoration: none;
            }
            .catSelectBox {
                display: inline-block;
                height: 175px;
                overflow: hidden;
                padding: 0;
                position: relative;
                width: 250px;
                margin-top:25px;
            }
            h4 {
                color: #000;
                font-size: 1.2em;
                margin: 0;
                padding: 0;
                text-align: center;
            }

        </style>
    </head>    
</html>
<?php
include_once("story_top.php"); 
include_once '../databaseConnection.php';

$sql1 = "SELECT * FROM category";
$query1 = mysqli_query($con, $sql1);
?>

<?php while($res = mysqli_fetch_assoc($query1)){ ?>
<div id="wapper">
    <div id="catwapper">
        <?php echo '<div id="cat" class="catSelectBox" style="background-image:url(../../images/categories/'.$res['Category_ID'].'.jpg); background-size: 100% 100%; margin-right:25px;">'; ?>
            <div id="catname">
                <?php
                    echo "<a href='StoryCategoryPage.php?cid=".$res['Category_ID']."'><h4>".$res['Category_Title']."</h4><br><br></a>";			
                ?>
            </div>
    </div>
</div>
 <?php } ?>
