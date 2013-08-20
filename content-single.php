<?php
/**
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
	<?php get_template_part( 'templates/partials/pagetitle', 'post' ); ?>
	
	<?php		
		//get the alt text
		$featured_image_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
		if(empty($alt))
			if (get_the_title())
				$featured_image_alt = 'Image for '.get_the_title(); //defaults if none found
	?>
	<?php 
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	  the_post_thumbnail();
	} 
	?>
	
	
	
	
	
	<div class="entry-content" itemprop="articleBody">
		<?php do_atomic('before_single_post_content'); ?>
		<?php the_content(); ?>
		<?php do_atomic('after_single_post_content'); ?>
		<?php wp_link_pages( 
			array( 
				'before' 	=> '<div class="page-links">' . __( 'Pages:', 'tanlinell' ), 
				'after'	 	=> '</div>',
				'link_before'      => '<span class="pager__link">',
				'link_after'       => '</span>',	
			) 
		); ?>
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

	</footer><!-- .entry-meta -->
	
	<?php get_template_part( 'templates/partials/social', 'actions' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
