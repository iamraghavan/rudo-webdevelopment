<?php
Kirki::add_section( 'copyright_section', array(
    'title'          => esc_html__( 'Copyright Section', 'fitness-blog' ),
    'panel'          => 'fitness_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'fitness_blog_config', [
	'type'     => 'editor',
	'settings' => 'copyright_text',
	'label'    => esc_html__( 'Edit Copyright Text', 'fitness-blog' ),
	'section'  => 'copyright_section',
	'default'  => wp_kses_post( 'Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2023. All rights reserved.', 'fitness-blog' ),
	'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.site-copyright .site-info .site-copyright-text',
            'function' => 'html',
        ]
    ],

] );