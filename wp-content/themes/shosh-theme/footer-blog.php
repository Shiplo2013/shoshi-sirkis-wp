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

	<?php get_template_part( 'inc/mini', 'cart' ); ?>

	<?php get_template_part( 'inc/work', 'popup' ); ?>
	
	<?php get_template_part( 'inc/contact', 'section' ); ?>

    <?php get_template_part( 'inc/search', 'popup' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>