<?php
/**
 * Template Name: Service Type -> Categories
 * The template for displaying categories.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
get_header(); ?>
	
	<header class="title-block entry-header">
		<h1 class="title-block__heading entry-title">
			<?php single_term_title(); ?>
		</h1>
		<?php if ( $page_subtitle ) : ?>
		<p class="page-subtitle"><?php echo $page_subtitle ?></p>
		<?php endif; ?>	
	</header>
	
	<section class="featured-content content-area">
		<h4>Services in this Category</h4>
		
		<?php
		$term = get_term_by('name', single_term_title( '', false ), 'service_types');
		?>
		
		
			<?php 
			$args = array(
						'post_type' => 'services',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'service_types',
								'field' => 'term_id',
								'terms' => $term->term_id
							)
						),
						'order' => 'ASC'
						);
			$posts = new WP_Query($args);	
			if ($posts->have_posts()):
			?>
            <ul class="grid-wrap">
				
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

					<li class="gc d1-2 l1-1">
						<?php
							$post_thumbnail_sized	=  tanlinell_get_post_thumb( $post->ID , array( 'width' => 844, 'height' => 494, 'crop' => true, 'resize' => true ));							
							
							//get the alt text
							$featured_image_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
							if(empty($featured_image_alt))
								$featured_image_alt = 'Image for '.ucwords(get_the_title()); //defaults if none found
							
											
							$categories = wp_get_post_terms($post->ID, 'service_types', array("fields" => "slugs"));
							
						?>
					
						<div class="grid-wrap gc">
							<div class="img-polaroid gc mbl d2-4 l1-3 h1-3">
								<a href="<?php echo get_permalink() ?>">
									<img src="<?php echo $post_thumbnail_sized[0]; ?>" alt="<?php echo $featured_image_alt; ?>">
								</a>
							</div>
							<div class="gc d2-4 l2-3 h2-3">
								
								<h3><a href="<?php echo get_permalink() ?>"><?php echo ucwords(get_the_title()); ?></a></h3>
								
								<h5>
								<?php
								foreach($categories AS $slug) :
								$term = get_term_by('slug', $slug, 'service_types')
								?>
								<a href="<?php echo get_term_link($term->slug,'service_types');?>"><?php echo $term->name; ?></a>								
								<?php endforeach; ?>
								</h5>
								
								<?php the_excerpt(); ?>
								
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
	
		


<?php get_footer(); ?>