<?php
include("include/conn.php");
include("include/access.php");
			require_once('uploader/config.php');   //Config
			require_once('uploader/Uploader.php'); //Main php file
			$object_id=$_REQUEST['object_id']; //This is your article ID
			$user_id = 1;   //User id, set to NULL to load images by all users
			$type_id = $_REQUEST['type_id'];   //default is 1
			show_files($object_id, $user_id, $type_id, 'images');
			//show_files($object_id, $user_id, $type_id, 'files');
			//show_files($object_id, $user_id, $type_id, 'all');
?>
