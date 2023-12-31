<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shosh_Theme
 */
$next_post = get_next_post();
$contWidth = 173;
if( have_rows('content_sections') ):
while( have_rows('content_sections') ): the_row();
$section_width = get_sub_field('section_width');
$contWidth = $contWidth + $section_width;
endwhile;
endif;
get_header(); ?>

	<main id="primary" class="site-main fix">
		<div class="blog-posts-area fix">
			<div id="post-loader">
				<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
			</div>
			<div class="blog-posts-wrapper blog-container fix" style="min-width: <?php echo $contWidth; ?>vw;">
				<div class="blog-section menu-space fix"></div>
				<div class="blog-section featured-image fix">
					<?php the_post_thumbnail('blog-image-featured'); ?>
				</div>
				<div class="blog-section blog-content fix">
					<?php while (have_posts()) : the_post(); ?>
					<div class="content-text fix">
						<?php the_content(); ?>
						<?php if(get_field('extra_text')) : ?>
						<p class="extra-text">
							<span><?php echo get_field('extra_text'); ?></span>
							<span>:המלצת קריאה</span>
						</p>
						<?php endif; ?>
					</div>
					<div class="data-time fix">
						<p>תאריך: <?php the_date('d.m.y'); ?></p>
						<p><a href="#comment-section" class="goComment"><?php echo get_comments_number(); ?> תגובות</a></p>
					</div>
					<div class="post-title fix">
						<h2><?php the_title(); ?></h2>
					</div>
					<?php endwhile;?>
				</div>

				<?php if( have_rows('content_sections') ): ?>
					<?php while( have_rows('content_sections') ): the_row();
						$section_width = get_sub_field('section_width');
						$content_type = get_sub_field('content_type');
						$text_only = get_sub_field('text_only');
						$animated_title = get_sub_field('animated_title');
						$image = get_sub_field('image');
						$full_image = get_sub_field('full_image');
						$gallery_view = get_sub_field('gallery_view');
						$image_and_text = get_sub_field('image_and_text');
						$image_and_title = get_sub_field('image_and_title');
					?>
					<div class="blog-section blog-dynamic blog-<?php echo $content_type; ?> <?php if($content_type === 'image-gallery') { echo $gallery_view; } ?> fix" data-width="<?php echo $section_width; ?>">
						<?php if($content_type === "image") : ?>
						<div class="single-image fix">
							<?php echo wp_get_attachment_image( $image['ID'], "full", "", array( "class" => "img-responsive" ) );  ?>
						</div>
						<?php endif; ?>
						
						<?php if($content_type === "full-image") : ?>
						<div class="single-full-image fix">
							<?php echo wp_get_attachment_image( $full_image['ID'], "full", "", array( "class" => "img-responsive" ) );  ?>
						</div>
						<?php endif; ?>
						
						<?php if($content_type === "image-text" && $image_and_text != "") : ?>
						<div class="single-image-text fix">
							<?php echo wp_get_attachment_image( $image_and_text['image']['id'], "full", "", array( "class" => "img-responsive" ) );  ?>
							<?php if($image_and_text['image_caption']) : ?>
							<figcaption class="image-caption fix">
								<?php echo $image_and_text['image_caption']; ?>
							</figcaption>
							<?php endif;?>
						</div>
						<?php endif; ?>
						
						<?php if($content_type === "image-title" && $image_and_title != "") : ?>
						<div class="single-image-title fix">
							<?php if($image_and_title['image_title']) : ?>
							<figcaption class="image-caption fix">
								<?php echo $image_and_title['image_title']; ?>
							</figcaption>
							<?php endif;?>
							<?php echo wp_get_attachment_image( $image_and_title['image']['id'], "full", "", array( "class" => "img-responsive" ) );  ?>
						</div>
						<?php endif; ?>
						
						<?php if($content_type === "image-gallery") : ?>
						<!-- Image Gallery -->
						<?php if( have_rows('gallery_images') ) :
            				while( have_rows('gallery_images') ) : the_row();
							$gallery_image = get_sub_field('gallery_image');
							$image_caption = get_sub_field('image_caption');
						?>
						<div class="single-image-gallery fix">
							<?php echo wp_get_attachment_image( $gallery_image['ID'], "full", "", array( "class" => "img-responsive" ) );  ?>
							<?php if($image_caption) : ?>
							<figcaption class="image-caption fix">
								<?php echo $image_caption; ?>
							</figcaption>
							<?php endif;?>
						</div>
						<?php endwhile;
        				endif; ?>
						<!-- Image Gallery -->
						<?php endif; ?>
						
						<?php if($content_type === "only-text") : ?>
						<!-- Text Only -->
						<div class="only-text fix">
							<?php echo $text_only; ?>
						</div>
						<!-- Text Only -->
						<?php endif; ?>
						
						<?php if($content_type === "anim-title") : ?>
						<div class="animated-title fix">
							<div class="animated-title-init" data-speed="1" data-direction="left">
								<div class="animated-wrapper fix">
									<ul>
										<li><h3><?php echo $animated_title; ?></h3></li>
									</ul>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>

				<div class="blog-section comment-section fix" id="comment-section">
					<div class="blog-comments fix">
						<div class="comment-header fix">
							<div class="comments-text fix">
								<p>אשמח לשמוע מה יש לכתוב לי על הפוסט:</p>
							</div>
							<div class="comment-share fix">
								<button id="copy-button">
									<span class="tooltip">Copied!</span>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M13 7H7V5H13V7Z" fill="black"/>
										<path d="M13 11H7V9H13V11Z" fill="black"/>
										<path d="M7 15H13V13H7V15Z" fill="black"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M3 19V1H17V5H21V23H7V19H3ZM15 17V3H5V17H15ZM17 7V19H9V21H19V7H17Z" fill="black"/>
									</svg>
									<span>Copy Link</span>
								</button>
								<div class="share-wrapper fix">
									<button id="share-button">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11 14.9861C11 15.5384 11.4477 15.9861 12 15.9861C12.5523 15.9861 13 15.5384 13 14.9861V7.82831L16.2428 11.0711L17.657 9.65685L12.0001 4L6.34326 9.65685L7.75748 11.0711L11 7.82854V14.9861Z" fill="black"/>
											<path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="black"/>
										</svg>
										<span>Share Via</span>
									</button>
									<div class="share-lists fix">
										<ul>
											<li><a href="mailto:?subject=<?php the_title(); ?>&amp;body=Check out this post <?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt="Mail"></a></li>
											<li><a href="whatsapp://send?text=<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsup.svg" alt="WhatsApp"></a></li>
											<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="Facebook"></a></li>
											<li><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.svg" alt="Twitter"></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="comments-list fix">
							<?php 
							if ( comments_open() || get_comments_number() ) :
								comments_template('template-parts/commetns.php');
							endif;
							?>
						</div>
					</div>
					<div class="back-to-start">
						<button id="back-to-top">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="icon" />
						</button>
					</div>
				</div>
				
				<?php if($next_post) : ?>
				<div class="blog-section next-page-section fix">
					<div class="next-page fix">
						<div class="next-page-image fix">
							<a href="<?php echo get_permalink($next_post); ?>"><?php echo get_the_post_thumbnail( $next_post->ID, array(360, 944, true), array( "class" => "img-responsive" ) );  ?></a>
						</div>
						<div class="next-page-content fix">
							<h3><a href="<?php echo get_permalink($next_post); ?>"><?php echo $next_post->title; ?></a></h3>
							<a class="next-link" href="<?php echo get_permalink($next_post->ID); ?>">
								<span>לפוסט הבא</span>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="icon" />
							</a>
						</div>
					</div>
				</div>
				<?php else: ?>
				<div class="blog-section next-page-section fix">
					<?php 
					 	$oldest_post_query = get_posts("post_type=post&numberposts=1&order=ASC");
 						$first_post = $oldest_post_query[0]->ID;
					?>
					<div class="next-page fix">
						<div class="next-page-image fix">
							<a href="<?php echo get_permalink($first_post); ?>"><?php echo get_the_post_thumbnail( $first_post, array(360, 944, true), array( "class" => "img-responsive" ) );  ?></a>
						</div>
						<div class="next-page-content fix">
							<h3><a href="<?php echo get_permalink($first_post); ?>"><?php echo get_the_title( $first_post ); ?></a></h3>
							<a class="next-link" href="<?php echo get_permalink($first_post); ?>">
								<span>לפוסט הבא</span>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="icon" />
							</a>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>

	</main><!-- #main -->

	<div class="scrollbar">
		<div id='scrollBar'></div>
	</div>

<?php get_footer(); ?>
