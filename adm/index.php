<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book of Experiences-Admin Login</title>
<link rel="stylesheet" type="text/css" href="CSS/alogin.css" />
<script type="text/jscript" src="JS/login.js"></script>
</head>

<body>
<div id="top">
<h1>Book of Experiences Admin Login</h1>
</div>
<div id="rest">
<span>User Name</span>
<br/>
<input type="text" id="userName" name="userName" autofocus="autofocus" autocomplete="off" placeholder="Enter Your User Name"/>
<br/>
<br/>
<span>Password</span>
<br/>
<input type="password" id="userPass" name="userPass" placeholder="Enter Your Password"/>
<span id="errorMsg"></span>
<br/>
<input type="button" id="loginBut" value="Login" onclick="fun_login()"/>
<input type="button" id="cancelBut" value="Clear" onclick="fun_cancle()"/>
</div>
</body>
</html>
