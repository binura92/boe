function post() {
    var inTitle = _("inTitle").value;
    var inContent = _("inContent").value;
    if (inTitle == "" || inContent == "") {
        _("inquiryStatus").innerHTML = "Fill all fields...";
    } else {
        _("inquiryStatus").innerHTML = "Please wait...";
        var ajax = ajaxObj("POST", "../php/inquiry.php");
        ajax.onreadystatechange = function () {
            if (ajaxReturn(ajax) == true) {
                alert("Inquiry is successfully posted");
                _("inquiryStatus").innerHTML = "";
                _("inTitle").value = "";
                _("inContent").value = "";
            }
        }
        ajax.send("&inTitle=" + inTitle + "&inContent=" + inContent);
    }
}
