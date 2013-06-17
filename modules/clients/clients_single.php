<?php
/**
 * The Template for displaying our-team items.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>


<?php
	//setup the custom meta object
	global $clients_slides_metabox;
	
	// get the meta data for the current post
	$clients_slides_metabox->the_meta();
	
	$i=0;	
	while($clients_slides_metabox->have_fields('slides'))
	{
	    $images[$i]['title']=$clients_slides_metabox->get_the_value('title');
	 
	    $images[$i]['img_url']=$clients_slides_metabox->get_the_value('imgurl');
	    
	    $images[$i]['img_id']=tanlinell_get_attachment_id_from_src($clients_slides_metabox->get_the_value('imgurl'));
	    $i++;
	}

?>

<?php foreach($images AS $k=>$s) : ?>

	<?php brimg( $s['img_id'] ); ?>	
	
<?php endforeach; ?>

    




<div class="column-container">
	<div class="main d1-1" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
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
				
				
				$post_thumbnail_sized	=  tanlinell_get_post_thumb( $post->ID , array( 'width' => 844, 'height' => 494, 'crop' => true, 'resize' => true ));							
				
				//get the alt text
				$featured_image_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
				if(empty($featured_image_alt))
					$featured_image_alt = 'Image for '.ucwords(get_the_title()); //defaults if none found
			?>
		
			<div class="grid-wrap">
				<div class="gc d1-4">
					<div class="img-polaroid mbl">
						<a href="<?php echo get_permalink() ?>">
							<img src="<?php echo $post_thumbnail_sized[0]; ?>" alt="<?php echo $featured_image_alt; ?>">
						</a>
					</div>
					
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
					
					<?php
						//get client connections for services
						$connected = new WP_Query( array(
						  'connected_type' => 'clients_to_services',
						  'connected_items' => get_queried_object(),
						  'nopaging' => true,
						) );
					
					// Display connected pages
					if ( $connected->have_posts() ) :
						echo '<h6>Services:</h6>';
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
					
					<?php
						//get client connections for services
						$connected = new WP_Query( array(
						  'connected_type' => 'testimonial_to_client',
						  'connected_items' => get_queried_object(),
						  'nopaging' => true,
						) );
					
					// Display connected pages
					if ( $connected->have_posts() ) :
						echo '<h6>Testimonials:</h6>';
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
				<div class="gc d3-4">
					
					<h1><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h1>
										
					<h4><?php the_excerpt(); ?></h4>
					
					<?php the_content(); ?>
					
			   </div>
			
		<?php endwhile; // end of the loop. ?>
		
		<?php tanlinell_content_nav( 'nav-below' ); ?>
		
	</div><!-- .main -->

	<div class="sub">
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>