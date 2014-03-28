<?php
/**
 * The template for displaying the News listing page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>
<?php if ( !have_posts() && current_user_can( 'edit_posts' ) ) : ?>
	<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>
		
<?php if ( have_posts() ) : ?>
			
	<?php $post = get_page_by_title( 'News' ); ?>				
	<?php get_template_part( 'templates/page-header/pagetitle' ); ?>

	<ul class="article-list item-list">
	<?php while ( have_posts() ) : the_post(); ?>
		<li class="article-list__item list-item">
			
			<?php get_template_part( 'templates/content', get_post_format() ); ?>
			
			<a href="<?php the_permalink(); ?>" class="article-list__btn btn">Read More</a>
			
		</li>
	<?php endwhile; ?>
	</ul>
	<?php get_template_part('templates/navigation/pagination'); ?>
	
<?php endif; ?>

