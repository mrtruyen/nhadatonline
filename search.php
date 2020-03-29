<?php
include("include/conn.php");
include("include/settings.php");
include("include/utils.php");

$q = $_REQUEST['q'];
$cat = isset($_REQUEST['cat']) ? $_REQUEST['cat'] : "";
$minP = isset($_REQUEST['minP']) ? $_REQUEST['minP'] : -1;
$maxP = isset($_REQUEST['maxP']) ? $_REQUEST['maxP'] : -1;
$bath = isset($_REQUEST['bath']) ? $_REQUEST['bath'] : -1;
$bed = isset($_REQUEST['bed']) ? $_REQUEST['bed'] : -1;
$lotSize = isset($_REQUEST['lotSize']) ? $_REQUEST['lotSize'] : "";
$minsqFeet = isset($_REQUEST['minsqfeet']) ? $_REQUEST['minsqfeet'] : "";
$maxsqFeet = isset($_REQUEST['maxsqFeet']) ? $_REQUEST['maxsqFeet'] : "";
$minbuildYear = isset($_REQUEST['minbuildYear']) ? $_REQUEST['minbuildYear'] : "";
$maxbuildYear = isset($_REQUEST['maxbuildYear']) ? $_REQUEST['maxbuildYear'] : "";

$cond = '';
$heading = "Search  ";
if ($cat) {
	$cond .= " and categoryID='" . $cat . "'";
}
if ($q) {
	$searchtext = mysqli_real_escape_string($conn, $q);
	$cond .= " and (title like '%$searchtext%' or city like '%$searchtext%' or  location like '%$searchtext%' )";
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
if ($bath && $bath != '-1') {

	$cond .= " and noOfBathrooms='$bath'";
	//$heading.=" in ".$q;
}
if ($bed && $bed != '-1') {

	$cond .= " and noOfBedrooms='$bed'";
	//$heading.=" in ".$q;
}

if (isset($_REQUEST['minsqfeet']) && $_REQUEST['minsqfeet']) {

	$cond .= " and area>='" . $_REQUEST['minsqfeet'] . "'";
	//$heading.=" in ".$q;
}
if (isset($_REQUEST['maxsqfeet']) && $_REQUEST['maxsqfeet']) {

	$cond .= " and area<='" . $_REQUEST['maxsqfeet'] . "'";
	//$heading.=" in ".$q;
}
if (isset($_REQUEST['lotSize']) && $_REQUEST['lotSize']) {

	$cond .= " and lotSize>='" . $_REQUEST['lotSize'] . "'";
	//$heading.=" in ".$q;
}
if (isset($_REQUEST['minbuildYear']) && $_REQUEST['minbuildYear']) {
	$cond .= " and buildYear>=" . $_REQUEST['minbuildYear'];
	//$heading.=" in ".$q;
}
if (isset($_REQUEST['maxbuildYear']) && $_REQUEST['maxbuildYear']) {
	$cond .= " and buildYear<=" . $_REQUEST['maxbuildYear'];
	//$heading.=" in ".$q;
}


//echo $cond;
$sql_property = "select  * from property where status='Y' " . $cond . "  and languageID='$languageID'  order by createdDate";
$re_sql_property = mysqli_query($conn, $sql_property) or die(mysqli_error($conn));
$noofcolumn = mysqli_num_rows($re_sql_property);
$heading = $noofcolumn . " Property Found ";
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

			while ($data_sql_property = mysqli_fetch_array($re_sql_property)) {

				$sql_propertytype = "select  * from property_type where id='" . $data_sql_property['propertyTypeID'] . "' ";
				$re_sql_propertytype = mysqli_query($conn, $sql_propertytype) or die(mysqli_error($conn));
				$data_sql_propertytype = mysqli_fetch_array($re_sql_propertytype);
				$url = $basepath . "property/" . makeUrl($data_sql_property['title']) . "-" . $data_sql_property['propertyID'] . ".html";

				include("view/property_box.php");
			} ?>

			<div class="spacer"></div>
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