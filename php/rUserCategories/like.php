<?Php
require "DB_Connection.php";  // database connection
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");

//////////////////////////////// Main Code sarts /////////////////////////////////////////////


$in=$_GET['txt'];

$sql="SELECT Like_Count FROM story WHERE Story_ID = $in";
foreach ($dbo->query($sql) as $nt) {
	$like = $nt['Like_Count'];
        $like++;
        echo $like;
        
}
$sql1 = "UPDATE story SET Like_Count = $like WHERE Story_ID = $in" ;
$query = mysqli_query($con, $sql1);

?>