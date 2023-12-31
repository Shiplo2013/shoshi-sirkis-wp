<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product; ?>
<div id="single-product-page" class="fix">
	<div class="container fix">
		
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary fix">
		<div class="breadcrumb">
			<span class="title"><?php echo get_the_title( get_the_ID() );?></span>
			<span class="arrow"></span>
			<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="home">הילי</a>
		</div>
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
		<div class="summary-content fix">
			<?php the_content(); ?>
		</div>

		<div class="product-footer">
			<div class="product-share fix">
				<div class="share-wrapper fix">
					<div class="share-button fix">
						<span>לחלוק</span>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/share.svg" alt="Share">
					</div>
					<div class="share-lists fix">
						<ul>
							<li><a href="mailto:?subject=<?php the_title(); ?>&amp;body=Check out this product <?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt="Mail"></a></li>
							<li><a href="whatsapp://send?text=<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsup.svg" alt="WhatsApp"></a></li>
							<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="Facebook"></a></li>
							<li><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.svg" alt="Twitter"></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="whatsapp-link fix">
				<a href="whatsapp://send?abid=+972548094590+&text=Hello%2C%20World!"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsup.svg" alt="WhatsApp"/><span>אפשר <br/>לדבר גם<br/> בווצאפ</span></a>
			</div>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
		
		<!-- Related Products -->
		<div id="related-product" class="fix">
			<div class="related-wrapper fix">
				<div class="related-title fix">
					<h2>מוצרים קשורים</h2>
				</div>
				<div class="related-products fix">
				<?php
				global $post;
				$related = get_posts( 
					array( 
						'category__in' => wp_get_post_categories( $post->ID ), 
						'numberposts'  => 3, 
						'post__not_in' => array( $post->ID ),
						'post_type'    => 'product'
					) 
				);
				if( $related ) :
					foreach( $related as $post ) :
						setup_postdata($post); 
						$thumbnail = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), "medium", "", array( "class" => "img-responsive" ) );
						$product = wc_get_product( get_the_ID() );
						$permalink = get_the_permalink(get_the_ID());
						$title = get_the_title();
						$price = $product->get_price(); ?>
					<div class="single-related-product fix">
						<a href="<?php echo $permalink; ?>" class="product-image"><?php echo $thumbnail; ?></a>
						<h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
						<div class="price"><span><?php echo $price; ?></span> <span>ח״ש</span></div>
					</div>
				<?php
					endforeach;
					wp_reset_postdata();
				endif; ?>
				</div>
			</div>
		</div>
		<!-- Related Products -->

	</div>
</div>
