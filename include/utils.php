<?php
function get_all_language(){
    global $prev;
    global $conn;
	$language = array();
	$select = "SELECT * FROM `".$prev."alllanguage` ORDER BY `weight` ";
	$result = mysqli_query($conn,$select);
	for($i=0;$query = mysqli_fetch_array($result);$i++){
		$language[$i]['id'] = $query['id'];
		$language[$i]['short_name'] = $query['shortName'];
	}
	return $language;
}

function get_currency_symbol() {
	global $prev;
	global $basepath;
	global $conn;
	$sql_hcurrency = "select symbol,picture from currency  where featureCheck='Y'  limit 0,1 ";
	$re_hcurrency = mysqli_query ( $conn, $sql_hcurrency );
	$d_hcurrency = mysqli_fetch_array ( $re_hcurrency );
	
	if ($d_hcurrency ['symbol'] != '') {
		echo $d_hcurrency ['symbol'];
	} else {
		?>
<img src="<?=$basepath?><?=$d_hcurrency['picture']?>" class="price_code"
	style="width: 16px" />
<?php
	}
}
function get_color($id) {
	global $conn;
	global $prev;
	global $basepath;
	global $languageID;
	$sql_color = "select title from color  where typeID='$id'  and languageID='$languageID' ";
	$re_color = mysqli_query ( $conn, $sql_color );
	$d_color = mysqli_fetch_array ( $re_color );
	return $d_color ['title'];
}

function get_country($typeID) {
	global $conn;
	global $prev;
	global $basepath;
	global $languageID;
	$sql_country = "select short_name from country where typeID='" . $typeID . "' and languageID='" . $languageID . "'  ";
	$re_country = mysqli_query ( $conn, $sql_country );
	$d_country = mysqli_fetch_array ( $re_country );
	return $d_country ['short_name'];
}

function get_profile_pic($profilePicture) {
	global $basepath;
	if ($profilePicture == '') {
		
		$str = $basepath . "images/default-logo.png";
	} else {
		$str = $basepath . $profilePicture;
	}
	return $str;
}

function get_profile_picture_by_id($id) {
	global $conn;
	$sql_user = "select picture from user  where id='$id'   ";
	$re_user = mysqli_query ( $conn, $sql_user );
	$d_user = mysqli_fetch_array ( $re_user );
	return get_profile_pic ( $d_user ['picture'] );
}

function get_website_link($website) {
	global $basepath;
	if ($website != '') {
		$str = "http://" . $website;
	} else {
		$str = "javascript:void(0)";
	}
	
	return $str;
}

function get_max_price() {
	global $conn;
	$sql_property = "select MAX(price) as price from property where categoryID=1";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = $re_property ? mysqli_fetch_array ( $re_property ) : ['price' => 100000];
	return $d_property ['price'];
}

function get_min_price() {
	global $conn;
	$sql_property = "select MIN(price) as price from property where categoryID=1";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = $re_property ? mysqli_fetch_array ( $re_property ) : ['price' => 100000];
	return $d_property ['price'];
}

function get_max_price_2() {
	global $conn;
	$sql_property = "select MAX(price) as price from property where categoryID=2";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = $re_property ? mysqli_fetch_array ( $re_property ) : ['price' => 100000];
	return $d_property ['price'];
}

function get_min_price_2() {
	global $conn;
	$sql_property = "select MIN(price) as price from property where categoryID=2";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = $re_property ? mysqli_fetch_array ( $re_property ) : ['price' => 100000];
	return $d_property ['price'];
}

function get_min_lotsize() {
	global $conn;
	$sql_property = "select MIN(lotsize) as lotsize from property";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = $re_property ? mysqli_fetch_array ( $re_property ) : ['lotsize' => 1000];
	return $d_property ['lotsize'];
}

function get_max_lotsize() {
	global $conn;
	$sql_property = "select MAX(lotsize) as lotsize from property";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = $re_property ? mysqli_fetch_array ( $re_property ) : ['lotsize' => 1000];
	return $d_property ['lotsize'];
}

function get_max_bath() {
	global $conn;
	global $prev;
	global $basepath;
	global $languageID;
	$sql_property = "select MAX(noOfBathrooms) as noOfBathrooms from property where languageID='" . $languageID . "'  ";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = mysqli_fetch_array ( $re_property );
	return $d_property ['noOfBathrooms'];
}

function get_max_bed() {
	global $conn;
	global $prev;
	global $basepath;
	global $languageID;
	$sql_property = "select MAX(noOfBedrooms) as noOfBedrooms from property where languageID='" . $languageID . "'  ";
	$re_property = mysqli_query ( $conn, $sql_property );
	$d_property = mysqli_fetch_array ( $re_property );
	return $d_property ['noOfBedrooms'];
}
