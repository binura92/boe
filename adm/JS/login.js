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
                window.location.assign("/BOE/adm/aDash.php?u="+xhttp.responseText)
            }

			}
		}
	xhttp.open("POST",url,true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("userName="+userName+"&userPass="+userPass);
	}