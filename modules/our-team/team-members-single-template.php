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
				//setup the custom meta object
				global $our_team_metabox;
				
				// get the meta data for the current post
				$our_team_metabox->the_meta();
										
				//link meta data
				$our_team_metabox->the_field('name');
				$name = $our_team_metabox->get_the_value();
				
				$our_team_metabox->the_field('job_title');
				$job_title = $our_team_metabox->get_the_value();
				
				$our_team_metabox->the_field('email');
				$email = $our_team_metabox->get_the_value();
				
				$our_team_metabox->the_field('twitter');
				$twitter = $our_team_metabox->get_the_value();
				
				$our_team_metabox->the_field('linkedin');
				$linkedin = $our_team_metabox->get_the_value();
				
				$featured_image       =  tanlinell_get_post_thumb( $post->ID );
				$post_thumbnail_sized =  trailingslashit(get_stylesheet_directory_uri()) . 'timthumb.php?src='.$featured_image[0] . '&q=80&w=900&zc=1';
									
				$departments_roles = wp_get_post_terms($post->ID, 'departments_roles', array("fields" => "names"));
			
			?>
		
			<div class="grid-wrap gc">
				<div class="img-polaroid gc mbl d1-3">
					<img src="<?php echo $post_thumbnail_sized; ?>" alt="" style="">
				</div>
				<div class="gc d2-3">
					
					<h3><?php echo ucwords($name); ?></h3>
					<h4><?php echo $job_title; ?> - <?php echo implode(', ',$departments_roles);?></h4>
					<div class="grid-wrap">
						<h5 class="gc d1-3"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h5>
						<h5 class="gc d1-3"><a href="<?php echo $twitter; ?>" target="_blank"><?php echo $twitter; ?></a></h5>
						<h5 class="gc d1-3"><a href="<?php echo $linkedin; ?>" target="_blank"><?php echo $linkedin; ?></a></h5>
					</div>
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