<?php

/**
 * The template for displaying theme Homepage Header Hero Customizer Settings
 *
 * @package Roven-Blog
 */
// Homepage Header Hero section.
new \Kirki\Section( 'rovenblog_home_header_hero', array(
    'title'    => esc_html__( 'Homepage Header Hero', 'roven-blog' ),
    'priority' => 33,
) );
// Content to display option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'        => 'select',
    'settings'    => 'rovenblog_home_header_hero_content',
    'label'       => esc_html__( 'Content to display', 'roven-blog' ),
    'description' => esc_html__( 'Note: the Popular Posts selection requires Post Views Counting to be enabled in Advanced Settings section.', 'roven-blog' ),
    'section'     => 'rovenblog_home_header_hero',
    'default'     => 'recent-posts',
    'priority'    => 2,
    'choices'     => array(
    'recent-posts'   => esc_html__( 'Recent Posts', 'roven-blog' ),
    'popular-posts'  => esc_html__( 'Popular Posts', 'roven-blog' ),
    'specific-posts' => esc_html__( 'Specific Posts', 'roven-blog' ),
    'category-posts' => esc_html__( 'Specific Category Posts', 'roven-blog' ),
    'tag-posts'      => esc_html__( 'Specific Tag Posts', 'roven-blog' ),
),
) );
// Post category option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'select',
    'settings'        => 'rovenblog_home_header_hero_post_categ',
    'label'           => esc_html__( 'Post category', 'roven-blog' ),
    'description'     => esc_html__( 'Posts from the selected category will be shown in the header section', 'roven-blog' ),
    'section'         => 'rovenblog_home_header_hero',
    'placeholder'     => esc_html__( 'Select an option...', 'roven-blog' ),
    'choices'         => rovenblog_categories_list(),
    'priority'        => 3,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_header_hero_content',
    'operator' => '===',
    'value'    => 'category-posts',
) ),
) );
// Post tag option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'select',
    'settings'        => 'rovenblog_home_header_hero_post_tag',
    'label'           => esc_html__( 'Post tag', 'roven-blog' ),
    'description'     => esc_html__( 'Posts with the selected tag will be shown in the header section', 'roven-blog' ),
    'section'         => 'rovenblog_home_header_hero',
    'placeholder'     => esc_html__( 'Select an option...', 'roven-blog' ),
    'choices'         => rovenblog_tags_list(),
    'priority'        => 4,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_header_hero_content',
    'operator' => '===',
    'value'    => 'tag-posts',
) ),
) );
// Specific posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'select',
    'settings'        => 'rovenblog_home_header_hero_post_specific',
    'label'           => esc_html__( 'Specific Posts', 'roven-blog' ),
    'description'     => esc_html__( 'The posts selected here will be shown in the header section', 'roven-blog' ),
    'section'         => 'rovenblog_home_header_hero',
    'placeholder'     => esc_html__( 'Multiple posts can be selected', 'roven-blog' ),
    'multiple'        => 12,
    'choices'         => rovenblog_posts_list(),
    'priority'        => 5,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_header_hero_content',
    'operator' => '===',
    'value'    => 'specific-posts',
) ),
) );
// Exclude posts from sections placed above Header Hero Posts option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_home_header_hero_exclude',
    'label'           => esc_html__( 'Exclude posts from sections placed above Header Hero Posts', 'roven-blog' ),
    'section'         => 'rovenblog_home_header_hero',
    'default'         => '1',
    'priority'        => 6,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_header_hero_content',
    'operator' => '!==',
    'value'    => 'specific-posts',
) ),
) );
// Total number of posts to show option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_home_header_hero_posts_nr',
    'label'           => esc_html__( 'Total number of posts to show', 'roven-blog' ),
    'section'         => 'rovenblog_home_header_hero',
    'default'         => 2,
    'priority'        => 8,
    'choices'         => array(
    'min'  => 1,
    'max'  => 12,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_home_header_hero_content',
    'operator' => '!==',
    'value'    => 'specific-posts',
) ),
) );
$rb_style = array(
    'style1' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-1.png',
    'style3' => get_template_directory_uri() . '/assets/admin/images/customizer/cards/card-2.png',
);
// Visual style option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_home_header_hero_style',
    'label'    => esc_html__( 'Visual style', 'roven-blog' ),
    'section'  => 'rovenblog_home_header_hero',
    'default'  => 'style3',
    'priority' => 13,
    'choices'  => $rb_style,
) );