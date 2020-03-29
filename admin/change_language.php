<?php
// include("conn.php");
// include("access.php");
@session_start();
$_SESSION['languageCode'] = $_REQUEST['id'];
$_SESSION['languageID'] = $_SESSION['languages'][$_REQUEST['id']]['id'];
$path=$_REQUEST['rp'];

@header("location:".$path);
?>
