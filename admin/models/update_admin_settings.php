<?php
if (defined('ADMIN_SETTING')) {
	$time = time();
	$adminName = trim(mysqli_real_escape_string($conn, @$_POST['adminName']));
	$userName = trim(mysqli_real_escape_string($conn, @$_POST['userName']));
	$adminEmailAddress = (mysqli_real_escape_string($conn, @$_POST['adminEmailAddress']));
	$adminnewPassword = md5(trim(mysqli_real_escape_string($conn, @$_POST['adminnewPassword'])));
	$ReadminnewPassword = md5(trim(mysqli_real_escape_string($conn, @$_POST['ReadminnewPassword'])));

	$_SESSION['INSERT_ERROR'] = [];

	$pattern = "/^[^@]*@[^@]*\.[^@]*$/";
	if (empty($userName)) {
		$_SESSION['INSERT_ERROR'][] = 'empty_username';
	}
	if (!empty($_POST['adminnewPassword']) && ($adminnewPassword != $ReadminnewPassword)) {
		$_SESSION['INSERT_ERROR'][] = 'empty_password';
	}
	if (!preg_match($pattern, $adminEmailAddress) || $adminEmailAddress == '') {
		$_SESSION['INSERT_ERROR'][] = 'invalid_email';
	}
	if(empty($_SESSION['INSERT_ERROR'])) {
		if (!empty($_POST['adminnewPassword'])) {
			$update = "update " . $prev . "adminuser set password='$adminnewPassword'";
			mysqli_query($conn, $update);
			$_SESSION['PASSWORD_CHANGE'] = 1;
		}
		$adminID = $_SESSION['adminAccount']['id'];
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
