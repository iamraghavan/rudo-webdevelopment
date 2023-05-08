<?php

Kirki::add_section( 'banner_section', array(
    'title'          => esc_html__( 'Banner Settings', 'fitness-blog' ),
    'description'    => esc_html__( 'Customize Banner section', 'fitness-blog' ),
    'panel'          => 'fitness_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'switch',
    'settings'    => 'banner_section_on_off',
    'label'       => esc_html__( 'Show/Hide Banner Section', 'fitness-blog' ),
    'section'     => 'banner_section',
    'default'     => 0,
    'choices'     => [
        'on'  => esc_html__( 'Show', 'fitness-blog' ),
        'off' => esc_html__( 'Hide', 'fitness-blog' ),
    ],
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'     => 'textarea',
    'settings' => 'banner_title',
    'label'    => esc_html__( 'Banner Title', 'fitness-blog' ),
    'section'  => 'banner_section',
    'default'  => esc_html__( 'Welcome to the fitness family!', 'fitness-blog' ),
    'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.hero-content .banner-title',
            'function' => 'html',
        ]
    ],

] );

Kirki::add_field( 'fitness_blog_config', [
    'type'     => 'textarea',
    'settings' => 'banner_descriptions',
    'label'    => esc_html__( 'Banner Description', 'fitness-blog' ),
    'section'  => 'banner_section',
    'default'  => esc_html__( 'Simply dummy text of the printing and typesetting industry.
has been theindustry\'s standard dummy text ever since the
1500s, when an unknownprinter ', 'fitness-blog' ),
    'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.hero-content .banner-descriptions',
            'function' => 'html',
        ]
    ],
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'     => 'text',
    'settings' => 'banner_button_text',
    'label'    => esc_html__( 'Button Text', 'fitness-blog' ),
    'section'  => 'banner_section',
    'default'  => esc_html__( 'Discover', 'fitness-blog' ),
    'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.discover-me-button a',
            'function' => 'html',
        ]
    ],
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'     => 'link',
    'settings' => 'banner_button_link',
    'label'    => esc_html__( 'Button Link', 'fitness-blog' ),
    'section'  => 'banner_section',
    'default'  => '#',
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'image',
    'settings'    => 'banner_image',
    'label'       => esc_html__( 'Banner image', 'fitness-blog' ),
    'section'     => 'banner_section',
    'transport'   => 'refresh',
    'choices'     => [
        'save_as' => 'array',
    ],
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'background',
    'settings'    => 'banner_bg_settings',
    'label'       => esc_html__( 'Banner Background', 'fitness-blog' ),
    'description' => esc_html__( 'Define The Background Of Banner Section', 'fitness-blog' ),
    'section'     => 'banner_section',
    'default'     => [
        'background-color'      => '#b1c0c8',
        'background-image'      => '',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
    ],
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'section.banner-section',
        ],
    ],
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'typography',
    'settings'    => 'banner_title_typography',
    'label'       => esc_html__( 'Banner Title Typography', 'fitness-blog' ),
    'section'     => 'banner_section',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => 'bold',
        'font-size'      => '3.375rem',
        'line-height'    => '1.6',
        'letter-spacing' => '0px',
        'color'          => '#ffffff',
        'text-transform' => 'none',
        'text-align'     => 'left',
    ],

    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '.banner-title',
        ],
    ],
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'typography',
    'settings'    => 'banner_paragraph_typography',
    'label'       => esc_html__( 'Banner Paragraph Typography', 'fitness-blog' ),
    'section'     => 'banner_section',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '1rem',
        'line-height'    => '1.6',
        'letter-spacing' => '0px',
        'color'          => '#ffffff',
        'text-transform' => 'none',
        'text-align'     => 'left',
    ],
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '.banner-descriptions',
        ],
    ],
] );

Kirki::add_field( 'fitness_blog_config', [
    'type'        => 'multicolor',
    'settings'    => 'banner_button_colors',
    'label'       => esc_html__( 'Button Color', 'fitness-blog' ),
    'section'     => 'banner_section',
    'choices'     => [
        'btn_bg'    => esc_html__( 'Background Color', 'fitness-blog' ),
        'btn_text'   => esc_html__( 'Text Color', 'fitness-blog' ),
        'btn_hover_bg'   => esc_html__( 'Background Hover Color', 'fitness-blog' ),
        'btn_hover_text'   => esc_html__( 'Text Hover Color', 'fitness-blog' ),
    ],
    'transport' => 'auto',
    'default'     => [
        'btn_bg'    => '#d7643b',
        'btn_text'   => '#ffffff',
        'btn_hover_bg'   => '#000000',
        'btn_hover_text'   => '#ffffff',
    ],
] );

