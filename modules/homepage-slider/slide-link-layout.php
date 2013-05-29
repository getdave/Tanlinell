<div class="my_meta_control">
 
	<p>Instructional/descriptive as required</p>
 
	<p>
		<label>The Link</label>
		
		<!-- <span class="select_existing_content button button-primary">Existing Content</span> -->
		
		<?php $mb->the_field('text'); ?>
		<span>Link text</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<p>
	
		<?php $mb->the_field('url'); ?>
		<span>Custom Link URL</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $args = array(
			'sort_order' => 'ASC',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'exclude' => '',
			'include' => '',
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'child_of' => 0,
			'parent' => -1,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish'
		);
		$pages = get_pages($args);
		?>
		
		<span>Select Page</span>
		<?php $mb->the_field('page'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">Select...</option>
			<option value="q"<?php $mb->the_select_state('q'); ?>>q</option>
			
			<?php foreach($pages AS $page) : ?>
				<option value="<?php echo $page->ID; ?>"<?php $mb->the_select_state($page->ID); ?>><?php echo $page->post_title; ?></option>
			<?php endforeach; ?>
		</select>
			
	</p>

</div>
