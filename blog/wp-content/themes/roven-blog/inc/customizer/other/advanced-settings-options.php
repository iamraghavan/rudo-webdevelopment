<?php
/**
 * The template for displaying Advanced Settings Customizer Options
 *
 * @package Roven-Blog
 */

// General Theme Settings section.
new \Kirki\Section(
	'rovenblog_theme_optimizations',
	array(
		'title'    => esc_html__( 'Advanced Settings', 'roven-blog' ),
		'priority' => 62,
	)
);

// Post Views Counting option.
Kirki::add_field(
	'rovenblog_theme_mod',
	array(
		'type'        => 'checkbox_switch',
		'settings'    => 'rovenblog_view_count_toggle',
		'label'       => esc_html__( 'Post Views Counting', 'roven-blog' ),
		'description' => esc_html__( 'Enabling this option is recommended only if you plan to use the Popular Posts selection in Featured or Home Hero sections.', 'roven-blog' ),
		'section'     => 'rovenblog_theme_optimizations',
		'default'     => 'off',
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'roven-blog' ),
			'off' => esc_html__( 'Disabled', 'roven-blog' ),
		),
	)
);

// Post views count type option.
Kirki::add_field(
	'rovenblog_theme_mod',
	array(
		'type'            => 'radio_buttonset',
		'settings'        => 'rovenblog_view_count_type',
		'label'           => esc_html__( 'Post Views Count Type', 'roven-blog' ),
		'description'     => esc_html__( 'JavaScript is necessary if you are using cache plugins, else PHP is recommended.', 'roven-blog' ),
		'section'         => 'rovenblog_theme_optimizations',
		'default'         => 'php',
		'choices'         => array(
			'php' => esc_html__( 'PHP only', 'roven-blog' ),
			'js'  => esc_html__( 'JavaScript', 'roven-blog' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'rovenblog_view_count_toggle',
				'operator' => '===',
				'value'    => true,
			),
		),
	)
);

// Theme Lazy Loading switch option.
Kirki::add_field(
	'rovenblog_theme_mod',
	array(
		'type'        => 'checkbox_switch',
		'settings'    => 'rovenblog_lazy_loading',
		'label'       => esc_html__( 'Lazy Load (via theme script)', 'roven-blog' ),
		'description' => esc_html__( 'It is recommended to disable this feature if your site already has lazy load added via other means, such as plugins.', 'roven-blog' ),
		'section'     => 'rovenblog_theme_optimizations',
		'default'     => 'on',
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'roven-blog' ),
			'off' => esc_html__( 'Disabled', 'roven-blog' ),
		),
	)
);
