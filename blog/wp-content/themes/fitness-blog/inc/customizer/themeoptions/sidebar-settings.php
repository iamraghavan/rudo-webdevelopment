<?php
/*Blog Page Settings*/

Kirki::add_section( 'sidebar_settings_section', array(
    'title'          => esc_html__( 'Sidebar Settings', 'fitness-blog' ),
    'description'          => esc_html__( 'Control Sidebar Of Your Website', 'fitness-blog' ),
    'panel'          => 'fitness_blog_global_panel',
) );

Kirki::add_field( 'fitness_blog_config', [
	'type'        => 'select',
	'settings'    => 'blog_page_sidebar',
	'label'       => esc_html__( 'Blog Page Sidebar', 'fitness-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'right',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fitness-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'fitness-blog' ),
		'no' => esc_html__( 'No Sidebar', 'fitness-blog' ),
	],
] );

Kirki::add_field( 'fitness_blog_config', [
	'type'        => 'select',
	'settings'    => 'archive_page_sidebar',
	'label'       => esc_html__( 'Archive Page Sidebar', 'fitness-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'right',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fitness-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'fitness-blog' ),
		'no' => esc_html__( 'No Sidebar', 'fitness-blog' ),
	],
] );

Kirki::add_field( 'fitness_blog_config', [
	'type'        => 'select',
	'settings'    => 'page_sidebar',
	'label'       => esc_html__( 'Page Sidebar', 'fitness-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'right',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fitness-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'fitness-blog' ),
		'no' => esc_html__( 'No Sidebar', 'fitness-blog' ),
	],
] );

Kirki::add_field( 'fitness_blog_config', [
	'type'        => 'select',
	'settings'    => 'post_sidebar',
	'label'       => esc_html__( 'Post Sidebar', 'fitness-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'right',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fitness-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'fitness-blog' ),
		'no' => esc_html__( 'No Sidebar', 'fitness-blog' ),
	],
] );
