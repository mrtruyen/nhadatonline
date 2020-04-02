<?php
require_once("include/functions.php");
require_once('database.php');

$basepath="http://nhadatonline.vn/";
$imagepath = $basepath."images/";
$err="Could Not Connect To The Database";
$_SESSION['default_language'] = 'vi';

// setting language
$db = $db ? $db : Database::getInstance();
$allLanguage = [];
$sql_alllanguage="select * from language order by weight";
$re_alllanguage = $db->query($sql_alllanguage);
foreach($re_alllanguage as $d_language){
	$allLanguage[$d_language['shortName']] = ['id' => $d_language['id'],
												'code' => $d_language['shortName'],
													'title' => $d_language['title'],
													'icon' => $d_language['icon']
													];
}
$_SESSION['languages'] = $allLanguage;
$_SESSION['languageID'] = isset($_SESSION['languageID']) ? $_SESSION['languageID'] : $allLanguage[$_SESSION['default_language']]['id'];
$_SESSION['languageCode'] = !isset($_SESSION['languageCode']) ? $_SESSION['default_language'] : $_SESSION['languageCode'];
$languageID=$_SESSION['languageID'];

// include_once("functions.php");
$arr = array();
$script_name = $_SERVER['SCRIPT_NAME'];
$arr = explode('/', $script_name);
$arr = array_reverse($arr);
$script_name = $arr[0];

$current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$_SESSION['backUrl'] = curPageURL();

