// JavaScript Document
function setzone(zoneoffset) {
	var date = new Date();
	var offset = new Date().getTimezoneOffset();
	document.getElementById(zoneoffset).value = offset;
	$(".green_login_button").removeAttr("disabled");
	$(".submit_button").removeAttr("disabled");
}
function getDocHeight() {
	var D = document;
	return Math.max(
		Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
		Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
		Math.max(D.body.clientHeight, D.documentElement.clientHeight)
	);
}
function setheight(id) {

	document.getElementById(id).style.height = getDocHeight() + 'px';
}
function openFancyDiv() {
	document.getElementById('light').style.display = 'block';
	document.getElementById('fade').style.display = 'block';
}
function closefancybox() {
	document.getElementById('light').style.display = 'none';
	document.getElementById('fade').style.display = 'none';
}
function openFancyDiv1(light, fade) {

	document.getElementById(light).style.display = 'block';
	document.getElementById(fade).style.display = 'block';
}
function closefancybox1(light, fade) {
	document.getElementById(light).style.display = 'none';
	document.getElementById(fade).style.display = 'none';
}
// For clock
TodaysDate();
var todayDate;
var periodTest = (todayDate + " 11:59 PM -0400")
var periodA1 = (todayDate + " 8:53 AM -0400")
var periodA2 = (todayDate + " 10:26 AM -0400")
var periodA31 = (todayDate + " 12:32 PM -0400")
var periodLunch1 = (todayDate + " 11:00 AM -0400")
var periodLunch2 = (todayDate + " 12:32 PM -0400")
var periodA32 = (todayDate + " 11:59 AM -0400")
var periodA4 = (todayDate + " 2:05 PM -0400")
function TodaysDate(todayDate) {
	var today = new Date()
	var todayMonth = today.getMonth() + 1
	var todayDay = today.getDate()
	var todayYear = today.getFullYear()
	var todayDate = (todayMonth + "/" + todayDay + "/" + todayYear)

}

/*
	  Author:		Robert Hashemian (http://www.hashemian.com/)
	  Modified by:	Munsifali Rashid (http://www.munit.co.uk/)
	  Modified by:	Tilesh Khatri
*/

function StartCountDown(myDiv, myTargetDate) {
	var dthen = new Date(myTargetDate);
	var dnow = new Date();
	ddiff = new Date(dthen - dnow);
	gsecs = Math.floor(ddiff.valueOf() / 1000);
	CountBack(myDiv, gsecs);
}

function Calcage(secs, num1, num2) {
	s = ((Math.floor(secs / num1)) % num2).toString();
	if (s.length < 2) {
		s = "0" + s;
	}
	return (s);
}

function CountBack(myDiv, secs) {
	var DisplayStr;

	var DisplayFormat = "%%D%% %%H%%:%%M%%";

	if (secs > 86400) {

		DisplayStr = DisplayFormat.replace(/%%D%%/g, Calcage(secs, 86400, 100000) + ' Days');

	}
	else {

		DisplayStr = DisplayFormat.replace(/%%D%%/g, "");

	}
	if (secs > 3600) {

		DisplayStr = DisplayStr.replace(/%%H%%/g, Calcage(secs, 3600, 24));
	}
	else {


		DisplayStr = DisplayFormat.replace(/%%D%% %%H%%/g, "00");


	}
	DisplayStr = DisplayStr.replace(/%%M%%/g, Calcage(secs, 60, 60));
	DisplayStr = DisplayStr.replace(/%%S%%/g, Calcage(secs, 1, 60));
	if (secs > 0) {
		document.getElementById(myDiv).innerHTML = DisplayStr;

		setTimeout("CountBack('" + myDiv + "'," + (secs - 1) + ");", 990);
	}
	else {
		document.getElementById(myDiv).innerHTML = "Period Over";
	}
}

// JavaScript Document
function getDocHeight() {
	var D = document;
	return Math.max(
		Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
		Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
		Math.max(D.body.clientHeight, D.documentElement.clientHeight)
	);
}
function setheight(id) {

	document.getElementById(id).style.height = getDocHeight() + 'px';
}
function openFancyDiv() {
	document.getElementById('light').style.display = 'block';
	document.getElementById('fade').style.display = 'block';
}
function closefancybox() {
	document.getElementById('light').style.display = 'none';
	document.getElementById('fade').style.display = 'none';
}
function ajax_email_submit_form() {
	var youname = $("#youname").val();
	var youremailAddress = $("#youremailAddress").val();
	var friendname = $("#friendname").val();

	var friendemailAddress = $("#friendemailAddress").val();
	var message = $("#message").val();
	var productID = $("#productID").val();


	if (youname == '') {
		alert("Enter your name");
	}
	else if (youremailAddress == '') {
		alert("Enter your emailaddress");
	}
	else if (friendname == '') {
		alert("Enter friend name");
	}
	else if (friendemailAddress == '') {
		alert("Enter friend email address");
	}
	else if (message == '') {
		alert("Enter your message");
	}
	else {


		$.ajax({
			type: "POST",
			url: "ajax_emailtofriend_send.php",
			data: "youname=" + youname + "&youremailAddress=" + youremailAddress + "&friendname=" + friendname + "&friendemailAddress=" + friendemailAddress + "&message=" + message + "&productID=" + productID,
			success: function (data) {
				$("#email_friend_contact").hide();
				$("#success_msg").val('Successfully submitted');
				$('#light1').delay(2000).fadeOut();
				$('#fade1').delay(2000).fadeOut();

			}

		});

	}

}
function submit_payment(src, div) {
	var getuserID = 1;
	$.ajax({
		type: "POST",
		url: "ajax-paymentselect.php",
		data: "getuserID=" + getuserID,
		success: function (data) {
			document.getElementById(src).innerHTML = data;
		}
	});
}
function get_add_purchase_content(src, id) {
	$.ajax({
		type: "POST",
		url: "ajax_get_add_purchase_content.php",
		data: "id=" + id,
		success: function (data) {
			document.getElementById(src).innerHTML = data;
			$(function () {
				$("#orderdate").datepicker();
			});
		}
	});
}
function isNumberKey(evt) {

	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 46 || charCode > 57))
		return false;
	return true;
}

function roundit(val) {
	if (document.getElementById(val).value == '') {
		value1 = 0.00;
	}
	else {
		var value1 = parseFloat(document.getElementById(val).value);
	}
	value1 = value1.toFixed(2);
	document.getElementById(val).value = (value1);
}
function roundInterger(val) {
	if (document.getElementById(val).value != '') {
		var value1 = parseInt(document.getElementById(val).value);
		document.getElementById(val).value = (value1);
	}
}

function putprice(value, quantity, rowTotal) {
	var quantity1 = 0;
	var value1 = 0;
	if (document.getElementById(value).value != '') {
		var value1 = (document.getElementById(value).value);
	}
	if (document.getElementById(quantity).value != '') {
		quantity1 = parseInt(document.getElementById(quantity).value);
	}
	var total = value1 * quantity1;
	total = total.toFixed(2);
	document.getElementById(rowTotal).value = (total);
	var no = parseInt(document.getElementById('noofContent').value);
	var alltotal = 0;
	for (var i = 1; i < no; i++) {
		var subtotal = document.getElementById('rowTotal' + i).value;
		if (subtotal != '') {

			subtotal = parseFloat(subtotal);
			alltotal += subtotal;
		}
	}
	alltotal = alltotal.toFixed(2);
	document.getElementById('allTotal').innerHTML = alltotal;
	document.getElementById('allTotalValue').value = alltotal;
	showShippingCost('ammountShowSpan', 'shippingCost', 'allTotalValue');
	//$("#ammountShowSpan").html('asd');
}
function showShippingCost(src, shippingCost, allTotalValue) {
	//alert(document.getElementById('pc').checked);
	var shippingCostval = 0;
	if (document.getElementById('sc').checked == true) {
		if ($("#" + shippingCost).val() != '') {
			var shippingCostval = $("#" + shippingCost).val();
		}

		$("#" + src).html('$' + shippingCostval);
	}
	else {

		if ($("#" + shippingCost).val() != '') {
			var shippingCostval = $("#" + shippingCost).val();
		}
		var allTotalValueval = $("#" + allTotalValue).val();
		var totalcost = parseFloat(allTotalValueval) + parseFloat(shippingCostval);
		$("#" + src).html('$' + totalcost);
	}


}
function saveNotify(src, vendor, shippingco, trackingNo, orderdate, orderNo, itemQuantity, itemQuantity, rowTotal, allTotalValue, noofContent, userID) {
	var vendor1 = document.getElementById(vendor).value;
	var shippingco1 = document.getElementById(shippingco).value;
	var trackingNo1 = document.getElementById(trackingNo).value;
	var orderdate1 = document.getElementById(orderdate).value;
	var orderNo1 = document.getElementById(orderNo).value;
	var userID = $("#" + userID).val();
	//var itemQuantity1=document.getElementById(itemQuantity).value;
	//var itemQuantity1=document.getElementById(itemQuantity).value;
	//var rowTotal1=document.getElementById(rowTotal).value;
	var allTotalValue1 = document.getElementById(allTotalValue).value;
	var no = parseInt(document.getElementById(noofContent).value);
	/*
	if(vendor1=='')
	{
		printerror_item(src,'50');
		return false;
	}
	else if(shippingco1==0)
	{
		printerror_item(src,'51');
		return false;
	}
	else if(trackingNo1=='')
	{
		printerror_item(src,'52');
		return false;
	}
	*/
	if (userID == 0) {
		printerror_item(src, '49');
		return false;
	}
	else if (orderdate1 == '') {
		printerror_item(src, '53');
		return false;
	}
	else if (orderNo1 == '') {
		printerror_item(src, '54');
		return false;
	}
	else if (allTotalValue1 == '' || allTotalValue1 == '0.00') {
		printerror_item(src, '55');
		return false;
	}
	else {
		return true;
	}
}
function Inint_AJAX() {
	try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) { } //IE
	try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) { } //IE
	try { return new XMLHttpRequest(); } catch (e) { } //Native Javascript
	alert("XMLHttpRequest not supported");
	return null;
};
function printerror_item(src, value) {
	document.getElementById(src).innerHTML = '<img src="images/ajax-loader.gif" />';
	var req = Inint_AJAX();
	req.onreadystatechange = function () {
		if (req.readyState == 4) {
			if (req.status == 200) {
				document.getElementById(src).innerHTML = req.responseText; //retuen value
			}
		}
	};
	req.open("GET", "ajax_error_item.php?data=" + src + "&value=" + value); //make connection
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	req.send(null); //send value
}
function deleteNotify(tableTD1, id) {
	$.ajax({
		type: "POST",
		url: "ajax_delete_package.php",
		data: "id=" + id,
		success: function (data) {
			$('#' + tableTD1).fadeOut('slow');
		}
	});
}
function save_posts() {
	var selected = new Array();
	$('#allpost input:checked').each(function () {

		selected.push($(this).val());
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_posts.php",
		data: "postID=" + selected,
		success: function (data) {
			refresh_menu();
		}
	});
}
function save_pages() {
	var selected = new Array();
	$('#allpages input:checked').each(function () {

		selected.push($(this).val());
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_pages.php",
		data: "postID=" + selected,
		success: function (data) {
			refresh_menu();
		}
	});
}

function save_Category() {
	var selected = new Array();
	$('#allCategory input:checked').each(function () {

		selected.push($(this).val());
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_menucategory.php",
		data: "postID=" + selected,
		success: function (data) {
			refresh_menu();
		}
	});

}

function save_producttype() {
	var selected = new Array();
	$('#allType input:checked').each(function () {

		selected.push($(this).val());
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_producttype.php",
		data: "postID=" + selected,
		success: function (data) {
			refresh_menu();
		}
	});

}


function refresh_menu() {
	$.ajax({
		type: "POST",
		url: "ajax_refresh_menu.php",
		data: "",
		success: function (data) {
			$('#nestable').html(data);
		}
	});
}
function open_edit_box(id) {
	$("#" + id).toggle();

}
function update_menu_name(id) {
	var menuName = $('#menuName_' + id).val();

	$.ajax({
		type: "POST",
		url: "ajax_update_menu_name.php",
		data: "id=" + id + "&menuName=" + menuName,
		success: function (data) {
			$('#sortable-item_' + id).html(data);
			$('#menu_edit_details_' + id).hide();
		}
	});
}
function save_menu_order(id) {

	var orderval = $('#nestable-output').val();
	var data = (orderval);
	$.ajax({
		type: "POST",
		url: "ajax_save_menu_order.php",
		data: "ordervalue=" + data,
		success: function (data) {
		}
	});
}
function save_order(id, tablename) {


	id = id.replace(/&/g, ',');

	$.ajax({
		type: "POST",
		url: "ajax_save_order.php",
		data: "ordervalue=" + id + "&tablename=" + tablename,
		success: function (data) {
		}
	});
}

function save_order_single(id, tablename) {


	id = id.replace(/&/g, ',');

	$.ajax({
		type: "POST",
		url: "ajax_save_order_single.php",
		data: "ordervalue=" + id + "&tablename=" + tablename,
		success: function (data) {
		}
	});
}
function delete_menu(id) {
	$.ajax({
		type: "POST",
		url: "ajax_delete_menu.php",
		data: "id=" + id,
		success: function (data) {
			refresh_menu();
		}
	});
}





// for the footer menu

function save_footerposts() {
	var selected = new Array();
	$('#allpost input:checked').each(function () {

		selected.push($(this).val());
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_footerposts.php",
		data: "postID=" + selected,
		success: function (data) {
			refresh_footermenu();
		}
	});
}



function save_footerpages() {
	var selected = new Array();
	$('#allpages input:checked').each(function () {

		selected.push($(this).val());
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_footerpages.php",
		data: "postID=" + selected,
		success: function (data) {
			refresh_footermenu();
		}
	});
}



function save_footerCategory() {
	var selected = new Array();
	$('#allCategory input:checked').each(function () {

		selected.push($(this).val());
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_footermenucategory.php",
		data: "postID=" + selected,
		success: function (data) {
			refresh_footermenu();
		}
	});

}


function refresh_footermenu() {
	$.ajax({
		type: "POST",
		url: "ajax_refresh_footermenu.php",
		data: "",
		success: function (data) {
			$('#menu_items').html(data);
		}
	});
}



function update_footermenu_name(id) {
	var menuName = $('#menuName_' + id).val();

	$.ajax({
		type: "POST",
		url: "ajax_update_footermenu_name.php",
		data: "id=" + id + "&menuName=" + menuName,
		success: function (data) {
			$('#sortable-item_' + id).html(data);
			$('#menu_edit_details_' + id).hide();
		}
	});
}
function save_footermenu_order(id) {

	var selected = new Array();
	$('#menu_items li.menu_li').each(function () {
		var id = $(this).attr('id');
		id = id.replace("menu_order_", "");
		selected.push(id);
	});

	$.ajax({
		type: "POST",
		url: "ajax_save_footermenu_order.php",
		data: "ordervalue=" + selected,
		success: function (data) {
		}
	});
}
function delete_footermenu(id) {
	$.ajax({
		type: "POST",
		url: "ajax_delete_footermenu.php",
		data: "id=" + id,
		success: function (data) {
			refresh_footermenu();
		}
	});
}























function delete_image(src, tableName, id, fieldName, file) {
	$.ajax({
		type: "POST",
		url: "ajax_delete_image.php",
		data: "tableName=" + tableName + "&id=" + id + "&fieldName=" + fieldName + "&file=" + file,
		success: function (data) {
			$("#" + src).html('');
		}
	});
}
function get_citylist(stateID, src) {
	var state_val = $("#" + stateID).val();
	$.ajax({
		type: "POST",
		url: "ajax_get_citylist.php",
		data: "stateID=" + state_val,
		success: function (data) {
			$("#" + src).html(data);
		}
	});
}




/*--------------------*/
function set_cat(val, src) {

	$.ajax({
		type: "POST",
		url: "ajax_set_cat.php",
		data: "val=" + val,
		success: function (data) {
			$("#" + src).html(data);
		}
	});
}

function reset_select(src) {

	var data = '<option value="0">----Please Select A Sub Sub Category-----</option>';
	$("#" + src).html(data);
}

function set_field(src, id, postID, type) {

	$.ajax({
		type: "POST",
		url: "ajax_set_field.php",
		data: "id=" + id + "&postID=" + postID + "&type=" + type,
		success: function (data) {
			document.getElementById(src).innerHTML = data;
			var val = $("#inp").val();
			$('#map_canvas').gmap({ 'center': val }).bind('init', function (event, map) {

				/*For add Marker*/
				$('#map_canvas').gmap('addMarker', {
					'position': val,
					'bounds': true,
					'draggable': true,
					'bounds': false
				})

				/*For find lat Lng*/
				$(map).click(function (event) {
					$('#inp').val(event.latLng.lat() + ', ' + event.latLng.lng());
					$('#map_canvas').gmap('clear', 'markers');
					$('#map_canvas').gmap('addMarker', {
						'position': event.latLng,
						'draggable': true,
						'bounds': false
					})
				});
			});


		}
	});
}

function show_property_image(src, object_id, type_id) {
	$.ajax({
		type: "POST",
		url: "ajax_show_property_image.php",
		data: "object_id=" + object_id + "&type_id=" + type_id,
		success: function (data) {
			$('#' + src).html(data);
		}
	});
}