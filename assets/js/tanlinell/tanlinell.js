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
		this.$doc = $(document);
		this.$root = $(":root");
		this.$body = $("body");

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
		 * Dictionary
		 * creates a bullet-proof Dictionary object for 
		 * mapping strings to values and retrieving them
		 * from the object,
		 */
		Dictionary: (function() {
			var Dictionary = function(startValues) {
				this.values = startValues || {};
			};

			Dictionary.prototype.store = function(name, value) {
				this.values[name] = value;
			};

			Dictionary.prototype.lookup = function(name) {
				return this.values[name];
			};

			Dictionary.prototype.contains = function(name) {
				return Object.prototype.hasOwnProperty.call(this.values, name) && Object.prototype.propertyIsEnumerable.call(this.values, name);
			};

			return Dictionary;
		}()),


		/**
		 * Cuts The Mustard
		 *
		 * gauges "modern" browser status based on test for common standards
		 * borrowed from http://responsivenews.co.uk/post/18948466399/cutting-the-mustard
		 */
		cutsTheMustard: function() {
			var cutsTheMustard = (function() {
				if('querySelector' in document && 'localStorage' in window && 'addEventListener' in window) {
					return true;
				} else {
					return false;
				}
			}());

			return cutsTheMustard;
		},

		/**
		 * isOperaMini
		 *
		 * determines whether the current browser is Opera Mini
		 * device sniffing is generally discouraged so this should only be used
		 * as an absolute last resort for working around issues
		 */
		isOperaMini: function() {
			var isOperaMini = Object.prototype.toString.call(window.operamini) === "[object OperaMini]";
			return isOperaMini;
		},


		/**
		 * Active Media Query
		 *
		 * get currently acitve MQ from CSS on html
		 * element's font-family. Return as an integar
		 * for Math based comparison. Based on original
		 * concept:
		 * http://adactio.com/journal/5429/
		 */
		activeMediaQuery: function() {
			var mqString, breakPoints, rtn;

			breakPoints = new this.Dictionary({
				none: 1,
				tiny: 2,
				small: 3,
				medium: 4,
				large: 5,
				xlarge: 6
			});

			mqString = $(":root").css("font-family");
			rtn = breakPoints.lookup(mqString);

			return rtn;
		}

	};


	// Kick off Tanlinell
	window.Tanlinell = new Tanlinell();
}(jQuery));