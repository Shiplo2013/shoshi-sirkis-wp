<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shosh_Theme
 */

?>

	<footer id="colophon" class="site-footer fix">
		<div class="container fix">
			<div class="site-info fix">
				<?php dynamic_sidebar('sidebar-2'); ?>
			</div><!-- .site-info -->
			<div class="footer-widget fix">
				<?php dynamic_sidebar('sidebar-3'); ?>
			</div>
		</div>
	</footer><!-- #colophon -->

	<?php get_template_part( 'inc/mini', 'cart' ); ?>

	<?php get_template_part( 'inc/work', 'popup' ); ?>
	
	<?php get_template_part( 'inc/contact', 'section' ); ?>

    <?php get_template_part( 'inc/search', 'popup' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
