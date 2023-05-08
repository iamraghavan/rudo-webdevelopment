<?php

/**
 * Rovenblog functions and definitions
 *
 * @package Roven-Blog
 */

if ( !function_exists( 'rovenblog_fs' ) ) {
    /**
     * Create a helper function for easy SDK access.
     */
    function rovenblog_fs()
    {
        global  $rovenblog_fs ;
        
        if ( !isset( $rovenblog_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $rovenblog_fs = fs_dynamic_init( array(
                'id'             => '12229',
                'slug'           => 'roven-blog',
                'premium_slug'   => 'roven-blog-pro',
                'type'           => 'theme',
                'public_key'     => 'pk_b88cade6d39ee4bfd17183757306e',
                'is_premium'     => false,
                'premium_suffix' => '(Pro)',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => array(
                'days'               => 14,
                'is_require_payment' => true,
            ),
                'menu'           => array(
                'slug'    => 'rovenblog_welcome',
                'support' => false,
                'parent'  => array(
                'slug' => 'themes.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $rovenblog_fs;
    }
    
    // Init Freemius.
    rovenblog_fs();
    // Signal that SDK was initiated.
    do_action( 'rovenblog_fs_loaded' );
}

if ( !function_exists( 'rovenblog_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function rovenblog_setup()
    {
        // Makes the theme available for translation.
        load_theme_textdomain( 'roven-blog', get_template_directory() . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );
        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        $rb_nav = array(
            'rovenblog-nav-menu1' => esc_html__( 'Theme Header Navigation Menu', 'roven-blog' ),
            'rovenblog-nav-menu4' => esc_html__( 'Theme Mobile Navigation Menu', 'roven-blog' ),
        );
        // Theme navigation menu declaration.
        register_nav_menus( $rb_nav );
        // Crops the uploaded images to certain sizes used for different components and elements.
        
        if ( function_exists( 'add_image_size' ) ) {
            $grid_width = 1230;
            add_image_size(
                'rovenblog-hero-full',
                1980,
                842,
                true
            );
            add_image_size(
                'rovenblog-landscape-full',
                1980,
                1320,
                true
            );
            add_image_size(
                'rovenblog-portrait-full',
                1980,
                2970,
                true
            );
            add_image_size(
                'rovenblog-square-full',
                1980,
                1980,
                true
            );
            add_image_size(
                'rovenblog-masonry-full',
                1980,
                0,
                true
            );
            
            if ( 1400 < $grid_width ) {
                add_image_size(
                    'rovenblog-hero-max',
                    1760,
                    749,
                    true
                );
                add_image_size(
                    'rovenblog-landscape-max',
                    1760,
                    1173,
                    true
                );
                add_image_size(
                    'rovenblog-portrait-max',
                    1760,
                    2640,
                    true
                );
                add_image_size(
                    'rovenblog-square-max',
                    1760,
                    1760,
                    true
                );
                add_image_size(
                    'rovenblog-masonry-max',
                    1760,
                    0,
                    true
                );
            } elseif ( 1230 < $grid_width ) {
                add_image_size(
                    'rovenblog-hero-max',
                    1540,
                    655,
                    true
                );
                add_image_size(
                    'rovenblog-landscape-max',
                    1540,
                    1027,
                    true
                );
                add_image_size(
                    'rovenblog-portrait-max',
                    1540,
                    2310,
                    true
                );
                add_image_size(
                    'rovenblog-square-max',
                    1540,
                    1540,
                    true
                );
                add_image_size(
                    'rovenblog-masonry-max',
                    1540,
                    0,
                    true
                );
            } else {
                add_image_size(
                    'rovenblog-hero-max',
                    1353,
                    633,
                    true
                );
                add_image_size(
                    'rovenblog-landscape-max',
                    1353,
                    992,
                    true
                );
                add_image_size(
                    'rovenblog-portrait-max',
                    1353,
                    2231,
                    true
                );
                add_image_size(
                    'rovenblog-square-max',
                    1353,
                    1353,
                    true
                );
                add_image_size(
                    'rovenblog-masonry-max',
                    1353,
                    0,
                    true
                );
            }
            
            add_image_size(
                'rovenblog-hero-mid',
                1024,
                436,
                true
            );
            add_image_size(
                'rovenblog-landscape-mid',
                1024,
                683,
                true
            );
            add_image_size(
                'rovenblog-portrait-mid',
                1024,
                1536,
                true
            );
            add_image_size(
                'rovenblog-square-mid',
                1024,
                1024,
                true
            );
            add_image_size(
                'rovenblog-masonry-mid',
                1024,
                0,
                true
            );
            add_image_size(
                'rovenblog-hero-min',
                810,
                345,
                true
            );
            add_image_size(
                'rovenblog-landscape-min',
                810,
                541,
                true
            );
            add_image_size(
                'rovenblog-portrait-min',
                810,
                1216,
                true
            );
            add_image_size(
                'rovenblog-square-min',
                810,
                810,
                true
            );
            add_image_size(
                'rovenblog-masonry-min',
                810,
                0,
                true
            );
            add_image_size(
                'rovenblog-size-small',
                0,
                120,
                true
            );
        }
        
        // Enable support for Post Formats.
        add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );
        // Use the default core markup for search form, comment form, and comments to output valid HTML5.
        $html5_args = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script'
        );
        add_theme_support( 'html5', $html5_args );
        // Add support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        // Add support for Full and wide alignment in Gutenberg.
        add_theme_support( 'align-wide' );
        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );
        // Add support for responsive embeds.
        add_theme_support( 'responsive-embeds' );
        // Add support for core custom logo.
        add_theme_support( 'custom-logo' );
        // Add support for Yoast SEO plugin breadcrumbs.
        add_theme_support( 'yoast-seo-breadcrumbs' );
        // Add support for Rank Math SEO plugin breadcrumbs.
        add_theme_support( 'rank-math-breadcrumbs' );
        $infinitescroll_args = array(
            'container' => 'rb-posts-list',
            'footer'    => false,
            'render'    => 'rovenblog_posts_loop',
            'wrapper'   => false,
        );
        // Add support for Jetpack infinitescroll feature.
        add_theme_support( 'infinite-scroll', $infinitescroll_args );
    }

}
add_action( 'after_setup_theme', 'rovenblog_setup' );
/**
 * Load Gutenberg stylesheet.
 */
function rovenblog_add_gutenberg_assets()
{
    // Load the theme styles within Gutenberg.
    wp_enqueue_style(
        'rovenblog-gutenberg',
        get_theme_file_uri( '/assets/css/gutenberg-editor-style.min.css' ),
        false,
        _ROVENBLOG_VERSION
    );
    if ( class_exists( 'Kirki' ) ) {
        // This function will write the Customizer resulted css variables inline after theme gutenberg style file.
        rovenblog_customizer_styles( 'rovenblog-gutenberg' );
    }
}

add_action( 'enqueue_block_editor_assets', 'rovenblog_add_gutenberg_assets' );
/**
 * Script that handles preview checks, redirects and page scrolling based on Customizer sections.
 */
function rovenblog_customizer_preview()
{
    $rb_author = get_users( array(
        'fields'              => array( 'ID' ),
        'has_published_posts' => true,
        'number'              => 1,
        'orderby'             => 'ID',
        'order'               => 'DESC',
    ) );
    
    if ( !empty($rb_author) ) {
        $rb_author = reset( $rb_author );
        $rb_author_link = get_author_posts_url( $rb_author->ID );
    } else {
        $rb_author_link = 'rb-no-redirect';
    }
    
    $rb_page = get_pages( array(
        'number' => 1,
    ) );
    
    if ( !empty($rb_page) ) {
        $rb_page = reset( $rb_page );
        $rb_page_link = get_page_link( $rb_page->ID );
    } else {
        $rb_page_link = 'rb-no-redirect';
    }
    
    $rb_post = get_posts( array(
        'numberposts' => 1,
    ) );
    
    if ( !empty($rb_post) ) {
        $rb_post = reset( $rb_post );
        $rb_post_link = get_permalink( $rb_post->ID );
    } else {
        $rb_post_link = 'rb-no-redirect';
    }
    
    $rb_categ = get_categories( array(
        'number' => 1,
    ) );
    
    if ( !empty($rb_categ) ) {
        $rb_categ = reset( $rb_categ );
        $rb_categ_link = get_category_link( $rb_categ->term_id );
        $rb_categ_name = $rb_categ->name;
    } else {
        $rb_categ_link = 'rb-no-redirect';
        $rb_categ_name = 'uncategorized';
    }
    
    
    if ( class_exists( 'woocommerce' ) ) {
        $rb_shop_link = get_permalink( wc_get_page_id( 'shop' ) );
        if ( false === $rb_shop_link ) {
            $rb_shop_link = 'rb-no-redirect';
        }
    } else {
        $rb_shop_link = 'rb-no-redirect';
    }
    
    $rb_data = array(
        'home'        => get_home_url(),
        'single_post' => $rb_post_link,
        'single_page' => $rb_page_link,
        'shop'        => $rb_shop_link,
        'author'      => $rb_author_link,
        'categ'       => $rb_categ_link,
        'search'      => get_search_link( $rb_categ_name ),
    );
    wp_register_script(
        'rovenblog-customizer-preview',
        get_theme_file_uri( '/assets/admin/js/rovenblog-customizer-preview.js' ),
        array( 'customize-preview' ),
        _ROVENBLOG_VERSION,
        true
    );
    wp_localize_script( 'rovenblog-customizer-preview', 'rovenblog_data', $rb_data );
    wp_enqueue_script( 'rovenblog-customizer-preview' );
}

add_action( 'customize_preview_init', 'rovenblog_customizer_preview' );
/**
 * Informs the Customizer Preview of sections opening/closing for page scrolling and handles home redirect.
 */
function rovenblog_customizer_controls()
{
    wp_enqueue_script(
        'rovenblog-customizer-controls',
        get_theme_file_uri( '/assets/admin/js/rovenblog-customizer-controls.js' ),
        array( 'jquery' ),
        _ROVENBLOG_VERSION,
        true
    );
}

add_action( 'customize_controls_enqueue_scripts', 'rovenblog_customizer_controls' );
/**
 * Set the content width in pixels.
 * Priority 0 to make it available to lower priority callbacks.
 */
function rovenblog_content_width()
{
    $GLOBALS['content_width'] = apply_filters( 'rovenblog_content_width', 1230 );
}

add_action( 'after_setup_theme', 'rovenblog_content_width', 0 );
/**
 * Register theme default fonts.
 * Used only when Kirki plugin is not active or installed, else fonts are loaded via kirki.
 */
function rovenblog_fonts_url()
{
    $fonts_url = array();
    /**
     * Translators: If there are characters in your language that are not
     * supported by the fonts, translate this to 'off'. Do not translate
     * into your own language.
     */
    $first = esc_html_x( 'on', 'DM Sans font: on or off', 'roven-blog' );
    $second = esc_html_x( 'on', 'Poppins font: on or off', 'roven-blog' );
    if ( 'off' !== $first ) {
        $fonts_url['first'] = 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap';
    }
    if ( 'off' !== $second ) {
        $fonts_url['second'] = 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap';
    }
    return $fonts_url;
}

if ( !function_exists( 'rovenblog_scripts' ) ) {
    /**
     * Enqueue frontend scripts and styles.
     */
    function rovenblog_scripts()
    {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        // Theme main style.
        wp_enqueue_style(
            'rovenblog-style',
            get_template_directory_uri() . '/assets/css/rovenblog.min.css',
            array(),
            _ROVENBLOG_VERSION
        );
        
        if ( false === class_exists( 'Kirki' ) ) {
            // Use the default fonts when Kirki plugin is not installed/active.
            $fonts_url = rovenblog_fonts_url();
            if ( isset( $fonts_url['first'] ) ) {
                wp_enqueue_style(
                    'rovenblog-first-font',
                    esc_url_raw( $fonts_url['first'] ),
                    array(),
                    _ROVENBLOG_VERSION
                );
            }
            if ( isset( $fonts_url['second'] ) ) {
                wp_enqueue_style(
                    'rovenblog-second-font',
                    esc_url_raw( $fonts_url['second'] ),
                    array(),
                    _ROVENBLOG_VERSION
                );
            }
        }
        
        if ( class_exists( 'Kirki' ) ) {
            // Customizer inline styles.
            if ( !function_exists( 'rovenblog_demos_customizer_styles' ) ) {
                rovenblog_customizer_styles( 'rovenblog-style' );
            }
        }
        // Comment form validation text strings.
        $script_args = array(
            'text_comment' => esc_html__( 'Please enter your comment.', 'roven-blog' ),
            'text_name'    => esc_html__( 'Please enter your name.', 'roven-blog' ),
            'text_email'   => esc_html__( 'Please enter your email address.', 'roven-blog' ),
            'text_email_v' => esc_html__( 'Please enter a valid email address.', 'roven-blog' ),
            'slide_prev'   => esc_html__( 'Go to previous slide', 'roven-blog' ),
            'slide_next'   => esc_html__( 'Go to next slide', 'roven-blog' ),
        );
        $count_toggle = get_theme_mod( 'rovenblog_view_count_toggle', false );
        $count_type = get_theme_mod( 'rovenblog_view_count_type', 'php' );
        
        if ( true === $count_toggle && 'js' === $count_type && is_singular( 'post' ) ) {
            // Post views count ajax arguments.
            $script_args['ajax_call'] = true;
            $script_args['post_id'] = get_the_ID();
            $script_args['nonce'] = wp_create_nonce( 'rovenblog-viewcount-nonce' );
            $script_args['requestURL'] = esc_url_raw( admin_url( 'admin-ajax.php' ) );
        } else {
            $script_args['ajax_call'] = false;
        }
        
        
        if ( true === get_theme_mod( 'rovenblog_lazy_loading', true ) ) {
            $script_args['lazy_load'] = true;
        } else {
            $script_args['lazy_load'] = false;
        }
        
        // Theme js script.
        wp_register_script(
            'rovenblog-main',
            get_template_directory_uri() . '/assets/js/rovenblog.min.js',
            array( 'jquery' ),
            _ROVENBLOG_VERSION,
            true
        );
        wp_localize_script( 'rovenblog-main', 'rovenblog_args', $script_args );
        wp_enqueue_script( 'rovenblog-main' );
    }

}
add_action( 'wp_enqueue_scripts', 'rovenblog_scripts' );
/**
 * This function prepares the url of the font selected from Kirki Customizer or default fonts.
 */
function rovenblog_custom_fonts_url()
{
    $fonts_url = array();
    $body_font = get_theme_mod( 'rovenblog_body_typography', array() );
    if ( !isset( $body_font['font-family'] ) ) {
        $body_font['font-family'] = 'DM Sans';
    }
    if ( !isset( $body_font['variant'] ) ) {
        $body_font['variant'] = '400';
    }
    $headings_font = get_theme_mod( 'rovenblog_headings_typography', array() );
    if ( !isset( $headings_font['font-family'] ) ) {
        $headings_font['font-family'] = 'Poppins';
    }
    if ( !isset( $headings_font['variant'] ) ) {
        $headings_font['variant'] = '700';
    }
    $body_family = preg_replace( '/\\s+/', '+', $body_font['font-family'] );
    $fonts_url['first'] = 'https://fonts.googleapis.com/css2?family=' . $body_family . ':wght@' . $body_font['variant'] . '&display=swap';
    $headings_family = preg_replace( '/\\s+/', '+', $headings_font['font-family'] );
    $fonts_url['second'] = 'https://fonts.googleapis.com/css2?family=' . $headings_family . ':wght@' . $headings_font['variant'] . '&display=swap';
    $font_families = array();
    return $fonts_url;
}

/**
 * Enqueue theme custom editor and customizer styles for admin edit post/page.
 */
function rovenblog_admin_scripts()
{
    // Load the theme Admin script, mainly used for the theme notice.
    wp_enqueue_style(
        'rovenblog-admin',
        get_template_directory_uri() . '/assets/admin/css/rovenblog-admin.min.css',
        array(),
        _ROVENBLOG_VERSION
    );
    // Ajax arguments for notice dismiss.
    $script_args0 = array(
        'rb_ajax_url'     => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
        'rb_noncewelcome' => wp_create_nonce( 'rovenblog-welcome-notice' ),
    );
    // Load the theme notice script.
    wp_register_script(
        'rovenblog-admin-notice',
        get_template_directory_uri() . '/assets/admin/js/rovenblog-admin-notice.js',
        array( 'jquery' ),
        _ROVENBLOG_VERSION,
        true
    );
    wp_localize_script( 'rovenblog-admin-notice', 'rovenblog_args', $script_args0 );
    wp_enqueue_script( 'rovenblog-admin-notice' );
    global  $pagenow ;
    
    if ( 'post.php' === $pagenow || 'post-new.php' === $pagenow ) {
        
        if ( !class_exists( 'Kirki' ) ) {
            // Use the default fonts when Kirki plugin is not installed/active.
            $fonts_url = rovenblog_fonts_url();
            
            if ( isset( $fonts_url['first'] ) ) {
                wp_enqueue_style(
                    'rovenblog-first-font',
                    esc_url_raw( $fonts_url['first'] ),
                    array(),
                    _ROVENBLOG_VERSION
                );
            } else {
                $fonts_url['first'] = null;
            }
            
            
            if ( isset( $fonts_url['second'] ) ) {
                wp_enqueue_style(
                    'rovenblog-second-font',
                    esc_url_raw( $fonts_url['second'] ),
                    array(),
                    _ROVENBLOG_VERSION
                );
            } else {
                $fonts_url['second'] = null;
            }
            
            // Load the theme custom style file and fonts for the TinyMCE editor.
            add_editor_style(
                'assets/css/editor-style.min.css',
                rovenblog_fonts_url(),
                esc_url_raw( $fonts_url['first'] ),
                esc_url_raw( $fonts_url['second'] )
            );
        } else {
            // This function will write the Customizer resulted css variables in the customizer file.
            rovenblog_customizer_styles( false );
            $fonts_url = rovenblog_custom_fonts_url();
            if ( !isset( $fonts_url['first'] ) ) {
                $fonts_url['first'] = null;
            }
            if ( !isset( $fonts_url['second'] ) ) {
                $fonts_url['second'] = null;
            }
            // Load the theme fonts, custom style and customizer css variables files for the TinyMCE editor.
            add_editor_style( array(
                'assets/css/editor-style.min.css',
                'assets/admin/css/generated-style.css',
                esc_url_raw( $fonts_url['first'] ),
                esc_url_raw( $fonts_url['second'] )
            ) );
        }
    
    } elseif ( 'themes.php' === $pagenow && isset( $_GET['page'] ) && 'rovenblog_welcome' === $_GET['page'] ) {
        $hide_rb = false;
        
        if ( false === $hide_rb ) {
            // Load the theme Dashboard style script.
            wp_enqueue_style(
                'rovenblog-dashboard',
                get_template_directory_uri() . '/assets/admin/css/rovenblog-dashboard.min.css',
                array(),
                _ROVENBLOG_VERSION
            );
            // Translation strings for the plugin install/update/activate actions in the theme dashboard.
            $script_args = array(
                'rb_ajax_url'     => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
                'rb_noncewelcome' => wp_create_nonce( 'rovenblog-welcome-notice' ),
                'text_updating'   => esc_html__( 'Updating', 'roven-blog' ),
                'text_updating2'  => esc_html__( 'Updating...', 'roven-blog' ),
                'text_updated'    => esc_html__( 'Updated!', 'roven-blog' ),
                'text_updated2'   => esc_html__( ' updated!', 'roven-blog' ),
                'text_update_s'   => esc_html__( 'Update completed successfully.', 'roven-blog' ),
                'text_update_f'   => esc_html__( 'Update failed: ', 'roven-blog' ),
                'text_update_f2'  => esc_html__( ' update failed.', 'roven-blog' ),
                'text_update'     => esc_html__( 'Update Now', 'roven-blog' ),
                'text_activating' => esc_html__( 'Activating...', 'roven-blog' ),
                'text_activate'   => esc_html__( 'Activate', 'roven-blog' ),
                'text_activated'  => esc_html__( 'Activated', 'roven-blog' ),
                'text_activate_f' => esc_html__( 'Activation failed.', 'roven-blog' ),
                'text_dismiss'    => esc_html__( 'Dismiss this notice.', 'roven-blog' ),
                'text_install'    => esc_html__( 'Install & Activate', 'roven-blog' ),
                'text_cancel'     => esc_html__( 'Update canceled.', 'roven-blog' ),
                'text_installing' => esc_html__( 'Installing...', 'roven-blog' ),
                'text_wait_i'     => esc_html__( 'Installing... please wait.', 'roven-blog' ),
                'text_installed'  => esc_html__( 'Installed!', 'roven-blog' ),
                'text_complet_i'  => esc_html__( 'Installation completed successfully.', 'roven-blog' ),
                'text_install_f'  => esc_html__( 'Installation failed: ', 'roven-blog' ),
                'text_install_f2' => esc_html__( 'Installation failed.', 'roven-blog' ),
            );
            // Load the theme Dashboard js script and dependencies.
            wp_register_script(
                'rovenblog-dashboard-functions',
                get_template_directory_uri() . '/assets/admin/js/rovenblog-dashboard.min.js',
                array( 'jquery' ),
                _ROVENBLOG_VERSION,
                true
            );
            wp_localize_script( 'rovenblog-dashboard-functions', 'rovenblog_args', $script_args );
            wp_enqueue_script( 'rovenblog-dashboard-functions' );
            
            if ( current_user_can( 'install_plugins' ) ) {
                // The theme dashboad section "Plugins" relies on WordPress scripts for plugin install and update.
                wp_enqueue_script( 'updates' );
                wp_enqueue_script( 'plugin-install' );
            }
        
        }
    
    } elseif ( 'themes.php' === $pagenow && isset( $_GET['page'] ) && 'one-click-demo-import' === $_GET['page'] ) {
        // Load the theme Importer script.
        wp_enqueue_style(
            'rovenblog-importer',
            get_template_directory_uri() . '/assets/admin/css/rovenblog-importer.min.css',
            array(),
            _ROVENBLOG_VERSION
        );
    } elseif ( 'widgets.php' === $pagenow ) {
        // Load the theme Widget script and dependencies.
        wp_enqueue_media();
        wp_enqueue_editor();
        wp_enqueue_script(
            'rovenblog-widget-functions',
            get_template_directory_uri() . '/assets/admin/js/widget-functions.js',
            array( 'jquery' ),
            _ROVENBLOG_VERSION,
            true
        );
    } elseif ( 'customize.php' === $pagenow ) {
        // Load the theme Customizer script.
        wp_enqueue_style(
            'rovenblog-dashboard',
            get_template_directory_uri() . '/assets/admin/css/rovenblog-customizer.min.css',
            array(),
            _ROVENBLOG_VERSION
        );
    }

}

add_action( 'admin_enqueue_scripts', 'rovenblog_admin_scripts' );
if ( !function_exists( 'rovenblog_excerpt_more' ) ) {
    /**
     * Replace the default excerpt more […].
     *
     * @param string $more - the excerpt more text.
     */
    function rovenblog_excerpt_more( $more )
    {
        
        if ( is_admin() ) {
            return $more;
        } else {
            return '...';
        }
    
    }

}
add_filter( 'excerpt_more', 'rovenblog_excerpt_more' );
if ( !function_exists( 'rovenblog_excerpt_length' ) ) {
    /**
     * The custom excerpt length set via Kirki Customizer Options.
     *
     * @param string $length - excerpt characters count.
     */
    function rovenblog_excerpt_length( $length )
    {
        
        if ( is_admin() ) {
            return $length;
        } else {
            $rb_excerpt = 20;
            $custom_length = get_theme_mod( 'rovenblog_excerpt_length', $rb_excerpt );
            return intval( $custom_length );
        }
    
    }

}
add_filter( 'excerpt_length', 'rovenblog_excerpt_length', 999 );
/**
 * Theme constants.
 */
require_once get_template_directory() . '/inc/theme-constants.php';
/**
 * Theme Functions which enhance the theme and add widget areas.
 */
require_once get_template_directory() . '/inc/template-functions.php';
$hide_import = false;
if ( false === $hide_import ) {
    /**
     * Theme demo import functionalities.
     */
    require_once get_template_directory() . '/inc/ocdi-filters.php';
}
// Roven Blog Archives widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-archives.php';
// Roven Blog Categories widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-categories.php';
// Roven Blog Logo widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-logo.php';
// Roven Blog Posts widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-posts.php';
// Roven Blog Social Networks List Alternative widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-social-networks-list-alt.php';
// Roven Blog Social Networks widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-social-networks.php';
// Roven Blog Tag Cloud widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-tag-cloud.php';
// Roven Blog Text widget.
require_once get_template_directory() . '/inc/widgets/class-rb-widget-text.php';
$hide_rb = false;
if ( false === $hide_rb ) {
    
    if ( is_admin() ) {
        // Theme dashboard panels and functions.
        require_once get_template_directory() . '/inc/dashboard/welcome-main.php';
        // Theme dashboard ajax functions.
        require_once get_template_directory() . '/inc/dashboard/welcome-ajax.php';
        // Theme notice.
        require_once get_template_directory() . '/inc/dashboard/welcome-notice.php';
    }

}
/**
 *  Kirki Customizer related files and functions.
 */

if ( class_exists( 'Kirki' ) && !function_exists( 'rovenblog_kirki_settings' ) ) {
    /**
     * Register Theme Mods
     */
    function rovenblog_kirki_settings()
    {
        Kirki::add_config( 'rovenblog_theme_mod', array(
            'capability'  => 'edit_theme_options',
            'option_type' => 'theme_mod',
        ) );
        // The files used to generate theme Customizer Options via Kirki.
        require get_template_directory() . '/inc/customizer/blog/authors-options.php';
        require get_template_directory() . '/inc/customizer/blog/blog-archives-featured-posts-options.php';
        require get_template_directory() . '/inc/customizer/blog/blog-archives-options.php';
        require get_template_directory() . '/inc/customizer/blog/related-posts-options.php';
        require get_template_directory() . '/inc/customizer/blog/search-results-options.php';
        require get_template_directory() . '/inc/customizer/blog/single-post-options.php';
        require get_template_directory() . '/inc/customizer/blog/social-media-options.php';
        require get_template_directory() . '/inc/customizer/navigation/cta-options.php';
        require get_template_directory() . '/inc/customizer/navigation/footer-options.php';
        require get_template_directory() . '/inc/customizer/navigation/header-options.php';
        require get_template_directory() . '/inc/customizer/navigation/header-top-options.php';
        require get_template_directory() . '/inc/customizer/other/advanced-settings-options.php';
        require get_template_directory() . '/inc/customizer/other/advertisements-options.php';
        require get_template_directory() . '/inc/customizer/pages/404-page-options.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-featured-posts-options.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-header-hero-options.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-options.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-post-block-1-options.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-post-block-2-posts.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-recent-posts-options.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-widgets-block-1-options.php';
        require get_template_directory() . '/inc/customizer/pages/homepage-widgets-block-2-options.php';
        require get_template_directory() . '/inc/customizer/pages/single-page-options.php';
        if ( class_exists( 'woocommerce' ) ) {
            require get_template_directory() . '/inc/customizer/shop/woocommerce-enhancements-options.php';
        }
        require get_template_directory() . '/inc/customizer/site-styling/colors-options.php';
        require get_template_directory() . '/inc/customizer/site-styling/layout-options.php';
        require get_template_directory() . '/inc/customizer/site-styling/typography-options.php';
        // The CSS resulted from Kirki Customizer Options is handled in this file.
        require_once get_template_directory() . '/inc/customizer-values.php';
    }
    
    add_action( 'after_setup_theme', 'rovenblog_kirki_settings', 20 );
    /**
     * Disable Kirki statistics gathering.
     */
    add_filter( 'kirki_telemetry', '__return_false' );
}


if ( class_exists( 'WP_Customize_Control' ) ) {
    require get_template_directory() . '/inc/customizer/controls/class-rovenblog-button-section.php';
    require get_template_directory() . '/inc/customizer/controls/class-rovenblog-divider-control.php';
    require get_template_directory() . '/inc/customizer/controls/class-rovenblog-separator-control.php';
    require get_template_directory() . '/inc/customizer/controls/class-rovenblog-title-section.php';
    require get_template_directory() . '/inc/customizer/controls/class-rovenblog-upsell-message.php';
    require get_template_directory() . '/inc/customizer/sections-organize.php';
    
    if ( class_exists( 'Kirki' ) ) {
        require get_template_directory() . '/inc/customizer/add-title-dividers.php';
        require get_template_directory() . '/inc/customizer/add-upsell.php';
    }

}

/**
 *  Generates the posts categories array, used for Kirki Customizer Options.
 */
function rovenblog_categories_list()
{
    global  $pagenow ;
    
    if ( 'customize.php' === $pagenow ) {
        $categories = get_categories( array(
            'post_type' => 'post',
        ) );
        $categ_list = array();
        if ( !empty($categories) ) {
            foreach ( $categories as $category ) {
                $categ_list[$category->term_id] = $category->name;
            }
        }
        return $categ_list;
    }

}

/**
 *  Generates the posts tags array, used for Kirki Customizer Options.
 */
function rovenblog_tags_list()
{
    global  $pagenow ;
    
    if ( 'customize.php' === $pagenow ) {
        $p_tags = get_tags( 'post_tag' );
        $tag_list = array();
        if ( !empty($p_tags) ) {
            foreach ( $p_tags as $p_tag ) {
                $tag_list[$p_tag->term_id] = $p_tag->name;
            }
        }
        return $tag_list;
    }

}

/**
 *  Generates the posts array, used for Kirki Customizer Options.
 */
function rovenblog_posts_list()
{
    global  $pagenow ;
    
    if ( 'customize.php' === $pagenow ) {
        // Get all post IDs for the Kirki post selectors in the Customizer.
        $posts_ids = get_posts( array(
            'fields'      => 'ids',
            'numberposts' => -1,
        ) );
        $posts_list = array();
        if ( !empty($posts_ids) ) {
            foreach ( $posts_ids as $post_id ) {
                $posts_list[$post_id] = get_the_title( $post_id );
            }
        }
        return $posts_list;
    }

}

/**
 *  Generates the pages array, used for Kirki Customizer Options.
 */
function rovenblog_pages_list()
{
    global  $pagenow ;
    
    if ( 'customize.php' === $pagenow ) {
        $page_ids = get_all_page_ids();
        $pages_array = array(
            0 => esc_html__( 'Default 404 Template', 'roven-blog' ),
        );
        if ( !empty($page_ids) ) {
            foreach ( $page_ids as $page_id ) {
                // do not include the Auto Draft pages.
                if ( 'Auto Draft' !== get_the_title( $page_id ) ) {
                    $pages_array[$page_id] = esc_html( get_the_title( $page_id ) );
                }
            }
        }
        return $pages_array;
    }

}

/**
 * Generates the post arguments, used for Header Hero Posts, Featured Posts and Latest Posts sections.
 *
 * @param string $type - determines what set of posts to get.
 * @param int    $count - the number of posts to get.
 * @param string $param - determines if the function is used by home header or featured posts.
 * @param string $mode - determines if fields=>ids or ignore_sticky_posts=>true should be added.
 * @param int    $tag - the id of the post tag.
 * @param int    $categ - the id of the post category.
 */
function rovenblog_posts_args(
    $type,
    $count,
    $param,
    $mode = 'ids',
    $tag = null,
    $categ = null
)
{
    
    if ( 'popular-posts' === $type ) {
        $args = array(
            'posts_per_page' => $count,
            'meta_key'       => 'post_views',
            'orderby'        => 'meta_value_num',
            'order'          => 'DESC',
            'numberposts'    => $count,
        );
    } elseif ( 'category-posts' === $type ) {
        
        if ( 'widget' === $param ) {
            $category = $categ;
        } else {
            $category = get_theme_mod( $param . '_post_categ' );
        }
        
        $args = array(
            'posts_per_page' => $count,
            'cat'            => $category,
            'numberposts'    => $count,
        );
    } elseif ( 'tag-posts' === $type ) {
        
        if ( 'widget' === $param ) {
            $tag = $tag;
        } else {
            $tag = get_theme_mod( $param . '_post_tag' );
        }
        
        $args = array(
            'posts_per_page' => $count,
            'tag_id'         => $tag,
            'numberposts'    => $count,
        );
    } elseif ( 'specific-posts' === $type ) {
        $specific = get_theme_mod( $param . '_post_specific', false );
        
        if ( false === $specific || empty($specific) ) {
            $count = 0;
        } else {
            $count = count( $specific );
        }
        
        $args = array(
            'posts_per_page' => $count,
            'post__in'       => $specific,
            'numberposts'    => $count,
        );
    } else {
        $args = array(
            'posts_per_page' => $count,
            'numberposts'    => $count,
        );
    }
    
    
    if ( 'ids' === $mode ) {
        $args['fields'] = 'ids';
    } elseif ( false === $mode ) {
        $args['ignore_sticky_posts'] = true;
    }
    
    return $args;
}

/**
 * Generates the list of post ids that should be excluded by the section type which called the function, based on order.
 *
 * @param string $check - determines which type of section called the exclude function.
 */
function rovenblog_exclusion_list( $check )
{
    $sections = get_theme_mod( 'rovenblog_home_layout', array( 'hero', 'featured', 'main' ) );
    $exclude = array();
    $id_list = array();
    // Traverse all sections until the one that called the function is met.
    foreach ( $sections as $section ) {
        if ( $check === $section ) {
            break;
        }
        
        if ( 'hero' === $section ) {
            $type = get_theme_mod( 'rovenblog_home_header_hero_content', 'recent-posts' );
            $count = get_theme_mod( 'rovenblog_home_header_hero_posts_nr', 2 );
            $args1 = rovenblog_posts_args( $type, $count, 'rovenblog_home_header_hero' );
            // Check if the Header Hero has exclude posts options enabled.
            if ( 'specific-posts' !== get_theme_mod( 'rovenblog_home_header_hero_content', 'recent-posts' ) && true === get_theme_mod( 'rovenblog_home_header_hero_exclude', true ) ) {
                $args1['post__not_in'] = $exclude;
            }
            $id_list = get_posts( $args1 );
            $exclude = array_merge( $exclude, $id_list );
            $exclude = array_keys( array_flip( $exclude ) );
        } elseif ( 'hero1' === $section ) {
            $type = get_theme_mod( 'rovenblog_home_header_hero1_content', 'recent-posts' );
            $count = get_theme_mod( 'rovenblog_home_header_hero1_posts_nr', 3 );
            $args1 = rovenblog_posts_args( $type, $count, 'rovenblog_home_header_hero1' );
            // Check if the Header Hero has exclude posts options enabled.
            if ( 'specific-posts' !== get_theme_mod( 'rovenblog_home_header_hero1_content', 'recent-posts' ) && true === get_theme_mod( 'rovenblog_home_header_hero1_exclude', true ) ) {
                $args1['post__not_in'] = $exclude;
            }
            $id_list = get_posts( $args1 );
            $exclude = array_merge( $exclude, $id_list );
            $exclude = array_keys( array_flip( $exclude ) );
        } elseif ( 'hero2' === $section ) {
            $type = get_theme_mod( 'rovenblog_home_header_hero2_content', 'recent-posts' );
            $count = get_theme_mod( 'rovenblog_home_header_hero2_posts_nr', 3 );
            $args1 = rovenblog_posts_args( $type, $count, 'rovenblog_home_header_hero2' );
            // Check if the Header Hero has exclude posts options enabled.
            if ( 'specific-posts' !== get_theme_mod( 'rovenblog_home_header_hero2_content', 'recent-posts' ) && true === get_theme_mod( 'rovenblog_home_header_hero2_exclude', true ) ) {
                $args1['post__not_in'] = $exclude;
            }
            $id_list = get_posts( $args1 );
            $exclude = array_merge( $exclude, $id_list );
            $exclude = array_keys( array_flip( $exclude ) );
        } elseif ( 'main' === $section ) {
            
            if ( is_front_page() && is_home() ) {
                $count = get_theme_mod( 'rovenblog_home_recent_posts_nr', 3 );
                $args1 = rovenblog_posts_args( 'recent-posts', $count, 'rovenblog_home_recent_posts' );
                // Check if the Featured Posts has exclude posts options enabled.
                if ( true === get_theme_mod( 'rovenblog_home_recent_posts_exclude', true ) ) {
                    $args1['post__not_in'] = $exclude;
                }
                $id_list = get_posts( $args1 );
                $exclude = array_merge( $exclude, $id_list );
                $exclude = array_keys( array_flip( $exclude ) );
            }
        
        } elseif ( 'featured' === $section ) {
            $type = get_theme_mod( 'rovenblog_home_featured_content', 'recent-posts' );
            $count = get_theme_mod( 'rovenblog_home_featured_nr', 2 );
            $args1 = rovenblog_posts_args( $type, $count, 'rovenblog_home_featured' );
            // Check if the Featured Posts has exclude posts options enabled.
            if ( 'specific-posts' !== get_theme_mod( 'rovenblog_home_featured_content', 'recent-posts' ) && true === get_theme_mod( 'rovenblog_home_featured_posts_exclude', true ) ) {
                $args1['post__not_in'] = $exclude;
            }
            $id_list = get_posts( $args1 );
            $exclude = array_merge( $exclude, $id_list );
            $exclude = array_keys( array_flip( $exclude ) );
        }
    
    }
    return $exclude;
}

if ( !function_exists( 'rovenblog_exclude_posts' ) ) {
    /**
     * Function used for skipping posts in the home and archive loops based on the sections with posts placed above theme,
     * also sets the number of posts for some main loops based on certain Customizer options.
     *
     * @param object $query - the query provided via pre_get_posts action.
     */
    function rovenblog_exclude_posts( $query )
    {
        
        if ( is_home() && is_front_page() && $query->is_main_query() ) {
            // Home Page and posts main query scenario.
            $sections = get_theme_mod( 'rovenblog_home_layout', array( 'hero', 'featured', 'main' ) );
            
            if ( in_array( 'main', $sections, true ) ) {
                
                if ( true === get_theme_mod( 'rovenblog_home_recent_posts_exclude', true ) && 'main' !== $sections[0] ) {
                    // Fetch the list of post ids that should be excluded from the loop of this section.
                    $exclude = rovenblog_exclusion_list( 'main' );
                    if ( !empty($exclude) ) {
                        // Exclude posts from the main query based on the final list of ids.
                        $query->set( 'post__not_in', $exclude );
                    }
                }
                
                // Set the query posts per page based on the Customizer option.
                $posts_nr = get_theme_mod( 'rovenblog_home_recent_posts_nr', 6 );
                $query->set( 'posts_per_page', intval( $posts_nr ) );
            }
        
        } elseif ( is_search() && $query->is_main_query() ) {
            // Set the query posts per page based on the Customizer option.
            $posts_nr = get_theme_mod( 'rovenblog_search_posts_nr', 6 );
            $query->set( 'posts_per_page', intval( $posts_nr ) );
        } elseif ( is_author() && $query->is_main_query() ) {
            // Set the query posts per page based on the Customizer option.
            $posts_nr = get_theme_mod( 'rovenblog_author_posts_nr', 6 );
            $query->set( 'posts_per_page', intval( $posts_nr ) );
        } elseif ( (is_category() || is_tag() || is_date()) && $query->is_main_query() ) {
            // Set the query posts per page based on the Customizer option.
            $posts_nr = get_theme_mod( 'rovenblog_archive_posts_nr', 6 );
            $query->set( 'posts_per_page', intval( $posts_nr ) );
        }
    
    }

}
if ( !is_admin() ) {
    add_action( 'pre_get_posts', 'rovenblog_exclude_posts' );
}