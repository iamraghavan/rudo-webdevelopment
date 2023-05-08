<?php

/**
 * One Click Demo import functions
 *
 * @package Roven-Blog
 */
/**
 * Prepare the demo.
 */
function rovenblog_import_files()
{
    $import_type = '0';
    if ( '0' === $import_type ) {
        return array(
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 1', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Full Demo', 'roven-blog' ) ),
            'import_file_url'            => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/full-demo/content-dummy.xml',
            'import_widget_file_url'     => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/full-demo/widgets-dummy.json',
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/full-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/full-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free/',
        ),
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 2', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Full Demo', 'roven-blog' ) ),
            'import_file_url'            => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/full-demo/content-dummy.xml',
            'import_widget_file_url'     => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/full-demo/widgets-dummy.json',
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/full-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/full-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free/demo2/',
        ),
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 3', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Full Demo', 'roven-blog' ) ),
            'import_file_url'            => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/full-demo/content-dummy.xml',
            'import_widget_file_url'     => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/full-demo/widgets-dummy.json',
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/full-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/full-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free/demo3/',
        ),
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 4', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Full Demo', 'roven-blog' ) ),
            'import_file_url'            => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/full-demo/content-dummy.xml',
            'import_widget_file_url'     => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/full-demo/widgets-dummy.json',
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/full-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/full-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free/demo4/',
        ),
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 1 (Customizer Only)', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Customizer Demo', 'roven-blog' ) ),
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/customizer-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/customizer-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free',
        ),
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 2 (Customizer Only)', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Customizer Demo', 'roven-blog' ) ),
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/customizer-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/customizer-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free',
        ),
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 3 (Customizer Only)', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Customizer Demo', 'roven-blog' ) ),
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/customizer-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/customizer-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free',
        ),
            array(
            'import_file_name'           => esc_html__( 'Free Demo Site 4 (Customizer Only)', 'roven-blog' ),
            'categories'                 => array( esc_html__( 'Customizer Demo', 'roven-blog' ) ),
            'import_customizer_file_url' => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/customizer-demo/customizer.dat',
            'import_preview_image_url'   => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/customizer-demo/preview.png',
            'preview_url'                => 'https://rovenblog.roventhemes.com/1-0-x/free',
        )
        );
    }
}

add_filter( 'ocdi/import_files', 'rovenblog_import_files' );
/**
 * Set navigation menus and home posts for demos.
 *
 * @param array $selected_import - demo type data.
 */
function rovenblog_after_import( $selected_import )
{
    
    if ( esc_html__( 'Pro Demo Site 1', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu Roven Blog Main', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu1' => $main_menu->term_id,
            'rovenblog-nav-menu4' => $main_menu->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
        // Assign woocommerce cart, checkout, my-account and shop pages.
        rovenblog_assign_shops( 'main' );
    } elseif ( esc_html__( 'Pro Demo Site 2 - Fashion', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu1 = get_term_by( 'name', 'Mobile Menu Roven Blog Fashion', 'nav_menu' );
        $main_menu2 = get_term_by( 'name', 'Main Menu Left Roven Blog Fashion', 'nav_menu' );
        $main_menu3 = get_term_by( 'name', 'Main Menu Right Roven Blog Fashion', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu2' => $main_menu2->term_id,
            'rovenblog-nav-menu3' => $main_menu3->term_id,
            'rovenblog-nav-menu4' => $main_menu1->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
        // Assign woocommerce cart, checkout, my-account and shop pages.
        rovenblog_assign_shops( 'fashion' );
    } elseif ( esc_html__( 'Pro Demo Site 3 - Food', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu Roven Blog Food', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu1' => $main_menu->term_id,
            'rovenblog-nav-menu4' => $main_menu->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
        // Assign woocommerce cart, checkout, my-account and shop pages.
        rovenblog_assign_shops( 'food' );
    } elseif ( esc_html__( 'Pro Demo Site 4 - Tech', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu Roven Blog Tech', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu1' => $main_menu->term_id,
            'rovenblog-nav-menu4' => $main_menu->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
        // Assign woocommerce cart, checkout, my-account and shop pages.
        rovenblog_assign_shops( 'tech' );
    } elseif ( esc_html__( 'Free Demo Site 1', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu Roven Blog Free', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu1' => $main_menu->term_id,
            'rovenblog-nav-menu4' => $main_menu->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
    } elseif ( esc_html__( 'Free Demo Site 2', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu Roven Blog Free', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu1' => $main_menu->term_id,
            'rovenblog-nav-menu4' => $main_menu->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
    } elseif ( esc_html__( 'Free Demo Site 3', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu Roven Blog Free', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu1' => $main_menu->term_id,
            'rovenblog-nav-menu4' => $main_menu->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
    } elseif ( esc_html__( 'Free Demo Site 4', 'roven-blog' ) === $selected_import['import_file_name'] ) {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu Roven Blog Free', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
            'rovenblog-nav-menu1' => $main_menu->term_id,
            'rovenblog-nav-menu4' => $main_menu->term_id,
        ) );
        update_option( 'show_on_front', 'posts' );
    }

}

add_action( 'ocdi/after_import', 'rovenblog_after_import' );
/**
 * Returns a list plugins recommended for demo contents.
 *
 * @param array $plugins - list of recommended plugins.
 */
function rovenblog_register_plugins( $plugins )
{
    $import_type = '0';
    
    if ( '1' === $import_type ) {
        return array_merge( $plugins, $theme_plugins );
    } else {
        // Required: List of plugins used by all theme free demos.
        $theme_plugins_free = array(
            // Kirki plugin.
            array(
                'name'     => esc_html__( 'Kirki', 'roven-blog' ),
                'slug'     => 'kirki',
                'required' => true,
            ),
        );
        // Check if user is on the theme recommeneded plugins step and a demo was selected.
        if ( isset( $_GET['step'] ) && 'import' === $_GET['step'] && isset( $_GET['import'] ) ) {
            // Adittional plugins for Full Free Demo.
            
            if ( '0' === $_GET['import'] || '1' === $_GET['import'] || '2' === $_GET['import'] || '3' === $_GET['import'] ) {
                // Contact Form 7 plugin.
                $theme_plugins_free[] = array(
                    'name'     => esc_html__( 'Contact Form 7', 'roven-blog' ),
                    'slug'     => 'contact-form-7',
                    'required' => false,
                );
                // Mailchimp for WP plugin.
                $theme_plugins_free[] = array(
                    'name'     => esc_html__( 'Mailchimp for WP', 'roven-blog' ),
                    'slug'     => 'mailchimp-for-wp',
                    'required' => false,
                );
                // Instagram Feed plugin.
                $theme_plugins_free[] = array(
                    'name'     => esc_html__( 'Instagram Feed', 'roven-blog' ),
                    'slug'     => 'instagram-feed',
                    'required' => false,
                );
            }
        
        }
        return array_merge( $plugins, $theme_plugins_free );
    }

}

add_filter( 'ocdi/register_plugins', 'rovenblog_register_plugins' );
/**
 * Moves all widgets form theme sidebars in the inactive area before demo import.
 *
 * @param array $selected_import - selected demo import.
 */
function rovenblog_before_content_import( $selected_import )
{
    $rb_demos1 = array(
        esc_html__( 'Pro Demo Site 1', 'roven-blog' ),
        esc_html__( 'Pro Demo Site 2 - Fashion', 'roven-blog' ),
        esc_html__( 'Pro Demo Site 3 - Food', 'roven-blog' ),
        esc_html__( 'Pro Demo Site 4 - Tech', 'roven-blog' )
    );
    $rb_demos2 = array(
        esc_html__( 'Free Demo Site 1', 'roven-blog' ),
        esc_html__( 'Free Demo Site 2', 'roven-blog' ),
        esc_html__( 'Free Demo Site 3', 'roven-blog' ),
        esc_html__( 'Free Demo Site 4', 'roven-blog' )
    );
    $rb_demos3 = array(
        esc_html__( 'Free Demo Site 1 (Customizer Only)', 'roven-blog' ),
        esc_html__( 'Free Demo Site 2 (Customizer Only)', 'roven-blog' ),
        esc_html__( 'Free Demo Site 3 (Customizer Only)', 'roven-blog' ),
        esc_html__( 'Free Demo Site 4 (Customizer Only)', 'roven-blog' ),
        esc_html__( 'Pro Demo Site 1 (Customizer Only)', 'roven-blog' ),
        esc_html__( 'Pro Demo Site 2 - Fashion (Customizer Only)', 'roven-blog' ),
        esc_html__( 'Pro Demo Site 3 - Food (Customizer Only)', 'roven-blog' ),
        esc_html__( 'Pro Demo Site 4 - Tech (Customizer Only)', 'roven-blog' )
    );
    
    if ( in_array( $selected_import['import_file_name'], $rb_demos1, true ) ) {
        // Get saved widgets.
        $sidebars = get_option( 'sidebars_widgets' );
        if ( !isset( $sidebars['wp_inactive_widgets'] ) ) {
            $sidebars['wp_inactive_widgets'] = array();
        }
        if ( !isset( $sidebars['rovenblog-sidebar-woocommerce'] ) ) {
            $sidebars['rovenblog-sidebar-woocommerce'] = array();
        }
        // Store the widgets from the theme sidebars.
        $inactive = array_merge(
            $sidebars['wp_inactive_widgets'],
            $sidebars['rovenblog-header-top1'],
            $sidebars['rovenblog-header-top2'],
            $sidebars['rovenblog-sidebar-home'],
            $sidebars['rovenblog-area1-col1'],
            $sidebars['rovenblog-area1-col2'],
            $sidebars['rovenblog-area1-col3'],
            $sidebars['rovenblog-area1-col4'],
            $sidebars['rovenblog-area2-col1'],
            $sidebars['rovenblog-area2-col2'],
            $sidebars['rovenblog-area2-col3'],
            $sidebars['rovenblog-area2-col4'],
            $sidebars['rovenblog-sidebar-woocommerce'],
            $sidebars['rovenblog-sidebar-page'],
            $sidebars['rovenblog-sidebar-post'],
            $sidebars['rovenblog-sidebar-archive'],
            $sidebars['rovenblog-sidebar-author'],
            $sidebars['rovenblog-sidebar-search'],
            $sidebars['rovenblog-sidebar-mobilemenu'],
            $sidebars['rovenblog-footer-top1'],
            $sidebars['rovenblog-footer-top2'],
            $sidebars['rovenblog-footer-top3'],
            $sidebars['rovenblog-footer-top4'],
            $sidebars['rovenblog-footer-1'],
            $sidebars['rovenblog-footer-2'],
            $sidebars['rovenblog-footer-3'],
            $sidebars['rovenblog-footer-4'],
            $sidebars['rovenblog-footer-bottom1'],
            $sidebars['rovenblog-footer-bottom2'],
            $sidebars['rovenblog-footer-bottom3'],
            $sidebars['rovenblog-footer-bottom4']
        );
        // Add the widgets to the inactive area.
        $sidebars['wp_inactive_widgets'] = $inactive;
        // Clear all theme sidebars of widget data.
        $sidebars['rovenblog-header-top1'] = array();
        $sidebars['rovenblog-header-top2'] = array();
        $sidebars['rovenblog-sidebar-home'] = array();
        $sidebars['rovenblog-area1-col1'] = array();
        $sidebars['rovenblog-area1-col2'] = array();
        $sidebars['rovenblog-area1-col3'] = array();
        $sidebars['rovenblog-area1-col4'] = array();
        $sidebars['rovenblog-area2-col1'] = array();
        $sidebars['rovenblog-area2-col2'] = array();
        $sidebars['rovenblog-area2-col3'] = array();
        $sidebars['rovenblog-area2-col4'] = array();
        $sidebars['rovenblog-sidebar-woocommerce'] = array();
        $sidebars['rovenblog-sidebar-page'] = array();
        $sidebars['rovenblog-sidebar-post'] = array();
        $sidebars['rovenblog-sidebar-archive'] = array();
        $sidebars['rovenblog-sidebar-author'] = array();
        $sidebars['rovenblog-sidebar-search'] = array();
        $sidebars['rovenblog-sidebar-mobilemenu'] = array();
        $sidebars['rovenblog-footer-top1'] = array();
        $sidebars['rovenblog-footer-top2'] = array();
        $sidebars['rovenblog-footer-top3'] = array();
        $sidebars['rovenblog-footer-top4'] = array();
        $sidebars['rovenblog-footer-1'] = array();
        $sidebars['rovenblog-footer-2'] = array();
        $sidebars['rovenblog-footer-3'] = array();
        $sidebars['rovenblog-footer-4'] = array();
        $sidebars['rovenblog-footer-bottom1'] = array();
        $sidebars['rovenblog-footer-bottom2'] = array();
        $sidebars['rovenblog-footer-bottom3'] = array();
        $sidebars['rovenblog-footer-bottom4'] = array();
        // Add the modified widgets list to database.
        update_option( 'sidebars_widgets', $sidebars );
        $theme_mod = 'theme_mods_roven-blog';
        $rb_options = get_option( $theme_mod );
        // Reset all theme kirki options by setting them to null.
        foreach ( $rb_options as $key => $value ) {
            if ( 'rovenblog_' === substr( $key, 0, 10 ) ) {
                $rb_options[$key] = null;
            }
        }
        // Save the theme modified options.
        update_option( $theme_mod, $rb_options );
    } elseif ( in_array( $selected_import['import_file_name'], $rb_demos2, true ) ) {
        // Get saved widgets.
        $sidebars = get_option( 'sidebars_widgets' );
        if ( !isset( $sidebars['wp_inactive_widgets'] ) ) {
            $sidebars['wp_inactive_widgets'] = array();
        }
        // Store the widgets from the theme sidebars.
        $inactive = array_merge(
            $sidebars['wp_inactive_widgets'],
            $sidebars['rovenblog-header-top1'],
            $sidebars['rovenblog-header-top2'],
            $sidebars['rovenblog-sidebar-home'],
            $sidebars['rovenblog-sidebar-archive'],
            $sidebars['rovenblog-sidebar-author'],
            $sidebars['rovenblog-sidebar-search'],
            $sidebars['rovenblog-footer-1'],
            $sidebars['rovenblog-footer-2'],
            $sidebars['rovenblog-footer-3'],
            $sidebars['rovenblog-footer-4']
        );
        // Add the widgets to the inactive area.
        $sidebars['wp_inactive_widgets'] = $inactive;
        // Clear all theme sidebars of widget data.
        $sidebars['rovenblog-header-top1'] = array();
        $sidebars['rovenblog-header-top2'] = array();
        $sidebars['rovenblog-sidebar-home'] = array();
        $sidebars['rovenblog-sidebar-archive'] = array();
        $sidebars['rovenblog-sidebar-author'] = array();
        $sidebars['rovenblog-sidebar-search'] = array();
        $sidebars['rovenblog-footer-1'] = array();
        $sidebars['rovenblog-footer-2'] = array();
        $sidebars['rovenblog-footer-3'] = array();
        $sidebars['rovenblog-footer-4'] = array();
        // Add the modified widgets list to database.
        update_option( 'sidebars_widgets', $sidebars );
        $theme_mod = 'theme_mods_roven-blog';
        $rb_options = get_option( $theme_mod );
        // Reset all theme kirki options by setting them to null.
        foreach ( $rb_options as $key => $value ) {
            if ( 'rovenblog_' === substr( $key, 0, 10 ) ) {
                $rb_options[$key] = null;
            }
        }
        // Save the theme modified options.
        update_option( $theme_mod, $rb_options );
        // Remove name menu imported from previous demos.
        wp_delete_nav_menu( 'Main Menu Roven Blog Free' );
    } elseif ( in_array( $selected_import['import_file_name'], $rb_demos3, true ) ) {
        $theme_mod = 'theme_mods_roven-blog';
        $rb_options = get_option( $theme_mod );
        // Reset all theme kirki options by setting them to null.
        foreach ( $rb_options as $key => $value ) {
            if ( 'rovenblog_' === substr( $key, 0, 10 ) ) {
                $rb_options[$key] = null;
            }
        }
        // Save the theme modified options.
        update_option( $theme_mod, $rb_options );
    }

}

add_action( 'ocdi/before_content_import', 'rovenblog_before_content_import' );
/**
 * This function assigns demo pages as Wocoomerce shop, cart, checkout and my-account pages.
 *
 * @param string $rb_suffix - slug of the page.
 */
function rovenblog_assign_shops( $rb_suffix )
{
    
    if ( class_exists( 'Woocommerce' ) ) {
        $page_cart = get_page_by_path( 'cart-' . $rb_suffix );
        if ( $page_cart ) {
            update_option( 'woocommerce_cart_page_id', $page_cart->ID );
        }
        $page_checkout = get_page_by_path( 'checkout-' . $rb_suffix );
        if ( $page_checkout ) {
            update_option( 'woocommerce_checkout_page_id', $page_checkout->ID );
        }
        $page_account = get_page_by_path( 'my-account-' . $rb_suffix );
        if ( $page_account ) {
            update_option( 'woocommerce_myaccount_page_id', $page_account->ID );
        }
        $rb_shop = get_page_by_path( 'shop-' . $rb_suffix );
        
        if ( $rb_shop ) {
            $shop_id = get_option( 'woocommerce_shop_page_id' );
            $shop_page = get_post( $shop_id );
            $shop_slug = $shop_page->post_name;
            $shop_update = array(
                'ID'         => $shop_id,
                'post_title' => 'Shop Old',
                'post_name'  => 'shop-old-' . $shop_id,
            );
            wp_update_post( $shop_update );
            update_option( 'woocommerce_shop_page_id', $rb_shop->ID );
            $rb_shop_update = array(
                'ID'        => $rb_shop->ID,
                'post_name' => $shop_slug,
            );
            wp_update_post( $rb_shop_update );
        }
    
    }

}
