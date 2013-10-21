<?php
/**
 * WOOCOMMERCE CUSTOMISATION
 * 
 * Custom filters and hooks for integration with WooCommerce
 * 
 */

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {

			
			add_action('woocommerce_before_shop_loop_item','tanlinell_woocommerce_before_shop_loop_item');

			function tanlinell_woocommerce_before_shop_loop_item() {
				echo '<div class="product__info">';
			}

			add_action('woocommerce_after_shop_loop_item','tanlinell_woocommerce_after_shop_loop_item', 1);

			function tanlinell_woocommerce_after_shop_loop_item() {
				echo '</div>';
			}
		}
	}	
}

	
/**
* Register support by theme and output woocommerce content wrapper
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
echo '<div class="woocommerce__main">';
}

function my_theme_wrapper_end() {
echo '</div>';
}
add_theme_support( 'woocommerce' );
