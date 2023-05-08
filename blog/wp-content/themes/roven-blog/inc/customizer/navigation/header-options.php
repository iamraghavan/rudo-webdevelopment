<?php

/**
 * The template for displaying theme Header Customizer Settings
 *
 * @package Roven-Blog
 */
// Header Settings section.
new \Kirki\Section( 'rovenblog_header', array(
    'title'    => esc_html__( 'Header', 'roven-blog' ),
    'priority' => 23,
) );
// Sticky header on mobile option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_sticky_header_on_mobile',
    'label'    => esc_html__( 'Sticky header on mobile', 'roven-blog' ),
    'section'  => 'rovenblog_header',
    'default'  => '1',
    'priority' => 3,
) );
// Sticky header on desktop option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_sticky_header_on_desktop',
    'label'    => esc_html__( 'Sticky header on desktop', 'roven-blog' ),
    'section'  => 'rovenblog_header',
    'default'  => '1',
    'priority' => 4,
) );
// Display search box option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_show_search_box',
    'label'    => esc_html__( 'Display search box', 'roven-blog' ),
    'section'  => 'rovenblog_header',
    'default'  => '1',
    'priority' => 5,
) );
// Display dark mode toggler option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_show_darkmode_toggler',
    'label'    => esc_html__( 'Display dark mode toggler', 'roven-blog' ),
    'section'  => 'rovenblog_header',
    'default'  => '1',
    'priority' => 6,
) );
// Logo source (to use) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'radio_image',
    'settings' => 'rovenblog_logo_source',
    'label'    => esc_html__( 'What logo to display?', 'roven-blog' ),
    'section'  => 'rovenblog_header',
    'default'  => 'text-logo',
    'priority' => 8,
    'choices'  => array(
    'text-logo'  => get_template_directory_uri() . '/assets/admin/images/customizer/logo-type/text-logo.png',
    'image-logo' => get_template_directory_uri() . '/assets/admin/images/customizer/logo-type/image-logo.png',
),
) );
// Text logo option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'text',
    'settings'        => 'rovenblog_text_logo',
    'label'           => esc_html__( 'Text Logo', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => esc_html__( 'rovenblog', 'roven-blog' ),
    'priority'        => 9,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'text-logo',
) ),
) );
// Image logo option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'image',
    'settings'        => 'rovenblog_logo_id',
    'label'           => esc_html__( 'Image logo', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '',
    'priority'        => 11,
    'choices'         => array(
    'save_as' => 'id',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Image Logo Retina option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'image',
    'settings'        => 'rovenblog_logo_retina_id',
    'label'           => esc_html__( 'Image Logo Retina', 'roven-blog' ),
    'tooltip'         => esc_html__( 'Use for higher pixel density displays. Make sure this logo is at exactly twice the size ( width x height ) of the default logo for optimal results.', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '',
    'priority'        => 11,
    'choices'         => array(
    'save_as' => 'id',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Image logo Dark mode option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'image',
    'settings'        => 'rovenblog_darkmode_logo_id',
    'label'           => esc_html__( 'Dark Mode Image logo', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '',
    'priority'        => 12,
    'choices'         => array(
    'save_as' => 'id',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Image logo Dark mode option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'image',
    'settings'        => 'rovenblog_darkmode_logo_retina_id',
    'label'           => esc_html__( 'Dark Mode Image Logo Retina', 'roven-blog' ),
    'tooltip'         => esc_html__( 'Use for higher pixel density displays. Make sure this logo is at exactly twice the size ( width x height ) of the default logo for optimal results.', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '',
    'priority'        => 13,
    'choices'         => array(
    'save_as' => 'id',
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Max Logo Image Height (mobile) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_logo_height_mobile',
    'label'           => esc_html__( 'Max Logo Image Height (mobile)', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => 60,
    'priority'        => 14,
    'choices'         => array(
    'min'  => 15,
    'max'  => 120,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Max Logo Image Height (tablet) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_logo_height_tablet',
    'label'           => esc_html__( 'Max Logo Image Height (tablet)', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => 70,
    'priority'        => 15,
    'choices'         => array(
    'min'  => 15,
    'max'  => 120,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Max Logo Image Height (desktop) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_logo_height_desktop',
    'label'           => esc_html__( 'Max Logo Image Height (desktop)', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => 90,
    'priority'        => 16,
    'choices'         => array(
    'min'  => 15,
    'max'  => 120,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Max Logo Image Height Sticky Menu (mobile) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_logo_sticky_height_mobile',
    'label'           => esc_html__( 'Max Logo Image Height Sticky Menu (mobile)', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => 60,
    'priority'        => 17,
    'choices'         => array(
    'min'  => 15,
    'max'  => 120,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Max Logo Image Height (tablet) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_logo_sticky_height_tablet',
    'label'           => esc_html__( 'Max Logo Image Height Sticky Menu (tablet)', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => 60,
    'priority'        => 18,
    'choices'         => array(
    'min'  => 15,
    'max'  => 120,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Max Logo Image Height (desktop) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'slider',
    'settings'        => 'rovenblog_logo_sticky_height_desktop',
    'label'           => esc_html__( 'Max Logo Image Height Sticky Menu (desktop)', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => 45,
    'priority'        => 19,
    'choices'         => array(
    'min'  => 15,
    'max'  => 120,
    'step' => 1,
),
    'active_callback' => array( array(
    'setting'  => 'rovenblog_logo_source',
    'operator' => '===',
    'value'    => 'image-logo',
) ),
) );
// Customize Header Color Scheme? option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'toggle',
    'settings' => 'rovenblog_header_color_toggle',
    'label'    => esc_html__( 'Customize Header Color Scheme?', 'roven-blog' ),
    'section'  => 'rovenblog_header',
    'tooltip'  => esc_html__( 'If you select to customize this section\'s color scheme you will be able to pick custom colors and background colors for it', 'roven-blog' ),
    'default'  => '0',
    'priority' => 28,
) );
// Text logo color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_text_logo_color',
    'label'           => esc_html__( 'Text logo color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#D50747',
    'priority'        => 29,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Icons color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_icons_color',
    'label'           => esc_html__( 'Header Icons color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#000000',
    'priority'        => 29,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Icons Hover color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_icons_hover_color',
    'label'           => esc_html__( 'Header Icons hover color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#D50747',
    'priority'        => 30,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header menu hover color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_menu_hover_color',
    'label'           => esc_html__( 'Header Menu hover color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#D50747',
    'priority'        => 32,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Menu dropdown color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_dropdown_menu_color',
    'label'           => esc_html__( 'Header dropdown menu color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#000000',
    'priority'        => 33,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Menu dropdown hover color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_dropdown_menu_hover_color',
    'label'           => esc_html__( 'Header dropdown menu hover color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#D50747',
    'priority'        => 34,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Form Elements Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form1_color',
    'label'           => esc_html__( 'Header Form Elements Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#000000',
    'priority'        => 36,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Form Placeholders Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form2_color',
    'label'           => esc_html__( 'Header Form Placeholders Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#94979e',
    'priority'        => 36,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Form Form Labels Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form3_color',
    'label'           => esc_html__( 'Header Form Form Labels Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#45464b',
    'priority'        => 36,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form4_color',
    'label'           => esc_html__( 'Header Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#ffffff',
    'priority'        => 36,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Disabled Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form5_color',
    'label'           => esc_html__( 'Header Disabled Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#f4f4f4',
    'priority'        => 36,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form6_color',
    'label'           => esc_html__( 'Header Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#ddd',
    'priority'        => 36,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Focused Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form7_color',
    'label'           => esc_html__( 'Header Focused Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#bbb',
    'priority'        => 36,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Dark Mode: Text logo color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_darkmode_text_logo_color',
    'label'           => esc_html__( 'Dark Mode: Text logo color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#D50747',
    'priority'        => 40,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Dark Mode: Form Elements Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form1_color_dm',
    'label'           => esc_html__( 'Header Dark Mode: Form Elements Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#777',
    'priority'        => 48,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Dark Mode: Form Placeholders Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form2_color_dm',
    'label'           => esc_html__( 'Header Dark Mode: Form Placeholders Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#666',
    'priority'        => 48,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Dark Mode: Form Form Labels Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form3_color_dm',
    'label'           => esc_html__( 'Header Dark Mode: Form Form Labels Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#777',
    'priority'        => 48,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Dark Mode: Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form4_color_dm',
    'label'           => esc_html__( 'Header Dark Mode: Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#1c1c1c',
    'priority'        => 48,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Dark Mode: Disabled Form Elements Background Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form5_color_dm',
    'label'           => esc_html__( 'Header Dark Mode: Disabled Form Elements Background Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#222222',
    'priority'        => 48,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Dark Mode: Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form6_color_dm',
    'label'           => esc_html__( 'Header Dark Mode: Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#494949',
    'priority'        => 48,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );
// Header Dark Mode: Focused Form Elements Border Color option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'            => 'color',
    'settings'        => 'rovenblog_header_form7_color_dm',
    'label'           => esc_html__( 'Header Dark Mode: Focused Form Elements Border Color', 'roven-blog' ),
    'section'         => 'rovenblog_header',
    'default'         => '#494949',
    'priority'        => 48,
    'active_callback' => array( array(
    'setting'  => 'rovenblog_header_color_toggle',
    'operator' => '===',
    'value'    => true,
) ),
) );