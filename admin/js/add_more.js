function clickbutton() {
	 var instertable = $('#replicateme tr:first').html();
	
	 $('#replicateme').append('<tr>'+instertable+'</tr>');
	 var index=0;
	 var index = $('#replicateme  tr').length;
	 index=index-1;
	

	

 
	 
}

function clickbutton_general(DivID) {
	 var instertable = $('#'+DivID+' tr:first').html();
	
	 $('#'+DivID).append('<tr>'+instertable+'</tr>');
	 var index=0;
	 var index = $('#'+DivID+'  tr').length;
	 index=index-1;
 
	 
}