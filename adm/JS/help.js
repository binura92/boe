function sendhelp(){
	
    var xhttp;
    var pro = document.getElementById("problem").value;
    var sol = document.getElementById("solution").value;
    var url="helps.php";
    if (window.XMLHttpRequest){
        xhttp = new XMLHttpRequest();
    }
    else{
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200){
			
            document.getElementById("feedBack").innerHTML = xhttp.responseText;
            

        }
    };
    xhttp.open("POST",url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pro="+pro+"&sol="+sol);
	

}// JavaScript Document