<?php include("conn.php")?>
<?php
if(isset($_POST['Submit']))
{
	move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="upload" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="Submit" />
</form>
</body>
</html>
