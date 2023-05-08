<?php

/**
 * The template for displaying theme Typography Customizer Settings
 *
 * @package Roven-Blog
 */
// Fonts Settings section.
new \Kirki\Section( 'rovenblog_font_settings', array(
    'title'    => esc_html__( 'Typography', 'roven-blog' ),
    'priority' => 13,
) );
// Font Base size option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'        => 'text',
    'settings'    => 'rovenblog_font_base_size',
    'label'       => esc_html__( 'Font base size', 'roven-blog' ),
    'description' => esc_html__( 'The size of body / paragraph text (px).', 'roven-blog' ),
    'section'     => 'rovenblog_font_settings',
    'default'     => '17px',
    'priority'    => 2,
) );
// Font scale (mobile) option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'        => 'select',
    'settings'    => 'rovenblog_font_scale_mobile',
    'label'       => esc_html__( 'Font Scale (mobile)', 'roven-blog' ),
    'description' => esc_html__( 'Heading font sizes are calculated automatically based on the Font Base Size and this scaling value.', 'roven-blog' ),
    'section'     => 'rovenblog_font_settings',
    'default'     => '1.067',
    'priority'    => 3,
    'choices'     => array(
    '1.067' => '1.067',
    '1.100' => '1.100',
    '1.125' => '1.125',
),
) );
// Font scale option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'        => 'select',
    'settings'    => 'rovenblog_font_scale',
    'label'       => esc_html__( 'Font Scale', 'roven-blog' ),
    'description' => esc_html__( 'Heading font sizes are calculated automatically based on the Font Base Size and this scaling value.', 'roven-blog' ),
    'section'     => 'rovenblog_font_settings',
    'default'     => '1.125',
    'priority'    => 4,
    'choices'     => array(
    '1.067' => '1.067',
    '1.100' => '1.100',
    '1.125' => '1.125',
    '1.150' => '1.150',
    '1.175' => '1.175',
    '1.200' => '1.200',
    '1.225' => '1.225',
    '1.250' => '1.250',
),
) );
$rb_fonts = array(
    'fonts' => array(
    'google'   => array(
    'DM Sans',
    'Poppins',
    'Playfair Display',
    'Montserrat',
    'Space Grotesk'
),
    'standard' => array(),
),
);
// Body Typography option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_body_typography',
    'label'    => esc_html__( 'Body Typography', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 5,
    'default'  => array(
    'font-family'    => 'DM Sans',
    'variant'        => 'regular',
    'line-height'    => '1.765',
    'letter-spacing' => '0',
),
) );
// Headings Typography option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_headings_typography',
    'label'    => esc_html__( 'Headings Typography', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 6,
    'default'  => array(
    'font-family'    => 'Poppins',
    'variant'        => '700',
    'line-height'    => '1.3',
    'letter-spacing' => '0.4px',
),
) );
// CTA Font option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_cta_typography',
    'label'    => esc_html__( 'CTA Font', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 8,
    'default'  => array(
    'font-family' => 'DM Sans',
    'variant'     => '700',
),
) );
// Logo Font option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_logo_typography',
    'label'    => esc_html__( 'Logo Font', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 10,
    'default'  => array(
    'font-family' => 'DM Sans',
    'variant'     => '700',
),
) );
// Desktop Menu Font option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_menu_typography',
    'label'    => esc_html__( 'Desktop Menu Font', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 12,
    'default'  => array(
    'font-family' => 'DM Sans',
    'variant'     => '700',
),
) );
// Desktop Dropdown Menu Font option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_submenu_typography',
    'label'    => esc_html__( 'Desktop Dropdown Menu Font', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 13,
    'default'  => array(
    'font-family' => 'DM Sans',
    'variant'     => 'regular',
),
) );
// Mobile Menu Font option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_mobile_menu_typography',
    'label'    => esc_html__( 'Mobile Menu Font', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 15,
    'default'  => array(
    'font-family' => 'DM Sans',
    'variant'     => '700',
),
) );
// Mobile Dropdown Menu Font option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'typography',
    'settings' => 'rovenblog_mobile_submenu_typography',
    'label'    => esc_html__( 'Mobile Dropdown Menu Font', 'roven-blog' ),
    'section'  => 'rovenblog_font_settings',
    'choices'  => $rb_fonts,
    'priority' => 16,
    'default'  => array(
    'font-family' => 'DM Sans',
    'variant'     => 'regular',
),
) );