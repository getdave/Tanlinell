<?php
/**
 * Template Name: Product Categories
 * The template for displaying news.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
					<a href="<?php echo get_permalink() ?>">
						<img src="<?php echo $post_thumbnail_sized; ?>" alt="" style="">
					</a>
				</div>
				<div class="gc d2-3">
					
					<h3><a href="<?php echo get_permalink() ?>"><?php echo ucwords($name); ?></a></h3>
					<h4><?php echo ucwords($job_title); ?></h4>
					<h5>
					<?php
					foreach($departments_roles AS $slug) :
						$term = get_term_by('slug', $slug, 'departments_roles')
					?>
						<a href="<?php echo get_term_link($term->slug,'departments_roles');?>"><?php echo $term->name; ?></a>								
					<?php endforeach; ?>
					</h5>
					<div class="grid-wrap">
						<h5 class="gc d1-3"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h5>
						<h5 class="gc d1-3"><a href="<?php echo $twitter; ?>" target="_blank"><?php echo $twitter; ?></a></h5>
						<h5 class="gc d1-3"><a href="<?php echo $linkedin; ?>" target="_blank"><?php echo $linkedin; ?></a></h5>
					</div>
					<?php the_content(); ?>
			   </div>
			</div>
			
		<?php endwhile; // end of the loop. ?>
		
	</section>


<?php get_footer(); ?>