<?php

/**
 * The template for displaying Single Page Customizer Settings
 *
 * @package Roven-Blog
 */
// Page Settings section.
new \Kirki\Section( 'rovenblog_page_settings', array(
    'title'    => esc_html__( 'Single Page', 'roven-blog' ),
    'priority' => 31,
) );
// Display page header option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_show_page_header',
    'label'    => esc_html__( 'Display page header', 'roven-blog' ),
    'section'  => 'rovenblog_page_settings',
    'default'  => '1',
    'priority' => 3,
) );
// Featured Image Aspect Ratio option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'radio_image',
    'settings'        => 'rovenblog_page_featured_aspect',
    'label'           => esc_html__( 'Featured Image Aspect Ratio', 'roven-blog' ),
    'section'         => 'rovenblog_page_settings',
    'default'         => 'hero',
    'choices'         => array(
    'hero'      => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-hero.png',
    'landscape' => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-landscape.png',
    'portrait'  => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-portrait.png',
    'square'    => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-square.png',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_page_header',
    'operator' => '===',
    'value'    => true,
) ),
    'priority'        => 7,
) );