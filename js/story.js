function ssc1(){
	_("storyStatus").innerHTML = "";			
}
function ssc2(){
	_("storyStatus").innerHTML = "";
}

//Story submit
function post(){
	//alert("In function");
	var title = _("storyTitle").value;
	var content = _("reachtext").contentWindow.document.body.innerHTML;
	var privacy = _("storyPrivacy").value;
	var cat = _("storyCategory").value;
	if(title=="" || content=="" || privacy=="" || cat==""){
		_("storyStatus").innerHTML = "Fill all fields";	
	}
	else{
		_("storyStatus").innerHTML = "Please wait ...";	
		var ajax = ajaxObj("POST", "postStory.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax) == true){
				alert("Story posted");
				_("storyStatus").innerHTML = "";
				_("storyTitle").value = "";	
				_("reachtext").contentWindow.document.body.innerHTML = "";
				_("profileNewNewsFeed").innerHTML = ajax.responseText;
			}
		}
	}
	ajax.send("title=" +title+ "&content=" +content+ "&privacy=" +privacy+ "&cat=" +cat);
}

//function iFrame(){
//	id = '<?php echo $id ?>';
//	alert(id);
//}