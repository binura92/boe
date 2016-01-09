<?Php
require "DB_Connection.php";  // database connection
//////////////////////////////// Main Code sarts //////////////////////////////////////////
$id = 0;
session_start();
if (session_id()) {
    $id = $_SESSION['id'];
}


$in = $_GET['txt'];
if (!ctype_alnum($in)) {
    echo "Data Error";
    exit;
}

$msg = "";
$msg = "<select id='select' size='10' name='selt'>";
if (strlen($in) > 0 and strlen($in) < 20) {
    $sql = "select First_Name, Last_Name, Registation_ID from registered_user where First_Name like '%$in%' or Last_Name like '%$in%'";
    foreach ($dbo->query($sql) as $nt) {
        $rValue = $nt['Registation_ID'] . "@" . $nt['First_Name'] . '@@' . $nt['Last_Name'];
        $msg .="<option id='search_option1' value=$rValue onClick='setValue1();'>$nt[First_Name] $nt[Last_Name] </option>";
    }
}
$msg .='</select>';
$msg .='<input type="text" id="user_ID" value="' . $id . '" style="visibility: hidden">';
echo $msg;
//echo "<img src='../profilePic/1.jpg'/>";
?>

<select>
    <option value="1"></option>
</select>