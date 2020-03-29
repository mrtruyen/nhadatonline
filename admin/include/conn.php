<?php
// $conn = mysqli_connect("192.168.10.10", "homestead", "secret", "mbnc");
$conn = mysqli_connect("localhost", "root", "", "nhadatonline");
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
require_once('config.php');


