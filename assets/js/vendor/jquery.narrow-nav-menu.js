(function($) {

	$.fn.narrowNavMenu = function(options) {
		// Default settings
		var settings = {
			wrapperClass: 'nav-menu-narrow', // Class name added to the inserted wrapper element
			expandedClass: 'expanded', // Class name added to the wrapper when the menu is expanded
			menuText: 'Menu', // The button's visible text
			showText: 'show', // Text (visually hidden) that is added to the button when the menu is closed
			hideText: 'hide' // Text (visually hidden) that is added to the button when the menu is open
		};

		var binding = (('ontouchstart' in window) || (window.DocumentTouch && document instanceof DocumentTouch)) ? 'touchstart' : 'click';

		return this.each(function () {

			if (options) {
				$.extend(settings, options);
			}

			var $this = $(this);

			// Insert the target element into a wrapper element
			$this.wrap('<div class="' + settings.wrapperClass + '" />');
			var wrap = $this.parent();

			// Create and insert the button before the menu
			var $button = $('<button type="button"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>');
			$button.on(binding,function () {
				if (wrap.hasClass(settings.expandedClass)) {
					hideMenu();
				} else {
					showMenu();
				}
			});
			$button.insertBefore($this);

			// Show the menu
			function showMenu() {
				wrap.addClass(settings.expandedClass);
				// Update button text
				//$button.find('span').text(' (' + settings.hideText + ')');
				// Close the menu and put focus on the button when ESC is pressed
				// The event handler is namespaced to avoid conflicts with other scripts (though unlikely in this case)
				wrap.bind('keydown.narrowNavMenu', function (e) {
					if (e.keyCode == 27) {
						hideMenu();
						$button.focus();
					}
				});
			}

			// Hide the menu
			function hideMenu() {
				wrap.removeClass(settings.expandedClass);
				// Update button text
				//$button.find('span').text(' (' + settings.showText + ')');
				// Remove the keyboard event handler
				wrap.unbind('.narrowNavMenu');
			}

		});
	};

})(jQuery);