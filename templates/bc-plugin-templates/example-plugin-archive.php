<?php
/**
  *  EXAMPLE: Archive for CPT defined in the plugin.
  *
  */
?>
<?php do_action( 'bc_p_content_wrapper_start');?>
	<?php do_action( 'bc_p_content_main_start');?>		
		<?php
		/**
		 * Loop the lising page content 
		 * we made a custom listing page in
		 * bc_s_c_create_listing_page
		 */
		?>	
		<?php $archive_post = get_page_by_path( EXAMPLE_CPT_PLURAL_SLUG ); ?>
		
		<h1 class="entry-title"><?php echo apply_filters( 'the_title', $archive_post->post_title ); ?></h1>
		
		<?php echo apply_filters( 'the_content', $archive_post->post_content ) ?>
		
		
		<?php
		/**
		 * Custom query the cpt and loop the result 
		 * via class public function bc_s_c_list_obj
		 */
		?>	
		<?php /*grab the cpt's in an object*/ ?>
		<?php $custom_posts_obj = EXAMPLE_PLUGIN_CLASS::bc_s_c_list_obj(); ?>
		
		<?php /*grab this post type object, primarily for title attr using post type labels*/ ?>
		<?php $custom_post_type = get_post_type_object( $custom_posts_obj->query_vars['post_type'] ); ?>
		
		<?php /*load the template output for each member of the cpt*/ ?>
		<?php if ( $custom_posts_obj->have_posts() ): ?>	
			<?php 
				$custom_posts_loop_count 	= 0; 
				$custom_posts_per_row		= 3;
			?>
			<ul class="bc-sc-item-list bcp-item-list">
		    	<?php while ( $custom_posts_obj->have_posts() ) : $custom_posts_obj->the_post(); ?>	
				<li class="bc-sc-list-item bcp-list-item bcp-list-item--<?php echo ++$custom_posts_loop_count; ?><?php echo ($custom_posts_loop_count % $custom_posts_per_row == 1) ? ' bcp-list-item--first' : ''; ?>">
					<?php include( EXAMPLE_T_P_DIR . EXAMPLE_CPT_SLUG ."-listing-item.php"  ); ?>
				</li>		
				<?php endwhile; ?>	
			</ul>
			
			<?php
			/**
			 * Default Pagination
			 */
			?>
			<div class="bc-sc-pagination pagination loop-pagination">
				<?php
				$big = 999999999; // need an unlikely integer
				
				echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $custom_posts_obj->max_num_pages,
				'prev_text'    => __('&laquo;'),
				'next_text'    => __('&raquo;'),
				'type' => 'list',
				) );
				?>
			</div>
			
	    <?php endif; wp_reset_postdata(); ?>
	<?php do_action( 'bc_p_content_main_end');?>	
<?php do_action( 'bc_p_content_wrapper_end');?>
