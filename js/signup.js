// JavaScript Document
function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	rx = /[' "]/gi;
	tf.value  = tf.value.replace(rx, "");
}
	
function emptyElement(x){
	_(x).innerHTML = "";	
}
	
var emailStatus;	//store email address is valid or not	
function checkEmail(){
	//alert("Working");
	var e = _("signupEmail").value;	
	if(e != ""){
		_("emailStatus").innerHTML = "checking ...";
		var e1 = e.substring(e.indexOf("@")+1)
		if(e.indexOf("@")>0 && e1.indexOf(".")>0){
			emailStatus = "valid";
			_("signupEmail").style.color = "#000";
		
			var ajax = ajaxObj("post", "php/signup.php");
			ajax.onreadystatechange = function(){
				if(ajaxReturn(ajax) == true){
					_("emailStatus").innerHTML = ajax.responseText;
				}	
			}
			ajax.send("emailcheck="+e);
			}
		else{
			_("emailStatus").innerHTML = "Invalid";
			emailStatus = "invalid";
			_("signupEmail").style.color = "#ff0000";
			//_("signupEmail").style.borderColor = "#ff0000";
			
		}
	}else{
			emailStatus = "invalid";
	}
}

function checkPassword(){
	var p = _("pass1").value;	
	if(p.length<8){
		_("passwordStatus").innerHTML = "Too short";	
	}
	else{
		_("passwordStatus").innerHTML = "";		
	}
}

function checkPasswordMatch(){
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	if(p1 != p2){
		_("confirmPasswordStatus").innerHTML = "Passwords not match";	
	}
	else{
		_("confirmPasswordStatus").innerHTML = "";
	}
}

function signUp(){
	
	var f = _("fName").value;
	var l = _("lName").value;
	var e = _("signupEmail").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var g = _("gender").value;
	var s = _("rStatus").value;
	var c = _("city").value;
	//alert("Wor");
	if(f=="" || l=="" || e=="" || p1=="" || p2=="" || g=="" || s=="" || c==""){
		//alert("Working");
		_("signup_status").innerHTML = "Fill out all of the form data";	
	}
	else if(emailStatus == "invalid"){
		_("signup_status").innerHTML = "Email address is invalid";
		return 0;
	}
	else if(p1.length<8){
		_("signup_status").innerHTML = "Password size is too short";
		return 0;
	}
	else if(p1 != p2){
		_("signup_status").innerHTML = "Your password fields do not match";	
		return 0;
	}
	else{
		//_("btnSignup").style.display = "none";
		//_("signup_status").innerHTML = "Please wait ...";
		var ajax = ajaxObj("POST", "php/signup.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true){
				if(ajax.responseText != 1){
					_("signup_status").innerHTML = "Email address already exists. Use another email address.";
					//_("btnSignup").style.display = "none";
				}else{
					window.scrollTo(0,0);				
					alert("Signup successful !");
					_("fName").value = '';
					_("lName").value = '';
					_("signupEmail").value = '';
					_("pass1").value = '';
					_("pass2").value = '';
					_("gender").value = '';
					_("rStatus").value = '';
					_("city").value = '';
					_("emailStatus").innerHTML = "";
				}
			}	
		}
		ajax.send("f=" +f+ "&l=" +l+ "&e=" +e+ "&p1=" +p1+ "&p2=" +p2+ "&g=" +g+ "&s=" +s+ "&c=" +c);
	}
	//alert("Hii");	
}
