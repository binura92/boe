<?php session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
$adminId=$_SESSION['admin'];

?>
<html>
<head>
    <script type="text/jscript" src="JS/cCat.js"></script>
    <script type="text/jscript" src="JS/viewCat.js"></script>
</head>
<body onLoad="viewC()">
<h2>Create Category</h2>
<br/>
<br/>
<?php echo "<input type='text' id='adminId' value=$adminId style='visibility: hidden;'/>\n"; ?>
<input type="text" id="catName" name="catName" autofocus="autofocus" autocomplete="off" placeholder="Enter New Category" style="width: 50%;"/>
<input type="button" id="createCat" name="createCat" value="Create" onClick="createCat()"/>
<p id="response"></p>
<p id="cath" name="cath" style="width: 200px;"><h4>Avaiable Category</h4></p>
<p id="cat" name="cat" style="width: 200px; height: 50%; overflow-y: scroll;"></p>
</body>
</html>