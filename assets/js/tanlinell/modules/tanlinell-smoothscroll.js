/**
 * SMOOTH SCROLL
 *
 * Provides ability to smooth scroll to a DOM element
 */

(function(Tanlinell, $) {

	function SmoothScroll(el, options) {
		this.el = el;
		this.$el = $(el);

		this.settings = $.extend({
			targetEl: this.$el.data('smooth-scroll-target'),
			eventType: "click",
			duration: this.$el.data('smooth-scroll-duration') || 2000,
			animationOptions: {
				easing: this.$el.data('smooth-scroll-easing') || "swing"
			}
		}, options);

		this.$targetEl = $(this.settings.targetEl);

		this.setup();
	}

	SmoothScroll.prototype.setup = function() {

		// If target is not present in DOM then bail out
		if (!this._checkForTargetEle()) {
			return;
		}

		this.addListeners();
	};



	SmoothScroll.prototype.addListeners = function() {
		var _this = this;

		// This has to be directly bound else we end up with
		// issues when this.el is a selector representing a 
		// collection of elements
		this.$el.on(this.settings.eventType, function(e) {
			e.preventDefault();
			_this.scrollTo( _this.settings.targetEl, _this.$el, e );
		});
	};


	/**
	 * Scroll To
	 *
	 * scrolls the "window" to the passed target element
	 */
	SmoothScroll.prototype.scrollTo = function(targetEl, triggerEl, event) {
		var _this = this;
		var $targetEl = $(targetEl);
		var $triggerEl = $(triggerEl);
		var offset = this._calculateOffset($targetEl);

		// Mix required default animation options
		// with user defined options if provided
		var animationOptions = $.extend({
			scrollTop: offset,
			queue: false
		}, _this.settings.animationOptions);

		$('html, body').stop().animate(animationOptions, _this.settings.duration, function() {
			$.event.trigger({
				type: "tanlinell:smooth-scroll:complete",
				targetEl: $targetEl,
				triggerEl: $triggerEl
			});
		});
	};

	/**
	 * Calculate Offset
	 *
	 * determines the target elements top offset value relative to the document
	 * https://api.jquery.com/offset/
	 */
	SmoothScroll.prototype._calculateOffset = function($targetEL) {
		return $targetEL.offset().top;
	};

	/**
	 * Check For Target Element
	 *
	 * checks for prescence of target element in the DOM
	 * and returns boolean depending on result
	 */
	SmoothScroll.prototype._checkForTargetEle = function() {
		return !!this.$targetEl.length;
	};



	// Data API
	$("[data-smooth-scroll]").each(function() {
		var $this = $(this);

		// Check if this has been initialized
		if( $this.data('tanlinell-module-initialized') ) {
			return true;
		}

		// Mark as initialized
		$this.data('tanlinell-module-initialized', true);

		// Instantiate new SmoothScroll on this unique element
		new SmoothScroll( $this );
	});

	// Register Module
	Tanlinell.modules.SmoothScroll = SmoothScroll;


}(Tanlinell, jQuery));

