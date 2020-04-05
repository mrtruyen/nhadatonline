<?php
global $conn;
// var_dump($_REQUEST['list']); die();
if(@$_REQUEST['list']){
	foreach ($_REQUEST['list'] as $id=>$str) {
			$sql_show = "select * from property where propertyID='$id'";
			$result_show = mysqli_query($conn, $sql_show) or die(mysqli_error($conn));
			$d = @mysqli_fetch_array($result_show);
			
			$del = "delete from property  where propertyID='$id'";
			if(@mysqli_query($conn, $del)){
				@unlink("../" . $d['picture']);
			}
			$_SESSION['DELETED_CHECKED'][] = $d['title'];
	}
}

// @header("location:property.php");
?>				