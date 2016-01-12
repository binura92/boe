
<html>
    <head>
        <title>.:BE:.</title>
        <link href="../css/inquiry.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../js/ajax.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/inquiry.js"></script>

    </head>

    <body>
        <?php
        include_once 'template_top.php';
        ?>
        <div id="mainbucketinc">
            <h1>Customer Inquiry</h1>
            <form>
                <div class="inclabels">Title</div>
                <div><input type="text" name="inTitle" id="inTitle"></div>
                <div class="inclabels">Inquiry</div>
                <div><textarea name="inContent" id="inContent"></textarea></div>
                <input type="button" class="incbuttons" id="btnSubmit" value="Post" onclick="post()"/>
                <input type="reset"  class="incbuttons" value="Cancel" name="btnCancel"/>
            </form>
            <div id="inquiryStatus"></div>
        </div>
    </body>
</html>