jQuery( document ).ready( function( $ ) {
	
	/**
	 * 	Tabbed content shortcode
	 */
	
	$(".tanlinell-tabs-control li a").each(function(i){
		var idx = i + 1; 							 
		$(this).attr("href","#tab"+idx)	;							 
	});

	//box-content
	$(".box-tabbed-content div").each(function(i){
		var idx = i + 1; 							 
		$(this).attr("id","tab"+idx)	;							 
	});

	 $('.featured_tabs').tabs();
	
});