<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>

        <script type="text/javascript" src="../js/script.js"></script>
    </head>

    <body>


        <?php
        session_start();
        $ID = $_SESSION['id'];
        //view
        $out = '';
        $con = mysqli_connect("localhost", "root", "", "bookofexperiences");
        $sql3 = "SELECT distinct First_Name, Last_Name, Sender_ID, Title, view FROM registered_user INNER JOIN message ON registered_user.Registation_ID=message.Sender_ID  WHERE Receiver_ID= $ID  ORDER BY Date DESC";
        $query3 = mysqli_query($con, $sql3);
        

        $out.='<select id="selectMsg" size="10" onchange="loadMsgInbox()">';
        while ($row3 = mysqli_fetch_assoc($query3)) {
            $mSender_ID = $row3['Sender_ID'];
            $mTitle = $row3['Title'];
            $mSenderName = $row3['First_Name'] . ' ' . $row3['Last_Name'];
            $view = $row3['view'];
            if($view == 0 ){
                $out.= '<option class="unreadmsg mgs123" value="' . $mSender_ID . '@' . $mTitle . '" >' . $mSenderName . ' -->' . $mTitle . '</option>';
            }else{
                $out.= '<option class="readmsg  mgs123" value="' . $mSender_ID . '@' . $mTitle . '" >' . $mSenderName . ' -->' . $mTitle . '</option>';
            }
            
            
        }
        $out.='</select>';
        echo($out);
        ?>
    </body>
</html>