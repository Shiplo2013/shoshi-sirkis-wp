<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shosh_Theme
 */
$next_post = get_next_post();
$contWidth = 133;
if( have_rows('content_sections') ):
while( have_rows('content_sections') ): the_row();
$section_width = get_sub_field('section_width');
$contWidth = $contWidth + $section_width;
endwhile;
endif;
get_header(); ?>

	<main id="primary" class="site-main fix">
		<div class="blog-posts-area fix">
			<div class="blog-posts-wrapper blog-container fix" style="min-width: <?php echo $contWidth; ?>vw;">
				<div class="blog-section menu-space fix"></div>
				<div class="blog-section featured-image fix">
					<?php the_post_thumbnail('blog-image-featured'); ?>
				</div>
				<div class="blog-section blog-content fix">
					<?php while (have_posts()) : the_post(); ?>
					<div class="post-title fix">
						<h2><?php the_title(); ?></h2>
					</div>
					<div class="content-text fix">
						<?php the_content(); ?>
					</div>
					<?php endwhile;?>
				</div>

				<?php if( have_rows('content_sections') ): ?>
					<?php while( have_rows('content_sections') ): the_row();
						$section_width = get_sub_field('section_width');
						$content_type = get_sub_field('content_type');
						$only_image = get_sub_field('only_image');
						$full_image = get_sub_field('full_image');
						$image_caption = get_sub_field('image_and_caption');
						$image_content_marker = get_sub_field('image_content_marker');
						$image_slider = get_sub_field('image_slider');
					?>
					<div class="blog-section blog-dynamic work-<?php echo $content_type; ?> <?php echo $only_image['image_position']; ?> fix" data-width="<?php echo $section_width; ?>">
						<?php if($content_type === "space") : ?>
						<div class="white-space fix"></div>
						<?php endif; ?>
						
						<?php if($content_type === "only-image") : ?>
							<?php if(count( $only_image['image'] ) > 1) : ?>
							<div class="swiper image-slider only-image fix">

								<div class="swiper-wrapper fix">
									<?php foreach( $only_image['image'] as $image ): ?>
									<div class="swiper-slide single-slide fix">
										<img src="<?php echo esc_url($image['sizes']['slider-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</div>
									<?php endforeach; ?>
								</div>

								<div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s2.svg" alt="Left" /></div>
								<div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s1.svg" alt="Right" /></div>
							</div>
							<?php else : ?>
							<div class="only-image fix">
								<?php foreach( $only_image['image'] as $image ): ?>
								<div class="swiper-slide single-slide fix">
									<img src="<?php echo esc_url($image['sizes']['slider-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						<?php endif; ?>
						
						<?php if($content_type === "full-image") : ?>
							<?php if(count($full_image) > 1) : ?>
							<div class="swiper image-slider full-image fix">

								<div class="swiper-wrapper fix">
									<?php foreach( $full_image as $row ): 
										$image = $row['image'];

										$imgpos = "";
										if($row['marker_position']['top']) {
											$imgpos = $imgpos ."top: ". $row['marker_position']['top'].";";
										}
										if($row['marker_position']['bottom']) {
											$imgpos = $imgpos ."bottom: ". $row['marker_position']['bottom'].";";
										}
										if($row['marker_position']['left']) {
											$imgpos = $imgpos ."left: ". $row['marker_position']['left'].";";
										}
										if($row['marker_position']['right']) {
											$imgpos = $imgpos ."right: ". $row['marker_position']['right'].";";
										}
									?>
									<div class="swiper-slide single-slide fix">
										<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
										<?php if($row['add_marker'] == "1" && $row['marker_content']) : ?>
										<div class="marker-wrapper fix" style="<?php echo $imgpos; ?>">
											<div class="marker-text fix">
												<?php echo $row['marker_content']; ?>
											</div>
										</div>
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
								</div>

								<div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s2.svg" alt="Left" /></div>
								<div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s1.svg" alt="Right" /></div>
							</div>
							<?php else : 
							$imgpos = "";
							if($full_image[0]['marker_position']['top']) {
								$imgpos = $imgpos ."top: ". $full_image[0]['marker_position']['top'].";";
							}
							if($full_image[0]['marker_position']['bottom']) {
								$imgpos = $imgpos ."bottom: ". $full_image[0]['marker_position']['bottom'].";";
							}
							if($full_image[0]['marker_position']['left']) {
								$imgpos = $imgpos ."left: ". $full_image[0]['marker_position']['left'].";";
							}
							if($full_image[0]['marker_position']['right']) {
								$imgpos = $imgpos ."right: ". $full_image[0]['marker_position']['right'].";";
							}
							?>
							<div class="full-image fix">
								<?php echo wp_get_attachment_image( $full_image[0]['image']['ID'], "full", "", array( "class" => "img-responsive" ) );  ?>
								<?php if($full_image[0]['add_marker'] == "1" && $full_image[0]['marker_content']) : ?>
								<div class="marker-wrapper fix" style="<?php echo $imgpos; ?>">
									<div class="marker-text fix">
										<?php echo $full_image[0]['marker_content']; ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						<?php endif; ?>
						
						<?php if($content_type === "image-caption") : ?>
							<?php if(count( $image_caption['images_slides'] ) > 1) : ?>
							<div class="swiper image-slider image-caption fix <?php echo $image_caption['image_position']; ?>">
								<div class="swiper-wrapper fix">
									<?php foreach( $image_caption['images_slides'] as $row ): 
									$image = $row['image'];
									?>
									<div class="swiper-slide single-slide fix">
										<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
										<?php if($row['image_caption']) : ?>
										<figcaption class="caption">
											<?php echo $row['image_caption']; ?>
										</figcaption>
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
								</div>

								<div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s2.svg" alt="Left" /></div>
								<div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s1.svg" alt="Right" /></div>
							</div>
							<?php else : ?>
							<div class="image-caption fix <?php echo $image_caption['image_position']; ?>">
								<?php echo wp_get_attachment_image( $image_caption['images_slides'][0]['image']['ID'], "full", "", array( "class" => "img-responsive" ) );  ?>
								<?php if($image_caption['images_slides'][0]['image_caption']) : ?>
								<figcaption class="caption">
									<?php echo $image_caption['images_slides'][0]['image_caption']; ?>
								</figcaption>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						<?php endif; ?>
						
						<?php if($content_type === "image-marker") : ?>
						<div class="image-marker-content fix">
							<?php if(count($image_content_marker['image_slider']) > 1) : ?>
							<div class="swiper marker-image image-slider fix">
								<div class="swiper-wrapper fix">
									<?php foreach( $image_content_marker['image_slider'] as $image ): 
										$imgPosition = "";
										if($image['marker_position']['top']) {
											$imgPosition = $imgPosition ."top: ". $image['marker_position']['top'].";";
										}
										if($image['marker_position']['bottom']) {
											$imgPosition = $imgPosition ."bottom: ". $image['marker_position']['bottom'].";";
										}
										if($image['marker_position']['left']) {
											$imgPosition = $imgPosition ."left: ". $image['marker_position']['left'].";";
										}
										if($image['marker_position']['right']) {
											$imgPosition = $imgPosition ."right: ". $image['marker_position']['right'].";";
										}
									?>
									<div class="swiper-slide single-slide fix">
										<?php echo wp_get_attachment_image( $image['image']['ID'], "full", "", array( "class" => "img-responsive" ) );  ?>
										<?php if($image['marker_text']) : ?>
										<div class="marker-wrapper fix" style="<?php echo $imgPosition; ?>">
											<div class="marker-text fix">
												<?php echo $image['marker_text']; ?>
											</div>
										</div>
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
								</div>

								<div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s2.svg" alt="Left" /></div>
								<div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s1.svg" alt="Right" /></div>
							</div>
							<?php else : 
							$imgPosition = "";
							if($image_content_marker['image_slider'][0]['marker_position']['top']) {
								$imgPosition = $imgPosition ."top: ". $image_content_marker['image_slider'][0]['marker_position']['top'].";";
							}
							if($image_content_marker['image_slider'][0]['marker_position']['bottom']) {
								$imgPosition = $imgPosition ."bottom: ". $image_content_marker['image_slider'][0]['marker_position']['bottom'].";";
							}
							if($image_content_marker['image_slider'][0]['marker_position']['left']) {
								$imgPosition = $imgPosition ."left: ". $image_content_marker['image_slider'][0]['marker_position']['left'].";";
							}
							if($image_content_marker['image_slider'][0]['marker_position']['right']) {
								$imgPosition = $imgPosition ."right: ". $image_content_marker['image_slider'][0]['marker_position']['right'].";";
							}
							?>
							<div class="marker-image fix">
								<?php echo wp_get_attachment_image( $image_content_marker['image_slider'][0]['image']['ID'], "full", "", array( "class" => "img-responsive" ) );  ?>
								<?php if($image_content_marker['image_slider'][0]['marker_text']) : ?>
								<div class="marker-wrapper fix" style="<?php echo $imgPosition; ?>">
									<div class="marker-text fix">
										<?php echo $image_content_marker['image_slider'][0]['marker_text']; ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<div class="marker-content fix">
								<?php echo $image_content_marker['image_content']; ?>
							</div>
						</div>
						<?php endif; ?>
						
						<?php if($content_type === "image-slider") : ?>
							<?php if( count( $image_slider['slide_images'] ) > 1 ) : ?>
							<div class="swiper image-slider fix <?php echo $image_slider['slider_position']; ?>">

								<div class="swiper-wrapper fix">
									<?php foreach( $image_slider['slide_images'] as $image ): ?>
									<div class="swiper-slide single-slide fix">
										<img src="<?php echo esc_url($image['sizes']['slider-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</div>
									<?php endforeach; ?>
								</div>

								<div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s2.svg" alt="Left" /></div>
								<div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-s1.svg" alt="Right" /></div>
							</div>
							<?php else : ?>
							<div class="image-slider fix <?php echo $image_slider['slider_position']; ?>">

								<div class="swiper-wrapper fix">
									<?php foreach( $image_slider['slide_images'] as $image ): ?>
									<div class="swiper-slide single-slide fix">
										<img src="<?php echo esc_url($image['sizes']['slider-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</div>
									<?php endforeach; ?>
								</div>

							</div>
							<?php endif; ?>
						<?php endif; ?>

					</div>
					<?php endwhile; ?>
				<?php endif; ?>
				
				<?php if($next_post) : ?>
				<div class="blog-section next-page-section fix">
					<div class="next-page fix">
						<div class="next-page-image fix">
							<a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail( $next_post->ID, array(476, 944, true), array( "class" => "img-responsive" ) );  ?></a>
						</div>
						<div class="next-page-content fix">
							<h3><a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a></h3>
							<a href="<?php echo get_permalink($next_post->ID); ?>" class="next-link">
								<span>אבה טקייורפל</span>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="icon" />
							</a>
						</div>
					</div>
				</div>
				<?php else: ?>
				<div class="blog-section next-page-section fix">
					<?php 
					 	$oldest_post_query = get_posts("post_type=work-items&numberposts=1&order=ASC");
 						$first_post = $oldest_post_query[0]->ID;
					?>
					<div class="next-page fix">
						<div class="next-page-image fix">
							<a href="<?php echo get_permalink($first_post); ?>"><?php echo get_the_post_thumbnail( $first_post, array(476, 944, true), array( "class" => "img-responsive" ) );  ?></a>
						</div>
						<div class="next-page-content fix">
							<h3><a href="<?php echo get_permalink($first_post); ?>"><?php echo get_the_title( $first_post ); ?></a></h3>
							<a href="<?php echo get_permalink($first_post); ?>" class="next-link">
								<span>אבה טקייורפל</span>
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
