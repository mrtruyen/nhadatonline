<?php
require("include/conn.php");
require("include/settings.php");
require("include/utils.php");
require('models/post.php');

$id=$_REQUEST['id'];
$mPost = new Post();
$d_post = $mPost->find($id);
?>

<!--Start Header-->
<?php include("view/header.php")?>
<!--End Header-->

<div id="container" class="variation">
<h1><?=$d_post['title'] ?></h1>
<div >
<?php
if($d_post['picture']!='')
{
?>
<div class="content_img"><img src="<?=$basepath?><?=$d_post['picture']?>" /></div>
<?php
}
?>
<?=$d_post['content'] ?>
</div>
<div class="spacer"></div>
</div>
<?php include("view/footer.php")?>

</body>
</html>
