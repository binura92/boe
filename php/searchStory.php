<?Php

require "DB_Connection.php";  // database connection

//////////////////////////////// Main Code sarts /////////////////////////////////////////////


$in=$_GET['txt'];
if(!ctype_alnum($in)){
echo "Data Error";
exit;
}

$msg="";
$msg="<select id='select' size='15' name='selt'>";
if(strlen($in)>0 and strlen($in) <20 ){
$sql="select Title, Body, Story_ID from story where Title like '%$in%' or Body like '%$in%'";
foreach ($dbo->query($sql) as $nt) {
	$rValue = $nt['Story_ID']."@".$nt['Title'].'@@'.$nt['Body'];
//$msg.=$nt[name]."->$nt[id]<br>";
$msg .="<option id='search_option' value=$rValue onClick='setValue();'> $nt[Title] </option>";
//$msg .="<option value='$nt[name]'>";

}
}
$msg .='</select>';
echo $msg;
?>