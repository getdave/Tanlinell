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
	<?php get_template_part( 'templates/partials/vcard' ); ?>
	<?php //get_template_part( 'templates/partials/latest-posts' ); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php get_template_part( 'menu', 'subsidiary' ); ?>	
			<div class="site-info">
				<?php 
					$atts = array();
					echo tanlinell_developer_credit($atts);
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