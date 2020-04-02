<?php
require_once('config.php');
$conn = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sessionID=session_id();
if(empty($sessionID)){
@session_start();
@ob_start();
$sessionID=session_id();
}



