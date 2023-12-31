<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' ); ?>

<div id="product-archive" class="fix">
	<div class="container fix">

<header class="woocommerce-products-header fix">
	<ul id="product-category" class="fix">

		<?php 
		$categories = get_categories(
			array(
				'hide_empty' =>  0,
				//'exclude'  =>  1,
				'taxonomy'   =>  'product_cat' // mention taxonomy here. 
			)
		);
		if( is_shop() ) : ?>

			<li class="active"><a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">כל המוצרים</a></li>
			
			<?php foreach($categories as $category) : ?>
			<li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
			<?php endforeach; ?>

		<?php else:
			$current_category = get_queried_object(); ?>

			<li><a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">כל המוצרים</a></li>
			
			<?php foreach($categories as $category) : ?>
			<li class="<?php if($current_category->term_id == $category->term_id): ?>active<?php endif; ?>"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
			<?php endforeach; ?>
		<?php endif; ?>

	</ul>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start(); ?>

	<?php if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) { the_post();
			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );

		}
	} ?>

	<?php 
	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' ); ?>

</div>
</div>

<?php get_footer( 'shop' ); ?>
