// JavaScript Document
$(document).ready(function() {
	if(typeof YOUTUBE_VIDEO_MARGIN == 'undefined') {
		YOUTUBE_VIDEO_MARGIN=5;
	}
	$('iframe').each(function(index,item) {
	
			var w=940;
			var h=600;
			var ar = h/w*100;
			ar=ar.toFixed(2);
			
			//Style iframe		
			$(item).css('position','absolute');
			$(item).css('top','0');
			$(item).css('left','0');		
			$(item).css('width','100%');
			//$(item).css('height','100%');
			$(item).css('max-width',w+'px');
			//$(item).css('max-height', h+'px');				
			$(item).wrap('<div style="max-width:'+w+'px;margin:0 auto; padding:0px;" />');
			$(item).wrap('<div style="position: relative;padding-bottom: '+ar+'%; overflow: hidden;" />');
		
	});
	

	
		//$('iframe').each(function(index,item) {
//		if($(item).attr('src').match(/\/\/player.vimeo.com\/video\//)) {
//			
//			var w=940;
//			var h=600;
//			var ar = h/w*100;
//			ar=ar.toFixed(2);
//			//Style iframe		
//			$(item).css('position','absolute');
//			$(item).css('top','0');
//			$(item).css('left','0');		
//			$(item).css('width','100%');
//			//$(item).css('height','100%');
//			$(item).css('max-width',w+'px');
//			//$(item).css('max-height', h+'px');				
//			$(item).wrap('<div style="max-width:'+w+'px;margin:0 auto; padding:0px;" />');
//			$(item).wrap('<div style="position: relative;padding-bottom: 5%; overflow: hidden;" />');
//		}
//	});
//	
	
});
