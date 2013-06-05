<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */
?>

	</div><!-- #main .site-main -->
	
	<aside class="sub-footer container">
		<div class="grid-wrap">
			<div class="gc d1-3">
				<?php get_template_part( 'templates/partials/vcard' ); ?>
			</div>	
			
			<div class="gc d1-3">
				<?php get_template_part( 'templates/partials/latest-posts' ); ?>
			</div>
				
			<div class="gc d1-3">
				<?php get_template_part( 'templates/partials/social-links' ); ?>
			</div>
		</div>
	</aside>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php get_template_part( 'menu', 'subsidiary' ); ?>	
			<div class="site-info">
				<?php 
					echo tanlinell_developer_credit();
				?>		
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<!-- default location for tanlinell NOTE: above wp_footer -->
<!-- W3TC-include-js-head -->

<?php wp_footer(); ?>

</body>
</html>