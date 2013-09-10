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
				tanlinellSiteDetails.templateDirectoryUri + '/assets/js/conditional/jquery.hoverIntent.js',
				tanlinellSiteDetails.templateDirectoryUri + '/assets/js/conditional/superfish/superfish.js'
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
	 * NARROW MENU
	 *
	 * Initialise the Narrow menu for small screen navs
	 */
	/* $(document).ready(function(){
		$("#nav-primary").narrowNavMenu();
	}); */



	/**
	 * MAGNIFIC POPUP/LIGHTBOX
	 * lightbox solution for various types of content
	 */
	/*
	(function() {
		Modernizr.load({
			test: $(".gallery").length,
			yep : [
				tanlinellSiteDetails.templateDirectoryUri + '/assets/js/conditional/magnific.min.js'
				],
			complete: function(){
				if (jQuery().magnificPopup) {
					$(document).ready(function(){
						// Target your .container, .wrapper, .post, etc.
						$(".gallery").magnificPopup({
							type: 'image',
							gallery:{enabled:true},
							delegate: 'a'
						});
					});
				}
			}
		});
	}());




	/**
	 * FitVids
	 *
	 * Loads FitVids only when there are videos on the page rather than
	 * for no reason
	 */

	/* (function() {
		Modernizr.load({
			test: $(".format-video"),
			yep : [
				tanlinellSiteDetails.templateDirectoryUri + '/assets/js/conditional/jquery.fitvids.min.js'
				],
			complete: function(){
				if (jQuery().fitVids) {
					$(document).ready(function(){
						// Target your .container, .wrapper, .post, etc.
						$(".format-video").fitVids();
					});
				}
			}
		});
	}()); */





	/**
	 * SOCIALITE
	 *
	 * Loads socialite and required social network extensions
	 * when required by page
	 *
	 */
	/*
	(function() {
		Modernizr.load({
			test: 1,
			yep : [
				tanlinellSiteDetails.templateDirectoryUri + '/assets/js/conditional/socialite/socialite.min.js'
				],
			complete: function(){
				$('.social-actions').on("touchstart hover", function() {
					Socialite.load('.main');
				});

			}
		});
	}());
	 */




}(jQuery));