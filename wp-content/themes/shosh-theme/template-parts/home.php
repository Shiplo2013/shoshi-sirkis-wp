<?php
$pageData = get_fields();
?>
<div id="horizontal-container" class="fix">
    <div class="scrollContainer fix">
        <div class="section section-100 home-section1 fix" data-width="100" id="welcome">
            <?php
                $section_1 = $pageData['section_one'];
                if( $section_1 ): 
            ?>
            <div class="home-image home-image1 fix">
                <?php echo wp_get_attachment_image( $section_1['image_1'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image2 fix">
                <?php echo wp_get_attachment_image( $section_1['image_2'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image3 fix">
                <?php echo wp_get_attachment_image( $section_1['image_3'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image4 fix">
                <?php echo wp_get_attachment_image( $section_1['image_4'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image5 fix">
                <?php echo wp_get_attachment_image( $section_1['image_5'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="section section-100 home-section2 fix" id="home" data-width="100">
            <?php
                $section_2 = $pageData['section_two'];
                if( $section_2 ): 
            ?>
            <div class="home-image home-image6 fix">
                <?php echo wp_get_attachment_image( $section_2['image_1'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-section-title fix">
                <h1><?php echo $section_2['title_logo']; ?></h1>
                <h3><?php echo $section_2['subtitle']; ?></h3>
            </div>
            <div class="home-image home-image7 fix">
                <?php echo wp_get_attachment_image( $section_2['image_2'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="section section-100 home-section3 fix" data-width="100">
            <?php
                $section_3 =$pageData['section_three'];
                if( $section_3 ): 
            ?>
            <div class="home-image home-image8 fix">
                <?php echo wp_get_attachment_image( $section_3['image_1'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image9 fix">
                <?php echo wp_get_attachment_image( $section_3['image_2'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-sec3-image3 fix">
                <?php echo wp_get_attachment_image( $section_3['image_3'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="section section-100 home-section4 fix" data-width="100">
            <?php
                $section_4 = $pageData['section_four'];
                if( $section_4 ): 
            ?>
            <div class="home-image home-image10 fix">
                <?php echo wp_get_attachment_image( $section_4['image_1'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image11 fix">
                <?php echo wp_get_attachment_image( $section_4['image_2'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image12 fix">
                <?php echo wp_get_attachment_image( $section_4['image_3'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image13 fix">
                <?php echo wp_get_attachment_image( $section_4['image_4'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="section section-100 home-section5 fix" data-width="100">
            <?php
                $section_5 = $pageData['section_five'];
                if( $section_5 ): 
            ?>
            <div class="home-image home-image14 fix">
                <?php echo wp_get_attachment_image( $section_5['image_1'], 'large', "", array( "class" => "img-responsive" ) );  ?>
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
                $section_6 = $pageData['section_six'];
                if( $section_6 ): 
            ?>
            <div class="home-image home-image15 fix">
                <?php echo wp_get_attachment_image( $section_6['image_1'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image16 fix">
                <?php echo wp_get_attachment_image( $section_6['image_2'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image17 fix">
                <?php echo wp_get_attachment_image( $section_6['image_3'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image18 fix">
                <?php echo wp_get_attachment_image( $section_6['image_4'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="home-image home-image20 fix">
                <?php echo wp_get_attachment_image( $section_6['image_5'], 'large', "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="section section-40 home-section7 fix" data-width="40">
            <?php
                $section_7 = $pageData['section_seven'];
                if( $section_7 ): 
            ?>
            <div class="home-image home-image19 fix">
                <?php echo wp_get_attachment_image( $section_7['image_1'], 'large', "", array( "class" => "img-responsive" ) );  ?>
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