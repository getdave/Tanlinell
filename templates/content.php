<?php
/**
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
	<?php get_template_part( 'templates/page-header/pagetitle', 'post' ); ?>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php elseif ( !is_single() ) : // Custom output for home.php i.e. blog home ?>
	
		<?php if( has_excerpt() ) : ?>
			<?php the_excerpt(); ?>
		<?php else: ?>
			<p><?php tanlinell_truncate_posts( 30, false ); ?></p>			
		<?php endif; ?>
	
	<?php else : ?>
	<div class="entry-content" itemprop="description">
		<?php do_atomic('before_post_content'); ?>		
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'tanlinell' ) ); ?>
		<?php do_atomic('after_post_content'); ?>		
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tanlinell' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	
</article><!-- #post-<?php the_ID(); ?> -->