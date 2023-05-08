<?php

/**
 * The template for displaying Authors Customizer Settings
 *
 * @package Roven-Blog
 */
// Author Page Settings section.
new \Kirki\Section( 'rovenblog_author_settings', array(
    'title'    => esc_html__( 'Authors', 'roven-blog' ),
    'priority' => 44,
) );
// Display sidebar option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_author_show_sidebar',
    'label'    => esc_html__( 'Display sidebar', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => '1',
    'priority' => 1,
) );
// Total number of posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'slider',
    'settings' => 'rovenblog_author_posts_nr',
    'label'    => esc_html__( 'Total number of posts to show', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => 6,
    'choices'  => array(
    'min'  => 1,
    'max'  => 90,
    'step' => 1,
),
    'priority' => 10,
) );
$max_cols = 3;
// Number of grid columns option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'slider',
    'settings' => 'rovenblog_author_grid_columns',
    'label'    => esc_html__( 'Number of grid columns', 'roven-blog' ),
    'tooltip'  => esc_html__( 'If you enable the sidebar, a maximum of 2 columns is recommended', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => 1,
    'choices'  => array(
    'min'  => 1,
    'max'  => $max_cols,
    'step' => 1,
),
    'priority' => 11,
) );
$rb_style = array(
    'style4' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-4.png',
    'style8' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-8.png',
);
// Visual style option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_author_style',
    'label'    => esc_html__( 'Visual style', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => 'style8',
    'choices'  => $rb_style,
    'priority' => 15,
) );
// Image Aspect Ratio option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'radio_image',
    'settings'        => 'rovenblog_author_aspect',
    'label'           => esc_html__( 'Image Aspect Ratio', 'roven-blog' ),
    'section'         => 'rovenblog_author_settings',
    'default'         => 'landscape',
    'choices'         => array(
    'hero'      => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-hero.png',
    'landscape' => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-landscape.png',
    'portrait'  => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-portrait.png',
    'square'    => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-square.png',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_author_grid',
    'operator' => '===',
    'value'    => 'grid',
) ),
    'priority'        => 16,
) );
// Show author in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_author_author',
    'label'    => esc_html__( 'Show author in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => '1',
    'priority' => 18,
) );
// Show category in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_author_category',
    'label'    => esc_html__( 'Show category in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => '1',
    'priority' => 19,
) );
// Show date in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_author_date',
    'label'    => esc_html__( 'Show date in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => '1',
    'priority' => 20,
) );
// Show number of comments in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_author_comments',
    'label'    => esc_html__( 'Show number of comments in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => '1',
    'priority' => 21,
) );
// Show post excerpt option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_author_excerpt',
    'label'    => esc_html__( 'Show post excerpt', 'roven-blog' ),
    'section'  => 'rovenblog_author_settings',
    'default'  => '1',
    'priority' => 22,
) );