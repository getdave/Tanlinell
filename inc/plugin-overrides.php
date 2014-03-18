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
function tanlinell_form_submit_button ( $button, $form ) {	
	
	if( false !== strpos( $form['cssClass'], 'download-form' ) ) {
		/**
		 * Requires a class of download form in form settings 
		 */
		$button = '<button class="button gform_button btn btn-full btn--append btn--primary" id="gform_submit_button_'.$form["id"].'">
	       <span class="btn__text">Request Download</span>
	        <i class="btn__icon btn__icon--arrow icon icon-arrow-down2" aria-hidden="true"></i>
		</button>';
	} elseif( false !== strpos( $form['cssClass'], 'form-register' ) ) {
		$button = '<button class="button gform_button btn btn-full btn--tertiary" id="gform_submit_button_'.$form["id"].'">
			<span class="btn__text">'.$form['button']['text'].'</span>
		</button>';
	} else {
		$button = '<button class="button gform_button btn btn-full btn--primary" id="gform_submit_button_'.$form["id"].'">
			<span class="btn__text">'.$form['button']['text'].'</span>
		</button>';	
	}
	
    return $button;
}
add_filter( 'gform_submit_button', 'tanlinell_form_submit_button', 10, 2 );


/**
 * Append the form label to the class for all forms 
 */
function tanlinell_custom_field_class ( $classes, $field, $form ) {
	
	$classes .= " " . sanitize_title($field['label']);
    
    return $classes;
}
add_action( 'gform_field_css_class', 'tanlinell_custom_field_class', 10, 3 );


/**
 * Alter label for address fields to be more meaningful for audience 
 */
function tanlinell_address_field_label ($addressTypes, $formID) {
	$addressTypes['international']['zip_label'] = 'Post Code';
	$addressTypes['international']['state_label'] = 'County';
	return $addressTypes;
}
add_filter('gform_address_types', 'tanlinell_address_field_label', 10, 2);
?>