<?php 
	$facebook_url 	= of_get_option('facebook_page_url');
	$twitter_url 	= of_get_option('twitter_profile_url');
	$youtube_url 	= of_get_option('youtube_page_url');
	$vimeo_url 		= of_get_option('vimeo_page_url');
	$instagram_url	= of_get_option('instagram_page_url');
	$linkedin_url 	= of_get_option('linkedin_page_url');
?>


<ul class="social-icons">

	<?php if ( $facebook_url ) : ?>
	<li class="social-icons__item">
		<a class="social-icons__link" href="<?php echo $facebook_url ?>" target="_blank"><i class="social-icons__icon social-icons__icon--facebook"></i> <span class="social-icons__name">Facebook</span></a>
	</li>
	<?php endif; ?>
	
	<?php if ( $twitter_url ) : ?>
	<li class="social-icons__item">
		<a class="social-icons__link" href="https://twitter.com/#!/<?php echo $twitter_url ?>" target="_blank"><i class="social-icons__icon social-icons__icon--twitter"></i> <span class="social-icons__name">Twitter</span></a>
	</li>
	<?php endif; ?>
	
	<?php if ( $youtube_url ) : ?>
	<li class="social-icons__item">
		<a class="social-icons__link" href="<?php echo $youtube_url ?>" target="_blank"><i class="social-icons__icon social-icons__icon--youtube"></i> <span class="social-icons__name">YouTube</span></a>
	</li>
	<?php endif; ?>
	
	<?php if ( $vimeo_url ) : ?>
	<li class="social-icons__item">
		<a class="social-icons__link" href="<?php echo $vimeo_url ?>" target="_blank"><i class="social-icons__icon social-icons__icon--vimeo"></i> <span class="social-icons__name">Vimeo</span></a>
	</li>
	<?php endif; ?>
	
	<?php if ( $instagram_url ) : ?>
	<li class="social-icons__item">
		<a class="social-icons__link" href="<?php echo $instagram_url ?>" target="_blank"><i class="social-icons__icon social-icons__icon--instagram"></i> <span class="social-icons__name">Instagram</span></a>
	</li>
	<?php endif; ?>
	
	<?php if ( $linkedin_url ) : ?>
	<li class="social-icons__item">
		<a class="social-icons__link" href="<?php echo $linkedin_url ?>" target="_blank"><i class="social-icons__icon social-icons__icon--linkedin"></i> <span class="social-icons__name">LinkedIn</span></a>
	</li>
	<?php endif; ?>
	
</ul>
