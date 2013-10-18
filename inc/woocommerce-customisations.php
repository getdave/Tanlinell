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




			add_action('woocommerce_before_cart_table','tanlinell_woocommerce_before_cart_table');
			function tanlinell_woocommerce_before_cart_table() {
				echo '<div class="cart__contents scrollable"><div>';
			}


			add_action('woocommerce_after_cart_table','tanlinell_woocommerce_after_cart_table');
			function tanlinell_woocommerce_after_cart_table() {
				echo '</div></div>';
			}


			add_action('woocommerce_cart_contents','tanlinell_woocommerce_cart_contents');
			function tanlinell_woocommerce_cart_contents() {
				echo '</tbody></table></div></div><table class="cart__actions">';
			}


			