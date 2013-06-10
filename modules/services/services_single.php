<?php
/**
 * The Template for displaying our-team items.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>


<div class="column-container">
	<div class="main d1-1" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php
				$post_thumbnail_sized	=  tanlinell_get_post_thumb( $post->ID , array( 'width' => 844, 'height' => 494, 'crop' => true, 'resize' => true ));							
				
				//get the alt text
				$featured_image_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
				if(empty($featured_image_alt))
					$featured_image_alt = 'Image for '.ucwords(get_the_title()); //defaults if none found
				
								
				$categories = wp_get_post_terms($post->ID, 'service_types', array("fields" => "slugs"));
				
			?>
		
			<div class="grid-wrap">
				<div class="gc d1-3">
					<div class="mbl img-polaroid">
						<img src="<?php echo $post_thumbnail_sized[0]; ?>" alt="<?php echo $featured_image_alt; ?>">
					</div>
					
					<?php
						//get client connections for services
						$connected = new WP_Query( array(
						  'connected_type' => 'clients_to_services',
						  'connected_items' => get_queried_object(),
						  'nopaging' => true,
						) );
					
					// Display connected pages
					if ( $connected->have_posts() ) :
						echo '<h6>Clients of this service:</h6>';
						echo '<ul>';
						
						while ( $connected->have_posts() ) : $connected->the_post(); 
					?>
							<li><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></li>
					<?php 
						endwhile;
						
						echo '</ul>';
						// Prevent weirdness
						wp_reset_postdata();					
					endif;
					?>
				</div>
				
				<div class="gc d2-3">
					
					<h1><?php echo ucwords(get_the_title()); ?></h1>
					
					<h5>
					<?php
					foreach($categories AS $slug) :
					$term = get_term_by('slug', $slug, 'service_types')
					?>
					<a href="<?php echo get_term_link($term->slug,'service_types');?>"><?php echo $term->name; ?></a>								
					<?php endforeach; ?>
					</h5>
					
					<h4><?php the_excerpt(); ?></h4>
					
					<?php the_content(); ?>
										
			   </div>
			</div>
			
		<?php endwhile; // end of the loop. ?>
		
		<?php tanlinell_content_nav( 'nav-below' ); ?>
		
	</div><!-- .main -->

	<div class="sub">
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>