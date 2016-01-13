<?php
include_once './databaseConnection.php';
//function to check whether cover picture is available or not
function setDefaultCoverPic($coverPic) {
    $dir = '../images/covers/';
    $files1 = scandir($dir);
    $picAvailable = false;
    foreach ($files1 as $x) {
        if ($x == $coverPic){
            $picAvailable = true;
            break;
        }
    }
    if ($picAvailable == FALSE) {
        $coverPic = 'defaultPic.jpg';
    }
    return $coverPic;
}
$coverPic = $id . ".jpg";
$coverPic = setDefaultCoverPic($coverPic);
?>

<?php echo "<div id='cover' style='background-image: url(../images/covers/$coverPic);'>" ?>
<div id="profilepic">
    <?php
    $dir = '../profilePic/';
    $files1 = scandir($dir);
    $picAvailable = false;
    foreach ($files1 as $x) {
        if ($x == $id . '.jpg') {
            $picAvailable = true;
            break;
        }
    }
    ?>
    <?php if ($picAvailable == true) { ?>
        <img src='<?php echo('../profilePic/' . $id . '.jpg') ?>' class='profilepic'/>
    <?php } else { ?>
        <img src="../images/defaultPic.jpg" class='profilepic'/>
    <?php } ?>    
    <ul>
        <li><?php echo $fname . ' ' . $lname; ?></li>
        <li>Lives in <?php echo $city; ?></li>
    </ul>
</div>       
</div>
<div id="profileNavi">
    <ul>
        <li><a href="profile.php">My Experiences</a></li>
        <li><a href="editProf.php">About</a></li>
        <li><a href="friendPage.php">Friends</a></li>
    </ul>
</div>

