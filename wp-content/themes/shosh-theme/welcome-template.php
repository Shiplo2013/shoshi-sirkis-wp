<?php
/**
 * Template Name: Welcome Template
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

get_header(); ?>

	<main id="primary" class="site-main fix">

        <?php echo get_template_part('template-parts/home'); ?>
        <!--<div id="post-loader">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>-->
	</main><!-- #main -->

	<!--<div id='cursorFollower'>אם גוללים, מגיעים למקומות נפלאים</div>-->
	
	<div class="scrollbar">
		<div id='scrollBar'></div>
	</div>

<?php get_footer(); ?>