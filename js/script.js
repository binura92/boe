$("#catogeryDroupDown").prop("selectedIndex", -1);
$(document).ready(function ($) {
    //Msg Bar
    $("#MsgIcon").click(function () {
        $("#MsgBar").css("visibility", 'visible');
    });
    $("#MsgBarClose").click(function () {
        $("#MsgBar").css("visibility", 'hidden');

    });
    //New Message
    $("#NewMsg").click(function () {
        $("#NewMessage").css("visibility", 'visible');
        $("#Rname").css("visibility", 'visible');
        $("#wapper").css("z-index", '-1');
    });
    $("#MSGSendButton").click(function () {
        //$( "#NewMessage" ).css("visibility",'hidden');
        //$("#wapper").css("z-index", '1');
    });
    $("#MSGCancelButton").click(function () {
        $("#NewMessage").css("visibility", 'hidden');
        $("#wapper").css("z-index", '1');
    });
    //Inbox Message	
    $("#Inbox").click(function () {
        $("#InboxExtend").css("visibility", 'visible');
        $("#wapper").css("z-index", '-1');
    });
    $("#InboxExtendClose").click(function () {
        $("#InboxExtend").css("visibility", 'hidden');
        $("#wapper").css("z-index", '1');
    });
    //Outbox Message
    $("#Outbox").click(function () {
        $("#OutboxExtend").css("visibility", 'visible');
        $("#wapper").css("z-index", '-1');
    });
    $("#OutboxExtendClose").click(function () {
        $("#OutboxExtend").css("visibility", 'hidden');
        $("#wapper").css("z-index", '1');
    });

    //log out
    $("#SettingsIcon").click(function () {
        $("#LogOutBar").css("visibility", 'visible');
    });
    $("#LogOutclose").click(function () {
        $("#LogOutBar").css("visibility", 'hidden');
    });

    //Search Friend 
    $("#searchFriend").focus(function () {
        $("#headder").css("overflow", 'visible');
        //$("#dis").css("visibility", 'visible');
        $("#wapper").css("z-index", '-1');
        $("#headder").css("z-index", '50');
    });
    $("#dis").click(function () {
        $("#headder").css("overflow", 'hidden');
        //$("#dis").css("visibility", 'hidden');
        $("#headder").css("z-index", '1');
        $("#wapper").css("z-index", '1');
    });
});




//send new message
function sendMsg() {
    var rName = document.getElementById("Rname").value;
    var R_ID = document.getElementById("R_ID").value;
    var title = document.getElementById("Title").value;
    var mBody = document.getElementById("msgBody").value;

    if (R_ID == "") {
        alert("No user found.");
    } else {

        if (rName == "" || title == "" || mBody == "") {
            alert("Fill out all of the form data");
        }
        else {

            var ajax = ajaxObj("POST", "../php/sendMsg.php");
            ajax.onreadystatechange = function () {
                if (ajaxReturn(ajax) == true) {
                    if (ajax.responseText != 1) {
                        alert("Message sending failed");
                    } else {
                        window.scrollTo(0, 0);
                        alert("Message sent successfully");
                        document.getElementById("msgBody").value = "";
                        document.getElementById("Rname").value = "";
                        document.getElementById("R_ID").value = "";
                        document.getElementById("Title").value = "";
                        $("#NewMessage").css("visibility", 'hidden');
                        $("#Rname").css("visibility", 'hidden');
                    }
                }
            }
            ajax.send("rName=" + rName + "&R_ID=" + R_ID + "&title=" + title + "&mBody=" + mBody);
        }
    }
}



//load inbox list
function inbox() {
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            document.getElementById("InboxList").innerHTML = httpxml.responseText;
        }
    }
    var url = "inboxView.php";
    url = url + "?txt=";
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);
}

//load outbox list
function outbox() {
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            document.getElementById("OutboxList").innerHTML = httpxml.responseText;
        }
    }
    var url = "outboxView.php";
    url = url + "?txt=";
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);

}


//load inbox message
function loadMsgInbox() {
    var str = document.getElementById("selectMsg").value;
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            document.getElementById("InboxView").innerHTML = httpxml.responseText;
            document.getElementById("msg").style.display = 'none';
        }
    }
    var url = "searchMsg.php";
    url = url + "?txt=" + str;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);
}

//load outbox message
function loadMsgOutbox() {
    var str = document.getElementById("selectMsgOutbox").value;
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            document.getElementById("OutboxView").innerHTML = httpxml.responseText;
            document.getElementById("msg").style.display = 'none';
        }
    }
    var url = "searchOutboxMsg.php";
    url = url + "?txt=" + str;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);
}


//set view =1 when view the message
function view(mID) {
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
        }
    }
    var url = "view.php";
    url = url + "?txt=" + mID;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);
    inbox();

}


//message reply function
function reply(sender_ID) {

    var title = document.getElementById("msgTitle").value;
    //alert(title + " " + sender_ID);
    $("#NewMessage").css("visibility", 'visible');
    $("#wapper").css("z-index", '-1');
    $("#InboxExtend").css("visibility", 'hidden');
    $("#Rname").css("visibility", 'hidden');

    document.getElementById("Rname").value = "user";
    document.getElementById("R_ID").value = sender_ID;
    document.getElementById("Title").value = title;


}


//search friend function
function ajaxFunction(str) {
    document.getElementById("dis").innerHTML = "<div id='displayDiv1' ></div>";
    var httpxml;
    httpxml = new XMLHttpRequest();
    function stateChanged() {
        if (httpxml.readyState == 4) {
            document.getElementById("displayDiv1").innerHTML = httpxml.responseText + "<div id='searchboxclosebtn'>Close</div>";
            document.getElementById("msg").style.display = 'none';
        }
    }
    var url = "searchFriend.php";
    url = url + "?txt=" + str;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);
    document.getElementById("msg").innerHTML = "Please Wait ...";
    document.getElementById("msg").style.display = 'inline';
}

//set result of search friend function
function setValue1() {
    var ID_name = document.getElementById("select1").value;
    var pos1 = ID_name.indexOf("@");
    var pos2 = ID_name.indexOf("@@")
    var ID = ID_name.substring(0, pos1);
    var name = ID_name.substring(pos1 + 1, pos2) + " " + ID_name.substring(pos2 + 2)
    document.getElementById("searchFriend").value = name;
    document.getElementById("result").value = ID;
    document.getElementById("displayDiv1").style.display = "none";
    loadProfile(ID);
}


//search friend function in message
function mSearchFriend(str) {
    document.getElementById("disFriend").innerHTML = "<div id='displayDiv2' ></div>";
    var httpxml;
    httpxml = new XMLHttpRequest();

    function stateChanged() {
        if (httpxml.readyState == 4) {
            document.getElementById("displayDiv2").innerHTML = httpxml.responseText;
            document.getElementById("msg").style.display = 'none';
        }
    }
    var url = "searchFriend2.php";
    url = url + "?txt=" + str;
    url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);
    document.getElementById("msg").innerHTML = "Please Wait ...";
    document.getElementById("msg").style.display = 'inline';
}

//set result of message search friend
function setValue2() {
    var ID_name = document.getElementById("select2").value;
    var pos1 = ID_name.indexOf("@");
    var pos2 = ID_name.indexOf("@@")
    var ID = ID_name.substring(0, pos1);
    var name = ID_name.substring(pos1 + 1, pos2) + " " + ID_name.substring(pos2 + 2)
    document.getElementById("Rname").value = name;
    document.getElementById("R_ID").value = ID;
    document.getElementById("displayDiv2").style.display = "none";

}


//load the profiles
function loadProfile(id) {
    var user_ID = document.getElementById("user_ID").value;
    if (user_ID == id) {
        window.location = "profile.php";
    } else {
        window.location = "friendProfile.php?u=" + id;
    }

}