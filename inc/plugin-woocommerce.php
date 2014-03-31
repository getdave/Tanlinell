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

define('WOOCOMMERCE_ACTIVE', true);


// Define WooCommerce support
add_theme_support( 'woocommerce' );


/**
 * REMOVE WOOCOMMERCE FRONTEND STYLES
 * http://docs.woothemes.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


/**
 * SHOP LOOP ITEMS
 * 
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


/**
 * MANIPULATE CART TABLE HTML
 * 
 * alter the core markup of the Cart table in order to break out the coupons and
 * call to actions from the main table. 
 */
add_action('woocommerce_before_cart_table','tanlinell_woocommerce_before_cart_table');
function tanlinell_woocommerce_before_cart_table() {
    $html =  '<div class="cart__contents scrollable">'; 
    $html .= '<div>';

    echo $html;
}


add_action('woocommerce_cart_contents','tanlinell_woocommerce_cart_contents');
function tanlinell_woocommerce_cart_contents() {
    $html =  '</tbody></table>'; // prematurely close the cart table because we don't want our "actions" area within a <table>
    $html .= '</div></div>'; // close our "scrollable" wrapper <div>'s
    $html .= '<table class="cart__actions"><tbody>'; // open a new table. We have to use a table because we have no control over the closing </table>

    echo $html;
}


add_filter( 'woocommerce_breadcrumb_defaults', 'tanlinell_woocommerce_breadcrumbs' );
function tanlinell_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => '<span class="sep">&#47;</span>',
        'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '<span>',
        'after'       => '</span>',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    );
}

