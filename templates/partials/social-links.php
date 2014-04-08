<?php 
	$facebook_url 	= of_get_option('facebook_page_url');
	$twitter_url 	= of_get_option('twitter_profile_url');	
	$vimeo_url 		= of_get_option('vimeo_page_url');
	$instagram_url	= of_get_option('instagram_page_url');
	$youtube_url 	= of_get_option('youtube_page_url');
	$linkedin_url 	= of_get_option('linkedin_page_url');	
	$google_url 	= of_get_option('google_company_page_url');
?>
<ul class="social-accounts-list inline-list inline-list--ib">

	<?php if ( $facebook_url ) : ?>
	<li class="social-icons__item social-icons__item--facebook">
		<a href="<?php echo $facebook_url ?>" target="_blank" class="social-icons__link icon-fallback-text" title="Energist Facebook account">
			<i class="icon icon-facebook social-icon social-icon--facebook social-icons__icon" aria-hidden="true"></i>
			<span class="text social-icons__name">Facebook</span>
		</a>
	</li>
	<?php endif; ?>
	
	<?php if ( $twitter_url ) : ?>
	<li class="social-icons__item social-icons__item--twitter">
		<a href="https://twitter.com/#!/<?php echo $twitter_url ?>" target="_blank" class="social-icons__link icon-fallback-text" title="Energist Twitter account">
			<i class="icon icon-twitter social-icon social-icon--twitter social-icons__icon" aria-hidden="true"></i>
			<span class="text social-icons__name">Twitter</span>
		</a>
	</li>
	<?php endif; ?>
	
	<?php if ( $vimeo_url ) : ?>
	<li class="social-icons__item social-icons__item--vimeo">
		<a href="<?php echo $vimeo_url ?>" target="_blank" class="social-icons__link icon-fallback-text" title="Energist Vimeo account">
			<i class="icon icon-vimeo social-icon social-icon--vimeo social-icons__icon" aria-hidden="true"></i>
			<span class="text social-icons__name">Vimeo</span>
		</a>
	</li>
	<?php endif; ?>
	
	<?php if ( $instagram_url ) : ?>
	<li class="social-icons__item social-icons__item--instagram">
		<a href="<?php echo $instagram_url ?>" target="_blank" class="social-icons__link icon-fallback-text" title="Energist Instagram account">
			<i class="icon icon-instagram social-icon social-icon--instagram social-icons__icon" aria-hidden="true"></i>
			<span class="text social-icons__name">Instagram</span>
		</a>
	</li>
	<?php endif; ?>
	
	<?php if ( $youtube_url ) : ?>
	<li class="social-icons__item social-icons__item--youtube">
		<a href="<?php echo $youtube_url ?>" target="_blank" class="social-icons__link icon-fallback-text" title="Energist YouTube account">
			<i class="icon icon-youtube social-icon social-icon--youtube social-icons__icon" aria-hidden="true"></i>
			<span class="text social-icons__name">YouTube</span>
		</a>
	</li>
	<?php endif; ?>
	
	<?php if ( $linkedin_url ) : ?>
	<li class="social-icons__item social-icons__item--linkedin">
		<a href="<?php echo $linkedin_url ?>" target="_blank" class="social-icons__link icon-fallback-text" title="Energist LinkedIn account">
			<i class="icon icon-linkedin social-icon social-icon--linkedin social-icons__icon" aria-hidden="true"></i>
			<span class="text social-icons__name">LinkedIn</span>
		</a>
	</li>
	<?php endif; ?>
	
	<?php if ( $google_url ) : ?>
	<li class="social-icons__item social-icons__item--google-plus">
		<a href="<?php echo $google_url ?>" target="_blank" class="social-icons__link icon-fallback-text" title="Energist Google Plus account">
			<i class="icon icon-google-plus social-icon social-icon--google-plus social-icons__icon" aria-hidden="true"></i>
			<span class="text social-icons__name">Google Plus</span>
		</a>
	</li>
	<?php endif; ?>
	
</ul>