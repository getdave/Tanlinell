<?php $curr_url = get_permalink(); ?>

<?php do_atomic('before_social_actions_items'); ?>
<h4>Share this</h4>
<ul class="social-actions">	
	<li class="social-actions__item">
		<a class="social-actions__link socialite socialite-instance twitter-share" href="http://twitter.com/share" data-count="none">
		    <span class="social-actions__text">Share on Twitter</span>
		</a>
	</li>
	
	<li class="social-actions__item">
		<a class="social-actions__link socialite socialite-instance facebook-like" href="http://www.facebook.com/sharer.php" data-send="false" data-show-faces="false" data-font="arial" data-count="false" data-layout="button_count">
		    <span class="social-actions__text">Like on Facebook</span>
		</a>
	</li>
	
	<li class="social-actions__item">
		<a class="social-actions__link socialite socialite-instance linkedin-share" href="http://www.linkedin.com/shareArticle?mini=true" data-counter="false">
		    <span class="social-actions__text">Share on LinkedIn</span>
		</a>
	</li>
	<li class="social-actions__item">
		<a href="https://plus.google.com/share?url=<?php echo $curr_url; ?>" class="socialite socialite-instance social-actions__link googleplus-one" data-size="medium" rel="nofollow" target="_blank">
			<span class="social-actions__text">Share on Google+</span>
		</a>
	</li>
	
</ul>
<?php do_atomic('after_social_actions_items'); ?>