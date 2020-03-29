<?php
include("include/conn.php");
include("include/access.php");
include('include/settings.php');
require_once ('include/pagination.php');
if(isset($_REQUEST['del']) && $_REQUEST['del']=="delete")
{
  	$del="DELETE  FROM banner WHERE  id='" . $_GET['id'] ."' ";
   	mysqli_query($conn,$del) or die($err);
  	@header("location:banner.php");
}

if (isset($_POST['delete_all'])) {
	require('models/deleteall_banner.php');
}
?>
<?php include("view/header.php")?>
<?php include("view/left_panel.php")?>
<?php include("view/banner.php")?>
