<?php
/**
 * Shosh Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shosh_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shosh_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Shosh Theme, use a find and replace
		* to change 'shosh-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'shosh-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'shosh-theme' ),
			'menu-2' => esc_html__( 'Mobile Footer', 'shosh-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'shosh_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	// Custom Image Size
	add_image_size( 'blog-image-landscape', 768, 514, true );
	add_image_size( 'blog-image-portrait', 491, 652, true );
	add_image_size( 'blog-image-square', 518, 520, true );
	// Single Blog Image
	add_image_size( 'blog-image-featured', 1024, 1024, false );
	add_image_size( 'slider-image', 518, 760, true );
	add_image_size( 'work-image', 550, 650, true );
	add_image_size( 'blog-menu-image', 350 );
	// Blog Page images
	add_image_size( 'blog-image-gallery1-img1', 950, 660, false );
	add_image_size( 'blog-image-gallery1-img2', 466, 577, false );
	add_image_size( 'blog-image-gallery2-img1', 432, 330, false );
	add_image_size( 'blog-image-gallery2-img2', 648, 430, false );
	add_image_size( 'blog-image-gallery2-img3', 432, 495, false );

	// Woocommerce Support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'shosh_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shosh_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shosh_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'shosh_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shosh_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shosh-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shosh-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	// Footer Widget Left
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Left Widget', 'shosh-theme' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'shosh-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	// Footer Widget Right
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Right Widget', 'shosh-theme' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'shosh-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shosh_theme_widgets_init' );

// Custom Posts
add_action( 'init', 'shiplo_custom_post' );
function shiplo_custom_post() {
	register_post_type( 'work-items',
		array(
			'labels' => array(
				'name' => __( 'Works', 'shosh-theme' ),
				'singular_name' => __( 'Work', 'shosh-theme' ),
				'add_new'             => __( 'Add Work', 'shosh-theme' ),
				'add_new_item' => __( 'Add New Work', 'shosh-theme' )
			),
			'public' => true,
			'publicly_queryable' => true,
			'menu_icon' => 'dashicons-format-gallery',
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'works'),
		)
	);
	
}

/**
 * Enqueue scripts and styles.
 */
function shosh_theme_scripts() {
	wp_enqueue_style( 'shosh-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'shosh-theme-style', 'rtl', 'replace' );

	// Add GSAP links
	function addGsapLink() {
		// GSAP Scripts
		wp_enqueue_script( 'shosh-theme-gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'shosh-theme-ScrollTrigger', get_template_directory_uri() . '/assets/js/ScrollTrigger.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'shosh-theme-ScrollToPlugin', get_template_directory_uri() . '/assets/js/ScrollToPlugin.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'shosh-theme-draggable', get_template_directory_uri() . '/assets/js/Draggable.min.js', array(), _S_VERSION, true );
	}

	// Add those links when load welcome template
	if(is_page_template('welcome-template.php')) {
		addGsapLink();
		// Home Page Style
		wp_enqueue_style('shosh-home-style', get_template_directory_uri() . '/assets/css/home-style.css', array(), '0.1.0', 'all');
		// Home Page Script
		wp_enqueue_script( 'shosh-home-scripts', get_template_directory_uri() . '/assets/js/home-scripts.js', array(), '0.1.0', true );
	}
	// Add those links when load blog page
	if ( (!is_front_page() && is_home()) || is_singular('post')  || is_search() || is_category()) {
		addGsapLink();
		// Blog Page Style
		wp_enqueue_style('shosh-blog-style', get_template_directory_uri() . '/assets/css/blog-style.css', array(), '0.1.0', 'all');
		// Blog Page JS
		wp_enqueue_script( 'shosh-blog-scripts', get_template_directory_uri() . '/assets/js/blog-scripts.js', array(), '0.1.0', true );

	}
	if ( is_singular('work-items') ) {
		addGsapLink();
		// Blog Page Style
		wp_enqueue_style('shosh-swiper-style', '//cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', array(), '1.0.0', 'all');
		wp_enqueue_style('shosh-work-style', get_template_directory_uri() . '/assets/css/work-style.css', array(), '0.1.0', 'all');
		// Blog Page JS
		wp_enqueue_script( 'shosh-swiper-scripts', '//cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'shosh-work-scripts', get_template_directory_uri() . '/assets/js/work-scripts.js', array(), '0.1.0', true );

	}

	wp_enqueue_script( 'shosh-theme-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '0.1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Ajax Comment
	wp_localize_script( 'shosh-theme-main', 'ajax_params', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'shosh_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add Custom Item to the Menu
add_filter( 'wp_nav_menu_items', 'my_custom_menu_item', 10, 2 );
function my_custom_menu_item ( $items, $args ) {
	if($args->theme_location == 'menu-1') {
		$items .= '<li class="cart-item"><button type="button" class="cart-link" data-href="'. wc_get_cart_url() .'" title="View your shopping cart"><span id="mini-cart-count">'.WC()->cart->get_cart_contents_count().'</span><img src="'.get_template_directory_uri() . '/assets/images/cart.svg" alt="Cart" /></button></li><li class="serach-item"><button class="blog-search fix"><img src="'.get_template_directory_uri() . '/assets/images/search.svg" alt="Search"></button></li>';
		return $items;
	} else {
		return $items;
	}
}


// Remove WooCommerce Hooks
add_action( 'init', 'sr_woo_remove_wc_hooks' );
function sr_woo_remove_wc_hooks() {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 0 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10, 0 );
}

// Change the currency Symbol
add_filter( 'woocommerce_currency_symbol', 'my_custom_currency_symbol' );
function my_custom_currency_symbol( $symbol ) {
    return 'ש"ח';
}

// WP ajax function for add to cart
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {
	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
	$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
	$variation_id = absint($_POST['variation_id']);
	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
	$product_status = get_post_status($product_id);

	if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

		do_action('woocommerce_ajax_added_to_cart', $product_id);

		if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
			wc_add_to_cart_message(array($product_id => $quantity), true);
		}

		WC_AJAX :: get_refreshed_fragments();
	} else {

		$data = array(
			'error' => true,
			'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

		echo wp_send_json($data);
	}

	wp_die();
}

// Update mini cart
function mode_theme_update_mini_cart() {
  woocommerce_mini_cart();
  die();
}
add_filter( 'wp_ajax_nopriv_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );
add_filter( 'wp_ajax_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );

// Remove product in the cart using ajax
function warp_ajax_product_remove() {
    // Get mini cart
    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] ) {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
    );

    wp_send_json( $mini_cart );

    die();
}

add_action( 'wp_ajax_product_remove', 'warp_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'warp_ajax_product_remove' );

// Add cart count
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
    <span id="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}


// 1. Show plus minus buttons
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="minus">-</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="plus">+</button>';
}

// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      jQuery(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = jQuery( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( jQuery( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
}

// Check Blog Page
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// Checkout Page Redirect
add_filter( 'woocommerce_add_to_cart_redirect', 'woo_skip_cart_redirect_checkout' );
function woo_skip_cart_redirect_checkout( $url ) {
    return wc_get_checkout_url();
}
/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Checkout button text
function my_custom_checkout_button_text() {
    return 'עבור לסל הקניות';
}
add_filter( 'woocommerce_order_button_text', 'my_custom_checkout_button_text' );


// Blog Ajax comments
add_action( 'wp_ajax_ajaxcomments', 'misha_submit_ajax_comment' ); // wp_ajax_{action} for registered user
add_action( 'wp_ajax_nopriv_ajaxcomments', 'misha_submit_ajax_comment' ); // wp_ajax_nopriv_{action} for not registered users

function misha_submit_ajax_comment(){
	/*
	 * Wow, this cool function appeared in WordPress 4.4.0, before that my code was muuuuch mooore longer
	 *
	 * @since 4.4.0
	 */
	$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
	if ( is_wp_error( $comment ) ) {
		$error_data = intval( $comment->get_error_data() );
		if ( ! empty( $error_data ) ) {
			wp_die( '<p>' . $comment->get_error_message() . '</p>', __( 'Comment Submission Failure' ), array( 'response' => $error_data, 'back_link' => true ) );
		} else {
			wp_die( 'Unknown error' );
		}
	}
 
	/*
	 * Set Cookies
	 */
	$user = wp_get_current_user();
	do_action('set_comment_cookies', $comment, $user);
 
	/*
	 * If you do not like this loop, pass the comment depth from JavaScript code
	 */
	$comment_depth = 1;
	$comment_parent = $comment->comment_parent;
	while( $comment_parent ){
		$comment_depth++;
		$parent_comment = get_comment( $comment_parent );
		$comment_parent = $parent_comment->comment_parent;
	}
 
 	/*
 	 * Set the globals, so our comment functions below will work correctly
 	 */
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $comment_depth;
	
	/*
	 * Here is the comment template, you can configure it for your website
	 * or you can try to find a ready function in your theme files
	 */
	$comment_html = '<li ' . comment_class('', null, null, false ) . ' id="comment-' . get_comment_ID() . '">
		<article class="comment-body" id="div-comment-' . get_comment_ID() . '">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					' . get_avatar( $comment, 100 ) . '
					<b class="fn">' . get_comment_author_link() . '</b> <span class="says">says:</span>
				</div>
				<div class="comment-metadata">
					<span>' . sprintf('%1$s at %2$s', get_comment_date(),  get_comment_time() ) . '</span>';
					
					if( $edit_link = get_edit_comment_link() )
						$comment_html .= '<span class="edit-link"><a class="comment-edit-link" href="' . $edit_link . '">Edit</a></span>';
					
				$comment_html .= '</div>';
				if ( $comment->comment_approved == '0' )
					$comment_html .= '<p class="comment-awaiting-moderation">Your comment is awaiting moderation.</p>';

			$comment_html .= '</footer>
			<div class="comment-content">' . apply_filters( 'comment_text', get_comment_text( $comment ), $comment ) . '</div>
			<div class="reply"><a rel="nofollow" class="comment-reply-link" href="'.get_permalink( get_the_ID() ).'?replytocom='.get_comment_ID().'#respond" data-commentid="'.get_comment_ID().'" data-postid="'.get_the_ID().'" data-belowelement="div-comment-'.get_comment_ID().'" data-respondelement="respond" data-replyto="להגיב ל '.get_comment_author($comment->comment_ID).'" aria-label="להגיב ל '.get_comment_author($comment->comment_ID).'" role="link">הגב</a></div>
		</article>
	</li>';
	echo $comment_html;

	die();
	
}

// My theme comments
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>
        <div class="comment-meta commentmetadata">
            <span><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s at %2$s'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </span><?php 
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </div>

        <?php comment_text(); ?>

        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}

// Blog Posts Ajax function
add_action( 'wp_ajax_nopriv_shosh_load_more_post_ajax', 'shosh_load_more_post_ajax_call_back' );
add_action( 'wp_ajax_shosh_load_more_post_ajax', 'shosh_load_more_post_ajax_call_back' );

function shosh_load_more_post_ajax_call_back(){

	//$posts_per_page = ( isset( $_POST["posts_per_page"] ) ) ? $_POST["posts_per_page"] : 3;
	$page = ( isset( $_POST['pageNumber'] ) ) ? $_POST['pageNumber'] : 1;

	$args = array(
		'post_type' => 'post',
		//'posts_per_page' => $posts_per_page,
		'post_status' => 'publish', 
		'paged'    => $page,
	);

	$the_query = new WP_Query( $args );

	$html = '';
	ob_start();

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts()) { $the_query->the_post();
			$grid_view = get_field( 'grid_view' );
			?>
			<article id="post-<?php the_ID(); ?>" class="post <?php if($grid_view) {echo $grid_view;}?>">
				<div class="post-thumbnail fix">
					<a href="<?php the_permalink(); ?>" class="thumbnail">
						<?php 
							if($grid_view == "landscape") :
								the_post_thumbnail('blog-image-landscape');
							elseif($grid_view == "portrait") :
								the_post_thumbnail('blog-image-portrait');
							elseif($grid_view == "square") :
								the_post_thumbnail('blog-image-square');
							else :
								the_post_thumbnail();
							endif;
						?>
						<div class="thumb-loading"></div>
					</a>
				</div>
				<header class="entry-header fix">
					<div class="post-category fix">
						<p>לקריאה <svg xmlns="http://www.w3.org/2000/svg" width="8" height="15" viewBox="0 0 8 15" fill="none">
			<path d="M4.35355 0.646446C4.15829 0.451184 3.84171 0.451184 3.64645 0.646446L0.464466 3.82843C0.269204 4.02369 0.269204 4.34027 0.464466 4.53553C0.659728 4.7308 0.976311 4.7308 1.17157 4.53553L4 1.70711L6.82843 4.53553C7.02369 4.7308 7.34027 4.7308 7.53553 4.53553C7.7308 4.34027 7.7308 4.02369 7.53553 3.82843L4.35355 0.646446ZM4.5 15L4.5 1L3.5 1L3.5 15L4.5 15Z" fill="black"/>
			</svg></p>
					</div>
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta fix">
							<span class="comments"><?php echo get_comments_number(); ?> תגובות</span>
							<span class="date"><?php echo get_the_date( 'd.m.y' ) ?></span>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
			</article>
			<?php
		}
	} 

	wp_reset_postdata();
	$html .= ob_get_clean();

	wp_send_json( array( 'html' => $html ) );
}


// Load homepage data using ajax
add_action( 'wp_ajax_nopriv_homepage_data_ajax', 'homepage_data_ajax_call_back' );
add_action( 'wp_ajax_homepage_data_ajax', 'homepage_data_ajax_call_back' );

function homepage_data_ajax_call_back(){
	$html = '';
	ob_start();
	
	echo "<h2>Homepage data ajax</h2>";

	wp_reset_postdata();
	$html .= ob_get_clean();

	wp_send_json( array( 'html' => $html ) );
}