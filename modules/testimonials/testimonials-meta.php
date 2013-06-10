<div class="my_meta_control">	
		<?php 
		$args = array(
					'post_type' => 'clients',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'ASC'
					);
		$client_list = new WP_Query($args);
		
		if ($client_list->have_posts()):
		?>
        
        <span>Select the Client</span>
		<?php $mb->the_field('client'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">Select...</option>
						
			<?php while ( $client_list->have_posts() ) : $client_list->the_post(); ?>
				<option value="<?php echo get_the_ID(); ?>"<?php $mb->the_select_state(get_the_ID()); ?>><?php echo get_the_title(); ?></option>
			<?php endwhile; ?>
			
		</select>
        
        <?php
        endif;
        wp_reset_postdata();
        ?>					
	

</div>
