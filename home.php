<?php
/**
 * The template for displaying the News listing page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>

<div class="container">
	<div class="column-container">
		<div class="main" role="main">
			<div class="main-inner">
				<?php if ( have_posts() ) : ?>

					<header class="entry-header">
						<h1 class="page-title entry-title">
							News
						</h1>
						<?php
							if ( is_category() ) {
								// show an optional category description
								$category_description = category_description();
								if ( ! empty( $category_description ) )
									echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

							} elseif ( is_tag() ) {
								// show an optional tag description
								$tag_description = tag_description();
								if ( ! empty( $tag_description ) )
									echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
							}
						?>
					</header>
					
					<ul class="article-list item-list">
					<?php while ( have_posts() ) : the_post(); ?>
						<li class="article-list__item list-item">
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to overload this in a child theme then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
							?>
							<a href="<?php the_permalink(); ?>" class="btn btn--blog">
								Read More
							</a>
						</li>
					<?php endwhile; ?>
					</ul>
					<?php get_template_part('pagination'); ?>
					
				<?php else : ?>

					<?php get_template_part( 'no-results', 'archive' ); ?>

				<?php endif; ?>
			</div>
		</div><!-- .main -->

		<div class="sub">
			<div class="sub-inner">
			<?php get_sidebar('newsletters'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>