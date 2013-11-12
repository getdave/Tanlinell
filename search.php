<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>


<?php echo apply_filters( 'tanlinell_content_wrapper_html_open', '<div class="column-container">' );?>

	<?php echo apply_filters( 'tanlinell_main_wrapper_html_open', '<div class="main">' );?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'tanlinell' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			
			<?php $stat = tanlinell_paging_stat(); ?>
			<div class="search-stat">
				<p>Displaying <span class="search-stat__item search-stat__floor"><?php echo $stat['floor']; ?></span>-<span class="search-stat__item search-stat__ceiling"><?php echo $stat['ceiling']; ?></span> of <span class="search-stat__item search-stat__total"><?php echo $stat['total']; ?></span> results</p>
			</div>
		
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

	<?php echo apply_filters( 'tanlinell_main_wrapper_html_close', '</div>' );?>

	<?php echo apply_filters( 'tanlinell_sub_wrapper_html_open', '<div class="sub">' );?>
		<?php get_sidebar(); ?>
	<?php echo apply_filters( 'tanlinell_sub_wrapper_html_close', '</div>' );?>
	
<?php echo apply_filters( 'tanlinell_content_wrapper_html_close', '</div>' );?>

<?php get_footer(); ?>