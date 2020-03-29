<?php
define('POST_ADDNEW',1);
include("include/conn.php");
include("include/access.php");
include('include/settings.php');

if (isset($_POST['submit'])) {
  require('include/error.php');
	require('models/insert_update_post.php');
}

$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
if(!empty($id))
{
  $sql_allpost="select * from post where postID='$id'";
  $re_allpost=mysqli_query($conn,$sql_allpost);
  $d_post = [];
  while($post=mysqli_fetch_array($re_allpost)){
    $d_post['title'][$post['languageID']] = $post['title'];
    $d_post['content'][$post['languageID']] = $post['content'];
    $d_post['picture'] = $post['picture'];
    $d_post['position'] = explode(',',$post['position']);
  }

  $_SESSION['d_post'] = isset($_SESSION['d_post']) ? $_SESSION['d_post']: $d_post;
}
else{
  unset($_SESSION['d_post']);
}
// var_dump($d_post); die();
?>
<?php 
// if($posts_add=='none' && $posts_edit=='none' ):
// 	@header("location:".$basepath);
// endif;
?>
<?php include('view/header.php'); ?>
<?php include("view/left_panel.php")?>
<?php include("view/post-addnew.php")?>