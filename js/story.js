
function ssc1() {
    _("storyStatus").innerHTML = "";
}
function ssc2() {
    _("storyStatus").innerHTML = "";
}

//Story submit
function post() {
    //alert("In function");
    var title = _("storyTitle").value;
    var content = _("reachtext").contentWindow.document.body.innerHTML;
    var privacy = _("storyPrivacy").value;
    var cat = _("storyCategory").value;
    if (title == "" || content == "" || privacy == "" || cat == "") {
        _("storyStatus").innerHTML = "Fill all fields";
    }
    else {
        _("storyStatus").innerHTML = "Please wait ...";
        var ajax = ajaxObj("POST", "postStory.php");
        ajax.onreadystatechange = function () {
            if (ajaxReturn(ajax) == true) {
                alert("Story posted");
                _("storyStatus").innerHTML = "";
                _("storyTitle").value = "";
                _("reachtext").contentWindow.document.body.innerHTML = "";
                _("profileNewNewsFeed").innerHTML = ajax.responseText;
            }
        }
    }
    ajax.send("title=" + title + "&content=" + content + "&privacy=" + privacy + "&cat=" + cat);
}

//function iFrame(){
//	id = '<?php echo $id ?>';
//	alert(id);
//}

function viewStory(storyID) {
    
    viewComment(storyID);
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            var output = httpxml.responseText;
            document.getElementById("story").innerHTML = output;
            $( "#storyView" ).css("visibility",'visible');
            }
    }
    var url = "storyView.php";
    url = url + "?txt=" + storyID;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);
}

function storyViewClose(){
    $( "#storyView" ).css("visibility",'hidden');
}

function viewComment(storyID) {
    //alert(storyID);
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            var output = httpxml.responseText;
            //alert(output);
            document.getElementById("oldComment").innerHTML = output;
            document.getElementById("newComment").innerHTML = '<input id = "writeComment" type="text" placeholder="Enter Your Comment"><button onclick="newComment(' + storyID + ')">enter</button>';
        }
    }
    var url = "viewComment.php";
    url = url + "?txt=" + storyID;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);

}


function newComment(storyID) {

    var comment = document.getElementById("writeComment").value;
    comment = comment.trim();
    if (comment == "") {
        alert("Comment is empty");
    }
    else {
        /* alert(comment);
         var httpxml;
         httpxml = new XMLHttpRequest();
         function stateChanged() {
         if (httpxml.readyState == 4) {
         var output = httpxml.responseText;
         alert(output);
         }
         }
         var url = "newComment.php";
         url = url + "?txt=";
         url = url + "&sid=" + Math.random();
         httpxml.onreadystatechange = stateChanged;
         httpxml.open("GET", url, true);
         httpxml.send( "?story_ID=" + storyID +"?comment="+comment);
         */

        var ajax = ajaxObj("POST", "../php/newComment.php");
        ajax.onreadystatechange = function () {
            if (ajaxReturn(ajax) == true) {
                var output = ajax.responseText;
                alert(output);

                if (ajax.responseText != 1) {
                    alert("Error");
                } else {
                    viewComment(storyID);

                }
            }
        }
        ajax.send("story_ID=" + storyID + "&comment=" + comment);
    }
}