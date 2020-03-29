<?php
define('PROPERTY_TYPE',1);
include("include/conn.php");
include("include/access.php");
include('include/settings.php');
require_once ('include/pagination.php');
if(@$_REQUEST['del']=="delete")
{
  	$del="DELETE  FROM property_type  WHERE propertyTypeID='" . $_GET['id'] ."' ";
   	mysqli_query($conn,$del) or die($err);
}

if (isset($_POST['delete_all'])) {
	require('models/deleteall_propertytype.php');
}

$cond = " where languageID='" . $_SESSION['languageID'] . "' ";
$r = mysqli_query($conn, "select 1  from property_type".$cond);
$total = mysqli_num_rows($r);
$perpage = 10;
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page == 0 ? 1 : $page);
$startpoint = ($page * $perpage) - $perpage;
$sql = "select * from property_type " . $cond . "  LIMIT $startpoint,$perpage";

$r = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>

<?php include("view/header.php")?>
<?php include("view/left_panel.php")?>
<?php include("view/propertytype.php")?>
