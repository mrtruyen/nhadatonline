<?php
include("include/conn.php");
include("include/functions.php");
include("include/utils.php");

$ip=$_SERVER['REMOTE_ADDR'];

$return_data=array();

$msg1='<option value="0" selected>'.get_lang('min_price',$_SESSION['languageCode']).'</option>';
$msg2='<option value="0" selected>'.get_lang('max_price',$_SESSION['languageCode']).'</option>';
$maxPrice = get_max_price();
$minPrice = get_min_price();

if($_REQUEST['cat']==1)
{
	for($i=$minPrice;$i<=$maxPrice;$i+=50000)
	{
		$msg1.='<option value="'.$i.'" ';
		if($i==$_REQUEST['minP']){ $msg1.='selected'; }
		$msg1.='>$'.$i.'</option>';
	}
	for($i=$minPrice;$i<=$maxPrice;$i+=50000)
	{
		$msg2.='<option value="'.$i.'" ';
		if($i==$_REQUEST['maxP']){ $msg2.='selected'; }
		$msg2.='>$'.$i.'</option>';
	}

}
else
{
	for($i=1000;$i<=10000;$i=$i+1000)
	{
		$msg1.='<option value="'.$i.'" ';
		if($i==$_REQUEST['minP']){ $msg1.='selected'; }
		$msg1.='>$'.$i.'</option>';
	}
	for($i=10000;$i>=1000;$i=$i-1000)
	{
		$msg2.='<option value="'.$i.'" ';
		if($i==$_REQUEST['maxP']){ $msg2.='selected'; }
		$msg2.='>$'.$i.'</option>';
	}

}
$return_data['min']=$msg1;
$return_data['max']=$msg2;

echo json_encode($return_data);
?>