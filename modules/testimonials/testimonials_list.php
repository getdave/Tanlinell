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
	<div class="main d1-1" role="main">

	    <section>
	    
		    <?php while (have_posts()) : the_post(); ?>
		
		        <?php get_template_part('content', 'page'); ?>
		
		    <?php endwhile; // end of the loop. ?>
	    	
		</section>
		
	    <section>

			<?php 
			$args = array(
						'post_type' => 'testimonials',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC'
						);
			$posts = new WP_Query($args);	
			
			//get client connections for testimonials
			p2p_type( 'testimonial_to_client' )->each_connected( $posts );
			
			if ($posts->have_posts()):
			?>
            <ul class="grid-wrap">
				
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<li class="gc d1-2">
						<?php							
							$post_thumbnail_sized	=  tanlinell_get_post_thumb( $post->ID , array( 'width' => 844, 'height' => 494, 'crop' => true, 'resize' => true ));							
							
							//get the alt text
							$featured_image_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
							if(empty($featured_image_alt))
								$featured_image_alt = 'Image for '.ucwords(get_the_title()); //defaults if none found							
						?>
					
						<div class="grid-wrap gc">
							<div class="img-polaroid gc mbl d1-4 h1-2">
								<a href="<?php echo get_permalink() ?>">
									<img src="<?php echo $post_thumbnail_sized[0]; ?>" alt="<?php echo $featured_image_alt; ?>">
								</a>
							</div>
							<div class="gc d3-4 h1-2">
								
								<h3><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>
								
								
								<?php the_excerpt(); ?>
								
								<a href="<?php echo get_permalink() ?>">Read More</a>
								
								<?php		
								//output connected clients					
								foreach ( $post->connected as $post ) : setup_postdata( $post );
								?>
									<h6>Provided by: <a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h6>
								<?php
								endforeach;
								?>
								
						   </div>
						</div>
					</li>
				<?php endwhile; // end of the loop. ?>
				
            </ul>
	        <?php 
	        endif;
	        wp_reset_postdata();
	        ?>
	    </section>
        
	</div><!-- .main -->

	<div class="sub">
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>