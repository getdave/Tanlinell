<div class="my_meta_control">
 
	<p>Instructional/descriptive as required</p>
 
	<p>
		<label>The Link</label>
		
		<!-- <span class="select_existing_content button button-primary">Existing Content</span> -->
		
		<?php $mb->the_field('text'); ?>
		<span>Link text</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('url'); ?>
		<span>Link url</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
	</p>

</div>
