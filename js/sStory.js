function ajaxFunction(str){
	document.getElementById("dis").innerHTML = "<div id='displayDiv' ></div>";
	var httpxml;	
	httpxml=new XMLHttpRequest();
	
	function stateChanged() {
    	if(httpxml.readyState==4){
			document.getElementById("displayDiv").innerHTML=httpxml.responseText;
			document.getElementById("msg").style.display='none';
      	}
    }
	var url="/GP2/php/searchStory.php";
	url=url+"?txt="+str;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	document.getElementById("msg").innerHTML="Please Wait ...";
	document.getElementById("msg").style.display='inline';
}