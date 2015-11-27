function update(){
	var f = _("editTxtFname").value;
	var l = _("editTxtLname").value;
	var c = _("editTxtCity").value;
	var r = _("cmbEditStatus").value;
	var g = _("cmbEditGender").value;

	if(f=="" || l=="" || c==""){
		_("editResponse").innerHTML = "Fill all the fields !";	
	}
	else{
		_("editResponse").innerHTML = "Please wait...";	
		var ajax = ajaxObj("POST", "updateUserDetails.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax) == true){
				//alert(ajax.responseText);
				
				if(ajax.responseText == 0){
					
					_("loginStatus").innerHTML = "Update unsuccessful<br>Please try again !";
					_("btnLogin").style.display = "block";
				}
				else{
					_("editResponse").innerHTML = "Update successful !";
					//window.location = "php/profile.php?u="+ajax.responseText;	
				}
			}	
		}
		ajax.send("f=" + f + "&l=" + l + "&c=" + c + "&r=" + r + "&g=" + g);
	}
}

//onLoad function
function display(){
	_("changePasswordDisplay").style.display = "none";	
}

//what happens when cancel button is clicked
function cancelNewPassword(){
	_("txtCurrentPassword").value = "";
	_("txtNewPassword").value = "";
	_("txtConfirmNewPassword").value = "";
	_("saveNewPasswordStatus").innerHTML = "";
	_("newPasswordStatus").innerHTML = "";
	_("newConfirmPasswordStatus").innerHTML = "";
	_("changePasswordDisplay").style.display = "none";	
}

//what happens when Change Password button is clicked
function viewChangePassword(){
	_("changePasswordDisplay").style.display = "block";		
}

//clicking the save button
function saveNewPassword(){
	var curentPassword = _("txtCurrentPassword").value;
	var newPassword = _("txtNewPassword").value;
	var confirmNewPassword = _("txtConfirmNewPassword").value;
	if(curentPassword=="" || newPassword=="" || confirmNewPassword==""){
		_("saveNewPasswordStatus").innerHTML = "Fill all fields";	
	}
	else{
	  if(newPassword.length<8){
		  _("newPasswordStatus").innerHTML = "Password too short";
		  return 0;
	  }
	  else{
		  _("newPasswordStatus").innerHTML = "";	
	  }
	  if(newPassword != confirmNewPassword){
		  _("newConfirmPasswordStatus").innerHTML = "Passwords do not match";	
		  return 0;
	  }
	  else{
		  _("newConfirmPasswordStatus").innerHTML = "";				
	  }
	  var ajax = ajaxObj("POST", "changePassword.php");
	  ajax.onreadystatechange = function(){
		  if(ajaxReturn(ajax) == true){
			  alert(ajax.responseText);
		  }		
	  }
	  ajax.send("cur=" + curentPassword + "&n=" + newPassword + "&conf=" + confirmNewPassword);
	}	
}

//check new password is valid or not
function checkNewPassword(){
	var newPassword = _("txtNewPassword").value;	
	if(newPassword.length<8){
		_("newPasswordStatus").innerHTML = "Too short";	
	}
	else{
		_("newPasswordStatus").innerHTML = "";		
	}
}

//check two passwords are matching
function checkNewPasswordMatch(){
	var newPassword = _("txtNewPassword").value;
	var confirmNewPassword = _("txtConfirmNewPassword").value;
	if(newPassword != confirmNewPassword){
		_("newConfirmPasswordStatus").innerHTML = "Passwords not match";	
	}
	else{
		_("newConfirmPasswordStatus").innerHTML = "";
	}
}