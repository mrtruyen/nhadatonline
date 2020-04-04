<?php
require("include/conn.php");
require("include/settings.php");
require("include/utils.php");
require('models/property.php');
require('models/property_type.php');

$id = $_REQUEST['id'];

$mProperty = new Property();
$data_sql_property = $mProperty->find($id);

$propertyTypeID = @$data_sql_property['propertyTypeID'];

$mPropertyType = new Propertytype();
$data_sql_propertytype = $mPropertyType->find($propertyTypeID);

?>

<!--Start Header-->
<?php include("view/header.php") ?>
<!--End Header-->
<?php include("view/details.php") ?>
<?php include("view/footer.php") ?>
</body>
</html>