
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

    showFeedbackCount(storyID)
    viewComment(storyID);
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {

            var output = httpxml.responseText;
            if (output == 0) {
                storyViewClose();
                alert("Story does not exists");
            } else {
                document.getElementById("story").innerHTML = output;
                $("#storyView").css("visibility", 'visible');
                document.getElementById("feedback").innerHTML = "<button id='likeBtn' class='feedbackBtn' onclick='feedback(" + storyID + ",1)'>Like</button>\n\
<button id='unlikeBtn' class='feedbackBtn' onclick='feedback(" + storyID + ",2)'>Unlike</button> \n\
<button id='reportBtn' class='feedbackBtn' onclick='showReport(" + storyID + ")'>Report</button> <div id = 'likeCount'></div><div id ='unlikeCount' style='z-index: 10;'></div> "
            }
        }
    }
    var url = "storyView.php";
    url = url + "?txt=" + storyID;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);


}
function showReport(storyID) {
    document.getElementById("storyID").value = storyID;
    $("#reportDiv").css("visibility", 'visible');
}
function report() {
    var description = "";
    var value1 = document.getElementById("reportOption1").checked;
    var value2 = document.getElementById("reportOption2").checked;
    var value3 = document.getElementById("reportOption3").checked;
    var storyID = document.getElementById("storyID").value;
    if (value1) {
        description = "It is annoying or not interesting";
    }
    if (value2) {
        description = "I think it should not be on BE";
    }
    if (value3) {
        description = "It is spam";
    }
    if (description == "") {
        alert("choose a option");
    } else {
        var ajax = ajaxObj("POST", "../php/report.php");
        ajax.onreadystatechange = function () {
            if (ajaxReturn(ajax) == true) {
                //var output = ajax.responseText;
                alert("Report");
                $("#reportDiv").css("visibility", 'hidden');


                if (ajax.responseText != 1) {
                    alert("Error in report");
                } else {
                    viewComment(storyID);

                }
            }
        }
        ajax.send("story_ID=" + storyID + "&description=" + description);

    }

}
function cancleReport() {
    $("#reportDiv").css("visibility", 'hidden');
}

function storyViewClose() {
    $("#storyView").css("visibility", 'hidden');
}

function viewComment(storyID) {
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            var output = httpxml.responseText;
            document.getElementById("oldComment").innerHTML = output;
            document.getElementById("newComment").innerHTML = '<input id = "writeComment" type="text" placeholder="Enter Your Comment" onkeypress="isEnter(event,' + storyID + ')"><button id="cmtpostbtn" onclick="newComment(' + storyID + ')">enter</button>';
        }
    }
    var url = "viewComment.php";
    url = url + "?txt=" + storyID;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);

}
function isEnter(e, story_ID) {  //check press enter key
    var key = e.keyCode;
    if (key == 13) {
        newComment(story_ID);
    }
}

function newComment(storyID) {

    var comment = document.getElementById("writeComment").value;
    comment = comment.trim();
    if (comment == "") {
        alert("Comment is empty");
    }
    else if (comment.length > 250) {
        alert("comment size is too large. maximum comment size is 250 characters");
    }
    else {
        var ajax = ajaxObj("POST", "../php/newComment.php");
        ajax.onreadystatechange = function () {
            if (ajaxReturn(ajax) == true) {
                var output = ajax.responseText;

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


function deleteStory(storyID) {
    if (confirm("Do you want to delete this story?") == true) {


        var httpxml;
        httpxml = new XMLHttpRequest();
        function stateChanged() {
            if (httpxml.readyState == 4) {
                var output = httpxml.responseText;
                if (output == 1) {
                    alert("Delete successfully");
                    storyViewClose();
                } else {
                    alert("Error in delete. Try again.");
                }
            }
        }
        var url = "deleteStory.php";
        url = url + "?txt=" + storyID;
        url = url + "&sid=" + Math.random();
        httpxml.onreadystatechange = stateChanged;
        httpxml.open("GET", url, true);
        httpxml.send(null);
    }

}


function feedback(storyID, feedback) {
    if (feedback == 1) {
        feedback = "L";
    } else {
        feedback = "U";
    }

    var ajax = ajaxObj("POST", "../php/feedback.php");
    ajax.onreadystatechange = function () {
        if (ajaxReturn(ajax) == true) {
            var output = ajax.responseText;
            showFeedbackCount(storyID);
            //alert(output);

            if (ajax.responseText != 1) {
                alert("Error");
            } else {
                // viewComment(storyID);

            }
        }
    }
    ajax.send("story_ID=" + storyID + "&feedback=" + feedback);

}

function showFeedbackCount(storyID) {
    likeCount(storyID);
    unlikeCount(storyID);
}

function likeCount(storyID) {
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            var output = httpxml.responseText;
            document.getElementById("likeCount").innerHTML = output;
            //alert(output);
        }
    }
    var url = "likeCount.php";
    url = url + "?txt=" + storyID;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);

}

function unlikeCount(storyID) {
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            var output = httpxml.responseText;
            document.getElementById("unlikeCount").innerHTML = output;
            //alert(output);
        }
    }
    var url = "unlikeCount.php";
    url = url + "?txt=" + storyID;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);

}