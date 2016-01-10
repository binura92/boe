<script type="text/javascript" src="../js/script.js"></script>
<?Php
require "DB_Connection.php";  // database connection
//////////////////////////////// Main Code sarts /////////////////////////////////////////////

$key = $_GET['txt'];
$pos = strpos($key, "@");
$Sender_ID = substr($key, 0, $pos);
$title = substr($key, $pos + 1);
if (!ctype_alnum($Sender_ID)) {
    echo "Data Error";
    exit;
}

$msg = "";

if (strlen($Sender_ID) > 0 and strlen($Sender_ID) < 7) {
    $sql = "SELECT Message_ID,Registation_ID, First_Name, Last_Name, Sender_ID, Receiver_ID, Title, Body, Date, view FROM registered_user INNER JOIN message ON registered_user.Registation_ID=message.Sender_ID  WHERE Sender_ID = $Sender_ID and Title = '$title' ORDER BY Date DESC";
    foreach ($dbo->query($sql) as $nt) {
        $mID = $nt['Message_ID'];
        $view = $nt['view'];

        //$msg .="<div onclick = view($mID)> Title : $nt[Title] <br> Message : $nt[Body] <br> Sender : $nt[First_Name] <br> Date : $nt[Date] <br> --------------<br>   </div>";
        if ($view == 0) {
            $msg.="<div class=unreadmsg mgs123 onclick = view($mID)> Title : $nt[Title] <br> Message : $nt[Body] <br> Sender : $nt[First_Name] <br> Date : $nt[Date] <br><button onclick = reply($Sender_ID)>reply</button> <br> --------------<br>   </div>";
        } else {
            $msg.="<div class=readmsg  mgs123 onclick = view($mID)> Title : $nt[Title] <br> Message : $nt[Body] <br> Sender : $nt[First_Name] <br> Date : $nt[Date] <br><button onclick = reply($Sender_ID)>reply</button> <br> --------------<br>   </div>";
        }
    }
}
$msg.="<input type='text' id='msgTitle' value='$title' style='visibility: hidden'>";
echo $msg;
?>

