<?php include_once './databaseConnection.php'; ?>
<div id="wrapper">
    <div id="rightSide">
        <?php 
            $sql1 = "SELECT * FROM registered_user";
            $query1 = mysqli_query($con, $sql1);
            if($query1){
                while($res = mysqli_fetch_assoc($query1)){
                    echo "<a href='profile.php?u=.".$res['Registation_ID']."'>".$res["First_Name"]." ".$res["Last_Name"]."<br></a>";
                }
            }
           
         ?>    
    </div>
    <div id="leftSide">
    </div>
    <div id="middle">
        <a href="categories.php" target="_blank">click</a>
    </div>
</div>

