<?php
// $conn = mysqli_connect("192.168.10.10", "homestead", "secret", "nhadatonline");
$sessionID=session_id();
if(empty($sessionID)){
@session_start();
@ob_start();
$sessionID=session_id();
}
require_once('config.php');

$conn = mysqli_connect("127.0.0.1", "root", "", "nhadatonline");
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>
