<?php
/**
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'templates/partials/pagetitle', 'post' ); ?>

	<div class="entry-content">
		<?php
			$featured_image       =  tanlinell_get_post_thumb( $post->ID );

			if( $featured_image ) {
				$post_thumbnail_sized =  trailingslashit(get_stylesheet_directory_uri()) . 'timthumb.php?src=' . $featured_image[0] . '&q=80&h=140&zc=1';
			?>
			
			<img src="<?php echo $post_thumbnail_sized; ?>" class="img-thumb" />
			
			<?php }	?>
	
		
		<?php do_atomic('before_single_post_content'); ?>		
		<?php the_content(); ?>
		<?php do_atomic('after_single_post_content'); ?>		
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tanlinell' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'tanlinell' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! tanlinell_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'tanlinell' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'tanlinell' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'tanlinell' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'tanlinell' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'tanlinell' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
