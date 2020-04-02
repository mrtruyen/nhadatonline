
<?php
global $conn;
$sql_select = "select * from banner  order by id desc";

$re_select = mysqli_query($conn, $sql_select);

$i = 0;

while ($d_select = mysqli_fetch_array($re_select)) {

	$id = $d_select['id'];

	if (isset($_REQUEST['id_' . $id])) {
		$sql_show = "select * from banner  where id='$id'";
		$result_show = mysqli_query($conn, $sql_show);
		$d = @mysqli_fetch_array($result_show);

		$del = "delete from banner where id='$id'";
		if(mysqli_query($conn, $del)){
			@unlink("../../" . $d['picture']);
		}
		else{
			$_SESSION['DB_ERROR'] = mysqli_error($conn);
		}
		
	}
}
// @header("location:banner.php");
?>				