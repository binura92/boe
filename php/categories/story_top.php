<head>
		<title>.:BE:.</title>
		<link href="../../css/stylesheet.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../../js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="../../js/sStory.js"></script>
        <script src="../../js/ajax.js"></script>
</head>
<div id="headder">	
    <img src="../../images/logo.png" alt="BE" height="60" width="60">
    <div id="headNavi">
        <form name="postStory" action="postStory.php" class="search">
            <input id="searchFriend" onKeyUp="ajaxFunction(this.value);" type="text" name="search" placeholder="Search Story" class="search"/>
            <input id="result" hidden=""  />
            <div id="dis">  </div>
        </form>
        <div id="naviItems">
            <a class="t1 t" href="../../index.html">Home</a>
            <a class="t2 t" href="../aboutbe.php">About BE</a>
            <a class="t3 t" href="#">Help</a>
        </div> 
    </div>       
</div>


     