<?php
require('functions.php');
require('utils.php');

// $prev="";
$dotcom="Demo";
$website_name="";
$basepath="http://nhadatonline.vn/admin/";
$basepath1="http://nhadatonline.vn/";
$_SESSION['default_language'] = 'vi';

$current_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$_SESSION['backUrl']=curPageURL();
$script_name=$_SERVER['SCRIPT_NAME'] ;
$arr=explode('/',$script_name);
$arr=array_reverse($arr);
$script_name=$arr[0];

$allLanguage = get_all_language();
$_SESSION['languages'] = $allLanguage;
$_SESSION['languageID'] = !isset($_SESSION['languageID']) || !is_numeric($_SESSION['languageID']) ? $allLanguage[$_SESSION['default_language']]['id'] : $_SESSION['languageID'];
$_SESSION['languageCode'] = !isset($_SESSION['languageCode']) ? $_SESSION['default_language'] : $_SESSION['languageCode']
?>