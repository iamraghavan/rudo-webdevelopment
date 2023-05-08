<?php
Kirki::add_section( 'fitness_blog_theme_social_settings', array(
    'title'          => esc_html__( 'Social Media Settings', 'fitness-blog' ),
    'panel'          => 'fitness_blog_global_panel',
) );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'text',
    'settings'    => 'social_facebook',
    'label'       => esc_html__( 'Facebook Link', 'fitness-blog' ),
    'section'     => 'fitness_blog_theme_social_settings',
    'default'     => esc_html__( 'https://facebook.com/', 'fitness-blog' ),
    'transport'   => 'refresh',
] );
Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'text',
    'settings'    => 'social_instagram',
    'label'       => esc_html__( 'Instagram Link', 'fitness-blog' ),
    'section'     => 'fitness_blog_theme_social_settings',
    'default'     => esc_html__( 'https://instagram.com/', 'fitness-blog' ),
    'transport'   => 'refresh',
] );
Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'text',
    'settings'    => 'social_linkedin',
    'label'       => esc_html__( 'LinkedIn Link', 'fitness-blog' ),
    'section'     => 'fitness_blog_theme_social_settings',
    'default'     => esc_html__( 'https://linkedin.com/', 'fitness-blog' ),
    'transport'   => 'refresh',
] );
Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'text',
    'settings'    => 'social_twitter',
    'label'       => esc_html__( 'Twitter Link', 'fitness-blog' ),
    'section'     => 'fitness_blog_theme_social_settings',
    'default'     => esc_html__( 'https://twitter.com/', 'fitness-blog' ),
    'transport'   => 'refresh',
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'color',
    'settings'    => 'social_link_color',
    'label'       => esc_html__( 'Social Media Link Color', 'fitness-blog' ),
    'section'     => 'fitness_blog_theme_social_settings',
    'default'     => '#ffffff',
    'transport'   => 'auto',
    'output' => array(
        array(
            'element'  => '.top-social #cssmenu ul.social-links li a',
            'property' => 'color',
        ),
    ),
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'color',
    'settings'    => 'social_link_color_hover',
    'label'       => esc_html__( 'Social Media Link Color Hover', 'fitness-blog' ),
    'section'     => 'fitness_blog_theme_social_settings',
    'default'     => '#484848',
    'transport'   => 'auto',
    'output' => array(
        array(
            'element'  => '.top-social #cssmenu ul.social-links li a:hover',
            'property' => 'color',
        ),
    ),
] );
?>