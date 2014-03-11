/* global */

/**
 * __EXAMPLE_MODULE_NAME__
 *
 * describe your module here
 * add any global vars created by your module(eg: Google Maps) 
 * to the JSHint config global comment at the top of this file
 */

(function($, Tanlinell) {
	var _MyExampleModule = function(el, options) {

		// Instance variables
		this.el              = el;
		this.$el             = $( this.el );

		// Options and Settings
		this.settings = $.extend({
			// default values here
		}, options);

		// Initialise
		this.init();
	};

	/**
	 * Initialize
	 * @return {[type]} [description]
	 */
	_MyExampleModule.prototype.init = function() {
		// kick things off here
		console.log("Module running!");
	};



	// Register Module with global modules object
	SITE.modules._MyExampleModule = _MyExampleModule;

}(jQuery, Tanlinell));



