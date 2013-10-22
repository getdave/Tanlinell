<?php
/**
 * WOOCOMMERCE CUSTOMISATION
 * 
 * Custom filters and hooks for integration with WooCommerce
 * 
 */

// Check if WooCommerce is active
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	return;
}


// Define WooCommerce support
add_theme_support( 'woocommerce' );


/**
 * WOOCOMMERCE WRAPPERS
 * defines the wrapper markup for WooCommerce templates
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'tanlinell_wrapper_start', 10);
function tanlinell_wrapper_start() {
	if ( is_product() ) {
		echo '<div class="layout-1c column-container">';
	} else {
		echo '<div class="column-container">';
	}

	echo '<div class="main">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'tanlinell_wrapper_end', 10);
function tanlinell_wrapper_end() {
  echo '</div>';
}



/**
 * SHOP LOOP ITEMS
 * amend markup of the loop for the Shop listing template
 */

add_action('woocommerce_before_shop_loop_item','tanlinell_woocommerce_before_shop_loop_item');
function tanlinell_woocommerce_before_shop_loop_item() {
	echo '<div class="product__info">';
}

add_action('woocommerce_after_shop_loop_item','tanlinell_woocommerce_after_shop_loop_item', 1);
function tanlinell_woocommerce_after_shop_loop_item() {
	echo '</div>';
}


