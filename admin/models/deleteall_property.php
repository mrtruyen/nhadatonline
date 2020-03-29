<?php
$sql_select = "select * from property order by id desc";
$re_select = mysqli_query($conn, $sql_select);

$i = 0;

while ($d_select = mysqli_fetch_array($re_select)) {

	$id = $d_select['propertyID'];

	if (isset($_REQUEST['list'[$id]])) {
		$sql_show = "select * from property where propertyID='$id'";
		$result_show = mysqli_query($conn, $sql_show) or die(mysqli_error($conn));
		$d = @mysqli_fetch_array($result_show);
		
		$del = "delete from property  where propertyID='$id'";
		if(@mysqli_query($conn, $del)){
			@unlink("../" . $d['picture']);
		}
	}
}
// @header("location:property.php");
?>				