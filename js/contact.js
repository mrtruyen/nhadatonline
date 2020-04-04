function validateEmail(elementValue){  
       var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
       return emailPattern.test(elementValue);  
}

function validatePhoneNumber(phoneNumber){
	if(isNaN(phoneNumber) || phoneNumber.length < 10){
		return false;
	}
	return true;
}
function printerror_item(src,value) {
	document.getElementById(src).innerHTML='<span>'+value+'</span>';
	// $.ajax({
	// 		type:"POST",
	// 		url:basepath+"ajax_error_item.php",
	// 		data:"value="+value,
	// 		success:function(data){
	// 		document.getElementById(src).innerHTML=data;
	// 		}
	// });	
}



function valid_contact(src)
{
	var name=document.getElementById('name').value;
	var email=document.getElementById('emailAddress').value;
	var phone=document.getElementById('phone').value;
	var message=document.getElementById('message').value;
	
	//alert( message);
	if(name.trim()=='')
	{
		printerror_item(src,'Name Field is Required.');
		return false;
	}
	if(email.trim()=='')
	{
		printerror_item(src,'Email Address is Required.');
		return false;
	}
	if(!validateEmail(email)){
		printerror_item(src,'Contact email address is not valid.');
		return false;
	}
	if(phone.trim()=='')
	{
		printerror_item(src,'Phone Number is Required.');
		return false;
	}

	if(!validatePhoneNumber(phone)){
		printerror_item(src,'Phone number is not valid.');
		return false;
	}
	
	if(message.trim()=='')
	{
		printerror_item(src,'Message field is Required.');
		return false;
	}
	return true;
}
function hide(src){
	$('#'+src).hide();
}
function show(src){
	$('#'+src).show();
}

