<?Php

require "DB_Connection.php";  // database connection
//////////////////////////////// Main Code sarts //////////////////////////////////////////

function setDefaultProfilePic($profilePic) {
    $dir = '../profilePic/';
    $files1 = scandir($dir);
    $picAvailable = false;
    foreach ($files1 as $x) {
        if ($x == $profilePic) {
            $picAvailable = true;
            break;
        }
    }
    if ($picAvailable == FALSE) {
        $profilePic = 'defaultPic.jpg';
    }
    return $profilePic;
}

$id = 0;
session_start();
if (session_id()) {
    $id = $_SESSION['id'];
}


$in = $_GET['txt'];

$msg = "";
$msg = "<select id='select1' size='10' name='selt'>";
if (strlen($in) > 0 and strlen($in) < 20) {

    $sql = "select First_Name, Last_Name, Registation_ID from registered_user where (First_Name like '%$in%' or Last_Name like '%$in%') AND User_Level = 1";

    foreach ($dbo->query($sql) as $nt) {
        $rValue = $nt['Registation_ID'] . "@" . $nt['First_Name'] . '@@' . $nt['Last_Name'];
        $profilePic = $nt['Registation_ID'] . ".jpg";
        $profilePic = setDefaultProfilePic($profilePic);
        $msg .="<option id='search_option1' style='background-image:url(../profilePic/$profilePic);background-size: auto 30px;background-position: right; background-repeat: no-repeat;' value=$rValue onClick='setValue1();'>$nt[First_Name] $nt[Last_Name]</option> ";
    }
}
$msg .='</select>';
$msg .='<input type="text" id="user_ID" value="' . $id . '" style="visibility: hidden">';
echo $msg;
?>
