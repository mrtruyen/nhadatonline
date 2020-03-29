<?php
global $conn;
// var_dump($_POST); die();
?>
<?php
if(defined('PROPERTY_TYPE_ADDNEW'))
{
	
	$status=trim(mysqli_real_escape_string($conn,$_POST['status']));
	
	$id=$_REQUEST['id'];
	$time=time();
	$_SESSION['INSERT_ERROR'] = [];
	foreach($_SESSION['languages'] as $lang){
		if(!isset($_POST['title'][$lang['id']]) || empty(trim($_POST['title'][$lang['id']]))){
			$_SESSION['INSERT_ERROR'][] = $lang['title'] . " title cannot be empty!";
		}
	}

	if(empty($_SESSION['INSERT_ERROR'])){
		if(!$id)
		{
			$re_propertytype=(mysqli_query($conn,"SELECT * FROM property_type ORDER BY id DESC LIMIT 0,1"));
			if(mysqli_num_rows($re_propertytype)>0){
				$d_propertytype=mysqli_fetch_array($re_propertytype);
				$propertyTypeID=$d_propertytype['propertyTypeID']+1;
			}else{
				$propertyTypeID=1;
			}
			
			/*insert content for individual language*/
			$sql_alllanguage="select * from ".$prev."alllanguage order by weight";
			$re_alllanguage=mysqli_query($conn,$sql_alllanguage);
			foreach($_POST['title'] as $langID => $title)
			{
				$title = trim(mysqli_real_escape_string($conn,$title));
				
				$insert="insert into property_type (propertyTypeID,title,status,languageID)
				values($propertyTypeID,'$title','$status',$langID)";
				
				try{
					mysqli_query($conn,$insert);
				}
				catch(Exception $e){
					$_SESSION['INSERT_ERROR'] = "DB Error: ".mysqli_error($conn);
				}
			}

			$path = "propertytype.php";
			
		}
		else
		{
			/*Update content for individual language*/
			foreach($_POST['title'] as $langID => $title)
			{
				$title = trim(mysqli_real_escape_string($conn,$title));

				$update="update property_type set
					title='$title',
					status='$status' 
					where propertyTypeID='$id' and languageID=$langID";
			
				try{
					mysqli_query($conn,$update);
					$_SESSION['UPDATE_SUCCESS'] = 1;
				}
				catch(Exception $e){
					$_SESSION['INSERT_ERROR'] = "DB Error: " . mysqli_error($conn);
				}
			}
			$path = "propertytype-addnew.php?id=$id";
		}

		header("location:$path");
		die();
	}
}
echo 'Access denied.';
?>
