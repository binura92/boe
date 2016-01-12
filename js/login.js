function login() {
    //alert("Hey");
    var e = _("txtEmail").value;
    var p = _("txtPassword").value;
    if (e === "" || p === "") {
        _("loginStatus").innerHTML = "Fill out all of the form data";
    } else {
        //_("btnLogin").style.display = "none";
        _("loginStatus").innerHTML = "Please wait...";
        var ajax = ajaxObj("POST", "php/login.php");
        ajax.onreadystatechange = function () {
            if (ajaxReturn(ajax) === true) {
                
                if (ajax.responseText == 0) {
                    //alert();
                    _("loginStatus").innerHTML = "Login unsuccessful... Please try again !";
                    //_("btnLogin").style.display = "block";
                } else {
                    //_("loginStatus").innerHTML = ajax.responseText;
                    window.location = "php/profile.php?u=" + ajax.responseText;
                }
            }
        };
        ajax.send("e=" + e + "&p=" + p);

    }
}
function isEnter(e) {  //check press enter key
    var key = e.keyCode;
    if (key == 13) {
        login();
    }
}