function fun_login(){
	var xhttp;
	var userName=document.getElementById("userName").value;
	var userPass=document.getElementById("userPass").value;
	var url="login.php"
	if (window.XMLHttpRequest){
		xhttp = new XMLHttpRequest();
		}
	else{
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	xhttp.onreadystatechange = function(){
		if (xhttp.readyState == 4 && xhttp.status == 200){
            if(xhttp.responseText==0){
                document.getElementById("errorMsg").innerHTML="Your User Name or Password is wrong"

            }
            else{
                window.location.assign("../adm/aDash.php?u="+xhttp.responseText);
				
document.body.appendChild(f);
f.submit();
            }

			}
		}
	xhttp.open("POST",url,true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("userName="+userName+"&userPass="+userPass);
	}
function fun_cancle(){
	document.getElementById('userName').value='';
	document.getElementById('userPass').value='';
	}

document.addEventListener('keydown', function(event) {
    if(event.keyCode == 13) {
        fun_login();
    }
    
});