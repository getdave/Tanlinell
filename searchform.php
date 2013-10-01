<?php
/**
 * The template for displaying search forms in Tanlinell
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>
	<form id="site-search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="search-form__label"><?php _e( 'Search', 'tanlinell' ); ?></label>
		<input type="search" class="search-form__query" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'tanlinell' ); ?>" />
		<input type="submit" class="search-form__submit" name="submit" value="<?php esc_attr_e( 'Search', 'tanlinell' ); ?>" />
	</form>


	