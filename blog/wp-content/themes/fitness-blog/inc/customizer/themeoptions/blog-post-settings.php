<?php
/*Blog Page Settings*/

Kirki::add_section( 'post_loop_settings_section', array(
    'title'          => esc_html__( 'Post Loop Settings', 'fitness-blog' ),
    'panel'          => 'fitness_blog_global_panel',
) );

Kirki::add_field( 'fitness_blog_config', [
	'type'        => 'select',
	'settings'    => 'post_column',
	'label'       => esc_html__( 'Post Column', 'fitness-blog' ),
	'section'     => 'post_loop_settings_section',
	'default'    => '1',
	'priority'    => 10,
	'choices' => [
			'4' => __( '4 Colmun', 'fitness-blog' ),
			'3' => __( '3 Column', 'fitness-blog' ),
			'2' => __( '2 Column', 'fitness-blog' ),
			'1' => __( 'Grid', 'fitness-blog' ),
		],
] );

Kirki::add_field( 'rs_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_post_column',
    'label'       => '',
    'section'     => 'post_loop_settings_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_category',
    'label'       => esc_html__( 'Show Post Category', 'fitness-blog' ),
    'section'     => 'post_loop_settings_section',
    'default'     => true,
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_title',
    'label'       => esc_html__( 'Show Post Title', 'fitness-blog' ),
    'section'     => 'post_loop_settings_section',
    'default'     => true,
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_author',
    'label'       => esc_html__( 'Show Post Author', 'fitness-blog' ),
    'section'     => 'post_loop_settings_section',
    'default'     => true,
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_thumbnail',
    'label'       => esc_html__( 'Thumbnail  On//Off', 'fitness-blog' ),
    'section'     => 'post_loop_settings_section',
    'default'     => true,
] );
Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_excerpt',
    'label'       => esc_html__( 'Show Post Excerpt', 'fitness-blog' ),
    'section'     => 'post_loop_settings_section',
    'default'     => true,
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_date',
    'label'       => esc_html__( 'Show Post Date', 'fitness-blog' ),
    'section'     => 'post_loop_settings_section',
    'default'     => true,
] );