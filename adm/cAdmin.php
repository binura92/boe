<?php session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
$adminId=$_SESSION['admin'];
//echo $adminId;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/jscript" src="JS/cAdmin.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body style="background-color:#a1e9ed;">
<h2 id="sec_title">Create Admin</h2>
<div id="container" style="padding-left:20%; padding-right:20%;">
    <?php echo "<input type='text' id='adminId' value=$adminId style='visibility: hidden;'/>\n"; ?>
    <br/>

<span>First Name</span>
<br/>
<input type="text" id="first_name" name="first_name" style="width:100%; background-color:#FFF; opacity:0.4;" autocomplete="off" autofocus="autofocus"/>
<br/>
<span>Last Name</span>
<br/>
<input type="text" id="last_name" name="last_name" style="width:100%; background-color:#FFF; opacity:0.4;" autocomplete="off"/>
<br/>
<span>User Name</span>
<br/>
<input type="text" id="iuserName" name="iuserName" style="width:100%; background-color:#FFF; opacity:0.4;" autocomplete="off"/>
<br/>
<span>Password</span>
<br/>
<input type="password" id="iuserPass" name="iuserPass" style="width:100%; background-color:#FFF; opacity:0.4;" autocomplete="off"/>
<br/>
<span>Confirm Password</span>
<br/>
<input type="password" id="icuserPass" name="icuserPass" style="width:100%; background-color:#FFF; opacity:0.4;" onkeyup="check_pass(e)" autocomplete="off"/><p id="check"></p>
    <p id="respose"></p>
<br/>
<br/>
<input type="button" id="createBut" name="createBut" value="Create" style="background-color:#FFF; opacity:0.4;; float:right; margin:1%" onclick="creAdm()"/>
<input type="button" id="cancelBut" name="cancelBut" value="Cancel" style="background-color:#FFF; opacity:0.4; float:right; margin:1%;" onclick="fclear()"/>
</div>
</body>
</html>