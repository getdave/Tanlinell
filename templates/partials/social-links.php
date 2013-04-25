<?php 
	$facebook_url 	= of_get_option('facebook_page_url');
	$twitter_url 	= of_get_option('twitter_profile_url');
	$youtube_url 	= of_get_option('youtube_page_url');
	$vimeo_url 		= of_get_option('vimeo_page_url');
	$linkedin_url 	= of_get_option('linkedin_page_url');
?>


<ul class="social-icons">
	<?php if ($facebook_url) { ?>
	<li>
		<a class="social-icons-facebook" href="<?php echo $facebook_url ?>" target="_blank"><i class="icon-facebook"></i> <span>Facebook</span></a>
	</li>
	<?php } ?>
	
	<?php if ($twitter_url) { ?>
	<li>
		<a class="social-icons-twitter" href="https://twitter.com/#!/<?php echo $twitter_url ?>" target="_blank"><i class="icon-twitter"></i> <span>Twitter</span></a>
	</li>
	<?php } ?>
	
	<?php if ($youtube_url) { ?>
	<li>
		<a class="social-icons-youtube" href="<?php echo $youtube_url ?>" target="_blank"><i class="icon-youtube"></i> <span>YouTube</span></a>
	</li>
	<?php } ?>
	
	<?php if ($vimeo_url) { ?>
	<li>
		<a class="social-icons-vimeo" href="<?php echo $vimeo_url ?>" target="_blank"><i class="icon-vimeo-1"></i> <span>Vimeo</span></a>
	</li>
	<?php } ?>
	
	<?php if ($linkedin_url) { ?>
	<li>
		<a class="social-icons-vimeo" href="<?php echo $linkedin_url ?>" target="_blank"><i class="icon-vimeo-1"></i> <span>LinkedIn</span></a>
	</li>
	<?php } ?>
</ul>
