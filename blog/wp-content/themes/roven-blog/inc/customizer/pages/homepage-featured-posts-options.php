<?php

/**
 * The template for displaying theme Homepage Featured Posts Customizer Settings
 *
 * @package Roven-Blog
 */
// Homepage Featured Posts section.
new \Kirki\Section( 'rovenblog_home_featured_posts', array(
    'title'    => esc_html__( 'Homepage Featured Posts', 'roven-blog' ),
    'priority' => 34,
) );
// Section Title option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'text',
    'settings' => 'rovenblog_home_featured_title',
    'label'    => esc_html__( 'Section Title', 'roven-blog' ),
    'tooltip'  => esc_html__( 'Leave empty if you do not want the section to have a title', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => esc_html__( 'Featured posts', 'roven-blog' ),
    'priority' => 2,
) );
// Content to display option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'        => 'select',
    'settings'    => 'rovenblog_home_featured_content',
    'label'       => esc_html__( 'Content to display', 'roven-blog' ),
    'description' => esc_html__( 'Note: the Popular Posts selection requires Post Views Counting to be enabled in Advanced Settings section.', 'roven-blog' ),
    'section'     => 'rovenblog_home_featured_posts',
    'default'     => 'recent-posts',
    'choices'     => array(
    'recent-posts'   => esc_html__( 'Recent Posts', 'roven-blog' ),
    'popular-posts'  => esc_html__( 'Popular Posts', 'roven-blog' ),
    'specific-posts' => esc_html__( 'Specific Posts', 'roven-blog' ),
    'category-posts' => esc_html__( 'Specific Category Posts', 'roven-blog' ),
    'tag-posts'      => esc_html__( 'Specific Tag Posts', 'roven-blog' ),
),
    'priority'    => 3,
) );
// Post category option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'select',
    'settings'        => 'rovenblog_home_featured_post_categ',
    'label'           => esc_html__( 'Post category', 'roven-blog' ),
    'description'     => esc_html__( 'Posts from the selected category will be shown in the featured section', 'roven-blog' ),
    'section'         => 'rovenblog_home_featured_posts',
    'placeholder'     => esc_html__( 'Select an option...', 'roven-blog' ),
    'choices'         => rovenblog_categories_list(),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_featured_content',
    'operator' => '===',
    'value'    => 'category-posts',
) ),
    'priority'        => 4,
) );
// Post tag option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'select',
    'settings'        => 'rovenblog_home_featured_post_tag',
    'label'           => esc_html__( 'Post tag', 'roven-blog' ),
    'description'     => esc_html__( 'Posts with the selected tag will be shown in the featured section', 'roven-blog' ),
    'section'         => 'rovenblog_home_featured_posts',
    'placeholder'     => esc_html__( 'Select an option...', 'roven-blog' ),
    'choices'         => rovenblog_tags_list(),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_featured_content',
    'operator' => '===',
    'value'    => 'tag-posts',
) ),
    'priority'        => 5,
) );
// Specific posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'select',
    'settings'        => 'rovenblog_home_featured_post_specific',
    'label'           => esc_html__( 'Specific Posts', 'roven-blog' ),
    'description'     => esc_html__( 'The posts selected here will be shown in the featured section', 'roven-blog' ),
    'section'         => 'rovenblog_home_featured_posts',
    'placeholder'     => esc_html__( 'Multiple posts can be selected', 'roven-blog' ),
    'multiple'        => 12,
    'choices'         => rovenblog_posts_list(),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_featured_content',
    'operator' => '===',
    'value'    => 'specific-posts',
) ),
    'priority'        => 6,
) );
// Exclude posts from sections placed above Featured Posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_home_featured_posts_exclude',
    'label'           => esc_html__( 'Exclude posts from sections placed above Featured Posts', 'roven-blog' ),
    'section'         => 'rovenblog_home_featured_posts',
    'default'         => '1',
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_featured_content',
    'operator' => '!==',
    'value'    => 'specific-posts',
) ),
    'priority'        => 7,
) );
// Total number of posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_home_featured_nr',
    'label'           => esc_html__( 'Total number of posts to show', 'roven-blog' ),
    'section'         => 'rovenblog_home_featured_posts',
    'default'         => 2,
    'choices'         => array(
    'min'  => 1,
    'max'  => 12,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_featured_content',
    'operator' => '!==',
    'value'    => 'specific-posts',
) ),
    'priority'        => 8,
) );
$max_cols = 3;
// Number of grid columns option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'slider',
    'settings' => 'rovenblog_home_featured_cols',
    'label'    => esc_html__( 'Number of grid columns', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => 2,
    'choices'  => array(
    'min'  => 1,
    'max'  => $max_cols,
    'step' => 1,
),
    'priority' => 9,
) );
$rb_style = array(
    'style2' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-2.png',
    'style4' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-4.png',
);
// Visual style option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_home_featured_style',
    'label'    => esc_html__( 'Visual style', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => 'style2',
    'choices'  => $rb_style,
    'priority' => 12,
) );
// Image Aspect Ratio option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_home_featured_aspect',
    'label'    => esc_html__( 'Image Aspect Ratio', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => 'landscape',
    'choices'  => array(
    'hero'      => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-hero.png',
    'landscape' => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-landscape.png',
    'portrait'  => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-portrait.png',
    'square'    => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-square.png',
),
    'priority' => 13,
) );
// Show author in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_featured_author',
    'label'    => esc_html__( 'Show author in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => '1',
    'priority' => 15,
) );
// Show category in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_featured_category',
    'label'    => esc_html__( 'Show category in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => '1',
    'priority' => 16,
) );
// Show date in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_featured_date',
    'label'    => esc_html__( 'Show date in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => '1',
    'priority' => 17,
) );
// Show number of comments in post meta option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_featured_comments',
    'label'    => esc_html__( 'Show number of comments in post meta', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => '0',
    'priority' => 18,
) );
// Show post excerpt option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_featured_excerpt',
    'label'    => esc_html__( 'Show post excerpt', 'roven-blog' ),
    'section'  => 'rovenblog_home_featured_posts',
    'default'  => '0',
    'priority' => 19,
) );