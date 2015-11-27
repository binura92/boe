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
	
function checkEmail(){
	var e = _("signupEmail").value;	
	if(e != ""){
		_("emailStatus").innerHTML = "checking ...";
		var e1 = e.substring(e.indexOf("@"))
		if(e.indexOf("@")>1 && e1.indexOf(".")>0){
		
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
		}
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
	if(f=="" || l=="" || e=="" || p1=="" || p2=="" || g=="" || s=="" || c==""){
		_("signup_status").innerHTML = "Fill out all of the form data";	
	}
	else if(p1 != p2){
		_("signup_status").innerHTML = "Your password fields do not match";	
	}
	else{
		//_("btnSignup").style.display = "none";
		_("signup_status").innerHTML = "Please wait ...";
		var ajax = ajaxObj("POST", "php/signup.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true){
				if(ajax.responseText != 1){
					_("signup_status").innerHTML = "Email address already exists. Use another email address.";
					//_("btnSignup").style.display = "none";
				}else{
					window.scrollTo(0,0);				
					_("signupForm").innerHTML = "Signup successful !";
				}
			}	
		}
		ajax.send("f=" +f+ "&l=" +l+ "&e=" +e+ "&p1=" +p1+ "&p2=" +p2+ "&g=" +g+ "&s=" +s+ "&c=" +c);
	}
	//alert("Hii");	
}
