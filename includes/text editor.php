<html>
	<head>
    	<!-- This php file must import to profile.php-->
    	<title></title>
		<script type="text/javascript" src="../js/wysiwyg.js"></script>
        <style>
		.butt {
			width:23px;;
			height:23px;
			border:1px #000 solid;
			background-repeat:no-repeat; 
			background-position:center;
			margin:2px;;
			}
		</style>
	</head>
    
    <!--WYSIWYG Editor start-->
    
	<body onLoad="iFrameon()">
    <br>
    <h3>Enter your story</h3>
    <div style="border:1px #000 solid; background-color:#FFF;">
		<form action="../php/story_submit.php" name="editor" id="editor" method="post">
			<input type="text" name="subject" id="subject" placeholder="Subject" style="width:100%;"/>
            <!-- Get category from category table and put them in to drop down box-->
           <?php
				$sql2 = "SELECT Category_ID,Category_Title From category";
				$result = mysqli_query ($con,$sql2);
				if (!$result) {
					echo 'Could not run query: ' . mysqli_error();
					exit;
					}
				else{
					echo "<select name='category' style='width:100%;'>";
					while ($row = mysqli_fetch_array($result)){
						echo "<option value='".$row['Category_ID']."'>".$row['Category_Title']."</option>";
						}
					echo "</select>";
					
					}?>
            
			<br />
            
            <!-- Editing button -->
			<div id="buttons" style="width: 100%; border-top:1px #000 solid; height:28px; margin:1px; float:left;">
			<input type="button" name="bold" class="butt" onClick="abold()" style="background:url(../images/b.png);"/>
			<input type="button" name="ith" class="butt" onClick="iitalic()" style="background:url(../images/i.png);"/>
            <input type="button" name="underline" class="butt" onClick="underl()" style="background:url(../images/u.png);"/>
            <input type="button" name="left" class="butt" onClick="jleft()" style="background:url(../images/l.png);"/>
            <input type="button" name="center" class="butt" onClick="jcent()" style="background:url(../images/c.png)"/>
            <input type="button" name="right" class="butt" onClick="jright()" style="background:url(../images/r.jpg)"/>
            <input type="button" name="justy" class="butt" onClick="jjusty()" style="background:url(../images/j.png)"/>
            </div>
            
            <!-- Story editor-->
			<textarea style="display: none;" name="story" id="story" cols="100" rows="50"></textarea>
			<iframe name="reachtext" id="reachtext" style="width: 100%; height: 60%; border: black 1px solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:0px; border-right:0px;"></iframe>
            <div id="privacy">
            <input type="radio" name="privacy" value="Pr">Private
			<input type="radio" name="privacy" value="Pu">Public
            </div>
            <?php
			echo "<input type='hidden' name='autid' value= '".$_SESSION['id']."'/>"
			?>
            <br/>
            <input type="button" id="submi" value="submit" onClick="javascript:form_submit();"/>
           
          			
		</form>
     
		</div>
    <!-- WYSIWYG Editor end-->
	</body>
</html>