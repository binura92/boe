<?php
$iuserPass=$_POST['iuserPass'];
$icuserPass=$_POST['icuserPass'];
if($iuserPass!=$icuserPass){
    echo "Confirm Password is not Match";
}
else{
    echo "OK";
}
?>