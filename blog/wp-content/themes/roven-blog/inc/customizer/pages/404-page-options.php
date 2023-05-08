<?php

/**
 * The template for displaying 404 Page Customizer Settings
 *
 * @package Roven-Blog
 */
// General Theme Settings section.
new \Kirki\Section( 'rovenblog_404_settings', array(
    'title'    => esc_html__( '404 Page', 'roven-blog' ),
    'priority' => 40,
) );
// 404 Page default image option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'image',
    'settings'        => 'rovenblog_404_image',
    'label'           => esc_html__( '404 Page default image', 'roven-blog' ),
    'tooltip'         => esc_html__( 'Customize the default 404 page with a background image.', 'roven-blog' ),
    'section'         => 'rovenblog_404_settings',
    'default'         => '',
    'priority'        => 4,
    'choices'         => array(
    'save_as' => 'id',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_404_page',
    'operator' => '===',
    'value'    => '0',
) ),
) );