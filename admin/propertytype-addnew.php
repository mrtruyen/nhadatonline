<?php
define('PROPERTY_TYPE_ADDNEW',1);
include("include/conn.php");
include("include/access.php");
include('include/settings.php');

if (isset($_POST['submit'])) {
	require('include/error.php');
	require('models/insert_update_propertytype.php');
}
else{
	unset($_SESSION['propertyType']);
}
$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

if(!empty($id))
{
	$id=$_REQUEST['id'];
	$sql_propertytype="select * from property_type where propertyTypeID='$id'";
	$re_propertytype=mysqli_query($conn,$sql_propertytype);
	$propertyType = [];
	while($d_propertytype=mysqli_fetch_array($re_propertytype))
	{
		$propertyType['title'][$d_propertytype['languageID']] = $d_propertytype['title'];
		$propertyType['status'] = $d_propertytype['status'];
	}

	$_SESSION['propertyType'] = isset($_SESSION['propertyType']) ? $_SESSION['propertyType']: $propertyType;
}

?>

<?php include("view/header.php")?>
<?php include("view/left_panel.php")?>
<?php include("view/propertytype-addnew.php")?>