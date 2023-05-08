<?php

/**
 * The template for displaying Single Post Customizer Settings
 *
 * @package Roven-Blog
 */
// Single Post Settings section.
new \Kirki\Section( 'rovenblog_post_settings', array(
    'title'    => esc_html__( 'Single Post', 'roven-blog' ),
    'priority' => 45,
) );
// Display author bio option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_post_show_author_bio',
    'label'    => esc_html__( 'Display author bio', 'roven-blog' ),
    'section'  => 'rovenblog_post_settings',
    'default'  => '1',
    'priority' => 2,
) );
// Display related posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_post_show_related_posts',
    'label'    => esc_html__( 'Display related posts', 'roven-blog' ),
    'section'  => 'rovenblog_post_settings',
    'default'  => '1',
    'priority' => 3,
) );
// Display post share buttons option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_post_show_posts_share',
    'label'    => esc_html__( 'Display post share buttons', 'roven-blog' ),
    'section'  => 'rovenblog_post_settings',
    'default'  => '1',
    'priority' => 4,
) );
// Display scroll progress bar option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_post_show_scroll_progress_bar',
    'label'    => esc_html__( 'Display scroll progress bar', 'roven-blog' ),
    'section'  => 'rovenblog_post_settings',
    'default'  => '1',
    'priority' => 5,
) );
// Image Aspect Ratio option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_post_settings_aspect',
    'label'    => esc_html__( 'Image Aspect Ratio', 'roven-blog' ),
    'section'  => 'rovenblog_post_settings',
    'default'  => 'hero',
    'choices'  => array(
    'hero'      => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-hero.png',
    'landscape' => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-landscape.png',
    'portrait'  => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-portrait.png',
    'square'    => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-square.png',
),
    'priority' => 9,
) );
// Customize Progress Bar Color Scheme? option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_post_scroll_progress_color_toggle',
    'label'           => esc_html__( 'Customize Progress Bar Color Scheme?', 'roven-blog' ),
    'section'         => 'rovenblog_post_settings',
    'tooltip'         => esc_html__( 'If you select to customize this section\'s color scheme you will be able to pick custom colors and background colors for it', 'roven-blog' ),
    'default'         => '0',
    'priority'        => 11,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_post_show_scroll_progress_bar',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Scroll progress bar color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_post_scroll_progress_bar_color',
    'label'           => esc_html__( 'Scroll progress bar color', 'roven-blog' ),
    'section'         => 'rovenblog_post_settings',
    'default'         => '#D50747',
    'active_callback' => array( array(
    'setting'  => 'rovenblog_post_show_scroll_progress_bar',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_post_scroll_progress_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
    'priority'        => 11,
) );
// Dark Mode: scroll progress bar color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_darkmode_post_scroll_progress_bar_color',
    'label'           => esc_html__( 'Dark Mode: Scroll progress bar color', 'roven-blog' ),
    'section'         => 'rovenblog_post_settings',
    'default'         => '#2E2D4D',
    'active_callback' => array( array(
    'setting'  => 'rovenblog_post_show_scroll_progress_bar',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_post_scroll_progress_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
    'priority'        => 11,
) );