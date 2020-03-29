<?php
define('MGMT_PROPERTY', 1);
include("include/conn.php");
include("include/access.php");
include('include/settings.php');
require_once('include/pagination.php');
if (isset($_REQUEST['del']) && $_REQUEST['del'] == "delete") {
	$del = "DELETE  FROM property WHERE  propertyID='" . $_GET['id'] . "' ";
	mysqli_query($conn, $del) or die($err);
	// @header("location:property.php");
}

if (isset($_POST['delete_all'])) {
	require('models/deleteall_property.php');
}

$cond = " where languageID='" . $_SESSION['languageID'] . "'  ";
$r = mysqli_query($conn, "select 1 from property".$cond);
$total = mysqli_num_rows($r);
$perpage = 10;
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$startpoint = ($page * $perpage) - $perpage;
$sql = "select * from property where languageID='" . $_SESSION['languageID'] . "'   LIMIT $startpoint,$perpage";
$r = mysqli_query($conn, $sql);

?>
<?php include("view/header.php") ?>
<?php include("view/left_panel.php") ?>
<?php include("view/property.php") ?>

