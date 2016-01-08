<?Php
require "DB_Connection.php";  // database connection
$con = mysqli_connect("localhost", "root", "", "bookofexperiences");

//////////////////////////////// Main Code sarts /////////////////////////////////////////////


$in=$_GET['txt'];

$sql="SELECT Dislike_Feed FROM story WHERE Story_ID = $in";
foreach ($dbo->query($sql) as $nt) {
	$dislike = $nt['Dislike_Feed'];
        $dislike--;
        echo $dislike;
        
}
$sql2 = "UPDATE story SET Dislike_Feed = $dislike WHERE Story_ID = $in" ;
$query = mysqli_query($con, $sql2);

?>