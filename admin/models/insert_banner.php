<?php
global $conn;
if (defined('BANNER_ADDNEW')) {
	$weight = $_POST['weight'];
	$status = $_POST['status'];
	// var_dump($_POST); die();

	$id = $_REQUEST['id'];
	$time = time();
	$_SESSION['INSERT_ERROR'] = [];

	if ($_FILES['picture']['name']) {
		if(checkMimeType($_FILES['picture']['tmp_name'],['image/png','image/jpeg'])){
			$select = "select picture from banner where id='$id'";
			$re_select = mysqli_query($conn, $select);
			$d_select = mysqli_fetch_array($re_select);

			if ($d_select['picture'] != '') {
				unlink("../" . $d_select['picture']);
			}

			//$file_name = time().strtolower(str_replace(' ','-',$_FILES['picture']['name']));
			$picture = "upload/" . $time . strtolower(str_replace(' ', '-', $_FILES['picture']['name']));
			$path = "../" . $picture;

			move_uploaded_file($_FILES['picture']['tmp_name'], $path);
		}
		else{
			$_SESSION['INSERT_ERROR'][] = 'invalid_image_type';
		}
		
	} else {
		$picture = $_POST['picturepath'];
	}

	if(empty($_SESSION['INSERT_ERROR'])){
		if ($id == '0' || !$_REQUEST['id']) {
			$insert = "insert into banner (`picture`,`order`,`status`) values('$picture','$weight','$status')";
	
			if(mysqli_query($conn, $insert)){
				header("location:banner.php");
				die();
			}
			else{
				$_SESSION['INSERT_ERROR'][] = "DB Error: ".mysqli_error($conn);
			}
	
	
		} else {
			$update = "update banner set `picture`='$picture',`order`='$weight',`status`='$status' where id='$id'";
				
			if(mysqli_query($conn, $update)){
				$_SESSION['UPDATE_SUCCESS'] = 1;
				// header("location:banner-addnew.php?id=$id");
				// die();
			}
			else{
				$_SESSION['INSERT_ERROR'][] = "DB Error: ".mysqli_error($conn);
			}
	
			// @header("location:banner-addnew.php?id=$id");	
		}
	}

	//@header("location:$path");


}
echo 'Access denied!';
?>
