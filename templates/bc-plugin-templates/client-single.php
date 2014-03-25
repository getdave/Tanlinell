<?php
/**
  * Single for CPT defined in the plugin.
  *
  *
  * This template for a single item of cpt defined via bc_s_c_register_cpt
  *
  *
  * @variable (str)    BC_Simple_Clients::get_instance()->cpt_slug; variable for slug in order to pull meta stored on this $post->ID
  */
?>

	<?php do_action( 'bc_p_content_wrapper_start');?>
		<?php do_action( 'bc_p_content_main_start');?>	
			<?php while ( have_posts() ) : the_post(); ?>
		
				<?php the_title( '<h1 class="bc-sc-single__title bcp-single__title entry-title">', '</h1>' ); ?>
				
				<figure class="bc-sc-single__media bcp-single__media">
					<?php load_template( BC_S_C_T_P_DIR . "featured-image-template.php" , false );?>
				</figure>
				
				<?php
				/**
				 * Get Taxonomy List for this post 
				 */
				?>
				<?php $taxonmy_obj = get_taxonomy( BC_S_C_TAXONOMY_SLUG ); ?>
				<?php $custom_taxonomy = wp_get_post_terms( $post->ID, BC_S_C_TAXONOMY_SLUG ); ?>
				
				<?php if( !empty( $custom_taxonomy ) ) : ?>
				<h4 class="bc-sc-term__title bcp-term__title">
					<?php echo apply_filters( 'the_title', $taxonmy_obj->labels->singular_name ); ?>
				</h4>
				
				<ul class="bc-sc-list bcp-list">
				<?php foreach ($custom_taxonomy AS $term) : ?>			
					<li class="bc-sc-list__item bcp-list__item">
						<a href="<?php echo get_term_link( $term ); ?>" title="<?php echo esc_attr( $term->name ); ?> from <?php echo esc_attr( $taxonmy_obj->labels->singular_name ); ?>">
							<?php echo $term->name; ?>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				
				<div class="bc-sc-single__content bcp-single__content">
					<?php the_content(); ?>
				</div>
		
			<?php endwhile; ?>
		<?php do_action( 'bc_p_content_main_end');?>
			
	<?php do_action( 'bc_p_content_wrapper_end');?>
