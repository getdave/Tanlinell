/**
 * PLUGIN JS
 *
 * File containing all inititalisation of 3rd party JavaScript
 * plugins (eg: slideshows...etc).
 *
 * Custom JavaScript should not be placed in this file and should
 * instead be moved into "main.js" which is reserved for this purpose.
 *
 * Boilerplate initialisation code for common Plugins is provided
 * below for ease of use.
 *
 * If your Plugin is not required for use on all templates then it should
 * be contionally loaded on the appropriate template via Modernizr.load().
 * Boilerplate code (commented out) is provided below.
 *
 */


// Capture jQuery in noConflict mode and retranslate to $ alias
(function($, Tanlinell) {


	/**
	 * ! EXAMPLE PLUGIN BOILERPLATE !
	 *
	 * this Plugin is required on every page and therefore is placed within the
	 * vendor directly and always included in the site.min.js file
	 *
	 */
	/*
	(function() {
		$(document).ready(function(){
			$("")
		});
	}());
	*/

	/**
	 * ! EXAMPLE CONDITIONALLY LOADED PLUGIN BOILERPLATE !
	 *
	 * this Plugin is only required under specific conditions and should therefore
	 * not be loaded on every template. Update conditionals as required under "test"
	 * and include the file of your choice from the "conditionals" directory
	 */
	/*
	(function() {
		Modernizr.load({
			test: Tanlinell.utils.cutsTheMustard() && (Tanlinell.utils.activeMediaQuery() > 3),
			yep : [
				tanlinellSiteDetails.templateDirectoryUri + '/assets/js/conditional/my-conditionally-loaded-js-file.js'
				],
			complete: function(){
				if (jQuery().superfish) { // test for Plugin availability
					// Plugin initialisation code here
				}
			}
		});
	}());
	*/



	/**
	 * AFONTGARDE
	 *
	 * Robust patterns and rules for safe loading of Iconfonts
	 * Provides fine grain control over loading and presentation
	 *
	 * Read full docs at:
	 * https://github.com/filamentgroup/a-font-garde
	 */
	(function() {
		$(document).ready(function(){
			if (typeof AFontGarde !== "undefined") {
				new AFontGarde( 'icomoon', '\uE600\uE601\uE602\uE605' );
			}
		});
	}());



	/**
	 * SUPERFISH DROPDOWN MENUS
	 *
	 * enhanced Suckerfish-style menu
	 * takes an existing pure CSS drop-down menu and adds a range of additional
	 * features as shown on http://users.tpg.com.au/j_birch/plugins/superfish/
	 */
	(function() {
		Modernizr.load({
			test: Tanlinell.utils.cutsTheMustard() && (Tanlinell.utils.activeMediaQuery() > 3),
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
	 * MAGNIFIC POPUP/LIGHTBOX
	 * lightbox solution for various types of content
	 */
	/*
	(function() {
		Modernizr.load({
			test: $(".gallery").length && Tanlinell.utils.cutsTheMustard(),
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
	 * FITVIDS
	 *
	 * A lightweight, easy-to-use jQuery plugin for fluid width video embeds
	 * http://fitvidsjs.com/
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
	 * implement and activate a plethora of social sharing buttons
	 * in a manner that reduces social share buttons' impact on
	 * website performance
	 */
	/*
	(function() {
		Modernizr.load({
			test: Tanlinell.utils.cutsTheMustard() && (Tanlinell.utils.activeMediaQuery() > 3),
			yep : [
				tanlinellSiteDetails.templateDirectoryUri + '/assets/js/conditional/socialite/socialite.min.js'
				],
			complete: function(){
				if (typeof Socialite !== "undefined") {
					$('.social-actions').on("touchstart hover", function() {
						Socialite.load('.main');
					});
				};

			}
		});
	}());
	 */



}(jQuery, Tanlinell));