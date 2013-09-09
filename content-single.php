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

	<section class="entry-social-actions">
		<?php get_template_part( 'templates/partials/social', 'actions' ); ?>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
