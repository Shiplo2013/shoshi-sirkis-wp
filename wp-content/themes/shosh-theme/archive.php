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
			<div id="post-loader">
				<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
			</div>
			<div class="blog-posts-wrapper blog-container fix" style="min-width: <?php echo $containerWidth; ?>vw">
				<article class="post space"></article>
				<?php if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
		</div>

	</main><!-- #main -->

	<div class="scrollbar">
		<div id='scrollBar'></div>
	</div>

<?php get_footer(); ?>