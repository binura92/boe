<?PHP

session_start();
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
	echo "<script type='text/javascript'>window.top.location.href='index.php'</script>";
	//header("location:index.php");
	}

else{
	echo "No";
	}

?>