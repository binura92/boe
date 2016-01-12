/**
 * Created by Chirantha on 12/2/2015.
 */
function viewC(){
    var xhttp;
    //var adminId = document.getElementById("adminId").value;
    //var catName = document.getElementById("catName").value;
    var url="viewCat.php";
    if (window.XMLHttpRequest){
        xhttp = new XMLHttpRequest();
    }
    else{
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("cat").innerHTML = xhttp.responseText;


        }
    };
    xhttp.open("GET",url,true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}