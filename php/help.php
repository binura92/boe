<?php
include_once './databaseConnection.php';
$sql1 = "SELECT * FROM help";
$query1 = mysqli_query($con, $sql1);
$i = 1;
while($row = mysqli_fetch_assoc($query1)){
    $title = $row["helpTitle"];
    $desc = $row["helpDescription"];
    echo "<main id='acc'>
	<section id='item.".$i."'>
	<a href='#item.".$i."' style='font-family:Verdana, Geneva, sans-serif'>".$title."</a>
	<p>".$desc."</p>
	</section>   		
	</main>";	
	$i++;
}
?>

<style>
#acc{
    width:980px;
    margin: 0 auto;
    padding:10px;
    background-color:#FFC;
}
#acc section p{
    display:none;
}
#acc section a{
    color:black;
    text-decoration:none;
}
#acc section:target p{
    padding-left:2em;
    padding-right:3em;
    display:block;
    font-family:Verdana, Geneva, sans-serif;
    font-weight:100;
    font-size:14px;
}    
</style>

