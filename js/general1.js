
function validation()
{
	 $('#Send').click(function() {  
	 	
			// name validation
			/*var nameVal = $("#name").val();
			if(nameVal == '') {
				$("#name_error").html('');
				$("#printmssg").html('<font color="RED">Please enter your name.</font>');
				return false
			}
			else
			{
				$("#name_error").html('');
			}*/
			/// email validation
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var emailaddressVal = $("#email").val();
			if(emailaddressVal == '') {
				$("#email_error").html('');
				$("#printmssg").html('<font color="RED">Please enter your email address.</font>');
				return false
			}
			else if(!emailReg.test(emailaddressVal)) {
				$("#email_error").html('');
				$("#printmssg").html('<font color="RED">Enter a valid email address.</font>');
				return false
			}
			else
			{
				change_captcha();
				clear_form1();
				$("#email_error").html('');
			}
			$.post("post.php?"+$("#MYFORM").serialize(), {
	}, function(response){
			if(response==1)
			{
				$("#after_submit").html('');
				$("#printmssg").html('<font color="GREEN">Your Password Is been Send to Your Email Id.</font>');
				/*CALL YOUR AJAX HERE*/
				
				$.ajax({
						type:"POST",
						url:basepath+"ajax_sendforgotpassword.php",
						data:"emailaddressVal="+emailaddressVal,
						success:function(data){
						
						
						}
						});
				
				change_captcha();
				clear_form();
			}
			else
			{
				$("#after_submit").html('');
				$("#printmssg").html('<font color="RED">Error ! invalid captcha code .</font>');
			}
		});
		return false;
	 });
	 // refresh captcha
	 $('img#refresh').click(function() {  
			document.getElementById("code").value="";
			change_captcha();
	 });
	 function change_captcha()
	 {
	 	document.getElementById('captcha').src="get_captcha.php?rnd=" + Math.random();
	 }
	 function clear_form()
	 {
	 	$("#name").val('');
		$("#email").val('');
		$("#message").val('');
	 }
	 function clear_form1()
	 {
	 	$("#name").val('');
		$("#message").val('');
	 }
}