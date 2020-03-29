function Inint_AJAX() {
	try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
	try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
	try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
	alert("XMLHttpRequest not supported");
	return null;
};

/*---------------------------------------------*/
function validateEmail(elementValue){  
       var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
       return emailPattern.test(elementValue);  
}
function printerror_item(src,value) {
	document.getElementById(src).innerHTML='<img src="images/ajax-loader.gif" />';

	$.ajax({
			type:"POST",
			url:basepath+"ajax_error_item.php",
			data:"value="+value,
			success:function(data){
			document.getElementById(src).innerHTML=data;
			}
	});	
}

/*Popup*/
function getDocHeight() {
    var D = document;
    return Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );
}
function setheight(id)
{
	
document.getElementById(id).style.height=getDocHeight()+'px';
}
function openFancyDiv1(light,fade)
{
document.getElementById(light).style.display='block';
document.getElementById(fade).style.display='block';
}
function closefancybox1(light,fade)
{
document.getElementById(light).style.display='none';
document.getElementById(fade).style.display='none';
}


function get_register_content(src)
{
document.getElementById(src).innerHTML="";
$.ajax({
type:"POST",
url:basepath+"ajax_get_register_content.php",
data:"",
dataType: 'text',
success:function(data){
document.getElementById(src).innerHTML=data;
//showRecaptcha('recaptcha_div');
$(":text:visible:enabled:first").focus();


}
});
}
function get_forgotpassword_content(src)
{
document.getElementById(src).innerHTML="";
$.ajax({
type:"POST",
url:basepath+"ajax_get_forgotpassword_content.php",
data:"",
dataType: 'text',
success:function(data){
document.getElementById(src).innerHTML=data;
//showRecaptcha('recaptcha_div');
$(":text:visible:enabled:first").focus();


}
});
}
function validate_forgotpassword(src,actual_code)
{
	
	var emailAddress=$("#emailAddress").val();
	var letters_code=$("#letters_code").val();	
	alert(actual_code);
	alert(letters_code);
	 if(emailAddress=='')
	{
		printerror_item(src,'53');
	}
	else if(!validateEmail(emailAddress))
	{
		printerror_item(src,'54');
	}
	else if(letters_code=='')
	{
		printerror_item(src,'55');
	}
	else if(letters_code!=actual_code)
	{
		printerror_item(src,'56');
	}
	
	else
	{
		$.ajax({
			type:"POST",
			url:basepath+"",
			data:"emailAddress="+emailAddress,
			success:function(data){
			
			}
		});
	}
}
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}

function validate_register(src)
{
	var emailAddress=$("#emailAddress").val();
	var userPassword=$("#userPassword").val();	
	 if(emailAddress=='')
	{
		
		printerror_item(src,'1');
	
	}
	else if(userPassword=='')
	{
		printerror_item(src,'2');
	}
	else if(!validateEmail(emailAddress))
	{
		printerror_item(src,'3');
	}
	
	else
	{
		$.ajax({
			type:"POST",
			url:basepath+"ajax_emailValidation.php",
			data:"emailAddress="+emailAddress,
			success:function(data){
			if(data==1)
			{
				printerror_item(src,'4');
			}
			else
			{
				save_registration(src,emailAddress,userPassword);
			return false;
			}
			
			
			}
		});
	}
}



function save_registration(src,emailAddress,userPassword)
{
	document.getElementById(src).innerHTML='<img src="'+basepath+'images/loader.gif" />';
$.ajax({
type:"POST",
url:basepath+"ajax_insert_registration.php",
data:"emailAddress="+emailAddress+"&userPassword="+userPassword,

success:function(data){

window.location.href=basepath+'join-sucess.php';


}
});
}
function save_agent_request(userid)
{
	
$.ajax({
type:"POST",
url:basepath+"ajax_insert_agent_request.php",
data:"userid="+userid,
success:function(data){
location.reload(true);
}
});
}


function get_loin_content(src)
{
document.getElementById(src).innerHTML="";	
$.ajax({
type:"POST",
url:basepath+"ajax_get_login_content.php",
data:"",
dataType: 'text',
success:function(data){
document.getElementById(src).innerHTML=data;
$(":text:visible:enabled:first").focus();
}
});
}

function validate_login(src)
{

	var emailAddress=$("#emailAddress").val();
	var userPassword=$("#userPassword").val();	
	

	if(emailAddress=='')
	{
		printerror_item(src,'1');
	
	}
	else if(userPassword=='')
	{
		printerror_item(src,'2');
	
	}
	else
	{
			
			$.ajax({
			type:"POST",
			url:basepath+"ajax_check_login.php",
			data:"emailAddress="+emailAddress+"&userPassword="+userPassword,
			
			success:function(data){
			
			if(data==1)
			{
				printerror_item(src,'50');
			}
			else if(data==2)
			{
				printerror_item(src,'51');
			}
			else if(data==3)
			{
				printerror_item(src,'52');
			}
			else
			{
				
				location.reload(true);
			}
			
			}
			});
	}
}

function calculate_mortgage()
{
	
	var loanAmount=$('#loanAmount').val();
	var rateInterest=$('#rateInterest').val();
	var loanTerms=$('#loanTerms').val();
	var datepicker=$('#datepicker').val();
	$.ajax({
			type:"POST",
			url:basepath+"ajax_calculate_mortgage.php",
			data:"loanAmount="+loanAmount+"&rateInterest="+rateInterest+"&loanTerms="+loanTerms+"&datepicker="+datepicker,
			success:function(data){
			document.getElementById('mrtgDiv').innerHTML=data;
			$('.mc-frame').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
	
	$('.mrtg-tbl p').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
			}
	});	
	
	
}

function cal_down()
{
	var homeValue=$('#homeValue').val();
	var downpayment=$('#downpayment').val();
	
	var loanAmount=homeValue-(homeValue*downpayment)/100;
	$('#loanAmount').val(loanAmount)
	
}
function isNumberKey(evt)
      {
	  
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 46 || charCode > 57))
            return false;

         return true;
      }
	  
function cal_down1()
{
	var loanAmount=parseFloat($('#loanAmount').val());
	var downpayment=parseFloat($('#downpayment').val());

	var homeValue=((100+downpayment)*loanAmount)/100;
	$('#homeValue').val(homeValue)
	
}	  