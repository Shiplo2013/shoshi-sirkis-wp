<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shosh_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="//fonts.typotheque.com/WF-035428-011939.css" type="text/css" />
	<link rel="stylesheet" href="//fonts.typotheque.com/WF-035428-011940.css" type="text/css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class('loading'); ?>>

<?php if(is_front_page()) : ?>
<!--- PreLoader --->
<section id="loading" class="fix">
	<div class="spinner"><span id="page-load">0%</span></div>
</section>
	<script type="text/javascript">
		// Page Loader Js
		window.addEventListener( 'load', function load() {
			window.removeEventListener('load', load, false);
			document.body.classList.remove('loading');
		}, false);
		// Page Load
		let pageLoad = document.getElementById('page-load');
		let loadp = "";
		function timeout_trigger() {
			pageLoad.innerHTML = loadp+"%";
			if(loadp != 100) {
				setTimeout('timeout_trigger()', 50);
			}
			loadp++;
		}
		timeout_trigger();
	</script>
<!--- PreLoader --->
<?php endif; ?>

<div id="page" class="site fix">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shosh-theme' ); ?></a>
	
	<?php if( (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type() || is_search() ) : ?>
	<!---- Blog Header ---->
	<header id="bloghead" class="site-header fix">
		<div class="bloghead-wrapper fix">
			<div class="blog-head-logo fix">
				<?php
					if ( the_custom_logo() ) :
						the_custom_logo();
					endif; ?>
			</div>
			<div class="blog-head-title fix">
				<?php if(is_blog()) : ?>
				<h2>Blog</h2>
				<?php endif; ?>
				
				<?php if(is_search()) : ?>
				<h2>Search</h2>
				<?php endif; ?>

				<?php if('work-items' == get_post_type()) : ?>
				<h2>Works</h2>
				<?php endif; ?>
			</div>
			<div class="blog-head-right fix">
				<button class="blog-search fix">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="Search">
				</button>
				<button class="blog-menu fix">Menu</button>
			</div>
		</div>
	</header><!-- #masthead -->

    <!-- Blog Menu -->
    <section id="blog-menu-area" class="fix">
        <div class="container fix">
            <div class="blog-menu-wrapper fix">
                <button class="close-blog-menu fix">(x) Close</button>
                <div class="blog-mneu-top fix">
                    <div class="blog-mmenu-categires fix">
						<?php 
						$categories = get_categories();
						foreach($categories as $category) { 
							$thmb = get_field('thumbnail', $category->taxonomy."_".$category->term_id, false);
							$img_atts = wp_get_attachment_image_src($thmb, 'blog-menu-image');
						?>
							<div class="single-category fix">
								<a href="<?php echo get_category_link($category->term_id); ?>" data-src="<?php echo $img_atts[0]; ?>">
									<span><?php echo $category->name; ?></span>
									<span class="post-count">(<?php echo $category->count; ?>)</span>
									<img class="menu-image" src="<?php echo $img_atts[0]; ?>" alt="<?php echo $category->name; ?>" />
								</a>
								<span class="divider">/</span>
							</div>
						<?php } ?>
                    </div>
                    <nav id="blog-navigation" class="blog-navigation fix">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                )
                            );
                        ?>
                    </nav><!-- #site-navigation -->
                </div>
                <div class="blog-mneu-bottom fix">
                    <div class="footer-widget fix">
                        <?php dynamic_sidebar('sidebar-3'); ?>
                    </div>
                    <div class="site-info fix">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div><!-- .site-info -->
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Menu -->
    
    <!-- Back Button -->
    <?php if( is_singular('post') || is_search() ) : ?>
    <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" id="back-home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Bsck"/> Back</a>
    <?php else : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="back-home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Bsck"/> Back</a>
    <?php endif; ?>
    <!-- Back Button -->
	<!---- Blog Header ---->
	<?php elseif( "work-items" === get_post_type() ) : ?>
	<!---- Works Header ---->
	<header id="workshead" class="site-header fix">
		<div class="workshead-wrapper fix">
			<div class="works-menu fix">
				<button class="works-menu-btn fix">Menu</button>
			</div>
			<div class="works-back fix">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="back-home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Bsck"/> Back</a>
			</div>
		</div>
	</header>
	<!---- Works Header ---->
	<?php else : ?>
	<header id="masthead" class="site-header fix">
		<div class="container fix">
			<div class="site-branding fix">
				<div class="site-logo fix">
					<?php
					if ( the_custom_logo() ) :
						the_custom_logo();
					endif; ?>
				</div>
				<button type="button" id="menu-btn">
					<span class="menu-bar fix"></span>
					<span class="menu-bar fix"></span>
					<span class="menu-bar fix"></span>
				</button>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation fix">
				<div class="mobile-menu-head fix">
					<div class="site-logo fix">
						<?php
						if ( the_custom_logo() ) :
							the_custom_logo();
						endif; ?>
					</div>
					<button id="close-btn">
						<span class="close-bar fix"></span>
						<span class="close-bar fix"></span>
					</button>
				</div>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .container -->
	</header><!-- #masthead -->
	<?php endif; ?>
