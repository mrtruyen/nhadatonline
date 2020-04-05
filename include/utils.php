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

function get_max_price($categoryID=1) {
	$sql_query = "select MAX(price) as price from property where categoryID=$categoryID";
	$db = Database::getInstance();
	$d_row = $db->fetchOne($sql_query);
	return $d_row ? $d_row ['price'] : 100000;
}

function get_min_price($categoryID=1) {
	$sql_query = "select MIN(price) as price from property where categoryID=$categoryID";
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

function get_option_list($tableName,$valueField='id',$selectedValue='0',$viewField='title', $textSelect='--Please select--', $orderBy='id',$conditon=''){
	global $conn;	

	$conditon=$conditon?$conditon:1; //Checking for condition is in or not
	$cond=" WHERE ".$conditon." "; 
	$cond.=$orderBy=='' || !$orderBy ? " order by ".$viewField : " order by ".$orderBy; //Checking for order by condition, if it's empty by Default Order by viewField
	
	$sql_table="select * from ".$tableName.$cond; //Query for select box 
	// var_dump($sql_table); die();
	$re_table=@mysqli_query($conn,$sql_table);
	$option='<option value="0">'.$textSelect.'</option>'; //Default First select box option
	while($d_table=@mysqli_fetch_assoc($re_table))
	{
		$select = $d_table[$valueField]==$selectedValue ? 'selected="selected"' : ''; //Check this option is selected or not and assing attribute to a variable.
		$option.='<option value="'.$d_table[$valueField].'"'.$select.'>'.$d_table[$viewField].'</option>'; // Generate option 
	}
	return $option; //Return generated option
}
