/**
 * PLUGIN JS
 *
 * This file contains all simple JS to init JavaScript plugins
 * For example you might initialise your slideshow from this.
 *
 * I'd advise avoiding coding custom JS in this file. That's 
 * what main.js is for...
 * 
 */

// Capture jQuery in noConflict mode and retranslate to $ alias
(function($) {


	/**
	 * %%MY_PLUGIN%%
	 *
	 * %%PLUGIN_DESCRIPTION%%
	 * 
	 */

	$(document).ready(function(){
		//$("")
	});



	/**
	 * NARROW MENU
	 *
	 * Initialise the Narrow menu for small screen navs
	 */
	$(document).ready(function(){
		$("#nav-primary").narrowNavMenu();
	});



	/**
	 * SuperFish Menus
	 *
	 * Loads Superfish menus and intialises
	 * only if on suitably large screen
	 * device. Not perfect but ....
	 */
	
	(function() {
		Modernizr.load({
			test: Modernizr.mq('only screen and (min-width: 62em)'),
			yep : [
				tanlinell_site_details.template_directory_uri + '/assets/js/conditional/jquery.hoverIntent.js',
				tanlinell_site_details.template_directory_uri + '/assets/js/conditional/superfish/superfish.js'				
				],
			complete: function(){
				if (jQuery().superfish) {
					jQuery('#nav-primary').superfish({
						speed:		250, 
						speedOut:	100,
						delay:		250,
						animation:	{
							opacity:'show',
							height:'show'
						}	
					});
				}
			}
		});
	}());



	/**
	 * SOCIALITE
	 *
	 * Loads socialite and required social network extensions
	 * when required by page
	 * 
	 */
	
	/* (function() {
		Modernizr.load({
			test: 1,
			yep : [
				tplUri + '/assets/js/conditional/socialite/socialite.min.js'
				],
			complete: function(){
				$('.social-actions').on("hover", function() {
					Socialite.load();
				});
				
			}
		});
	}()); */


}(jQuery));