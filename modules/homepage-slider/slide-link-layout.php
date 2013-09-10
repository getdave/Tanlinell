<div class="my_meta_control">
 
	<p>Define the link for the slide, and the text for the link. e.g. Read More</p>
 
	<p>
		<?php $mb->the_field('text'); ?>
		<span>Link text</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	
	<p>
		<label>Page to link to:</label>
	</p>
	
	<p>		
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
						
			<?php foreach($pages AS $page) : ?>
				<option value="<?php echo $page->ID; ?>"<?php $mb->the_select_state($page->ID); ?>><?php echo $page->post_title; ?></option>
			<?php endforeach; ?>
		</select>			
	</p>
	
	<p>
		<label>or a URL</label>
	</p>
	<p>
		<?php $mb->the_field('url'); ?>
		<span>Custom Link URL</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>

</div>
