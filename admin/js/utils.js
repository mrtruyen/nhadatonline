function generate_url ( value_control , set_control )
{
	var str = value_control ;
	str = str.toLowerCase();
	str = str.replace ( /[^a-zA-Z0-9]+/g , "-" ) ;
	$('#'+set_control).val ( str ) ;
}
	
function copy_content ( source_control , destination_control_id )
{
	//if ( sub_string_number == 0 )
		$("#"+destination_control_id).val ( $(source_control).val ( ) ) ;
	//else
		//$("#"+destination_control_id).val ( $(source_control).val ( ).substr ( 0 , sub_string_number ) ) ;
		//alert ( "ddddd" ) ;
}

function formSubmit(formname)
{
	document.forms[formname].submit();	
}