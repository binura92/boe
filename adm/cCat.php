<?php session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
}
$adminId=$_SESSION['admin'];

?>
<html>
<head>
    <script type="text/jscript" src="JS/cCat.js"></script>
</head>
<body>
<h2>Create Category</h2>
Category Name:
<br/>
<br/>
<?php echo "<input type='text' id='adminId' value=$adminId style='visibility: hidden;'/>\n"; ?>
<input type="text" id="catName" name="catName" style="width: 50%"/>
<input type="button" id="createCat" name="createCat" value="Create" onclick="createCat()"/>
<p id="response"></p>
</body>
</html>