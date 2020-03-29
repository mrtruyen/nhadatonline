<?php
require("include/functions.php");
// simple true or false test
$allLanguage = [];
$sql_alllanguage="select * from language order by weight";
$re_alllanguage=mysqli_query($conn, $sql_alllanguage);
while($d_alllanguage=mysqli_fetch_array($re_alllanguage)){
	$allLanguage[$d_alllanguage['shortName']] = ['id' => $d_alllanguage['id'],
												'code' => $d_alllanguage['shortName'],
													'title' => $d_alllanguage['title'],
													'icon' => $d_alllanguage['icon']
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

