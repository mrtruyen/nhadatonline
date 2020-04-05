<?php
require("include/conn.php");
require("include/settings.php");
require("include/utils.php");
require("include/pagination.php");
require('models/property.php');
require('models/property_type.php');

$q = @$_REQUEST['q'];
$cat = @$_REQUEST['cat'];
$propertyType =@$_REQUEST['propertyType'];
$minP = @$_REQUEST['minP'];
$maxP = @$_REQUEST['maxP'];
$bath = @$_REQUEST['bath'];
$bed = @$_REQUEST['bed'];
$lotSize = @$_REQUEST['lotSize'];
$minsqFeet = @$_REQUEST['minsqfeet'];
$maxsqFeet = @$_REQUEST['maxsqfeet'];
$minbuildYear = @$_REQUEST['minbuildYear'];
$maxbuildYear = @$_REQUEST['maxbuildYear'];
// var_dump($_SERVER['REQUEST_URI']); die();
$cond = '';
$heading = "Search  ";
if ($cat) {
	$cond .= " and categoryID='" . $cat . "'";
}
if ($propertyType) {
	$cond .= " and propertyTypeID='" . $propertyType . "'";
}
if ($q) {
	$searchtext = strtolower(mysqli_real_escape_string($conn, $q));
	$cond .= " and (LOWER(title) like '%$searchtext%' or LOWER(city) like '%$searchtext%' or  LOWER(location) like '%$searchtext%' )";
	$heading .= " in " . $q;
}
if ($minP) {

	$cond .= " and price>='$minP'";
	//$heading.=" in ".$q;
}
if ($maxP) {

	$cond .= " and price<='$maxP'";
	//$heading.=" in ".$q;
}
if ($bath) {

	$cond .= " and noOfBathrooms>='$bath'";
	//$heading.=" in ".$q;
}
if ($bed) {

	$cond .= " and noOfBedrooms>='$bed'";
	//$heading.=" in ".$q;
}

if ($minsqFeet) {

	$cond .= " and area>=" . $minsqFeet;
	//$heading.=" in ".$q;
}
if ($maxsqFeet) {

	$cond .= " and area<=" . $maxsqFeet;
	//$heading.=" in ".$q;
}
if ($lotSize) {

	$cond .= " and lotSize>=" . $lotSize;
	//$heading.=" in ".$q;
}
if ($minbuildYear) {
	$cond .= " and buildYear>=" . $_REQUEST['minbuildYear'];
	//$heading.=" in ".$q;
}
if ($maxbuildYear) {
	$cond .= " and buildYear<=" . $_REQUEST['maxbuildYear'];
	//$heading.=" in ".$q;
}

if($cond){
	$cond = "where status='Y' " . $cond;
	// var_dump($cond);
	$cond .= " and languageID='".$_SESSION['languageID']."'";
	$mProperty = new Property();
	$total_result = $mProperty->getAll($cond);
	$total = count($total_result);
	$heading = $total . " Property Found ";

	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 5;
	$startpoint = ($page * $perpage) - $perpage;
	$re_sql_property = $mProperty->getLimit($perpage,$startpoint,$cond);
}


// echo $sql_property;
?>
<?php
$maxPrice = get_max_price();
$minPrice = get_min_price();
$dirrent = (($maxPrice - $minPrice) / 10) + $minPrice;
$dirrent = round($dirrent, -3);

?>
<!--Start Header-->
<?php include("view/header.php"); ?>
<!--End Header-->

<div id="container" class="myaccount">

	<div id="articleLft">
		<!--Start Search Box-->
		<?php include("view/search_box.php")?>
		<!--End Search Box-->


		<div class="extraLink" style="display:none">
			<ul>
				<li><a href="">Featured</a></li>
				<li><a href="">Revelance</a></li>
				<li><a href="">Newest</a></li>
			</ul>
		</div>

		<!-- heading here -->

		<div id="listing">
			<?php
				if(@$re_sql_property){
					$mPropertyType = new Propertytype();
					foreach($re_sql_property as $data_property){
						$data_propertytype = $mPropertyType->find($data_property['propertyTypeID']);
						$url = $basepath . "property/" . makeUrl($data_property['title']) . "-" . $data_property['propertyID'] . ".html";
						include("view/property_box.php");
					}
				}
			?>

			<div class="spacer"></div>
			<div style="width:100%;padding-top:30px;"><?= Pages("property", $perpage, $_SERVER['REQUEST_URI'].'&', $cond); ?>
				<div class="spacer"></div>
			</div>
		</div>


		<div class="spacer"></div>
	</div>

	<div class="spacer"></div>
</div>

<input type="hidden" name="maxPrice" id="maxPrice" value="<?= $maxPrice ?>">
<input type="hidden" name="minPrice" id="minPrice" value="<?= $minPrice ?>">
<input type="hidden" name="priceMIN" id="priceMIN" value="<?= $minP ?>">
<input type="hidden" name="priceMAX" id="priceMAX" value="<?= $maxP ?>">
<?php include("view/footer.php"); ?>

<script>
	$(document).ready(function() {
		getPrice();
	});

	function getPrice() {
		var cat = $("#cat").val();
		var minP = $("#priceMIN").val();
		var maxP = $("#priceMAX").val();
		var priceMIN = $("#minPrice").val();
		var priceMAX = $("#maxPrice").val();

		return $.ajax({
			url: 'ajax_get_price.php',
			type: 'POST',
			data: 'cat=' + cat + '&priceMIN=' + priceMIN + '&priceMAX=' + priceMAX + '&minP=' + minP + '&maxP=' + maxP,
			dataType: 'json',
			success: function(data) {
				$("#min_price").html(data.min);
				$("#max_price").html(data.max);
				$('.select').selectric();
			}
		})

	}

	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		////onkeypress="return isNumberKey(event)" 
		if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		} else {
			return true;
		}
	}
</script>
</body>
</html>