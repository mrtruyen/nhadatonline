<?php
define('BANNER_ADDNEW',1);
include("include/conn.php");
include("include/access.php");
include('include/settings.php');

if (isset($_POST['submit'])) {
	require('include/error.php');
	require('models/insert_banner.php');
}

$id=(isset($_REQUEST['id'])) ? $_REQUEST['id'] : '';
if(!empty($id))
{
	$sql_homepagelogo="select * from banner where id='$id'";
	$re_homepagelogo=mysqli_query($conn,$sql_homepagelogo);
	$d_homepagelogo=mysqli_fetch_array($re_homepagelogo);
}
else{
	$newBannerOrder = get_new_id('banner','id','order');
}

?>

<?php include("view/header.php")?>
<?php include("view/left_panel.php")?>
<?php include("view/banner-addnew.php")?>
