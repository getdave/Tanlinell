<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>


<div class="column-container">
	<div class="main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'tanlinell' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
		
			<ul class="article-list item-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="article-list__item list-item">

				<?php get_template_part( 'content', 'search' ); ?>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php get_template_part('pagination'); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

	</div><!-- .main -->

	<div class="sub">
	<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>