<?php
require("include/conn.php");
require("include/settings.php");
require("include/utils.php");
?>

<!--Start Header-->
<?php include("view/header.php")?>
<!--End Header-->

<!--Start Banner-->
<script type="text/javascript" src="banner/jquery.glide.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('.slider').glide({
			autoplay: 3500,
			hoverpause: true, // set to false for nonstop rotate
			arrowRightText: '&rarr;',
			arrowLeftText: '&larr;'
		});
	});
</script>
<!--End Banner-->
<div id="banner">

	<div class="banner-search">
    	<h1><?=get_lang('banner-search-h1',$_SESSION['languageCode'])?></h1>
        <div class="banner-srch-cont">
        <!--Start Search Box-->
			<?php include("view/search_box.php")?>
		<!--End Search Box-->
    	<div class="spacer"></div>
        </div>
    <div class="spacer"></div>
    </div>
    
	<div class="slider">
      <ul class="slides">
      <?php
        $d_banner = get_banner_home();
		foreach($d_banner as $banner) { ?>
	  
        <li class="slide">
          <figure>
            <img src="<?=$banner['picture'] ?>" alt="">
          </figure>
        </li>
		<?php } ?>
       
      </ul>
    </div>

<div class="spacer"></div>
</div>


<div id="container" class="variation">

<div class="spacer"></div>
</div>


<input type="hidden" name="maxPrice" id="maxPrice" value="<?=$maxPrice?>">
<input type="hidden" name="minPrice" id="minPrice" value="<?=$minPrice?>">
<?php  include("view/footer.php"); ?>
<script src="js/general1.js"></script>

<script>
$(document).ready(function(){
    getPrice();
});


function getPrice()
{
    var cat = $("#cat").val();
	var minP = $("#priceMIN").val();
	var maxP = $("#priceMAX").val();
	var priceMIN = $("#minPrice").val();
	var priceMAX = $("#maxPrice").val();
    // var test = "<option value='0' selected>Select</option>";
    // $("#min_price").html(test);

    $.ajax({
            url:'ajax_get_price.php',
            type:'POST',
            data:'cat='+cat+'&priceMIN='+priceMIN+'&priceMAX='+priceMAX,
            dataType:'json',
            success:function(data)
                {  
                    $("#min_price").html(data.min);
                    $("#max_price").html(data.max);  
    				//alert(data.min);  
    				$('.select').selectric();

                }
            })
}


function isNumberKey(evt) 
{
    var charCode = (evt.which) ? evt.which : event.keyCode; 
    ////onkeypress="return isNumberKey(event)" 
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) 
    {
        return false;
    } 
    else 
    {
        return true;
    } 
} 
</script>

</body>
</html>
<!-- $(function(){
		$('.select').selectric();

		$('.customOptions').selectric({
			optionsItemBuilder: function(itemData, element, index){
				return element.val().length ? '<span class="ico ico-' + element.val() +  '"></span>' + itemData.text : itemData.text;
			}
		});
	}); -->