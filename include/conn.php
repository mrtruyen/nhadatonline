<?php
require('database.php');
$db = Database::getInstance();
// $conn = $db->getConnection();
// $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
// if (!$conn) {
// 	die("Connection failed: " . mysqli_connect_error());
// }


$sessionID=session_id();
if(empty($sessionID)){
@session_start();
@ob_start();
$sessionID=session_id();
}

?>
