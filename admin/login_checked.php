<?php
include("include/conn.php");
?>
<?php
if (isset($_POST['submit_login'])) {
	$userName = trim(strip_tags("<script>" . $_POST['admin_username'] . "</script>"));
	$UserPassword = md5(trim(strip_tags("<script>" . $_POST['admin_password'] . "</script>")));
	$sql_select = "select * from adminuser where username='$userName' and password='$UserPassword'";

	$re_select = mysqli_query($conn, $sql_select);
	if (mysqli_num_rows($re_select) > 0) {
		$_SESSION['adminSession'] = $_POST['admin_username'];
		$_SESSION['adminAccount'] = mysqli_fetch_array($re_select);
		$sql_alllanguage = "select * from language order by weight limit 0,1";
		$re_alllanguage = mysqli_query($conn, $sql_alllanguage);
		$d_alllanguage = mysqli_fetch_array($re_alllanguage);
		$_SESSION['languageID'] = $d_alllanguage['id'];
		@header("location:index.php");
	} else {
		$_SESSION['msg'] = "100";
		@header("location:login.php");
	}
}
?>