<?php
session_start();
$id = $_SESSION['id'];
?>
<?php include_once './databaseConnection.php'; ?>
<div id="wrapper">
    <div id="rightSide">
        <?php 
            $sql1 = "SELECT * FROM registered_user";
            $query1 = mysqli_query($con, $sql1);
            if($query1){
                while($res = mysqli_fetch_assoc($query1)){
                    echo "<a href='friendProfile.php?u=".$res['Registation_ID']."'>".$res["First_Name"]." ".$res["Last_Name"]."<br></a>";
                }
            }
         ?>    
    </div>
    <div id="leftSide">
    </div>
    <div id="middle">
        <h3>Friend Requests</h3>
        <?php
        $sql2 = "SELECT * FROM friend_add WHERE F_Registation_ID = '$id' and senderID != '$id'";
        $query2 = mysqli_query($con, $sql2);
        if($query2){
            $num_rows = mysqli_num_rows($query2);
            if($num_rows != 0){
                while($row = mysqli_fetch_assoc($query2)){
                    $friendID = $row["SenderID"];
                    $sql3 = "SELECT First_Name, Last_Name from registered_user WHERE Registation_ID = '$friendID'";
                    $query3 = mysqli_query($con, $sql3);
                    if($query3){
                        $res = mysqli_fetch_assoc($query3);
                        $fname = $res["First_Name"];
                        $lname = $res["Last_Name"];
                        echo $fname." ".$lname."<br>";
                    }
                    
                }
             
            }
            else{
                echo "No friend requests";
            }
            
        }
        
        ?>
    </div>
</div>

