<?php
include("include/conn.php");
include("include/access.php");
include('include/settings.php');
require_once ('include/pagination.php');
if(isset($_REQUEST['del']) && $_REQUEST['del']=="delete")
{
  	$del="DELETE  FROM post WHERE  postID='" . $_GET['id'] ."' ";
   	mysqli_query($conn,$del) or die($err);
  	// @header("location:post.php");
}

if (isset($_POST['delete_all'])) {
	require('models/deleteall_post.php');
}

$cond = " where languageID='" . $_SESSION['languageID'] . "' order by id desc";
$r = mysqli_query($conn, "select 1 from post " . $cond);
$total = mysqli_num_rows($r);
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$perpage = 5;
$startpoint = ($page * $perpage) - $perpage;
$sql = "select * from post " . $cond . " LIMIT $startpoint,$perpage";
$r = mysqli_query($conn, $sql);
?>
<?php include('view/header.php'); ?>
<?php include("view/left_panel.php")?>
<?php include("view/post.php")?>
