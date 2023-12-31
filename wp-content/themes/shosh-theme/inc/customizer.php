<?php
/**
 * Shosh Theme Theme Customizer
 *
 * @package Shosh_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shosh_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'shosh_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'shosh_theme_customize_partial_blogdescription',
			)
		);
	}
	// Contact Section
	$wp_customize->add_section('contact_section_options' , array(
		'title'     => __('Contact Section', 'shosh-theme'),
		'priority'  => 10
	));
	// Contact Email
	$wp_customize->add_setting( 'contact_email_settings' , array(
	    'default'       => 'info(at)davidwilliambaum.com',
    	'type'          => 'theme_mod',
    	'transport'     => 'refresh',
    ));
    $wp_customize->add_control( 'contact_email', array(
    	'label'      => __('Add Contact Email', 'shosh-theme'),
    	'section'    => 'contact_section_options',
    	'settings'   => 'contact_email_settings',
    	'type'       => 'text',
    ));
	// Contact Phone
	$wp_customize->add_setting( 'contact_phone_setting' , array(
	    'default'       => '+1 734-751-8562',
    	'type'          => 'theme_mod',
    	'transport'     => 'refresh',
    ));
    $wp_customize->add_control( 'contact_phone', array(
    	'label'      => __('Add your Phone number', 'shosh-theme'),
    	'section'    => 'contact_section_options',
    	'settings'   => 'contact_phone_setting',
    	'type'       => 'text',
    ));
	// Contact Instagram
	$wp_customize->add_setting( 'contact_instagram_setting' , array(
	    'default'       => 'davidwilliambaum',
    	'type'          => 'theme_mod',
    	'transport'     => 'refresh',
    ));
    $wp_customize->add_control( 'contact_instagram', array(
    	'label'      => __('Add your Instagram Username', 'shosh-theme'),
    	'section'    => 'contact_section_options',
    	'settings'   => 'contact_instagram_setting',
    	'type'       => 'text',
    ));
	// Contact Image
	$wp_customize->add_setting( 'contact_image_setting', array(
        'transport'   => 'refresh',
        'height'      => 325,
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'contact_image', array(
		'label'    => __( 'Add contact Image', 'shosh-theme' ),
		'section'  => 'contact_section_options',
		'settings' => 'contact_image_setting',
	) ) );
	
	
	
	
}
add_action( 'customize_register', 'shosh_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function shosh_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function shosh_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shosh_theme_customize_preview_js() {
	wp_enqueue_script( 'shosh-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'shosh_theme_customize_preview_js' );
