/**
 * PLUGIN JS
 *
 * This file contains all simple JS to init JavaScript plugins
 * For example you might initialise your slideshow from this.
 *
 * I'd advise avoiding coding custom JS in this file. That's 
 * what main.js is for...
 * 
 */// Capture jQuery in noConflict mode and retranslate to $ alias
(function(e){e(document).ready(function(){});e(document).ready(function(){e("#nav-primary").narrowNavMenu()});(function(){Modernizr.load({test:Modernizr.mq("only screen and (min-width: 62em)"),yep:[tanlinell_site_details.template_directory_uri+"/assets/js/conditional/jquery.hoverIntent.js",tanlinell_site_details.template_directory_uri+"/assets/js/conditional/superfish/superfish.js"],complete:function(){jQuery().superfish&&jQuery("#nav-primary").superfish({speed:250,speedOut:100,delay:250,animation:{opacity:"show",height:"show"}})}})})()})(jQuery);