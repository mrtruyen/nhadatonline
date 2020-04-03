<?php
define('PROPERTY_ADDNEW', 1);

include("include/conn.php");
include("include/access.php");
include("include/settings.php");

if (isset($_POST['submit'])) {
  require('include/error.php');
  require('models/insert_update_property.php');
}
else{
  unset($_SESSION['d_property']);
}

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

if (!empty($id)) {
  $sql_property = "select * from property where propertyID='$id'";
  $re_property = mysqli_query($conn, $sql_property);
  $d_property = [];
  while($property=mysqli_fetch_array($re_property))
	{
    $d_property['title'][$property['languageID']] = $property['title'];
    $d_property['description'][$property['languageID']] = $property['description'];
    $d_property['picture'] = $property['picture'];
    $d_property['categoryID'] = $property['categoryID'];
    $d_property['propertyTypeID'] = $property['propertyTypeID'];
    $d_property['noOfRoom'] = $property['noOfRoom'];
    $d_property['noOfBedrooms'] = $property['noOfBedrooms'];
    $d_property['noOfBathrooms'] = $property['noOfBathrooms'];
    $d_property['price'] = $property['price'];
    $d_property['location'] = $property['location'];
    $d_property['city'] = $property['city'];
    $d_property['area'] = $property['area'];
    $d_property['lotSize'] = $property['lotSize'];
    $d_property['buildYear'] = $property['buildYear'];
    $d_property['saleStatus'] = $property['saleStatus'];
    $d_property['status'] = $property['status'];
  }
  $_SESSION['d_property'] = isset($_SESSION['d_property']) ? $_SESSION['d_property'] : $d_property;
  // var_dump($d_property); die();
}
?>
<?php
// if($posts_add=='none' && $posts_edit=='none' ):
// 	@header("location:".$basepath);
// endif;
?>

<?php include("view/header.php") ?>
<?php include("view/left_panel.php") ?>
<?php include("view/property-addnew.php") ?>
