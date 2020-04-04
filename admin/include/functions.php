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

function curPageURL()
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function makeUrl($title, $id) {
	$title = utf8_to_ascii( $title );
	$arr = array ();
	$title = trim ( $title );
	$title = str_replace ( ' ', '-', $title );
	$title = str_replace ( '&', '-', $title );
	$title = strtolower ( $title ) . '-' . $id . '.html';
	
	return $title;
}

function convertPrice($price){
	return ($price < 1) ? $price * 1000 : $price;
}

function checkMimeType($filename, $acceptedMime=[]){
	// $finfo = new finfo(FILEINFO_MIME);
	// $mimetype = $finfo->buffer(file_get_contents($filename));
	$mimetype = mime_content_type($filename);
	if(in_array($mimetype, $acceptedMime, true) === true){
		return true;
	}
	return false;
}

function get_lang($textID, $languageID) {
	require(__DIR__."/../language/$languageID/statictext.php");
	return $static_array[$textID];
}