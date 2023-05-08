<?php

/**
 * The template for displaying CTA Customizer Settings
 *
 * @package Roven-Blog
 */
// CTA section.
new \Kirki\Section( 'rovenblog_cta', array(
    'title'    => esc_html__( 'CTA', 'roven-blog' ),
    'priority' => 21,
) );
// Display CTA option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_show_cta',
    'label'    => esc_html__( 'Display CTA', 'roven-blog' ),
    'section'  => 'rovenblog_cta',
    'default'  => '1',
    'priority' => 1,
) );
// CTA Text option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'text',
    'settings'        => 'rovenblog_cta_text',
    'label'           => esc_html__( 'CTA Text', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => esc_html__( 'CTA Text here...', 'roven-blog' ),
    'priority'        => 4,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Add border bottom option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_cta_border_bottom',
    'label'           => esc_html__( 'Add border bottom', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '1',
    'priority'        => 10,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Stretch border bottom fullwidth option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_cta_border_fullwidth',
    'label'           => esc_html__( 'Stretch border bottom fullwidth', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '1',
    'priority'        => 11,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_cta_border_bottom',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Customize CTA Color Scheme? option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_cta_color_toggle',
    'label'           => esc_html__( 'Customize CTA Color Scheme?', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'tooltip'         => esc_html__( 'If you select to customize this section\'s color scheme you will be able to pick custom colors and background colors for it', 'roven-blog' ),
    'default'         => '1',
    'priority'        => 13,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Background Color CTA option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_bg_color_cta',
    'label'           => esc_html__( 'Background Color CTA', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '#2E2D4D',
    'priority'        => 13,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_cta_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Border Color CTA option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_border_color_cta',
    'label'           => esc_html__( 'Border Color CTA', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '#2E2D4D',
    'priority'        => 13,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_cta_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Text color CTA option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_text_color_cta',
    'label'           => esc_html__( 'Text Color CTA', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '#ffffff',
    'priority'        => 14,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_cta_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Background Color CTA option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_darkmode_bg_color_cta',
    'label'           => esc_html__( 'Dark Mode: Background Color CTA', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '#2E2D4D',
    'priority'        => 17,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_cta_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Border Color CTA option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_darkmode_border_color_cta',
    'label'           => esc_html__( 'Dark Mode: Border Color CTA', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '#2E2D4D',
    'priority'        => 18,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_cta_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Text color CTA option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_darkmode_text_color_cta',
    'label'           => esc_html__( 'Dark Mode: Text Color CTA', 'roven-blog' ),
    'section'         => 'rovenblog_cta',
    'default'         => '#ffffff',
    'priority'        => 19,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_cta',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_cta_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );