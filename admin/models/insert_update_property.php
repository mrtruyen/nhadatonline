<?php
global $conn;

if (defined('PROPERTY_ADDNEW')) {
	$_SESSION['d_property'] = $_POST;
	$categoryID = mysqli_real_escape_string($conn, trim($_POST['categoryID']));
	$propertytypeID = mysqli_real_escape_string($conn, trim($_POST['propertyTypeID']));
	$noOfRoom = mysqli_real_escape_string($conn, trim($_POST['noOfRoom']));
	$noOfBedrooms = mysqli_real_escape_string($conn, trim($_POST['noOfBedrooms']));
	$noOfBathrooms = mysqli_real_escape_string($conn, trim($_POST['noOfBathrooms']));
	$price = mysqli_real_escape_string($conn, trim($_POST['price']));
	$location = mysqli_real_escape_string($conn, trim($_POST['location']));
	$city = mysqli_real_escape_string($conn, trim($_POST['city']));
	$area = mysqli_real_escape_string($conn, trim($_POST['area']));
	$lotSize = mysqli_real_escape_string($conn, trim($_POST['lotSize']));
	$buildYear = mysqli_real_escape_string($conn, trim($_POST['buildYear']));
	$saleStatus = mysqli_real_escape_string($conn, trim($_POST['saleStatus']));
	$status = mysqli_real_escape_string($conn, trim($_POST['status']));
	$picture = $_POST['picturepath'];

	$date = new DateTime();
	$createdDate = $date->format('Y-m-d H:i:s');
	$time = time();

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
	$_SESSION['INSERT_ERROR'] = [];
	foreach ($_SESSION['languages'] as $lang) {
		if (!isset($_POST['title'][$lang['id']]) || empty(trim($_POST['title'][$lang['id']]))) {
			$_SESSION['INSERT_ERROR'][] = $lang['title'] . " title cannot be empty!";
		}
	}

	if ($_FILES['picture']['name']) {
		if(checkMimeType($_FILES['picture']['tmp_name'],['image/png','image/jpeg'])){
			$picture = "upload/" . $time . $_FILES['picture']['name'];
			$path = "../" . $picture;
			move_uploaded_file($_FILES['picture']['tmp_name'], $path);
		}
		else{
			$_SESSION['INSERT_ERROR'][] = 'invalid_image_type';
		}
	}

	if(!is_numeric($noOfRoom) || $noOfRoom < 0){
		$_SESSION['INSERT_ERROR'][] = "Number Of Rooms must be a number";
	}

	if(!is_numeric($noOfBedrooms) || $noOfBedrooms < 0){
		$_SESSION['INSERT_ERROR'][] = "Number Of Bedrooms must be a number";
	}

	if(!is_numeric($noOfBathrooms) || $noOfBathrooms < 0){
		$_SESSION['INSERT_ERROR'][] = "Number Of Bathrooms must be a number";
	}

	if(!is_numeric($price) || $price < 0){
		$_SESSION['INSERT_ERROR'][] = "Price must be a number";
	}

	if(!is_numeric($area) || $area < 0){
		$_SESSION['INSERT_ERROR'][] = "Area must be a number";
	}

	if(!is_numeric($lotSize) || $lotSize < 0){
		$_SESSION['INSERT_ERROR'][] = "Lot Size must be a number";
	}
	
	if (empty($_SESSION['INSERT_ERROR'])) {

		$objectID = get_new_id('property','id','propertyID');
		foreach ($_SESSION['languages'] as $lang) {

			$title = mysqli_real_escape_string($conn, trim($_POST['title'][$lang['id']]));
			$description = mysqli_real_escape_string($conn, $_POST['description'][$lang['id']]);

			if (!$id) {
				
				/*Insert product info to product table*/
				$query = "insert into property (languageID,categoryID,propertyTypeID,title,picture,noOfRoom,noOfBedrooms,noOfBathrooms,price,location,city,area,lotSize,buildYear,saleStatus,description,status,createdDate,propertyID) 
							values('" . $lang['id'] . "','$categoryID','$propertytypeID','$title','$picture','$noOfRoom','$noOfBedrooms','$noOfBathrooms','$price','$location','$city','$area','$lotSize','$buildYear','$saleStatus','$description','$status','$createdDate','$objectID')";

				if(mysqli_query($conn, $query)){
					$updatepicture = "update picture set object_id='" . $objectID . "' where object_id='0'";
					mysqli_query($conn, $updatepicture);
					unset($_SESSION['d_property']);
					header("location:property.php");
					die();
				}
				else{
					$_SESSION['INSERT_ERROR'][] = mysqli_error($conn);
				}

				
			} else {
				$query = "update property  set
				categoryID='$categoryID',
				propertyTypeID='$propertytypeID',
				title='$title',
				picture='$picture',
				noOfRoom='$noOfRoom',
				noOfBedrooms='$noOfBedrooms',
				noOfBathrooms='$noOfBathrooms',
				price='$price',
				location='$location',
				city='$city',
				area='$area',
				lotSize='$lotSize',
				buildYear='$buildYear',
				saleStatus='$saleStatus',
				description='$description',
				status='$status' where
				propertyID='$id' and languageID='" . $lang['id'] . "'";
				// mysqli_query($conn, $update) or die(mysqli_error($conn));
				// $postad_id = $id;

				// $the_id = get_title_con('property', 'typeID', $_REQUEST['id'], 'id', " and languageID='" . $_SESSION['languageID'] . "' ");

				$updatepicture = "update picture set object_id='" . $id . "' where object_id='0'";
				mysqli_query($conn, $updatepicture);
				if(mysqli_query($conn, $query)){
					mysqli_query($conn, $updatepicture);
					$_SESSION['UPDATE_SUCCESS'] = 1;
					unset($_SESSION['d_property']);
				}
				else{
					$_SESSION['INSERT_ERROR'][] = mysqli_error($conn);
				}
			}
		}
	}
}
echo "Access denied.";
/*Unset all session varialble which are used to set during add new product*/	

//unset($_SESSION['userID']);
