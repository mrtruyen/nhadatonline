<?php
define('ADMIN_SETTING',1);
include("include/conn.php");
include("include/access.php");
include("include/settings.php");
if(isset($_POST['submit'])){
  require('include/error.php');
  require('models/update_admin_settings.php');
}

$d_adminuser = $_SESSION['adminAccount'];
?>
<?php include("view/header.php")?>
<?php include("view/left_panel.php")?>
<?php include("view/admin_settings.php")?>