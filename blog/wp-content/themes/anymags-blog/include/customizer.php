<?php

function anymags_blog_sections_settings( $wp_customize ) {

	$wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
   
    $wp_customize->add_panel( 'anymags_theme_options', array(
        'title'     => __( 'Anymags Blog Theme Options', 'anymags-blog' ),
        'priority'  => 1,
    ) );

		//Upload Banner Image
	$wp_customize->add_section('anymags_blog_banner_image_section', array(
	    'title' => esc_html__('Anymags Blog Banner Image Setting', 'anymags-blog') ,
	    'panel' => 'anymags_theme_options',
	    'priority' => 10
	));

	// Banner Image Display Control
	$wp_customize->add_setting('anymags_blog_banner_image_display', array(
	    'default' => true,
	    'sanitize_callback' => 'anymags_sanitize_checkbox',
	));

	$wp_customize->add_control('anymags_blog_banner_image_display', array(
	    'label' => esc_html__('Display Banner Image', 'anymags-blog') ,
	    'section' => 'anymags_blog_banner_image_section',
	    'priority' => 4,
	    'type' => 'checkbox'
	));

     $wp_customize
        ->selective_refresh
        ->add_partial('anymags_blog_banner_image_display', array(
        'selector' => '.add-banner',
        'settings' => 'anymags_blog_banner_image_display',

    ));

    $wp_customize->add_setting('anymags_blog_banner_image_setting', array(
        'default' => get_theme_file_uri('/assets/images/mgb-default-banner.jpg') , // Add Default Image URL
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anymags_blog_banner_image_control', array(
        'label' => esc_html__('Upload Banner Image', 'anymags-blog') ,
        'description' => sprintf(esc_html__('Recommended size: 728px x 90px ', 'anymags-blog') , 810, 120) ,
        'priority' => 5,
        'section' => 'anymags_blog_banner_image_section',
        'settings' => 'anymags_blog_banner_image_setting',
        'active_callback' => 'anymags_blog_social_active_callback',
        'button_labels' => array( // All These labels are optional
            'select' => __('Select Image', 'anymags-blog'),
            'remove' => __('Remove Image', 'anymags-blog'),
            'change' => __('Change Image', 'anymags-blog'),
        )
     )));

    // Banner Link URL
    $wp_customize->add_setting('anymags_blog_banner_link_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('anymags_blog_banner_link_url', array(
        'label' => esc_html__('Banner Link URL', 'anymags-blog') ,
        'section' => 'anymags_blog_banner_image_section',
        'priority' => 6,
        'type' => 'url',
        'active_callback' => 'anymags_blog_social_active_callback'
    ));
}
add_action( 'customize_register', 'anymags_blog_sections_settings', 30);
if (!function_exists('anymags_blog_social_active_callback')):
    function anymags_blog_social_active_callback()
    {
        $show_social = get_theme_mod('anymags_blog_banner_image_display', true);

        if ($show_social)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;