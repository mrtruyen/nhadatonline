<div style="width:100%">
<div class="profile_middle">
<div style="width:60px; margin-left:5px; float:left"><img src="images/profile_pic.jpg" border="0" /></div>
<div style="width:105px; float:right; padding:5px 0px;">
<h4><?=$_SESSION['adminSession_avoy']?'Administrator':$_SESSION['adminSession_agent']?></h4>
<p style="text-align:left; padding-top:3px;"><a href="" class="site_link"><?=$_SESSION['adminAccount']['adminName']?></a></p>
<p style="text-align:left; padding-top:3px;">
<?php if(isset($_SESSION['adminSession_avoy'])){?>
<a href="settings.php" class="site_link">settings</a>&nbsp;<font style="color:#FFFFFF">| </font> 
<?php }?>
<a href="logout.php" class="site_link">Logout</a></p>
</div>
<div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>