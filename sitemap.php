<?php
/**
 * Template Name: Sitemap 
 */
get_header(); ?>

<?php do_action( 'tanlinell_content_wrapper_start');?>

	<?php do_action( 'tanlinell_content_main_start');?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>

            <?php endwhile; // end of the loop. ?>      
			
			<?php
			/**
			 * Tanlinell Sitemap 
			 */
			?>
			
			<?php
			//build a list of registered post types we want to display
			$builtin_post_types	 	= array('post','attachment');//all built in post types			
			$custom_post_types 		= get_post_types( array ( '_builtin' => FALSE ) );//all custom post types			
			$registered_post_types	= array_merge( $builtin_post_types, $custom_post_types );
			?>
			
            <?php foreach( get_post_types( array('public' => true) ) as $post_type ) : ?>
				
                <?php if ( !in_array( $post_type, array(implode( ',', $custom_post_types)) ) ) : ?>

                    <?php
                    $args = array(
                        'post_type' => $post_type,
                        'posts_per_page' => '-1',   
                        'orderby' => 'title',
                        'order' => 'ASC'
                    );
                    $custom_posts_obj = new WP_Query( $args );
                    ?>

                    <?php if ( $custom_posts_obj->have_posts() ): ?>

	                    <h2><?php echo get_post_type_object( $post_type )->labels->name; ?></h2>
	
	                    <ul>
	
	                        <?php while ( $custom_posts_obj->have_posts() ) : $custom_posts_obj->the_post(); ?>
	
	                        <li><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
	
	                        <?php endwhile; ?>
	
	                    </ul>

                    <?php endif; wp_reset_postdata(); ?>

                <?php endif; ?>

            <?php endforeach; ?>

	<?php do_action( 'tanlinell_content_main_end');?>

	<?php do_action( 'tanlinell_content_sub_start');?>
		<?php get_sidebar(); ?>
	<?php do_action( 'tanlinell_content_sub_end');?>

<?php do_action( 'tanlinell_content_wrapper_end');?>

<?php get_footer(); ?>