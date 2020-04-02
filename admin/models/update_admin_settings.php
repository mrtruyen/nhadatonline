<?php
if (defined('ADMIN_SETTING')) {
	$time = time();
	$adminName = mysqli_real_escape_string($conn, trim($_POST['adminName']));
	$userName = mysqli_real_escape_string($conn, trim($_POST['userName']));
	$adminEmailAddress = mysqli_real_escape_string($conn, trim($_POST['adminEmailAddress']));
	$adminnewPassword = mysqli_real_escape_string($conn, trim($_POST['adminnewPassword']));
	$ReadminnewPassword = mysqli_real_escape_string($conn, trim($_POST['ReadminnewPassword']));

	$_SESSION['INSERT_ERROR'] = [];

	$pattern = "/^[^@]*@[^@]*\.[^@]*$/";
	if (empty($userName)) {
		$_SESSION['INSERT_ERROR'][] = 'empty_username';
	}
	if (!empty($_POST['adminnewPassword']) && ($adminnewPassword != $ReadminnewPassword)) {
		$_SESSION['INSERT_ERROR'][] = 'password_miss_match';
	}
	if (!empty($_POST['adminnewPassword']) && strlen($adminnewPassword)<6) {
		$_SESSION['INSERT_ERROR'][] = 'invalid_password_len';
	}
	if (!empty($_POST['adminnewPassword']) && (($adminnewPassword == '123456') || ($adminnewPassword == '1234567') || ($adminnewPassword == '12345678') || ($adminnewPassword == '123456789'))) {
		$_SESSION['INSERT_ERROR'][] = 'invalid_password_complex';
	}
	if (!preg_match($pattern, $adminEmailAddress) || $adminEmailAddress == '') {
		$_SESSION['INSERT_ERROR'][] = 'invalid_email';
	}
	if(empty($_SESSION['INSERT_ERROR'])) {
		$adminID = $_SESSION['adminAccount']['id'];
		
		if (!empty($_POST['adminnewPassword'])) {
			$update = "update " . $prev . "adminuser set password='".md5($adminnewPassword)."' where id=$adminID";
			mysqli_query($conn, $update);
			$_SESSION['PASSWORD_CHANGE'] = 1;
		}
		
		$update = "update " . $prev . "adminuser set username='$userName',adminName='$adminName',adminEmailAddress='$adminEmailAddress' 
	where id=$adminID";
		mysqli_query($conn, $update);
		$_SESSION['UPDATE_SUCCESS'] = 1;
		$admin_query = mysqli_query($conn, "select * from adminuser where id=$adminID");
		$_SESSION['adminAccount'] = mysqli_fetch_array($admin_query);
	}
	// @header("location:general-settings.php");
}
echo 'Access denied!';
