<?php
include("include/conn.php");
include("include/settings.php");
include("include/utils.php");

$id=$_REQUEST['id'];
$sql_allpost="select * from post where  postID=$id and languageID=" . $_SESSION['languageID'];
$re_allpost=mysqli_query($conn, $sql_allpost);
$d_allpost=mysqli_fetch_array($re_allpost);
?>

<!--Start Header-->
<?php include("view/header.php")?>
<!--End Header-->

<div id="container" class="variation">
<h1><?=$d_allpost['title'] ?></h1>
<div >
<?php
if($d_allpost['picture']!='')
{
?>
<div class="content_img"><img src="<?=$basepath?><?=$d_allpost['picture']?>" /></div>
<?php
}
?>
<?=$d_allpost['content'] ?>
</div>
<div class="spacer"></div>
</div>
<?php include("view/footer.php")?>

</body>
</html>
