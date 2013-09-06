<?php
/**
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
	<?php get_template_part( 'templates/partials/pagetitle', 'post' ); ?>

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

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'tanlinell' ) );
				if ( $categories_list && tanlinell_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'tanlinell' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'tanlinell' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'tanlinell' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'tanlinell' ), __( '1 Comment', 'tanlinell' ), __( '% Comments', 'tanlinell' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'tanlinell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
