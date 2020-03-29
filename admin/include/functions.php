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
	$title = delascii ( $title );
	$arr = array ();
	$title = trim ( $title );
	$title = str_replace ( ' ', '-', $title );
	$title = strtolower ( $title ) . '-' . $id . '.html';
	
	return $title;
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