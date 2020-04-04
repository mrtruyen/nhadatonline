<?php
include("include/conn.php");
include("include/functions.php");
include("include/utils.php");

$ip=$_SERVER['REMOTE_ADDR'];

$return_data=array();

$msg1='<option value="0" selected>'.get_lang('minP',$_SESSION['languageCode']).'</option>';
$msg2='<option value="0" selected>'.get_lang('maxP',$_SESSION['languageCode']).'</option>';

$maxPrice = get_max_price($_REQUEST['cat']);
$minPrice = get_min_price($_REQUEST['cat']);
$priceUnit = ($_REQUEST['cat']==1) ? '&nbsp;tỷ' : '&nbsp;triệu';
$diff = round(($maxPrice - $minPrice) / 10);


for($i=$minPrice;$i<$maxPrice;$i+=$diff)
{
	$msg1.='<option value="'.$i.'" ';
	if($i==$_REQUEST['minP']){ $msg1.='selected'; }
	$msg1.='>'.$i.$priceUnit.'</option>';
}
for($i=$minPrice;$i<$maxPrice;$i+=$diff)
{
	$msg2.='<option value="'.$i.'" ';
	if($i==$_REQUEST['maxP']){ $msg2.='selected'; }
	$msg2.='>'.$i.$priceUnit.'</option>';
}
$msg1.='<option value="'.$maxPrice.'">'.$maxPrice.$priceUnit.'</option>';
$msg2.='<option value="'.$maxPrice.'">'.$maxPrice.$priceUnit.'</option>';

$return_data['min']=$msg1;
$return_data['max']=$msg2;

echo json_encode($return_data);
?>