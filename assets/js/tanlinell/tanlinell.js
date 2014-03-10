/**
 * GLOBALS JS
 *
 * Define global namespace and attach utils
 *
 */

(function($) {

	/**
	 * Tanlinell Class Constructor
	 */
	function Tanlinell() {
		this.$doc 	= $(document);
		this.$root 	= $(":root");

		

		 // Initialise
        this.init();
	};

	/**
	 * Namespaces
	 *
	 * declare standard namespaces
	 */
	// Utils - common helper methods
	Tanlinell.prototype.utils = {};

	// Helpers - internal helper methods for Tanlinell init
	Tanlinell.prototype._helpers = {};


	// Modules - distinct reusable modules
	Tanlinell.prototype.modules = {};


	/**
	 * Cuts The Mustard
	 *
	 * gauges "modern" browser status based on test for common standards
	 * borrowed from http://responsivenews.co.uk/post/18948466399/cutting-the-mustard
	 */
	Tanlinell.prototype.utils.cutsTheMustard = function() {
		 if('querySelector' in document && 'localStorage' in window && 'addEventListener' in window) {
	        return true;
	    } else {
	        return false;
	    }
	};

	/**
	 * isOperaMini
	 *
	 * determines whether the current browser is Opera Mini
	 * device sniffing is generally discouraged so this should only be used
	 * as an absolute last resort for working around issues
	 */
	Tanlinell.prototype.utils.isOperaMini = function() {
		return Object.prototype.toString.call(window.operamini) === "[object OperaMini]";
	};





	/**
	 * Add Root Classes
	 *
	 * adds classes to root element to signal support for various
	 * additional criteria
	 */
	Tanlinell.prototype._helpers.addRootClasses = function() {
		console.log(Tanlinell.utils.cutsTheMustard());
	    /* if (this.utils.cutsTheMustard()) {
	    	        $("html").addClass('is-opera-mini');
	    	    } */

	    /* if (this.utils.isOperaMini()) {
	    	        $("html").addClass('cuts-the-mustard');
	    	    } */
	};





		
	Tanlinell.prototype.init = function() {
		this._helpers.addRootClasses();
	};






	// Kick off Tanlinell
	window.Tanlinell = new Tanlinell();
}(jQuery));