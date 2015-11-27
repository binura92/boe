function createCat(){
    var xhttp;
    var adminId = document.getElementById("adminId").value;
    var catName = document.getElementById("catName").value;
    var url="createCat.php";
    if (window.XMLHttpRequest){
        xhttp = new XMLHttpRequest();
    }
    else{
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("response").innerHTML = xhttp.responseText;

        }
    }
    xhttp.open("POST",url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("adminId="+adminId+"&catName="+catName);

}