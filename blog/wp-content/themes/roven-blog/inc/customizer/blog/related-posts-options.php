<?php

/**
 * The template for displaying Related Posts Customizer Settings
 *
 * @package Roven-Blog
 */
// Single Post Related Posts section.
new \Kirki\Section( 'rovenblog_post_related_posts', array(
    'title'    => esc_html__( 'Related Posts', 'roven-blog' ),
    'priority' => 46,
) );
// Section Title option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'text',
    'settings' => 'rovenblog_post_related_title',
    'label'    => esc_html__( 'Section Title', 'roven-blog' ),
    'tooltip'  => esc_html__( 'Leave empty if you do not want the section to have a title', 'roven-blog' ),
    'section'  => 'rovenblog_post_related_posts',
    'default'  => esc_html__( 'You might also like', 'roven-blog' ),
    'priority' => 2,
) );
// Image Aspect Ratio option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_post_related_aspect',
    'label'    => esc_html__( 'Image Aspect Ratio', 'roven-blog' ),
    'section'  => 'rovenblog_post_related_posts',
    'default'  => 'hero',
    'choices'  => array(
    'hero'      => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-hero.png',
    'landscape' => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-landscape.png',
    'portrait'  => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-portrait.png',
    'square'    => get_template_directory_uri() . '/assets/admin/images/customizer/image-aspect-ratio/image-aspect-ratio-square.png',
),
    'priority' => 9,
) );
// Show post excerpt option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_post_related_excerpt',
    'label'    => esc_html__( 'Show post excerpt', 'roven-blog' ),
    'section'  => 'rovenblog_post_related_posts',
    'default'  => '1',
    'priority' => 15,
) );