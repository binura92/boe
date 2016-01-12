
<html>
    <head>
        <title>Customer Inquiry</title>
        <script type="text/javascript" src="../js/ajax.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/inquiry.js"></script>

    </head>

    <body>
        <?php
        include_once 'template_top.php';
        ?>
        <h1><font face="Verdana, Geneva, sans-serif">Customer Inquiry</font></h1>
        <form>
            <table>
                <div>
                    <div>Title</div>
                    <div><input type="text" name="inTitle" id="inTitle"></div>
                </div>
                <div>
                    <div>Inquiry</div>
                    <div></div>
                    <div><textarea name="inContent" id="inContent"></textarea></div>
                </div>
            </table>
            <br/>
            <input type="button" id="btnSubmit" value="Post" onclick="post()"/>
            <input type="reset" value="Cancel" name="btnCancel"/>
        </form>
        <br/><br/>
        <div id="inquiryStatus"></div>

    </body>
</html>