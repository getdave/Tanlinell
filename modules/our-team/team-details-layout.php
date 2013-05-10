<div class="my_meta_control">
 
	<p>Details of the Team Member</p>
 
	<p>
	
		<?php $mb->the_field('name'); ?>
		<span>Name of the Team Member</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('job_title'); ?>
		<span>Job Title</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('email'); ?>
		<span>Email Address</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('twitter'); ?>
		<span>Twitter Profile</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('linkedin'); ?>
		<span>Linkedin Profile</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
	</p>

</div>
