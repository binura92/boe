function storyClick(){
	$( "#ViewStory" ).css("visibility",'visible');
}

function storyClose(){
	$( "#ViewStory" ).css("visibility",'hidden');
}



function like(storyID){
    alert(storyID);
    	//document.getElementById("dis").innerHTML = "<div id='displayDiv' ></div>";
	var httpxml;	
	httpxml=new XMLHttpRequest();
	function stateChanged() {
    	if(httpxml.readyState==4){
			var test = httpxml.responseText;
                        alert(test);
			//document.getElementById("like").innerHTML = test;
                //document.getElementById("like").style.display='none';
      	}
    }
    
    
	var url="like.php";
        alert("jj");
	url=url+"?txt="+storyID;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	document.getElementById("msg").innerHTML="Please Wait ...";
	document.getElementById("msg").style.display='inline';

var httpxml;	
	httpxml=new XMLHttpRequest();
	function stateChanged() {
    	if(httpxml.readyState==4){
			var test = httpxml.responseText;
                        alert("ad");
			//document.getElementById("like").innerHTML = test;
                //document.getElementById("like").style.display='none';
      	}
    }

var url="dislike.php";
	url=url+"?txt="+storyID;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	document.getElementById("msg").innerHTML="Please Wait ...";
	document.getElementById("msg").style.display='inline';


}


function dislike(storyID){
    	//document.getElementById("dis").innerHTML = "<div id='displayDiv' ></div>";
	var httpxml;	
	httpxml=new XMLHttpRequest();
	function stateChanged() {
    	if(httpxml.readyState==4){
			var test = httpxml.responseText;
                        alert("ad");
			//document.getElementById("like").innerHTML = test;
                //document.getElementById("like").style.display='none';
      	}
    }
    
    
	var url="dislike.php";
	url=url+"?txt="+storyID;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	document.getElementById("msg").innerHTML="Please Wait ...";
	document.getElementById("msg").style.display='inline';
}


