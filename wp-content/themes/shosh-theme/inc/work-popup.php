<!-- Work Popup -->
<section id="works-popup" class="fix">
	<div class="container fix">
		<div class="works-popup-wrapper fix">
			<div class="works-popup-head fix">
				<div class="site-logo fix">
					<?php
					if ( the_custom_logo() ) :
						the_custom_logo();
					endif; ?>
				</div>
				<button type="button" id="work-close">(x) חזרה</button>
			</div>
			<div class="works-popup-content fix">
				<div class="works-content-right fix">
					<?php
					$args = array( 
						'post_type' => 'work-items',
						'post_status' => 'publish',
						'posts_per_page' => 10,
						'order' => 'ASC',
						'no_found_rows' => true, 
						'update_post_meta_cache' => false, 
						'update_post_term_cache' => false,
					);
					// The Query
					$the_query = new WP_Query( $args );
					$myworks = $the_query->get_posts(); ?>

					<div class="works-links fix">
						<?php if( ! empty( $myworks ) ){
	$link = 0;
	foreach ( $myworks as $work ){ ?>
						<a href="<?php echo esc_url( get_permalink($work->ID) ); ?>" data-id="<?php echo $work->ID; ?>" class="single-work <?php if($link == 0) { ?>active<?php } ?>"><?php echo $work->post_title; ?></a>
						<?php
								  $link++;
								 }
} ?>
					</div>

					<div class="works-images fix">
						<?php
						$count = 0;
						if( $the_query->have_posts() ) :
						while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="single-work-image <?php if($count == 0) { ?>active<?php } ?> fix" id="work-<?php the_ID(); ?>">
							<?php the_post_thumbnail('work-image'); ?>
						</div>
						<?php
						$count++;	
						endwhile;
						wp_reset_postdata();
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Work Popup -->