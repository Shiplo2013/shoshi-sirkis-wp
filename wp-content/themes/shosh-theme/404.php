<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Shosh_Theme
 */

get_header(); ?>
<style>
section.error-404.not-found {
    padding-top: 180px;
    padding-bottom: 50px;
    min-height: calc(100vh - 233px);
}
section.error-404 header.page-header {
    margin-bottom: 30px;
}
section.error-404 .page-content {
    font-size: 18px;
    line-height: 1.2em;
}
section.error-404 h1.page-title {
    margin: 0px;
    font-size: 45px;
    line-height: 1.2em;
}
section.error-404 .page-content>a {
    display: inline-block;
    border: 1px solid #000000;
    border-radius: 0px;
    background: black;
    padding: 12px 30px;
    color: #ffffff;
	text-decoration: none;
}
section.error-404 .page-content>a:hover {
    background: transparent;
    color: #000000;
}
/* Mobile Layout: 320px. */
@media only screen and (max-width: 767px) {
section.error-404.not-found {
    padding-top: 120px;
    padding-bottom: 50px;
    min-height: 500px;
}
section.error-404 h1.page-title {
    font-size: 40px;
    line-height: 1.1em;
}





}
</style>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container fix">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'אופס! לא ניתן למצוא את הדף הזה.', 'shosh-theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'נראה ששום דבר לא נמצא במקום הזה. אולי נסה אחד מהקישורים למטה או חיפוש?', 'shosh-theme' ); ?></p>

					<a href="<?php echo site_url('/'); ?>">חזרה לעמוד הבית</a>

				</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php get_footer(); ?>