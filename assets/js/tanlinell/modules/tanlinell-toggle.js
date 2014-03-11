/**
 * TOGGLE
 *
 * Creates a Toogle switch used for triggering the addition of
 * "active"-like classes to another targetted DOM element 
 * typically used to trigger visibility of expandable regions
 * such as toggleable menus. Works well when paired with a CSS
 * "expandable" module. Data API is provided.
 */

(function(Tanlinell, $) {

	function Toggle(el, options) {
		this.el = el;
		this.$el = $(el);

		this.settings = $.extend({
			eventType: "click",
			toggleTarget: this.$el.data('toggle-target'),
			classList: this.$el.data("toggle-classlist") || "is-active"
		}, options);

		this.$toggleTarget = $(this.settings.toggleTarget);

		this.setup();
	}

	Toggle.prototype.setup = function() {
		this.addListeners();
	};

	Toggle.prototype.addListeners = function() {
		var _this = this;

		$(document).on(this.settings.eventType, this.el, function(e) {
			e.preventDefault();
			_this.toggleIt( $(this), e );
		});
	};

	Toggle.prototype.toggleIt = function($ele,event) {

		this.$toggleTarget.toggleClass( this.settings.classList );
		$(event.currentTarget).toggleClass('toggle--active');
	};


	

	// Data API
	new Toggle("[data-toggle]");


	// Register Module
	Tanlinell.modules.Toggle = Toggle;


}(Tanlinell, jQuery));

