<?php

/**
 * The template for displaying theme Homepage Recent Posts Customizer Settings
 *
 * @package Roven-Blog
 */
// Homepage Recent Posts section.
new \Kirki\Section( 'rovenblog_home_recent_posts', array(
    'title'    => esc_html__( 'Homepage Recent Posts', 'roven-blog' ),
    'priority' => 35,
) );
// Section Title option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'text',
    'settings' => 'rovenblog_home_recent_posts_title',
    'label'    => esc_html__( 'Section Title', 'roven-blog' ),
    'tooltip'  => esc_html__( 'Leave empty if you do not want the section to have a title', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => esc_html__( 'Latest posts', 'roven-blog' ),
    'priority' => 2,
) );
// Exclude posts from sections placed above Latest Posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_recent_posts_exclude',
    'label'    => esc_html__( 'Exclude posts from sections placed above Latest Posts', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => '1',
    'priority' => 4,
) );
// Total number of posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'slider',
    'settings' => 'rovenblog_home_recent_posts_nr',
    'label'    => esc_html__( 'Total number of posts to show', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => 6,
    'choices'  => array(
    'min'  => 1,
    'max'  => 90,
    'step' => 1,
),
    'priority' => 5,
) );
$max_cols = 3;
// Number of grid columns option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'slider',
    'settings' => 'rovenblog_home_recent_posts_grid_cols',
    'label'    => esc_html__( 'Number of grid columns', 'roven-blog' ),
    'tooltip'  => esc_html__( 'If you enable the sidebar, a maximum of 2 columns is recommended', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => 1,
    'choices'  => array(
    'min'  => 1,
    'max'  => $max_cols,
    'step' => 1,
),
    'priority' => 6,
) );
$rb_style = array(
    'style4' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-4.png',
    'style8' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-8.png',
);
// Visual style option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_home_recent_posts_style',
    'label'    => esc_html__( 'Visual style', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => 'style8',
    'choices'  => $rb_style,
    'priority' => 9,
) );
// Image Aspect Ratio option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'radio_image',
    'settings'        => 'rovenblog_home_recent_posts_aspect',
    'label'           => esc_html__( 'Image Aspect Ratio', 'roven-blog' ),
    'section'         => 'rovenblog_home_recent_posts',
    'default'         => 'landscape',
    'choices'         => array(
    'hero'      => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-hero.png',
    'landscape' => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-landscape.png',
    'portrait'  => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-portrait.png',
    'square'    => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-square.png',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_recent_posts_grid',
    'operator' => '===',
    'value'    => 'grid',
) ),
    'priority'        => 10,
) );
// Show author in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_recent_posts_author',
    'label'    => esc_html__( 'Show author in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => '1',
    'priority' => 12,
) );
// Show category in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_recent_posts_category',
    'label'    => esc_html__( 'Show category in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => '1',
    'priority' => 13,
) );
// Show date in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_recent_posts_date',
    'label'    => esc_html__( 'Show date in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => '1',
    'priority' => 14,
) );
// Show number of comments in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_recent_posts_comments',
    'label'    => esc_html__( 'Show number of comments in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => '1',
    'priority' => 15,
) );
// Show post excerpt option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_recent_posts_excerpt',
    'label'    => esc_html__( 'Show post excerpt', 'roven-blog' ),
    'section'  => 'rovenblog_home_recent_posts',
    'default'  => '1',
    'priority' => 16,
) );