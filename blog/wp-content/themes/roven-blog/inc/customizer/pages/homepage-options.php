<?php

/**
 * The template for displaying theme Homepage Customizer Settings
 *
 * @package Roven-Blog
 */
// Homepage Settings section.
new \Kirki\Section( 'rovenblog_home_settings', array(
    'title'    => esc_html__( 'Homepage', 'roven-blog' ),
    'priority' => 32,
) );
$layout_args = array(
    'hero'     => esc_html__( 'Header Hero Posts', 'roven-blog' ),
    'featured' => esc_html__( 'Featured Posts', 'roven-blog' ),
    'main'     => esc_html__( 'Recent Posts', 'roven-blog' ),
);
// Home page layout option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'sortable',
    'settings' => 'rovenblog_home_layout',
    'label'    => esc_html__( 'Home Page Layout', 'roven-blog' ),
    'tooltip'  => esc_html__( 'You can use this option to rearrange or disable Home Page sections.', 'roven-blog' ),
    'section'  => 'rovenblog_home_settings',
    'default'  => array( 'hero', 'featured', 'main' ),
    'choices'  => $layout_args,
) );
// Display Sidebar option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_home_show_sidebar',
    'label'    => esc_html__( 'Display Sidebar', 'roven-blog' ),
    'section'  => 'rovenblog_home_settings',
    'default'  => '1',
) );