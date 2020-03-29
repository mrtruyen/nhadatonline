<?php
function get_custom_value($slugname,$postID,$type){
	global $prev;
	$sql_postmeta="select slugvalue from ".$prev."postmeta where postID='$postID' and slugname='".$slugname."' and type='".$type."'";
	$re_postmeta=mysqli_query($conn,$sql_postmeta);
	$d_postmeta=mysqli_fetch_array($re_postmeta);
	$postmeta=$d_postmeta['slugvalue'];
	return $postmeta;
	
}
function get_currency_symbol()
{
global $prev;
global $basepath1;
$sql_hcurrency="select symbol,picture from ".$prev."currency  where featureCheck='Y'  limit 0,1 ";
$re_hcurrency=mysqli_query($conn,$sql_hcurrency);
$d_hcurrency=mysqli_fetch_array($re_hcurrency);

if($d_hcurrency['symbol']!='')
{
	echo $d_hcurrency['symbol'];
}
else
{
?>
<img src="<?=$basepath1?><?=$d_hcurrency['picture']?>" class="price_code"  style="width:16px" />
<?php
}

}

?>