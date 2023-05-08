<?php

/**
 * The template for adding the theme upsell buttons
 *
 * @package Roven-Blog
 */
$theme_type = 'free';

if ( 'free' === $theme_type ) {
    /**
     * Adds theme upsell buttons in various Customizer sections.
     *
     * @param object $wp_customize - cutomizer object.
     */
    function rovenblog_add_upsell( $wp_customize )
    {
        // Discover Pro button section.
        $wp_customize->add_section( new RovenBlog_Button_Section( $wp_customize, 'rovenblog_discover_pro', array(
            'mode'     => 0,
            'priority' => 9,
        ) ) );
        // Layout Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_layout_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_layout_upsell', array(
            'section'     => 'rovenblog_theme_settings',
            'description' => array(
            __( 'Customize layout width', 'roven-blog' ),
            __( 'Customize border radius for cards, inputs and buttons', 'roven-blog' ),
            __( 'Show / Hide Back to top', 'roven-blog' ),
            __( 'Show / Hide Post Format Icons', 'roven-blog' ),
            __( 'Choose from an additional 9 Section / Widget Title Styling', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Color Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_color_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_color_upsell', array(
            'section'     => 'rovenblog_color_settings',
            'description' => array( __( 'Full site colors editing', 'roven-blog' ), __( 'Full site dark mode colors editing', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        // Typography Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_fonts_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_fonts_upsell', array(
            'section'     => 'rovenblog_font_settings',
            'description' => array( __( 'Choose between 800+ different fonts', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        // CTA Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_cta_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_cta_upsell', array(
            'section'     => 'rovenblog_cta',
            'description' => array( __( 'Add a button', 'roven-blog' ), __( 'Customize button', 'roven-blog' ), __( 'Stretch CTA content fullwidth', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        // Header Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_header_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_header_upsell', array(
            'section'     => 'rovenblog_header',
            'description' => array(
            __( 'Custom styling options for menus', 'roven-blog' ),
            __( 'Full color editing for header elements', 'roven-blog' ),
            __( 'Stretch Header content fullwidth', 'roven-blog' ),
            __( 'Full color editing for offcanvas elements', 'roven-blog' ),
            __( 'Two extra alternative header layouts', 'roven-blog' ),
            __( 'Widgetable area in the Offcanvas section', 'roven-blog' )
        ),
            'priority'    => 58,
        ) ) );
        // Header Top Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_header_top_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_header_top_upsell', array(
            'section'     => 'rovenblog_header_top',
            'description' => array( __( 'Stretch Header Top content fullwidth', 'roven-blog' ), __( 'Full color editing for header top elements', 'roven-blog' ) ),
            'priority'    => 58,
        ) ) );
        // Footer Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_footer_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_footer_upsell', array(
            'section'     => 'rovenblog_footer',
            'description' => array(
            __( 'Two Extra footer section with up to 4 widgetable areas', 'roven-blog' ),
            __( 'Stretch all Footer sections content fullwidth', 'roven-blog' ),
            __( 'Full color editing for all Footer sections', 'roven-blog' ),
            __( 'Add border top and padding to all Footer sections', 'roven-blog' ),
            __( 'Remove backlink to RovenThemes', 'roven-blog' )
        ),
            'priority'    => 59,
        ) ) );
        // Page Settings: upsell button.
        $wp_customize->add_setting( 'rovenblog_page_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_page_upsell', array(
            'section'     => 'rovenblog_page_settings',
            'description' => array( __( 'Page layout with sidebar right', 'roven-blog' ), __( 'Stretch Page Header content fullwidth', 'roven-blog' ), __( 'Extra page header styles to choose from', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        // Homepage: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_upsell', array(
            'section'     => 'rovenblog_home_settings',
            'description' => array( __( '4 extra home page sections', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        // Homepage Header Hero: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_hero_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_hero_upsell', array(
            'section'     => 'rovenblog_home_header_hero',
            'description' => array(
            __( 'Display content as a grid', 'roven-blog' ),
            __( '6 extra styles for displaying post content as', 'roven-blog' ),
            __( 'Stretch section content fullwidth', 'roven-blog' ),
            __( 'Choose between 1 and 5 posts to be shown per slide', 'roven-blog' ),
            __( 'Choose between 4 image aspect ratios', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Homepage Featured Posts: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_featured_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_featured_upsell', array(
            'section'     => 'rovenblog_home_featured_posts',
            'description' => array( __( '6 extra styles for displaying post content as', 'roven-blog' ), __( 'Stretch Featured Posts content fullwidth', 'roven-blog' ), __( 'Maximum number of columns increased to 4', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        // Homepage Recent Posts: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_recent_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_recent_upsell', array(
            'section'     => 'rovenblog_home_recent_posts',
            'description' => array(
            __( '6 extra styles for displaying post content as', 'roven-blog' ),
            __( 'Display content as a masonry grid', 'roven-blog' ),
            __( 'Stretch Recent Posts content fullwidth', 'roven-blog' ),
            __( 'Maximum number of columns increased to 4', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Homepage Post Block 1: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_block1_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_block1_upsell', array(
            'section'     => 'rovenblog_home_header_hero1',
            'description' => array( __( 'Extra hompage section that can display posts', 'roven-blog' ), __( 'Configuration options similar to the Featured Posts section', 'roven-blog' ), __( 'Display content as a slider, classic grid or masonry grid', 'roven-blog' ) ),
            'mode'        => 1,
        ) ) );
        // Homepage Post Block 2: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_block2_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_block2_upsell', array(
            'section'     => 'rovenblog_home_header_hero2',
            'description' => array( __( 'Extra hompage section that can display posts', 'roven-blog' ), __( 'Configuration options similar to the Featured Posts section', 'roven-blog' ), __( 'Display content as a slider, classic grid or masonry grid', 'roven-blog' ) ),
            'mode'        => 1,
        ) ) );
        // Homepage Widgets Block 1: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_area1_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_area1_upsell', array(
            'section'     => 'rovenblog_area1',
            'description' => array( __( 'Extra hompage section that can display widgets', 'roven-blog' ), __( 'Up to 4 columns', 'roven-blog' ) ),
            'mode'        => 1,
        ) ) );
        // Homepage Widgets Block 2: upsell button.
        $wp_customize->add_setting( 'rovenblog_home_area2_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_home_area2_upsell', array(
            'section'     => 'rovenblog_area2',
            'description' => array( __( 'Extra hompage section that can display widgets', 'roven-blog' ), __( 'Up to 4 columns', 'roven-blog' ) ),
            'mode'        => 1,
        ) ) );
        // 404 Page: upsell button.
        $wp_customize->add_setting( 'rovenblog_404_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_404_upsell', array(
            'section'     => 'rovenblog_404_settings',
            'description' => array( __( 'Select a custom page to be used as the 404 page', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        // Blog Archives: upsell button.
        $wp_customize->add_setting( 'rovenblog_archive_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_archive_upsell', array(
            'section'     => 'rovenblog_archive_settings',
            'description' => array(
            __( 'Add a featured posts section at the start of blog archives', 'roven-blog' ),
            __( 'Display content as a masonry grid', 'roven-blog' ),
            __( '6 extra styles for displaying post content as', 'roven-blog' ),
            __( 'Customize displayed post meta info', 'roven-blog' ),
            __( 'Stretch Blog Archives content fullwidth', 'roven-blog' ),
            __( 'Stretch Blog Archives Description content fullwidth', 'roven-blog' ),
            __( 'Maximum number of columns increased to 4', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Blog Archives Featured Posts: upsell button.
        $wp_customize->add_setting( 'rovenblog_archive_featured_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_archive_featured_upsell', array(
            'section'     => 'rovenblog_archive_featured',
            'description' => array( __( 'Extra section that allows you to feature posts on the category and tag pages, above the content', 'roven-blog' ), __( 'Customize displayed post meta info', 'roven-blog' ) ),
            'mode'        => 1,
        ) ) );
        // Search Page: upsell button.
        $wp_customize->add_setting( 'rovenblog_search_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_search_upsell', array(
            'section'     => 'rovenblog_search_settings',
            'description' => array(
            __( 'Display content as a masonry grid', 'roven-blog' ),
            __( '6 extra styles for displaying post content as', 'roven-blog' ),
            __( 'Stretch Search Results content fullwidth', 'roven-blog' ),
            __( 'Stretch Search Results Description content fullwidth', 'roven-blog' ),
            __( 'Maximum number of columns increased to 4', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Authors Page: upsell button.
        $wp_customize->add_setting( 'rovenblog_authors_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_authors_upsell', array(
            'section'     => 'rovenblog_author_settings',
            'description' => array(
            __( 'Display content as a masonry grid', 'roven-blog' ),
            __( '6 extra styles for displaying post content as', 'roven-blog' ),
            __( 'Customize the author box or hide it completely', 'roven-blog' ),
            __( 'Stretch content fullwidth', 'roven-blog' ),
            __( 'Stretch Author Bio fullwidth', 'roven-blog' ),
            __( 'Maximum number of columns increased to 4', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Single Post: upsell button.
        $wp_customize->add_setting( 'rovenblog_post_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_post_upsell', array(
            'section'     => 'rovenblog_post_settings',
            'description' => array(
            __( 'Page layout with sidebar right', 'roven-blog' ),
            __( 'Customize the author box', 'roven-blog' ),
            __( 'Configure Post share location', 'roven-blog' ),
            __( '7 extra styles to display post header as', 'roven-blog' ),
            __( 'Customize displayed post meta info', 'roven-blog' ),
            __( 'Stretch Post Header content fullwidth', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Related Posts: upsell button.
        $wp_customize->add_setting( 'rovenblog_related_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_related_upsell', array(
            'section'     => 'rovenblog_post_related_posts',
            'description' => array(
            __( 'Customize the number of related posts shown', 'roven-blog' ),
            __( '7 extra styles for displaying post content as', 'roven-blog' ),
            __( 'Customize the number of columns', 'roven-blog' ),
            __( 'Customize displayed post meta info', 'roven-blog' ),
            __( 'Stretch content fullwidth', 'roven-blog' )
        ),
            'priority'    => 45,
        ) ) );
        // Social Media: upsell button.
        $wp_customize->add_setting( 'rovenblog_social_media_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_social_media_upsell', array(
            'section'     => 'rovenblog_social_media',
            'description' => array( __( 'A greater variety of social media sites for the post share', 'roven-blog' ) ),
            'priority'    => 45,
        ) ) );
        
        if ( class_exists( 'woocommerce' ) ) {
            // Woocommerce Enhancements: upsell button.
            $wp_customize->add_setting( 'rovenblog_woocommerce_upsell', array(
                'sanitize_callback' => 'esc_html',
            ) );
            $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_woocommerce_upsell', array(
                'section'     => 'rovenblog_woocommerce_settings',
                'description' => array( __( 'Customize the look of the shop page', 'roven-blog' ) ),
                'mode'        => 1,
            ) ) );
        }
        
        // Advertisements: upsell button.
        $wp_customize->add_setting( 'rovenblog_advertisements_upsell', array(
            'sanitize_callback' => 'esc_html',
        ) );
        $wp_customize->add_control( new RovenBlog_Upsell_Message( $wp_customize, 'rovenblog_advertisements_upsell', array(
            'section'     => 'rovenblog_advertisements',
            'description' => array(
            __( '1 header ad location', 'roven-blog' ),
            __( '1 homepage ad location', 'roven-blog' ),
            __( '2 post ad locations', 'roven-blog' ),
            __( 'Display image ads', 'roven-blog' ),
            __( 'Display js ads', 'roven-blog' ),
            __( 'Display shortcode ads', 'roven-blog' ),
            __( 'Display google ads', 'roven-blog' ),
            __( 'Select individual mobile and desktop versions of image ads', 'roven-blog' ),
            __( 'Stretch Header and Home ads fullwidth', 'roven-blog' )
        ),
            'mode'        => 1,
        ) ) );
    }
    
    add_action( 'customize_register', 'rovenblog_add_upsell' );
}
