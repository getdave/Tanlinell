<?php
if ( ! function_exists( 'tanlinell_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Tanlinell 1.0
 */
function tanlinell_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = 'pager paging-navigation';
	if ( is_single() )
		$nav_class = 'pager post-navigation';

	?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="pager__item pager__item--prev">%link</div>', '<span class="pager__arrow">' . _x( '&larr;', 'Previous post link', 'tanlinell' ) . '</span> Previous' ); ?>
		<?php next_post_link( '<div class="pager__item pager__item--next">%link</div>', 'Next <span class="pager__arrow">' . _x( '&rarr;', 'Next post link', 'tanlinell' ) . '</span>' ); ?>
		
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="pager__item pager__item--prev"><?php next_posts_link( __( '<span class="pager__arrow">&larr;</span> Older posts', 'tanlinell' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="pager__item pager__item--next"><?php previous_posts_link( __( 'Newer posts <span class="pager__arrow">&rarr;</span>', 'tanlinell' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // tanlinell_content_nav

