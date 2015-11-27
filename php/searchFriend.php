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
$sql="select First_Name, Last_Name, Registation_ID from registered_user where First_Name like '%$in%' or Last_Name like '%$in%'";
foreach ($dbo->query($sql) as $nt) {
	$rValue = $nt['Registation_ID']."@".$nt['First_Name'].'@@'.$nt['Last_Name'];
//$msg.=$nt[name]."->$nt[id]<br>";
$msg .="<option id='search_option' value=$rValue onClick='setValue();'> $nt[First_Name] $nt[Last_Name] </option>";
//$msg .="<option value='$nt[name]'>";

}
}
$msg .='</select>';
echo $msg;
?>