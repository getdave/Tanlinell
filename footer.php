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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_template_part( 'menu', 'subsidiary' ); ?>	
		<div class="site-info">
			<?php 
				$atts = array();
				echo tanlinell_developer_credit($atts);
			?>		
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>