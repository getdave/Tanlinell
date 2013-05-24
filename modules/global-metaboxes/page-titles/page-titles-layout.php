<div class="my_meta_control">
 
	<p>Custom Page titles</p>
 
	<p>
		<?php $mb->the_field('page_title'); ?>
		<span>Page Title</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('page_subtitle'); ?>
		<span>Page Subtitle</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
	</p>

</div>
