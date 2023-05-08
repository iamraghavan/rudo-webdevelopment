<?php

/**
 * The template for displaying Footer Customizer Settings
 *
 * @package Roven-Blog
 */
// Footer settings section.
new \Kirki\Section( 'rovenblog_footer', array(
    'title'    => esc_html__( 'Footer', 'roven-blog' ),
    'priority' => 24,
) );
// Show footer option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_show_footer',
    'label'    => esc_html__( 'Show footer', 'roven-blog' ),
    'section'  => 'rovenblog_footer',
    'default'  => '1',
    'priority' => 2,
) );
// Footer layout option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'radio_image',
    'settings'        => 'rovenblog_footer_cols',
    'label'           => esc_html__( 'Footer layout', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => 'cols-1',
    'priority'        => 6,
    'choices'         => array(
    'cols-1' => get_template_directory_uri() . '/assets/admin/images/customizer/columns/1-col.png',
    'cols-2' => get_template_directory_uri() . '/assets/admin/images/customizer/columns/2-cols.png',
    'cols-3' => get_template_directory_uri() . '/assets/admin/images/customizer/columns/3-cols.png',
    'cols-4' => get_template_directory_uri() . '/assets/admin/images/customizer/columns/4-cols.png',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Copyright text option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'textarea',
    'settings'        => 'rovenblog_show_footer_copyright_text',
    'label'           => esc_html__( 'Copyright text', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => esc_html__( 'Copyright &copy; 2023. All rights reserved', 'roven-blog' ),
    'priority'        => 7,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Vertical align center footer widgetable areas content option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_footer_vertical',
    'label'           => esc_html__( 'Vertical align center footer widgetable areas content', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '0',
    'priority'        => 23,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Stretch footer fullwidth option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_footer_fullwidth',
    'label'           => esc_html__( 'Stretch footer fullwidth', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '0',
    'priority'        => 24,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Add padding top to footer option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_footer_padding',
    'label'           => esc_html__( 'Add padding top to footer', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '0',
    'priority'        => 25,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Customize Footer Color Scheme? option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_footer_color_toggle',
    'label'           => esc_html__( 'Customize Footer Color Scheme?', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'tooltip'         => esc_html__( 'If you select to customize this section\'s color scheme you will be able to pick custom colors and background colors for it', 'roven-blog' ),
    'default'         => '0',
    'priority'        => 29,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_bg_color',
    'label'           => esc_html__( 'Footer Background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 29,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Footer Background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_bg_color_dm',
    'label'           => esc_html__( 'Dark Mode: Footer Background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#1c1c1c',
    'priority'        => 29,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Accent Color 1 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_accent1_color',
    'label'           => esc_html__( 'Footer Accent Color 1', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#2E2D4D',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Accent Color 2 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_accent2_color',
    'label'           => esc_html__( 'Footer Accent Color 2', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#D50747',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Muted color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_muted_color',
    'label'           => esc_html__( 'Footer Muted color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#777',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Text color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_text_color',
    'label'           => esc_html__( 'Footer Text color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#000000',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Headings color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_headings_color',
    'label'           => esc_html__( 'Footer Headings color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#111111',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer General Border color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_border_color',
    'label'           => esc_html__( 'Footer General Border color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ddd',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer General Background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_bg2_color',
    'label'           => esc_html__( 'Footer General Background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#f4f4f4',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Form Elements Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form1_color',
    'label'           => esc_html__( 'Footer Form Elements Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#000000',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Form Placeholders Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form2_color',
    'label'           => esc_html__( 'Footer Form Placeholders Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#94979e',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Form Form Labels Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form3_color',
    'label'           => esc_html__( 'Footer Form Form Labels Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#45464b',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form4_color',
    'label'           => esc_html__( 'Footer Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Disabled Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form5_color',
    'label'           => esc_html__( 'Footer Disabled Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#f4f4f4',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form6_color',
    'label'           => esc_html__( 'Footer Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ddd',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Focused Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form7_color',
    'label'           => esc_html__( 'Footer Focused Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#bbb',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Link Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_link1_color',
    'label'           => esc_html__( 'Footer Link Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#2E2D4D',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Link Color Hover option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_link2_color',
    'label'           => esc_html__( 'Footer Link Color Hover', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#D50747',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Link Color Active option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_link3_color',
    'label'           => esc_html__( 'Footer Link Color Active', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#D50747',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Card 1 title background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_card1_color',
    'label'           => esc_html__( 'Footer Card 1 title background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Card 6 background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_card6_color',
    'label'           => esc_html__( 'Footer Card 6 background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Card 7 background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_card7_color',
    'label'           => esc_html__( 'Footer Card 7 background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 31,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Accent Color 1 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_accent1_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Accent Color 1', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#2E2D4D',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Accent Color 2 option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_accent2_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Accent Color 2', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#D50747',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Muted color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_muted_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Muted color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#555',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Text color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_text_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Text color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#999',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Headings color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_headings_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Headings color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#fff',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: General Border color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_border_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: General Border color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#494949',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: General Background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_bg2_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: General Background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#333333',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Form Elements Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form1_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Form Elements Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#777',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Form Placeholders Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form2_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Form Placeholders Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#666',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Form Form Labels Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form3_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Form Form Labels Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#777',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form4_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#1c1c1c',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Disabled Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form5_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Disabled Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#222222',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form6_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#494949',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Focused Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_form7_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Focused Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#494949',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Link Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_link1_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Link Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Link Color Hover option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_link2_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Link Color Hover', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#f8f8f8',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Link Color Active option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_link3_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Link Color Active', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#f8f8f8',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Card 1 title background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_card1_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Card 1 title background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#444',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Card 6 background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_card6_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Card 6 background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#444',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Footer Dark Mode: Card 7 background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_footer_card7_color_dm',
    'label'           => esc_html__( 'Footer Dark Mode: Card 7 background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#444',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_footer_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Stretch Copyright fullwidth option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_backlink_fullwidth',
    'label'           => esc_html__( 'Stretch Copyright fullwidth', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '0',
    'priority'        => 47,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Add padding top to Copyright option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_backlink_padding',
    'label'           => esc_html__( 'Add padding top to Copyright', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '0',
    'priority'        => 49,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Add border top to Copyright option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_backlink_border',
    'label'           => esc_html__( 'Add border top to Copyright', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '0',
    'priority'        => 51,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Stretch Copyright border fullwidth option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_backlink_border_fullwidth',
    'label'           => esc_html__( 'Stretch Copyright border fullwidth', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '0',
    'priority'        => 51,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_border',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Customize Copyright Color Scheme? option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'toggle',
    'settings'        => 'rovenblog_backlink_color_toggle',
    'label'           => esc_html__( 'Customize Copyright Color Scheme?', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'tooltip'         => esc_html__( 'If you select to customize this section\'s color scheme you will be able to pick custom colors and background colors for it', 'roven-blog' ),
    'default'         => '1',
    'priority'        => 53,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Copyright Background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_bg_color',
    'label'           => esc_html__( 'Copyright Background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 53,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: DarkCopyright Background color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_bg_color_dm',
    'label'           => esc_html__( 'Dark Mode: Copyright Background color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#1c1c1c',
    'priority'        => 53,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Copyright Text color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_text_color',
    'label'           => esc_html__( 'Copyright Text color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#000000',
    'priority'        => 55,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Copyright Link Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_link1_color',
    'label'           => esc_html__( 'Copyright Link Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#2E2D4D',
    'priority'        => 55,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Copyright Link Color Hover option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_link2_color',
    'label'           => esc_html__( 'Copyright Link Color Hover', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#D50747',
    'priority'        => 55,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Copyright Link Color Active option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_link3_color',
    'label'           => esc_html__( 'Copyright Link Color Active', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#D50747',
    'priority'        => 55,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Copyright General Border color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_border_color',
    'label'           => esc_html__( 'Copyright General Border color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ddd',
    'priority'        => 55,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Copyright Text color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_text_color_dm',
    'label'           => esc_html__( 'Dark Mode: Copyright Text color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#999',
    'priority'        => 57,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Copyright Link Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_link1_color_dm',
    'label'           => esc_html__( 'Dark Mode: Copyright Link Color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#ffffff',
    'priority'        => 57,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Copyright Link Color Hover option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_link2_color_dm',
    'label'           => esc_html__( 'Dark Mode: Copyright Link Color Hover', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#f8f8f8',
    'priority'        => 57,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Copyright Link Color Active option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_link3_color_dm',
    'label'           => esc_html__( 'Dark Mode: Copyright Link Color Active', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#f8f8f8',
    'priority'        => 57,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Copyright General Border color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_backlink_border_color_dm',
    'label'           => esc_html__( 'Dark Mode: Copyright General Border color', 'roven-blog' ),
    'section'         => 'rovenblog_footer',
    'default'         => '#494949',
    'priority'        => 58,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_show_footer_copyright',
    'operator' => '===',
    'value'    => true,
), array(
    'setting'  => 'rovenblog_backlink_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );