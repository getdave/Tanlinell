<?php
/**
 * Plugin Overrides
 * 
 * custom plugin overides
 * @package Tanlinell
 * @since Tanlinell 2.2
 */
 
/**
 * Remove Table Press Default CSS
 */
add_filter( 'tablepress_use_default_css', '__return_false' );


/**
 * Filter the Gravity Forms button type to provide custom markup
 * 
 * Download button markup requires class provided in form settings
 */
function form_submit_button($button, $form){	
	
	if( false !== strpos( $form['cssClass'], 'download-form' ) ) {
		/**
		 * Requires a class of download form in form settings 
		 */
		$button = '<button class="button gform_button btn btn-full btn--append btn--primary" id="gform_submit_button_'.$form["id"].'">
	       <span class="btn__text">Request Download</span>
	        <i class="btn__icon btn__icon--arrow icon icon-arrow-down2" aria-hidden="true"></i>
		</button>';
	} else {
		$button = '<button class="button gform_button btn btn-full btn--primary" id="gform_submit_button_'.$form["id"].'">
			<span class="btn__text">'.$form['button']['text'].'</span>
		</button>';	
	}
	
    return $button;
}
add_filter("gform_submit_button", "form_submit_button", 10, 2);
?>