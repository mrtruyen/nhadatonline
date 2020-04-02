<?php
global $conn;
// var_dump($_POST); die();
if (defined('POST_ADDNEW')) {
	// var_dump(implode(',',$_POST['position'])); die();
	$_SESSION['d_post'] = $_POST;
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$postPosition = isset($_POST['position']) ? implode(',',$_POST['position']) : 'top';
	$postPicture = $_POST['picturepath'];
	$date = new DateTime();
	$postCreatedDate = $date->format('Y-m-d H:i:s');
	$time = time();

	// Validation
	$_SESSION['INSERT_ERROR'] = [];
	foreach ($_SESSION['languages'] as $lang) {
		if (!isset($_POST['title'][$lang['id']]) || empty(trim($_POST['title'][$lang['id']]))) {
			$_SESSION['INSERT_ERROR'][] = $lang['title'] . " title is required!";
		}

		if (!isset($_POST['content'][$lang['id']]) || empty(trim($_POST['content'][$lang['id']]))) {
			$_SESSION['INSERT_ERROR'][] = $lang['title'] . " content is required!";
		}
	}

	if ($_FILES['picture']['name']) {
		if(checkMimeType($_FILES['picture']['tmp_name'],['image/png','image/jpeg'])){
			$select = "select picture from post where id='$id'";
			$re_select = mysqli_query($conn, $select);
			$d_select = mysqli_fetch_array($re_select);

			if ($d_select['picture'] != '') {
				unlink("../" . $d_select['picture']);
			}
			$postPicture = "upload/" . $time . $_FILES['picture']['name'];
			$path = "../" . $postPicture;

			move_uploaded_file($_FILES['picture']['tmp_name'], $path);
		}
		else{
			$_SESSION['INSERT_ERROR'][] = 'invalid_image_type';
		}
		
	}

	if(empty($_SESSION['INSERT_ERROR'])){
		$newID = get_new_id('post','id','postID');

		foreach ($_SESSION['languages'] as $lang) {

			$postTitle = mysqli_real_escape_string($conn, trim($_POST['title'][$lang['id']]));
			$postContent = mysqli_real_escape_string($conn, $_POST['content'][$lang['id']]);

			if (!$id) {
				
				$query = "insert into post (postID,title,content,picture,languageID,position,createdDate) values($newID,'$postTitle','$postContent','$postPicture','".$lang['id']."','$postPosition','$postCreatedDate')";
				// echo $insert; die();
				if(mysqli_query($conn, $query)){
					unset($_SESSION['d_post']);
					$path = $basepath . "post.php";
				}
				else{
					$_SESSION['INSERT_ERROR'][] = "DB Error" . mysqli_error($conn);
				}
				
			} else {
				$query = "update post set title='$postTitle',content='$postContent',picture='$postPicture',position='$postPosition' where postID='$id' and languageID=".$lang['id'];
		
				if(mysqli_query($conn, $query)){
					$_SESSION['UPDATE_SUCCESS'] = 1;
					unset($_SESSION['d_post']);
				}
				else{
					$_SESSION['INSERT_ERROR'][] = "DB Error" . mysqli_error($conn);
				}
				// $path = $basepath . "post-addnew.php?id=" . $id;
			}
		// @header("location:$path");
		// die();
		}
		if(!$id){
			@header("location:$path");
			die();
		}
		
	}

	
}


echo "Access denied!";
?>
