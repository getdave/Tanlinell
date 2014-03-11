/**
 * GLOBALS JS
 *
 * defines global namespace for the individual site
 * defines any constants required to be used throughout
 * the site
 *
 */


/**
 * GLOBAL NAMESPACE
 *
 * defines a global namespace for the website in order
 * to avoid poluting global scope with unecessary variables
 * all site specific properties and methods can hang from
 * this global namespace object.
 */
var SITE = SITE || {};



/**
 * CONSTANTS
 * 
 * define constants used across the entire site
 * @type {Object}
 */
SITE.CONSTANTS = {
	//EXAMPLE_CONSTANT: "example value"
};


/**
 * MODULES
 *
 * namespace container object for all custom site modules
 * modules are defined and registered to this object in
 * their respective files within the /modules/ dir
 * @type {Object}
 */
SITE.modules = {};






