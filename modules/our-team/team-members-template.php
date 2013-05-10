<?php
/* Template Name: Our Team */
/**
 * The template used for displaying Team List
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
get_header();
?>
<div class="column-container">
	<div class="main" role="main">

	    <?php while (have_posts()) : the_post(); ?>
	
	        <?php get_template_part('content', 'page'); ?>
	
	    <?php endwhile; // end of the loop. ?>
	
	    <section>
	        <h2>Team Members</h2>
	      <?php query_posts(array('post_type' => 'our-team', 'posts_per_page' => -1,'orderby' => 'menu_order', 'order' => 'ASC'));
	        if (have_posts()):
	            ?>
	            <ul class="grid-wrap">
	                <?php while (have_posts()): the_post(); ?>
	                    <li class="gc d1-2">
							<div class="img-polaroid mbl">
								<a href="<?php echo get_permalink() ?>">
									<?php $post_thumbnail = tanlinell_get_post_thumb( $post->ID );?>
									<?php if($post_thumbnail){
									$post_thumbnail_sized = trailingslashit( get_stylesheet_directory_uri() ) . 'timthumb.php?src=' . $post_thumbnail[0] . '&q=80&w=296&h=300&zc=1';?>
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
						</li>
	            <?php endwhile; ?>
	            </ul>
	        <?php endif;
	        wp_reset_query();
	        ?>
	    </section>
        
	</div><!-- .main -->

	<div class="sub">
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>