<?php

/**
 * The template for displaying Social Media Customizer Settings
 *
 * @package Roven-Blog
 */
// Social Media section.
new \Kirki\Section( 'rovenblog_social_media', array(
    'title'    => esc_html__( 'Social Media', 'roven-blog' ),
    'priority' => 47,
) );
$rb_social = array(
    'Facebook'  => esc_html__( 'Facebook', 'roven-blog' ),
    'Twitter'   => esc_html__( 'Twitter', 'roven-blog' ),
    'Linkedin'  => esc_html__( 'Linkedin', 'roven-blog' ),
    'Pinterest' => esc_html__( 'Pinterest', 'roven-blog' ),
    'WhatsApp'  => esc_html__( 'WhatsApp', 'roven-blog' ),
);
// Social Media Share Layout option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'sortable',
    'settings' => 'rovenblog_post_social_share',
    'label'    => esc_html__( 'Social Media Share Layout', 'roven-blog' ),
    'tooltip'  => esc_html__( 'You can use this option to rearrange or disable Social Media Share elements.', 'roven-blog' ),
    'section'  => 'rovenblog_social_media',
    'default'  => array(
    'Facebook',
    'Twitter',
    'Linkedin',
    'Pinterest',
    'WhatsApp'
),
    'choices'  => $rb_social,
) );
// Twitter handle URL.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'        => 'text',
    'settings'    => 'rovenblog_post_twitter_link',
    'label'       => esc_html__( 'Optional handle Twitter URL', 'roven-blog' ),
    'description' => esc_html__( 'The handle is used for Twitter social media share.', 'roven-blog' ),
    'section'     => 'rovenblog_social_media',
    'default'     => '',
) );
// Social Media Widgets Layout option.
Kirki::add_field( 'rovenblog_theme_mod', array(
    'type'     => 'sortable',
    'settings' => 'rovenblog_social_widgets_layout',
    'label'    => esc_html__( 'Social Media Widgets Layout', 'roven-blog' ),
    'tooltip'  => esc_html__( 'You can use this option to rearrange or disable Social Media Widgets elements.', 'roven-blog' ),
    'section'  => 'rovenblog_social_media',
    'default'  => array(
    'facebook',
    'instagram',
    'twitter',
    'linkedin',
    'youtube',
    'tumblr',
    'pinterest',
    'dribbble',
    'medium',
    '500px',
    'xing',
    'vimeo',
    'vk',
    'github',
    'flickr',
    'bitbucket',
    'reddit',
    'steam',
    'twitch'
),
    'choices'  => array(
    'facebook'  => esc_html__( 'facebook', 'roven-blog' ),
    'instagram' => esc_html__( 'instagram', 'roven-blog' ),
    'twitter'   => esc_html__( 'twitter', 'roven-blog' ),
    'linkedin'  => esc_html__( 'linkedin', 'roven-blog' ),
    'youtube'   => esc_html__( 'youtube', 'roven-blog' ),
    'tumblr'    => esc_html__( 'tumblr', 'roven-blog' ),
    'pinterest' => esc_html__( 'pinterest', 'roven-blog' ),
    'dribbble'  => esc_html__( 'dribbble', 'roven-blog' ),
    'medium'    => esc_html__( 'medium', 'roven-blog' ),
    '500px'     => esc_html__( '500px', 'roven-blog' ),
    'xing'      => esc_html__( 'xing', 'roven-blog' ),
    'vimeo'     => esc_html__( 'vimeo', 'roven-blog' ),
    'vk'        => esc_html__( 'vk', 'roven-blog' ),
    'github'    => esc_html__( 'github', 'roven-blog' ),
    'flickr'    => esc_html__( 'flickr', 'roven-blog' ),
    'bitbucket' => esc_html__( 'bitbucket', 'roven-blog' ),
    'reddit'    => esc_html__( 'reddit', 'roven-blog' ),
    'steam'     => esc_html__( 'steam', 'roven-blog' ),
    'twitch'    => esc_html__( 'twitch', 'roven-blog' ),
),
) );