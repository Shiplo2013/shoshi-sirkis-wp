<?php
/**
 * Template Name: Welcome Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shosh_Theme
 */

get_header(); ?>

	<main id="primary" class="site-main fix">

        <div id="horizontal-container" class="fix">
            <div class="scrollContainer fix">
                <div class="section section-100 home-section1 fix" data-width="100" id="welcome">
					<?php
						$section_1 = get_field('section_one');
						if( $section_1 ): 
					?>
                    <div class="home-image home-image1 fix">
						<?php echo wp_get_attachment_image( $section_1['image_1'], array(768, 540, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image2 fix">
						<?php echo wp_get_attachment_image( $section_1['image_2'], array(410, 290, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image3 fix">
						<?php echo wp_get_attachment_image( $section_1['image_3'], array(358, 578, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image4 fix">
						<?php echo wp_get_attachment_image( $section_1['image_4'], array(530, 365, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image5 fix">
						<?php echo wp_get_attachment_image( $section_1['image_5'], array(256, 352, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
					<?php endif; ?>
                </div>

                <div class="section section-100 home-section2 fix" id="home" data-width="100">
					<?php
						$section_2 = get_field('section_two');
						if( $section_2 ): 
					?>
                    <div class="home-image home-image6 fix">
						<?php echo wp_get_attachment_image( $section_2['image_1'], array(600, 600, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-section-title fix">
                        <h1><?php echo $section_2['title_logo']; ?></h1>
                        <h3><?php echo $section_2['subtitle']; ?></h3>
                    </div>
                    <div class="home-image home-image7 fix">
						<?php echo wp_get_attachment_image( $section_2['image_2'], array(435, 315, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
					<?php endif; ?>
                </div>

                <div class="section section-100 home-section3 fix" data-width="100">
					<?php
						$section_3 = get_field('section_three');
						if( $section_3 ): 
					?>
                    <div class="home-image home-image8 fix">
						<?php echo wp_get_attachment_image( $section_3['image_1'], array(820, 1070, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image9 fix">
						<?php echo wp_get_attachment_image( $section_3['image_2'], array(950, 365, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-sec3-image3 fix">
						<?php echo wp_get_attachment_image( $section_3['image_3'], array(400, 580, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
					<?php endif; ?>
                </div>

                <div class="section section-100 home-section4 fix" data-width="100">
					<?php
						$section_4 = get_field('section_four');
						if( $section_4 ): 
					?>
                    <div class="home-image home-image10 fix">
						<?php echo wp_get_attachment_image( $section_4['image_1'], array(510, 680, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image11 fix">
						<?php echo wp_get_attachment_image( $section_4['image_2'], array(384, 314, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image12 fix">
						<?php echo wp_get_attachment_image( $section_4['image_3'], array(560, 370, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image13 fix">
						<?php echo wp_get_attachment_image( $section_4['image_4'], array(460, 330, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
					<?php endif; ?>
                </div>

                <div class="section section-100 home-section5 fix" data-width="100">
					<?php
						$section_5 = get_field('section_five');
						if( $section_5 ): 
					?>
                    <div class="home-image home-image14 fix">
						<?php echo wp_get_attachment_image( $section_5['image_1'], array(793, 818, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="section5-texts fix">
                        <div class="text-top fix">
                            <?php echo $section_5['text_top']; ?>
                        </div>
                        <div class="text-bottom fix">
                            <?php echo $section_5['text_bottom']; ?>
                        </div>
                    </div>
					<?php endif; ?>
                </div>

                <div class="section section-100 home-section6 fix" data-width="100">
					<?php
						$section_6 = get_field('section_six');
						if( $section_6 ): 
					?>
                    <div class="home-image home-image15 fix">
						<?php echo wp_get_attachment_image( $section_6['image_1'], array(714, 877, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image16 fix">
						<?php echo wp_get_attachment_image( $section_6['image_2'], array(435, 490, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image17 fix">
						<?php echo wp_get_attachment_image( $section_6['image_3'], array(280, 325, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image18 fix">
						<?php echo wp_get_attachment_image( $section_6['image_4'], array(280, 325, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
                    <div class="home-image home-image20 fix">
						<?php echo wp_get_attachment_image( $section_6['image_5'], array(322, 365, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
					<?php endif; ?>
                </div>

                <div class="section section-40 home-section7 fix" data-width="40">
					<?php
						$section_7 = get_field('section_seven');
						if( $section_7 ): 
					?>
                    <div class="home-image home-image19 fix">
						<?php echo wp_get_attachment_image( $section_7['image_1'], array(820, 1130, true), "", array( "class" => "img-responsive" ) );  ?>
                    </div>
					<?php endif; ?>
					
					<div class="mobile-home-menu">
						<?php
							wp_nav_menu(
								array(
									'theme_location'	=> 'menu-2',
									'menu_id'			=> 'home-footer-menu'
								)
							);
						?>
					</div>
                </div>
            </div>
        </div>

	</main><!-- #main -->

	<!--<div id='cursorFollower'>אם גוללים, מגיעים למקומות נפלאים</div>-->
	
	<div class="scrollbar">
		<div id='scrollBar'></div>
	</div>

<?php get_footer(); ?>