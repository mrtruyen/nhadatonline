

function add_wishlist(productID,src)
{
	//alert(productID);
	$.ajax({
		type:"POST",
		url:basepath+"ajax_wishlist.php",
		data:"productID="+productID,
		success:function(data){
			//document.getElementById(src).innerHTML=data;
			//$('#'+src).html(data);
			$('#'+src).html(data);
			alert("Product Successfully Added to your Save Property");
		}
	});
}

function deletewishlist(tableTD1,id)
{
	$.ajax({
		type:"POST",
		url:basepath+"ajax_delete_wishlist.php",
		data:"id="+id,
		success:function(data){
		
		$('#'+tableTD1).fadeOut('slow');
	

		
		}
	});
}