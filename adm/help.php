<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:index.php');
	}
?>
<html>

<head>
    <script type="text/javascript" src="JS/help.js"></script>
<title>Form Input Data</title>
<style>
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    border: 2px solid #ccc;
    background-color: #f8f8f8;
    font-size: 16px;
	font: arial;
}

#problem{
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
	font-size: 16px;
    border: 2px solid #ccc;
	background-color: #f8f8f8;
	font: arial;
    
}
</style>
</head>

<body>
<form>
  
  <input type="text" id="problem" name="problem" placeholder="Problem">
</form>  
<textarea placeholder= "Solution" id="solution">
</textarea>
<input type="button" id="submit" value="Submit" style="float:right; width:20%;" onClick="sendhelp()"/>
</body>
</html>