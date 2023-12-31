<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shosh_Theme
 */
$containerWidth = 12;
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$grid_view = get_field( 'grid_view' );
		if($grid_view == "landscape") :
		$containerWidth += 44;
		elseif($grid_view == "portrait") :
		$containerWidth += 45;
		elseif($grid_view == "square") :
		$containerWidth += 35;
		else :
		$containerWidth += 40;
		endif;
	endwhile;
else :
	$containerWidth += 88;
endif;
get_header(); ?>

	<main id="primary" class="site-main fix">
		<div class="blog-posts-area fix">
			<div class="blog-posts-wrapper blog-container fix" style="min-width: <?php echo $containerWidth; ?>vw">
				<article class="post space">
					<?php if ( have_posts() ) : ?>
					<h1 class="page-title">
						<?php printf( esc_html__( 'Search Results for: %s', 'shosh-theme' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
					<?php endif; ?>
				</article>
				<?php if ( have_posts() ) : 
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;

					the_posts_navigation();

				else : ?>

					<article class="post no-result search-content">
						<header class="page-header">
							<h1 class="page-title">
								<?php esc_html_e( 'Nothing Found', 'shosh-theme' ); ?>
							</h1>
						</header><!-- .page-header -->
						<div class="page-conent">
							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shosh-theme' ); ?></p>
						</div>
						<div class="page-buttons">
							<a href="#" class="search-again"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="Search"/> <span>Search again!</span></a>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-to-home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Bsck"/> <span>Back to Home</span></a>
						</div>
					</article>

				<?php endif; ?>
			</div>
		</div>

	</main><!-- #main -->

<?php get_footer(); ?>