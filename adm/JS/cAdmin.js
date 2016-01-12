function creAdm(){
    var xhttp;
	var first_name=document.getElementById("first_name").value;
	var last_name=document.getElementById("last_name").value;
    var iuserName=document.getElementById("iuserName").value;
    var iuserPass=document.getElementById("iuserPass").value;
    var icuserPass=document.getElementById("icuserPass").value;
	
    var adminId=document.getElementById("adminId").value;
    var url="createAdm.php"
    if (window.XMLHttpRequest){
        xhttp = new XMLHttpRequest();
    }
    else{
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function(){
        document.getElementById('check').innerHTML='';
        document.getElementById('respose').innerHTML=xhttp.responseText;
		
		document.getElementById('first_name').value='';
		document.getElementById('last_name').value='';
		document.getElementById('iuserName').value='';
		document.getElementById('iuserPass').value='';
		document.getElementById('icuserPass').value='';
    }
    xhttp.open("POST",url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("iuserName="+iuserName+"&iuserPass="+iuserPass+"&icuserPass="+icuserPass+"&adminId="+adminId+"&first_name="+first_name+"&last_name="+last_name);
}

function check_pass(){
	document.getElementById('respose').innerHTML='';
    var xhttp;
    
    var iuserPass=document.getElementById("iuserPass").value;
    var icuserPass=document.getElementById("icuserPass").value;
    var url="checkPass.php"
    if (window.XMLHttpRequest){
        xhttp = new XMLHttpRequest();
    }
    else{
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function(){
        document.getElementById('check').innerHTML=xhttp.responseText;
        if(xhttp.responseText=="Password Confirmation is not correct"){
            document.getElementById("icuserPass").value='';        
        }
    }
    xhttp.open("POST",url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("iuserPass="+iuserPass+"&icuserPass="+icuserPass);
	
}

function fclear(){
	document.getElementById('first_name').value='';
	document.getElementById('last_name').value='';
	document.getElementById('iuserName').value='';
	document.getElementById('iuserPass').value='';
	document.getElementById('icuserPass').value='';
	//document.getElementById('iuserName').value='';
	}

document.addEventListener('keydown', function(event) {
    if(event.keyCode == 13) {
        creAdm();
    }
    
});