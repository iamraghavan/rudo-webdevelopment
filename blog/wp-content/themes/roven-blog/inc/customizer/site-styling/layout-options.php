<?php

/**
 * The template for displaying Layout Customizer Settings
 *
 * @package Roven-Blog
 */
// General Theme Settings section.
new \Kirki\Section( 'rovenblog_theme_settings', array(
    'title'    => esc_html__( 'Layout', 'roven-blog' ),
    'priority' => 11,
) );
$rb_excerpt = 20;
// Excerpt length option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'slider',
    'settings' => 'rovenblog_excerpt_length',
    'label'    => esc_html__( 'Excerpt length', 'roven-blog' ),
    'section'  => 'rovenblog_theme_settings',
    'priority' => 3,
    'default'  => $rb_excerpt,
    'choices'  => array(
    'min'  => 10,
    'max'  => 100,
    'step' => 5,
),
) );
// Enable sticky sidebar option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_enable_sticky_sidebar',
    'label'    => esc_html__( 'Enable sticky sidebar', 'roven-blog' ),
    'section'  => 'rovenblog_theme_settings',
    'priority' => 4,
    'default'  => '1',
) );
// Sticky Offset option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_sticky_offset',
    'label'           => esc_html__( 'Sticky offset (px)', 'roven-blog' ),
    'tooltip'         => esc_html__( 'The sticky offset value is only needed so that the sticky header does not cover the sticky sidebar and the floating share', 'roven-blog' ),
    'section'         => 'rovenblog_theme_settings',
    'priority'        => 5,
    'default'         => 80,
    'choices'         => array(
    'min'  => 0,
    'max'  => 200,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_enable_sticky_sidebar',
    'operator' => '===',
    'value'    => true,
) ),
) );
$rb_title_1 = array(
    'none'    => get_template_directory_uri() . '/assets/admin/images/customizer/section-title-styling/section-title-no-style.png',
    'style-1' => get_template_directory_uri() . '/assets/admin/images/customizer/section-title-styling/section-title-style-1.png',
);
// Section Title Styling option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_section_title_style',
    'label'    => esc_html__( 'Section Title Styling', 'roven-blog' ),
    'tooltip'  => esc_html__( 'Adds a visual efect to the section titles. (Affects the Featured, Related and Home Latest Posts sections title)', 'roven-blog' ),
    'section'  => 'rovenblog_theme_settings',
    'default'  => 'none',
    'priority' => 14,
    'choices'  => $rb_title_1,
) );
// Widget Title Styling option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_widget_title_style',
    'label'    => esc_html__( 'Widget Title Styling', 'roven-blog' ),
    'tooltip'  => esc_html__( 'Adds a visual efect to the Widget section titles. Only applies to legacy widgets and our own custom widgets!', 'roven-blog' ),
    'section'  => 'rovenblog_theme_settings',
    'default'  => 'none',
    'priority' => 15,
    'choices'  => $rb_title_1,
) );