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
	var Tanlinell = function() {
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
	 * INIT
	 * kicks things off and initializes framework
	 */
    Tanlinell.prototype.init = function() {


    	// Add classes to root element
    	if ( this.utils.isOperaMini() ) {
	        this.$root.addClass('is-opera-mini');
	    }

	    if ( this.utils.cutsTheMustard() ) {
	        this.$root.addClass('cuts-the-mustard');
	    }

    };



	/**
	 * UTILS OBJECT
	 *
	 * primary utility object for the framework housing methods
	 * used by the framework's modules
	 */
	Tanlinell.prototype.utils = {

		/**
		 * Cuts The Mustard
		 *
		 * gauges "modern" browser status based on test for common standards
		 * borrowed from http://responsivenews.co.uk/post/18948466399/cutting-the-mustard
		 */
		cutsTheMustard: function() {
			 if('querySelector' in document && 'localStorage' in window && 'addEventListener' in window) {
		        return true;
		    } else {
		        return false;
		    }
		},

		/**
		 * isOperaMini
		 *
		 * determines whether the current browser is Opera Mini
		 * device sniffing is generally discouraged so this should only be used
		 * as an absolute last resort for working around issues
		 */
		isOperaMini: function() {
			return Object.prototype.toString.call(window.operamini) === "[object OperaMini]";
		}
	};


	// Kick off Tanlinell
	window.Tanlinell = new Tanlinell();
}(jQuery));