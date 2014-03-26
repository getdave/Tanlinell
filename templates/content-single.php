<?php
/**
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */
?>
<?php while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
	<?php get_template_part( 'templates/partials/pagetitle', 'post' ); ?>
	
	<?php get_template_part( 'templates/partials/post-thumbnail'); ?>
		
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
<?php endwhile; ?>