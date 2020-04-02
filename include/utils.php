<?php
require_once('database.php');
function get_all_language(){
	$db = Database::getInstance();
	$sql_query="select * from language order by weight";
	$result = $db->query($sql_query);
	return $result;
}

function get_banner_home(){
	$sql_query="select  * from banner where status='Y' order by `order`";
	$db = Database::getInstance();
	$result = $db->query($sql_query);
	return $result;
}

function get_header_menu(){
	$sql_query = "select * from post where languageID='" . $_SESSION['languageID'] . "' and FIND_IN_SET('top',position)>0 order by id";
	$db = Database::getInstance();
	$result = $db->query($sql_query);
	return $result;
}

function get_footer_menu(){
	$sql_query = "select * from post where languageID='" . $_SESSION['languageID'] . "' and FIND_IN_SET('bottom',position)>0 order by id";
	$db = Database::getInstance();
	$result = $db->query($sql_query);
	return $result;
}

function get_website_link($website) {
	global $basepath;
	if ($website != '') {
		$str = "http://" . $website;
	} else {
		$str = "javascript:void(0)";
	}
	
	return $str;
}

function get_max_price() {
	$sql_query = "select MAX(price) as price from property where categoryID=1";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['price'] : 100000;
}

function get_min_price() {
	$sql_query = "select MIN(price) as price from property where categoryID=1";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['price'] : 100000;
}

function get_max_price_2() {
	$sql_query = "select MAX(price) as price from property where categoryID=2";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['price'] : 100000;
}

function get_min_price_2() {
	$sql_query = "select MIN(price) as price from property where categoryID=2";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['price'] : 100000;
}

function get_min_lotsize() {
	$sql_query = "select MIN(lotsize) as lotsize from property";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['lotsize'] : 1000;
}

function get_max_lotsize() {
	$sql_query = "select MAX(lotsize) as lotsize from property";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['lotsize'] : 1000;
}

function get_max_bath() {
	$sql_query = "select MAX(noOfBathrooms) as noOfBathrooms from property where languageID='" . $_SESSION['languageID'] . "'  ";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['noOfBathrooms'] : 0;
}

function get_max_bed() {
	$sql_query = "select MAX(noOfBedrooms) as noOfBedrooms from property where languageID='" . $_SESSION['languageID'] . "'  ";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['noOfBedrooms'] : 0;
}
