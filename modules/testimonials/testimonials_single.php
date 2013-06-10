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

<?php foreach($images AS $k=>$s) : 

		
		$featured_image_small 		= wp_get_attachment_image_src( $s['img_id'], 'featured_image_small');
		$featured_image_medium 		= wp_get_attachment_image_src( $s['img_id'], 'featured_image_medium');
		$featured_image_large 		= wp_get_attachment_image_src( $s['img_id'], 'featured_image_large');
		$featured_image_xlarge 		= wp_get_attachment_image_src( $s['img_id'], 'featured_image_xlarge');

?>
	
<img src="<?php echo esc_attr( $featured_image_large[0] );?>" alt="<?php echo $featured_image_alt; ?>"></noscript>

<?php endforeach; ?>
		

    




<div class="column-container">
	<div class="main d1-1" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php
				$post_thumbnail_sized	=  tanlinell_get_post_thumb( $post->ID , array( 'width' => 844, 'height' => 494, 'crop' => true, 'resize' => true ));							
				
				//get the alt text
				$featured_image_alt = trim(strip_tags( get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ));
				if(empty($featured_image_alt))
					$featured_image_alt = 'Image for '.ucwords(get_the_title()); //defaults if none found
			?>
		
			<div class="grid-wrap">
				<div class="gc d1-2 h1-3">
					<div class="img-polaroid mbl">
						<a href="<?php echo get_permalink() ?>">
							<img src="<?php echo $post_thumbnail_sized[0]; ?>" alt="<?php echo $featured_image_alt; ?>">
						</a>
					</div>
					
					<?php
					// Find connected pages
					$connected = new WP_Query( array(
					  'connected_type' => 'testimonial_to_client',
					  'connected_items' => get_queried_object(),
					  'nopaging' => true,
					) );
					
					// Display connected pages
					if ( $connected->have_posts() ) :
						while ( $connected->have_posts() ) : $connected->the_post(); 
					?>
						<h6>Provided by: <a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h6>
					<?php 
						endwhile;
						
					// Prevent weirdness
					wp_reset_postdata();
					
					endif;
					?>
					
				</div>
				<div class="gc d1-2 h2-3">
					
					<h1><?php the_title(); ?></h1>
					
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