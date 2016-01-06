$("#catogeryDroupDown").prop("selectedIndex", -1);
$( document ).ready(function( $ ) {
	//Msg Bar
	$( "#MsgIcon" ).click(function() {
  		$( "#MsgBar" ).css("visibility",'visible');
	});	
	$( "#MsgBarClose" ).click(function() {
  		$( "#MsgBar" ).css("visibility",'hidden');

	});		
	//New Message
	$( "#NewMsg" ).click(function() {
  		$( "#NewMessage" ).css("visibility",'visible');
		$( "#wapper" ).css("z-index",'-1');
	});	
	$( "#MSGSendButton" ).click(function() {
  		//$( "#NewMessage" ).css("visibility",'hidden');
		$( "#wapper" ).css("z-index",'1');
	});	
	$( "#MSGCancelButton" ).click(function() {
  		$( "#NewMessage" ).css("visibility",'hidden');
		$( "#wapper" ).css("z-index",'1');
	});	
	//Inbox Message	
	$( "#Inbox" ).click(function() {
  		$( "#InboxExtend" ).css("visibility",'visible');
		$( "#wapper" ).css("z-index",'-1');
	});	
	$( "#InboxExtendClose" ).click(function() {
  		$( "#InboxExtend" ).css("visibility",'hidden');
		$( "#wapper" ).css("z-index",'1');
	});	
	//Outbox Message
	$( "#Outbox" ).click(function() {
  		$( "#OutboxExtend" ).css("visibility",'visible');
		$( "#wapper" ).css("z-index",'-1');
	});	
	$( "#OutboxExtendClose" ).click(function() {
  		$( "#OutboxExtend" ).css("visibility",'hidden');
		$( "#wapper" ).css("z-index",'1');
	});	
	
	//log out
	$( "#SettingsIcon" ).click(function() {
  		$( "#LogOutBar" ).css("visibility",'visible')
	});		
	$( "#LogOutclose" ).click(function() {
  		$( "#LogOutBar" ).css("visibility",'hidden')
	});	
});


function loadMsgInbox(){
	var str = document.getElementById("selectMsg").value;
	//alert(str);
	var httpxml;	
	httpxml=new XMLHttpRequest();
	function stateChanged() {
    	if(httpxml.readyState==4){
			document.getElementById("InboxView").innerHTML=httpxml.responseText;
			document.getElementById("msg").style.display='none';
      	}
    }
	var url="searchMsg.php";
	url=url+"?txt="+str;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	//document.getElementById("msg").innerHTML="Please Wait ...";
	
	//document.getElementById("msg").style.display='inline';
	
	
}

function loadMsgOutbox(){
	var str = document.getElementById("selectMsgOutbox").value;
	//alert(str);
	var httpxml;	
	httpxml=new XMLHttpRequest();
	function stateChanged() {
    	if(httpxml.readyState==4){
			document.getElementById("OutboxView").innerHTML=httpxml.responseText;
			document.getElementById("msg").style.display='none';
      	}
    }
	var url="searchOutboxMsg.php";
	url=url+"?txt="+str;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	//document.getElementById("msg").innerHTML="Please Wait ...";
	
	//document.getElementById("msg").style.display='inline';
	
	
}

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
	var url="searchFriend.php";
	url=url+"?txt="+str;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	document.getElementById("msg").innerHTML="Please Wait ...";
	document.getElementById("msg").style.display='inline';
}

	function setValue(){
		var ID_name = document.getElementById("select").value;
		var pos1 = ID_name.indexOf("@");
		var pos2 = ID_name.indexOf("@@")
		var ID = ID_name.substring(0,pos1);
		var name = ID_name.substring(pos1+1,pos2)+" "+ID_name.substring(pos2+2)
		document.getElementById("searchFriend").value = name;
		document.getElementById("result").value = ID;
		document.getElementById("displayDiv").style.display = "none";
		
	}
	
	
function sendMsg(){
	var rName = document.getElementById("Rname").value;
	var R_ID = document.getElementById("R_ID").value;
	var title = document.getElementById("Title").value;
	var mBody = document.getElementById("msgBody").value;
	
	if(R_ID ==""){
		alert("No user found.");
	}else{
		
		if(rName =="" || title =="" || mBody ==""){
			alert("Fill out all of the form data");
		}
		else{
			
			var ajax = ajaxObj("POST", "../php/sendMsg.php");
			ajax.onreadystatechange = function() {
				if(ajaxReturn(ajax) == true){
					if(ajax.responseText != 1){
						//alert(ajax.responseText);
						alert("Message sending failed");
					}else{
						window.scrollTo(0,0);
						alert("Message sent successfully");
						$( "#NewMessage" ).css("visibility",'hidden');
					}
				}	
			}
			ajax.send("rName=" +rName+ "&R_ID=" +R_ID+ "&title=" +title+ "&mBody=" +mBody);
		}
	}
}
	
	
function mSearchFriend(str){
	document.getElementById("disFriend").innerHTML = "<div id='displayDiv' ></div>";
	var httpxml;	
	httpxml=new XMLHttpRequest();
	
	function stateChanged() {
    	if(httpxml.readyState==4){
			document.getElementById("displayDiv").innerHTML=httpxml.responseText;
			document.getElementById("msg").style.display='none';
      	}
    }
	var url="searchFriend.php";
	url=url+"?txt="+str;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateChanged;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	document.getElementById("msg").innerHTML="Please Wait ...";
	document.getElementById("msg").style.display='inline';
}

	function setValue(){
		var ID_name = document.getElementById("select").value;
		var pos1 = ID_name.indexOf("@");
		var pos2 = ID_name.indexOf("@@")
		var ID = ID_name.substring(0,pos1);
		var name = ID_name.substring(pos1+1,pos2)+" "+ID_name.substring(pos2+2)
		document.getElementById("Rname").value = name;
		document.getElementById("R_ID").value = ID;
		document.getElementById("displayDiv").style.display = "none";
		
	}
	
	
	