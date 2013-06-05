<div class="my_meta_control">
 
	<p>Details of the Team Member</p>
 
	<p>
	
		<?php $mb->the_field('client_industry'); ?>
		<span>Business/Industry</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('client_website'); ?>
		<span>Website</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('client_email'); ?>
		<span>Email Address</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('client_phone'); ?>
		<span>Phone</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('client_facebook'); ?>
		<span>Facebook Profile (include http://www)</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('client_twitter'); ?>
		<span>Twitter Profile (include http://www)</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		<?php $mb->the_field('client_linkedin'); ?>
		<span>Linkedin Profile (include http://www)</span>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
	</p>

</div>
