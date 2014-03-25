<?php
/**
 * The main template file.
 *
 * @package Tanlinell
 * @since Tanlinell 3.0.0
 */
?>
<?php get_template_part('templates/page', 'header'); ?>

<?php if ( !have_posts() && current_user_can( 'edit_posts' ) ) : ?>
	<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>

<?php if ( have_posts() ) : ?>
	<ul class="article-list item-list">
	<?php while ( have_posts() ) : the_post(); ?>
		<li class="article-list_item list-item">
		
			<?php get_template_part( 'templates/content', get_post_format() ); ?>
		
			<a href="<?php the_permalink(); ?>" class="article-list__btn btn">Read More</a>
		
		</li>
	<?php endwhile; ?>
	</ul>

	<?php get_template_part('templates/navigation/pagination'); ?>
<?php endif; ?>