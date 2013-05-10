<?php
/**
 * The Template for displaying our-team items.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>


<div class="column-container">
	<div class="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

				<div class="img-polaroid mbl">
					<a href="<?php echo get_permalink() ?>">
						<?php $post_thumbnail = tanlinell_get_post_thumb( $post->ID );?>
						<?php if($post_thumbnail){
						$post_thumbnail_sized = trailingslashit( get_stylesheet_directory_uri() ) . 'timthumb.php?src=' . $post_thumbnail[0] . '&q=80&w=300&h=300&zc=1';?>
						<img src="<?php echo $post_thumbnail_sized; ?>" alt="" style="">
						<?php }?>
					</a>
				</div>
				<h3 class="h4">
					<a href="<?php echo get_permalink() ?>">
						<?php the_title() ?>
					</a>
				</h3>
			   <?php the_content(); ?>

			<?php tanlinell_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true );
			?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- .main -->

	<div class="sub">
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>