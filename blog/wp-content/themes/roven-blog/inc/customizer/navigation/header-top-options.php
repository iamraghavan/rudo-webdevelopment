<?php

/**
 * The template for displaying theme Header Top Customizer Settings
 *
 * @package Roven-Blog
 */
// Header Settings section.
new \Kirki\Section( 'rovenblog_header_top', array(
    'title'    => esc_html__( 'Header Top', 'roven-blog' ),
    'priority' => 22,
) );
// Display Header top option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_header_top_show',
    'label'    => esc_html__( 'Display Header top', 'roven-blog' ),
    'section'  => 'rovenblog_header_top',
    'default'  => '0',
    'priority' => 2,
) );
// Header top layout option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'radio_image',
    'settings'        => 'rovenblog_header_top_cols',
    'label'           => esc_html__( 'Header top layout', 'roven-blog' ),
    'section'         => 'rovenblog_header_top',
    'default'         => 'cols-2',
    'priority'        => 4,
    'choices'         => array(
    'cols-1' => get_template_directory_uri() . '/assets/admin/images/customizer/columns/1-col.png',
    'cols-2' => get_template_directory_uri() . '/assets/admin/images/customizer/columns/2-cols.png',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_top_show',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Vertical align center widgetable areas content option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_header_top_vertical',
    'label'           => esc_html__( 'Vertical align center header top widgetable areas content', 'roven-blog' ),
    'section'         => 'rovenblog_header_top',
    'default'         => '1',
    'priority'        => 6,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_top_show',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Add border top to header top option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_header_top_border',
    'label'           => esc_html__( 'Add border bottom to header top', 'roven-blog' ),
    'section'         => 'rovenblog_header_top',
    'default'         => '1',
    'priority'        => 6,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_top_show',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Stretch header top border fullwidth option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_header_top_border_fullwidth',
    'label'           => esc_html__( 'Stretch header top border fullwidth', 'roven-blog' ),
    'section'         => 'rovenblog_header_top',
    'default'         => '1',
    'priority'        => 6,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_top_show',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_header_top_border',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Hide header top on mobile option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_header_top_mobile_show',
    'label'           => esc_html__( 'Hide header top on mobile', 'roven-blog' ),
    'section'         => 'rovenblog_header_top',
    'default'         => '0',
    'priority'        => 6,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_top_show',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Hide Header Top Column 1 on mobile option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_header_top_mobile_col1',
    'label'           => esc_html__( 'Hide Header Top Column 1 on mobile', 'roven-blog' ),
    'section'         => 'rovenblog_header_top',
    'default'         => '0',
    'priority'        => 6,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_top_show',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_header_top_mobile_show',
    'operator' => '===',
    'value'    => false,
) ),
) );
// Hide Header Top Column 2 on mobile option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_header_top_mobile_col2',
    'label'           => esc_html__( 'Hide Header Top Column 2 on mobile', 'roven-blog' ),
    'section'         => 'rovenblog_header_top',
    'default'         => '0',
    'priority'        => 6,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_top_show',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_header_top_mobile_show',
    'operator' => '===',
    'value'    => false,
), array(
    'setting'  => 'rovenblog_header_top_cols',
    'operator' => '===',
    'value'    => 'cols-2',
) ),
) );