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
			query_posts(array(
							'post_type' => 'clients',
							'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC'
							)
						);
			if (have_posts()):
			?>
            <ul class="grid-wrap">
				
				<?php while ( have_posts() ) : the_post(); ?>
					<li class="gc d1-2">
						<?php
							//setup the custom meta object
							global $clients_metabox;
							
							// get the meta data for the current post
							$clients_metabox->the_meta();
							
										
							//link meta data
							$clients_metabox->the_field('client_industry');
							$client['industry'] = $clients_metabox->get_the_value();
							
							$clients_metabox->the_field('client_website');
							$client['website'] = $clients_metabox->get_the_value();
							
							$clients_metabox->the_field('client_email');
							$client['email'] = $clients_metabox->get_the_value();
							
							$clients_metabox->the_field('client_phone');
							$client['phone'] = $clients_metabox->get_the_value();
							
							$clients_metabox->the_field('client_facebook');
							$client['facebook'] = $clients_metabox->get_the_value();
							
							$clients_metabox->the_field('client_twitter');
							$client['twitter'] = $clients_metabox->get_the_value();
							
							$clients_metabox->the_field('client_linkedin');
							$client['linkedin'] = $clients_metabox->get_the_value();
							
							$featured_image       =  tanlinell_get_post_thumb( $post->ID );
							$post_thumbnail_sized =  trailingslashit(get_stylesheet_directory_uri()) . 'timthumb.php?src='.$featured_image[0] . '&q=80&w120&h=120&zc=1';
							
							//get the alt text
							$featured_image_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
							if(empty($featured_image_alt))
								$featured_image_alt = 'Image for '.ucwords($job_title).', '.ucwords($name); //defaults if none found
							
											
							$service_types = wp_get_post_terms($post->ID, 'service_types', array("fields" => "slugs")); 
							
						?>
					
						<div class="grid-wrap gc">
							<div class="img-polaroid gc mbl d1-4">
								<a href="<?php echo get_permalink() ?>">
									<img src="<?php echo $post_thumbnail_sized; ?>" alt="<?php echo $featured_image_alt; ?>" style="">
								</a>
							</div>
							<div class="gc d3-4">
								
								<h3><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>
								
								<h5>
								<?php
								foreach($service_types AS $slug) :
								$term = get_term_by('slug', $slug, 'service_types')
								?>
								<a href="<?php echo get_term_link($term->slug,'service_types');?>"><?php echo $term->name; ?></a>								
								<?php endforeach; ?>
								</h5>
								
								<?php the_excerpt(); ?>
								
								<ul>
									<?php 
									foreach ($client AS $c) : 
										if(!empty($c)) :
									?>								
									<li><?php echo $c; ?></li>
									<?php 
										endif;
									endforeach;
									?>
								</ul>
								
						   </div>
						</div>
					</li>
				<?php endwhile; // end of the loop. ?>
				
            </ul>
	        <?php 
	        endif;
	        wp_reset_query();
	        ?>
	    </section>
        
	</div><!-- .main -->

	<div class="sub">
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>