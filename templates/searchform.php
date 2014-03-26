<?php
/**
 * The template for displaying search forms in Tanlinell
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>
<form id="site-search" method="get" class="site-search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="x-search-form__label infield-label"><?php _e( 'Search', 'tanlinell' ); ?></label>
	<input type="search" class="search-form__query" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" autocomplete="false" />
	<button type="submit" class="search-form__submit" name="submit" value="Search">
		<span class="icon-fallback-text">
		    <i class="icon icon-search" aria-hidden="true"></i>
		    <span class="search-form__submit-text text">Search</span>
		</span>
	</button>
</form>