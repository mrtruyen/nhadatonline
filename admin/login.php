<?php
include("include/conn.php");
if (isset($_SESSION['adminSession'])) {
  @header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To Admin Control Panel</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 6]>
  <link rel="stylesheet" type="text/css" href="css/style_IE6.css" />
    <![endif]-->
</head>
<body id="login">
<div id="login-wrapper">
<div id="login-top">
<h1>Admin Login</h1>
</div>
<div id="login-content" >
<form name="login" action="login_checked.php" method="post">
<?php
if(isset($_SESSION['msg']))
{
unset($_SESSION['msg']);
?>
Sorry, You have enter wrong Username/Password
<?php
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Username</td>
    <td><input type="text" name="admin_username" class="textbox" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="admin_password" class="textbox" value=""  autocomplete=off/></td>
  </tr>
    <tr>
    
    <td colspan="2" style="text-align:center"><input type="submit" class="button" name="submit_login" value="Login" /></td>
  </tr>
</table>
</form>
 <div class="spacer"></div>
</div>
 <div class="spacer"></div>
</div>
</body>
</html>
