<?php
/**
 * FRONT PAGE TEMPLATE
 *
 * This template will default to be the home page for your website.
 * Edit this template to change the layout and content of the page
 * that is marked as "homepage" on your website.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>
					
					<?php if ( is_active_sidebar( 'homepage-feature-one' ) ) : ?>

						<div id="homepage-feature-one" class="homepage-feature">

							<?php dynamic_sidebar( 'homepage-feature-one' ); ?>

						</div><!-- #primary -->

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'homepage-feature-two' ) ) : ?>

						<div id="homepage-feature-two" class="homepage-feature">

							<?php dynamic_sidebar( 'homepage-feature-two' ); ?>

						</div><!-- #primary -->

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'homepage-feature-three' ) ) : ?>

						<div id="homepage-feature-three" class="homepage-feature">

							<?php dynamic_sidebar( 'homepage-feature-three' ); ?>

						</div><!-- #primary -->

					<?php endif; ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>