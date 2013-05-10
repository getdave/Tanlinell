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
			<h2>Team Members</h2>
			<?php 
			query_posts(array(
							'post_type' => 'our-team',
							'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC'
							)
						);
			if (have_posts()):
			?>
            <ul class="grid-wrap">
				
				<?php while ( have_posts() ) : the_post(); ?>
					<li class="gc d1-3">
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
							$post_thumbnail_sized =  trailingslashit(get_stylesheet_directory_uri()) . 'timthumb.php?src='.$featured_image[0] . '&q=80&w120&zc=1';
												
							$departments_roles = wp_get_post_terms($post->ID, 'departments_roles', array("fields" => "names"));
						
						?>
					
						<div class="grid-wrap gc">
							<div class="img-polaroid gc mbl d1-4">
								<a href="<?php echo get_permalink() ?>">
									<img src="<?php echo $post_thumbnail_sized; ?>" alt="" style="">
								</a>
							</div>
							<div class="gc d3-4">
								
								<h3><a href="<?php echo get_permalink() ?>"><?php echo ucwords($name); ?></a></h3>
								<h4><?php echo ucwords($job_title); ?></h4>
								<h4><?php echo implode(', ',$departments_roles);?></h4>
								
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