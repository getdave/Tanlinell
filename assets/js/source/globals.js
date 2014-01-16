/**
 * GLOBALS JS
 *
 * Define global namespace and attach utils
 *
 */

// Global namespace
var SITE = SITE || {};


/**
 * CONSTANTS
 * define constants used across the entire site
 * @type {Object}
 */
SITE.CONSTANTS = {

};


/**
 * UTILS
 * global utilities object for reusable util functions
 * @type {Object}
 */
SITE.utils = {

};

// Is this a "modern" browser?
SITE.utils.cutsTheMustard = (function() {
    if('querySelector' in document && 'localStorage' in window && 'addEventListener' in window) {
        return true;
    } else {
        return false;
    }
}());

// Is this a "modern" browser?
SITE.utils.isOperaMini = Object.prototype.toString.call(window.operamini) === "[object OperaMini]";





/**
 * Add Root Classes
 * function to add root classes to the HTML element
 */
SITE.utils.addRootClasses = (function() {
    if (SITE.utils.isOperaMini) {
        $("html").addClass('is-opera-mini');
    }

    if (SITE.utils.cutsTheMustard) {
        $("html").addClass('cuts-the-mustard');
    }
}());

