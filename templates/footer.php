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
		<?php get_template_part( 'templates/navigation/menu', 'subsidiary' ); ?>
		<p class="site-colophon site-colophon--copyright">
			Copyright &copy; <?php echo date("Y") ?> <?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>
		</p>
		
		<p class="site-colophon site-colophon--develop-credit">
			<?php get_template_part( 'templates/partials/developer-credit' ); ?>
		</p>
		
	</div>
</footer><!-- #colophon .site-footer -->
	
<!-- default location for tanlinell NOTE: above wp_footer -->
<!-- W3TC-include-js-head -->

<?php wp_footer(); ?>
<?php if( 'production' != WP_ENV ) : ?>
<script type='text/javascript'>
(function (d, t) {
  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
  bh.type = 'text/javascript';
  bh.src = '//www.bugherd.com/sidebarv2.js?apikey=<%= BUGHERDAPIKEY =%> ';
  s.parentNode.insertBefore(bh, s);
  })(document, 'script');
</script>
<?php endif; ?>