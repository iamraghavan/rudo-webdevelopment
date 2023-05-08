<?php

/**
 * The template for adding titles and dividers in various sections
 *
 * @package Roven-Blog
 */
/**
 * Adds titles and dividers in various sections.
 *
 * @param object $wp_customize - cutomizer object.
 */
function rovenblog_title_dividers( $wp_customize )
{
    // Layout Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_general_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_general_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_theme_settings',
        'priority' => 8,
    ) ) );
    // Color Settings: divider.
    $wp_customize->add_setting( 'rovenblog_color_default_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_color_default_divider', array(
        'label'    => __( 'Default Colors', 'roven-blog' ),
        'section'  => 'rovenblog_color_settings',
        'priority' => 1,
    ) ) );
    // Color Settings: divider.
    $wp_customize->add_setting( 'rovenblog_color_dark_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_color_dark_divider', array(
        'label'    => __( 'Dark Mode Colors', 'roven-blog' ),
        'section'  => 'rovenblog_color_settings',
        'priority' => 23,
    ) ) );
    // Typography Settings: divider 1.
    $wp_customize->add_setting( 'rovenblog_typography_divider1', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_typography_divider1', array(
        'section'  => 'rovenblog_font_settings',
        'divider'  => true,
        'priority' => 7,
    ) ) );
    // Typography Settings: divider 2.
    $wp_customize->add_setting( 'rovenblog_typography_divider2', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_typography_divider2', array(
        'section'  => 'rovenblog_font_settings',
        'divider'  => true,
        'priority' => 9,
    ) ) );
    // Typography Settings: divider 3.
    $wp_customize->add_setting( 'rovenblog_typography_divider3', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_typography_divider3', array(
        'section'  => 'rovenblog_font_settings',
        'divider'  => true,
        'priority' => 11,
    ) ) );
    // Typography Settings: divider 4.
    $wp_customize->add_setting( 'rovenblog_typography_divider4', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_typography_divider4', array(
        'section'  => 'rovenblog_font_settings',
        'divider'  => true,
        'priority' => 14,
    ) ) );
    // CTA Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_cta_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_cta_content_divider', array(
        'label'           => __( 'Content', 'roven-blog' ),
        'section'         => 'rovenblog_cta',
        'priority'        => 3,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_show_cta', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // CTA Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_cta_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_cta_styling_divider', array(
        'label'           => __( 'Styling', 'roven-blog' ),
        'section'         => 'rovenblog_cta',
        'priority'        => 8,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_show_cta', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // CTA Settings: CTA Color Scheme - title divider.
    $wp_customize->add_setting( 'rovenblog_cta_color_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_cta_color_divider', array(
        'label'           => __( 'CTA Color Scheme', 'roven-blog' ),
        'section'         => 'rovenblog_cta',
        'priority'        => 12,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_show_cta', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Header Top Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_header_top_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_top_content_divider', array(
        'label'           => __( 'Content', 'roven-blog' ),
        'section'         => 'rovenblog_header_top',
        'priority'        => 3,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_header_top_show', false ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Header Top Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_header_top_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_top_styling_divider', array(
        'label'           => __( 'Styling', 'roven-blog' ),
        'section'         => 'rovenblog_header_top',
        'priority'        => 5,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_header_top_show', false ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Header Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_header_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_header',
        'priority' => 1,
    ) ) );
    // Header Settings: Header Color Scheme - title divider.
    $wp_customize->add_setting( 'rovenblog_header_color_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_color_divider', array(
        'label'    => __( 'Header Color Scheme', 'roven-blog' ),
        'section'  => 'rovenblog_header',
        'priority' => 27,
    ) ) );
    // Footer Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_footer_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_footer_content_divider', array(
        'label'           => __( 'Content', 'roven-blog' ),
        'section'         => 'rovenblog_footer',
        'priority'        => 4,
        'active_callback' => function () {
        $theme_type = 'free';
        
        if ( 'free' === $theme_type ) {
            return true;
        } elseif ( !get_theme_mod( 'rovenblog_show_footer_top', true ) && !get_theme_mod( 'rovenblog_show_footer', true ) && !get_theme_mod( 'rovenblog_show_footer_bottom', true ) && !get_theme_mod( 'rovenblog_show_footer_copyright', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Footer Settings: Styling Footer - title divider.
    $wp_customize->add_setting( 'rovenblog_footer_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_footer_styling_divider', array(
        'label'           => __( 'Styling Footer', 'roven-blog' ),
        'section'         => 'rovenblog_footer',
        'priority'        => 22,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_show_footer', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Footer Settings: Footer Color Scheme - title divider.
    $wp_customize->add_setting( 'rovenblog_footer_color_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_footer_color_divider', array(
        'label'           => __( 'Footer Color Scheme', 'roven-blog' ),
        'section'         => 'rovenblog_footer',
        'priority'        => 28,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_show_footer', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Footer Settings: Styling Footer Copyright - title divider.
    $wp_customize->add_setting( 'rovenblog_backlink_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_backlink_styling_divider', array(
        'label'           => __( 'Styling Footer Copyright', 'roven-blog' ),
        'section'         => 'rovenblog_footer',
        'priority'        => 46,
        'active_callback' => function () {
        $theme_type = 'free';
        
        if ( 'free' !== $theme_type && !get_theme_mod( 'rovenblog_show_footer_copyright', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Footer Settings: Copyright Color Scheme - title divider.
    $wp_customize->add_setting( 'rovenblog_backlink_color_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_backlink_color_divider', array(
        'label'           => __( 'Copyright Color Scheme', 'roven-blog' ),
        'section'         => 'rovenblog_footer',
        'priority'        => 52,
        'active_callback' => function () {
        $theme_type = 'free';
        
        if ( 'free' !== $theme_type && !get_theme_mod( 'rovenblog_show_footer_copyright', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Single Page Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_page_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_page_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_page_settings',
        'priority' => 1,
    ) ) );
    // Single Page Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_page_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_page_styling_divider', array(
        'label'           => __( 'Styling', 'roven-blog' ),
        'section'         => 'rovenblog_page_settings',
        'priority'        => 4,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_show_page_header', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Homepage Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_home_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_home_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_home_settings',
        'priority' => 1,
    ) ) );
    // Homepage Header Hero Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_home_hero_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_home_hero_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_home_header_hero',
        'priority' => 1,
    ) ) );
    // Homepage Header Hero Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_header_hero_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_hero_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_home_header_hero',
        'priority' => 11,
    ) ) );
    // Homepage Featured Posts Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_home_featured_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_home_featured_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_home_featured_posts',
        'priority' => 1,
    ) ) );
    // Homepage Featured Posts Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_header_featured_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_featured_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_home_featured_posts',
        'priority' => 10,
    ) ) );
    // Homepage Featured Posts Settings: Meta - title divider.
    $wp_customize->add_setting( 'rovenblog_header_featured_meta_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_featured_meta_divider', array(
        'label'    => __( 'Meta', 'roven-blog' ),
        'section'  => 'rovenblog_home_featured_posts',
        'priority' => 14,
    ) ) );
    // Homepage Recent Posts Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_home_recent_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_home_recent_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_home_recent_posts',
        'priority' => 1,
    ) ) );
    // Homepage Recent Posts Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_header_recent_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_recent_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_home_recent_posts',
        'priority' => 7,
    ) ) );
    // Homepage Recent Posts Settings: Meta - title divider.
    $wp_customize->add_setting( 'rovenblog_header_recent_meta_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_header_recent_meta_divider', array(
        'label'    => __( 'Meta', 'roven-blog' ),
        'section'  => 'rovenblog_home_recent_posts',
        'priority' => 11,
    ) ) );
    // 404 Page Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_404_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_404_styling_divider', array(
        'label'           => __( 'Styling', 'roven-blog' ),
        'section'         => 'rovenblog_404_settings',
        'priority'        => 3,
        'active_callback' => function () {
        
        if ( '0' === get_theme_mod( 'rovenblog_404_page', '0' ) ) {
            return true;
        } else {
            return false;
        }
    
    },
    ) ) );
    // Blog Archives Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_archive_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_archive_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_archive_settings',
        'priority' => 1,
    ) ) );
    // Blog Archives Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_archive_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_archive_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_archive_settings',
        'priority' => 10,
    ) ) );
    // Blog Archives Settings: Meta - title divider.
    $wp_customize->add_setting( 'rovenblog_archive_meta_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_archive_meta_divider', array(
        'label'    => __( 'Meta', 'roven-blog' ),
        'section'  => 'rovenblog_archive_settings',
        'priority' => 15,
    ) ) );
    // Search Results Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_search_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_search_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_search_settings',
        'priority' => 1,
    ) ) );
    // Search Results Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_search_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_search_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_search_settings',
        'priority' => 6,
    ) ) );
    // Search Results Settings: Meta - title divider.
    $wp_customize->add_setting( 'rovenblog_search_meta_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_search_meta_divider', array(
        'label'    => __( 'Meta', 'roven-blog' ),
        'section'  => 'rovenblog_search_settings',
        'priority' => 11,
    ) ) );
    // Authors Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_author_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_author_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_author_settings',
        'priority' => 8,
    ) ) );
    // Authors Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_author_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_author_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_author_settings',
        'priority' => 12,
    ) ) );
    // Authors Settings: Meta - title divider.
    $wp_customize->add_setting( 'rovenblog_author_meta_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_author_meta_divider', array(
        'label'    => __( 'Meta', 'roven-blog' ),
        'section'  => 'rovenblog_author_settings',
        'priority' => 17,
    ) ) );
    // Single Post Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_post_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_post_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_post_settings',
        'priority' => 6,
    ) ) );
    // Single Post Settings: Progress Bar Color Scheme - title divider.
    $wp_customize->add_setting( 'rovenblog_post_progress_color_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_post_progress_color_divider', array(
        'label'           => __( 'Progress Bar Color Scheme', 'roven-blog' ),
        'section'         => 'rovenblog_post_settings',
        'priority'        => 10,
        'active_callback' => function () {
        
        if ( !get_theme_mod( 'rovenblog_post_show_scroll_progress_bar', true ) ) {
            return false;
        } else {
            return true;
        }
    
    },
    ) ) );
    // Related Posts Settings: Content - title divider.
    $wp_customize->add_setting( 'rovenblog_post_related_content_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_post_related_content_divider', array(
        'label'    => __( 'Content', 'roven-blog' ),
        'section'  => 'rovenblog_post_related_posts',
        'priority' => 1,
    ) ) );
    // Related Posts Settings: Styling - title divider.
    $wp_customize->add_setting( 'rovenblog_post_related_styling_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_post_related_styling_divider', array(
        'label'    => __( 'Styling', 'roven-blog' ),
        'section'  => 'rovenblog_post_related_posts',
        'priority' => 6,
    ) ) );
    // Related Posts Settings: Meta - title divider.
    $wp_customize->add_setting( 'rovenblog_post_related_meta_divider', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new RovenBlog_Separator_Control( $wp_customize, 'rovenblog_post_related_meta_divider', array(
        'label'    => __( 'Meta', 'roven-blog' ),
        'section'  => 'rovenblog_post_related_posts',
        'priority' => 10,
    ) ) );
}

add_action( 'customize_register', 'rovenblog_title_dividers' );