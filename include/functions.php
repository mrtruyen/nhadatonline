<?php
function delascii($title) {
	$title = trim ( $title );
	$title = str_replace ( htmlentities ( "'", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "\"", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "\"", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "/", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( ">", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "<", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "]", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "[", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "}", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "{", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( ":", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "?", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "\\", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "+", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "=", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "*", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "&", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "^", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "%", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "$", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "#", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "@", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "!", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "`", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "~", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( "|", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( ";", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( ",", ENT_QUOTES ), '', $title );
	$title = str_replace ( htmlentities ( ".", ENT_QUOTES ), '', $title );
	$var = "-";
	$var1 = "--";
	for($i = 0; $i <= 100; $i ++) {
		if (strpos ( $title, htmlentities ( $var1, ENT_QUOTES ) )) {
			$title = str_replace ( htmlentities ( $var1, ENT_QUOTES ), '-', $title );
		}
	}
	
	return $title;
}

function utf8_to_ascii($str) {
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
	$str = preg_replace("/(đ)/", "d", $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
	$str = preg_replace("/(Đ)/", "D", $str);
	//$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
	return $str;
}

function delLongword($title) {
	$arr = array ();
	$arr = explode ( " ", $title );
	$avoy = "";
	foreach ( $arr as $val => $value ) {
		if (strlen ( $value ) < 15) {
			$avoy .= $value . " ";
		}
	}
	
	return $avoy;
}
function islongword($title) {
	$arr = array ();
	$arr = explode ( " ", $title );
	$avoy = "";
	foreach ( $arr as $val => $value ) {
		if (strlen ( $value ) > 15) {
			$avoy = "1";
			
			break;
		}
	}
	
	return $avoy;
}
function substr_charecter($paragraph, $num_words) {
	$noofcharecter = strlen ( $paragraph );
	$str = substr ( $paragraph, 0, $num_words );
	if ($noofcharecter > $num_words) {
		$str .= "...";
	}
	return $str;
}
function substr_words($paragraph, $num_words) {
	$noofwords = count_words ( $paragraph );
	$paragraph = explode ( ' ', $paragraph );
	$paragraph = array_slice ( $paragraph, 0, $num_words );
	$str = implode ( ' ', $paragraph );
	if ($noofwords > $num_words) {
		$str .= "...";
	}
	return $str;
}
function fetwordfromurl($title) {
	$arr = array ();
	$title = trim ( $title );
	$title = str_replace ( '/', ' ', $title );
	$title = str_replace ( '-', ' ', $title );
	$arr = explode ( ' ', $title );
	foreach ( $arr as $val => $value ) {
		if (ctype_alpha ( $value )) {
			$avoy .= ucwords ( $value ) . " ";
		}
	}
	return $avoy;
}
function makeUrl($title) {
	$title = utf8_to_ascii( $title );
	$arr = array ();
	$title = trim ( $title );
	$title = str_replace ( ' ', '-', $title );
	$title = str_replace ( '&', '-', $title );
	$title = strtolower ( $title );
	
	return $title;
}
function count_words($str) {
	$no = count ( explode ( " ", $str ) );
	return $no;
}
function makeRandomString($max = 6) {
	$i = 0; // Reset the counter.
	$possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$keys_length = strlen ( $possible_keys );
	$str = ""; // Let's declare the string, to add later.
	while ( $i < $max ) {
		$rand = mt_rand ( 1, $keys_length - 1 );
		$str .= $possible_keys [$rand];
		$i ++;
	}
	return $str;
}
function make_int_duration($duration) {
	$duration_int = 0;
	$arr = explode ( ':', $duration );
	if (count ( $arr ) == 3) {
		$duration_int = $arr [0] * 3600;
		$duration_int += $arr [1] * 60;
		$duration_int += $arr [2];
	} elseif (count ( $arr ) == 2) {
		$duration_int = $arr [0] * 60;
		$duration_int += $arr [1];
	} elseif (count ( $arr ) == 2) {
		$duration_int = $arr [0];
	}
	return $duration_int;
}
function make_int_duration1($duration) {
	$duration_int = 0;
	$arr = explode ( 'h', $duration );
	
	if (count ( $arr ) > 1) {
		$duration_int += $arr [0] * 3600;
		$duration = $arr [1];
	}
	$arr = explode ( 'min', $duration );
	$duration_int += $arr [0] * 60;
	
	return $duration_int;
}
function make_int_duration2($duration) {
	$duration_int = 0;
	$arr = explode ( 'h', $duration );
	
	if (count ( $arr ) > 1) {
		$duration_int += $arr [0] * 3600;
		$duration = $arr [1];
	}
	$arr = explode ( 'm', $duration );
	if (count ( $arr ) > 1) {
		$duration_int += $arr [0] * 60;
		$duration = $arr [1];
	}
	$arr = explode ( 's', $duration );
	$duration_int += $arr [0];
	
	return $duration_int;
}
function make_string_duration($duration) {
	$duration_str = "";
	
	if ($duration / 3600 >= 1) {
		
		$duration_str = str_pad ( floor ( $duration / 3600 ), 2, "0", STR_PAD_LEFT );
		$duration_str .= ":";
		$duration = $duration % 3600;
	}
	if ($duration / 60 >= 1) {
		$duration_str .= str_pad ( floor ( $duration / 60 ), 2, "0", STR_PAD_LEFT );
		$duration = $duration % 60;
		$duration_str .= ":";
	} else {
		$duration_str .= "00:";
	}
	$duration_str .= str_pad ( $duration, 2, "0", STR_PAD_LEFT );
	
	return $duration_str;
}
function curPageURL() {
	$pageURL = 'http';
	if (isset($_SERVER ["HTTPS"]) && $_SERVER ["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER ["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER ["SERVER_NAME"] . ":" . $_SERVER ["SERVER_PORT"] . $_SERVER ["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER ["SERVER_NAME"] . $_SERVER ["REQUEST_URI"];
	}
	return $pageURL;
}
function discountCalculate($actualPrice, $discount) {
	// selling price = actual price - (actual price * (discount / 100))
	// $sellingPrice = $actualPrice- ($actualPrice * ($discount / 100));
	$discountPrice = ($actualPrice * ($discount / 100));
	return ($discountPrice);
}
function customerDiscountCalculate($actualPrice, $discount) {
	// selling price = actual price - (actual price * (discount / 100))
	// $sellingPrice = $actualPrice- ($actualPrice * ($discount / 100));
	$discountPrice = ($actualPrice * ($discount / 100));
	return ($discountPrice);
}
function get_country_list($countryID) {
	global $prev;
	global $conn;
	$sql_country = "select * from " . $prev . "country order by short_name";
	$re_country = mysqli_query ( $conn, $sql_country );
	$option = '<option value="0">--Select--</option>';
	while ( $d_country = mysqli_fetch_array ( $re_country ) ) {
		
		if ($d_country ['country_id'] == $countryID) {
			$select = 'selected="selected"';
		} else {
			$select = '';
		}
		
		$option .= '<option value="' . $d_country ['country_id'] . '"' . $select . '>' . $d_country ['short_name'] . '</option>';
	}
	
	return $option;
}
function get_state_list($countryID, $stateID) {
	global $prev;
	global $conn;
	$sql_state = "select * from " . $prev . "parishes where countryID='" . $countryID . "' order by title";
	$re_state = mysqli_query ( $conn, $sql_state );
	$option = '<option value="0">--Select--</option>';
	while ( $d_state = mysqli_fetch_array ( $re_state ) ) {
		
		if ($d_state ['id'] == $stateID) {
			$select = 'selected="selected"';
		} else {
			$select = '';
		}
		
		$option .= '<option value="' . $d_state ['id'] . '"' . $select . '>' . $d_state ['title'] . '</option>';
	}
	
	return $option;
}

function get_timespan_string($date1, $date2) {
	$diff = abs ( strtotime ( $date2 ) - strtotime ( $date1 ) );
	
	$years = floor ( $diff / (365 * 60 * 60 * 24) );
	$months = floor ( ($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24) );
	$days = floor ( ($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24) );
	if ($months == 0 && $years == 0) {
		$months = 1;
	}
	$str = sprintf ( "%d years, %d months ", $years, $months, $days );
	$str = " (" . $str . ") ";
	return $str;
}
function get_timespan_string_2($date1, $date2) {
	$diff = abs ( strtotime ( $date2 ) - strtotime ( $date1 ) );
	
	$years = floor ( $diff / (365 * 60 * 60 * 24) );
	$months = floor ( ($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24) );
	$days = floor ( ($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24) );
	if ($months == 0 && $years == 0) {
		$months = 1;
	}
	$str = sprintf ( "%d years, %d months ", $years, $months, $days );
	return $str;
}
function get_sub_string($str, $no) {
	if (strlen ( $str ) > $no) {
		$str = substr ( $str, 0, $no ) . "...";
	}
	
	return $str;
}
function get_lang($textID, $languageID) {
	require(__DIR__."/../language/$languageID/statictext.php");
	return $static_array[$textID];
}

function get_product_pic($picture) {
	if ($picture == '') {
		
		$str = "images/noimage.jpg";
	} else {
		$str = $picture;
	}
	return $str;
}
function time_elapsed_string($ptime) {
	$etime = time () - $ptime;
	
	if ($etime < 1) {
		return '0 seconds';
	}
	
	$a = array (
			12 * 30 * 24 * 60 * 60 => 'Year',
			30 * 24 * 60 * 60 => 'Month',
			24 * 60 * 60 => 'Day',
			60 * 60 => 'Hour',
			60 => 'Minute',
			1 => 'Second' 
	);
	
	foreach ( $a as $secs => $str ) {
		$d = $etime / $secs;
		if ($d >= 1) {
			$r = round ( $d );
			return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' Ago';
		}
	}
}


function product_price($price, $discountedPrice) {
	if ($discountedPrice > 0) {
		$price = $discountedPrice;
	}
	return get_float_value ( $price );
}
function get_float_value($number) {
	return number_format ( $number, 2, '.', '' );
}
function get_float_value1($number) {
	return number_format ( $number, 0, '.', ',' );
}

function convertPrice($price){
	return ($price < 1) ? $price * 1000 : $price;
}
?>