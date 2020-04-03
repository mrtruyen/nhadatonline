<?php
require('database.php');
$db = Database::getInstance();
$conn = $db->getConnection();

$sessionID=session_id();
if(empty($sessionID)){
@session_start();
@ob_start();
$sessionID=session_id();
}

?>
