<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<?php get_template_part( 'templates/partials/pagetitle' ); ?>

	<div class="entry-content" itemprop="articleBody">
		<?php do_atomic('before_page_content'); ?>	
		<?php the_content(); ?>
		<?php do_atomic('after_page_content'); ?>	
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tanlinell' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
