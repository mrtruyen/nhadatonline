<?php
include("include/conn.php");
include("include/access.php");
$tableName=$_REQUEST['tableName'];
$id=$_REQUEST['id'];
$update="update   ".$tableName." set picture='' where id='$id'";
mysqli_query($conn,$update);
?>
