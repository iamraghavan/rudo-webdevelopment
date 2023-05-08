<?php

/**
 * The template for displaying theme Colors Customizer Settings
 *
 * @package Roven-Blog
 */
// Color Settings section.
new \Kirki\Section( 'rovenblog_color_settings', array(
    'title'    => esc_html__( 'Colors', 'roven-blog' ),
    'priority' => 12,
) );
// Accent Color 1 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_accent_color_1',
    'label'    => esc_html__( 'Accent Color 1', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#2E2D4D',
    'priority' => 3,
) );
// Accent Color 2 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_accent_color_2',
    'label'    => esc_html__( 'Accent Color 2', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#D50747',
    'priority' => 4,
) );
// Link color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_link_color',
    'label'    => esc_html__( 'Link Color', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#2E2D4D',
    'priority' => 17,
) );
// Link Color Hover option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_link_color_hover',
    'label'    => esc_html__( 'Link Color Hover', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#D50747',
    'priority' => 18,
) );
// Link Color Active option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_link_color_active',
    'label'    => esc_html__( 'Link Color Active', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#D50747',
    'priority' => 19,
) );
// Dark Mode: Accent Color 1 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_darkmode_accent_color_1',
    'label'    => esc_html__( 'Dark Mode: Accent Color 1', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#2E2D4D',
    'priority' => 25,
) );
// Dark Mode: Accent Color 2 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_darkmode_accent_color_2',
    'label'    => esc_html__( 'Dark Mode: Accent Color 2', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#D50747',
    'priority' => 26,
) );
// Dark Mode: Link color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_darkmode_link_color',
    'label'    => esc_html__( 'Dark Mode: Link Color', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#ffffff',
    'priority' => 39,
) );
// Dark Mode: Link Color Hover option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_darkmode_link_color_hover',
    'label'    => esc_html__( 'Dark Mode: Link Color Hover', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#f8f8f8',
    'priority' => 40,
) );
// Dark Mode: Link Color Active option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'color',
    'settings' => 'rovenblog_darkmode_link_color_active',
    'label'    => esc_html__( 'Dark Mode: Link Color Active', 'roven-blog' ),
    'section'  => 'rovenblog_color_settings',
    'default'  => '#f8f8f8',
    'priority' => 41,
) );