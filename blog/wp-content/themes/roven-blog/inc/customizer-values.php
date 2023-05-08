<?php

/**
 * The template for handling the CSS resulted from Kirki Customizer Options
 *
 * @package Roven-Blog
 */
if ( !function_exists( 'rovenblog_customizer_styles' ) ) {
    /**
     *  This function generates the CSS based on Customizer Options and writes them in the customizer css file.
     *
     * @param string $handle - name of the stylesheet used for appending the inline styles.
     */
    function rovenblog_customizer_styles( $handle )
    {
        $customizer_css1 = ':root {';
        $customizer_css2 = '.rb-dark-mode {';
        $customizer_css3 = '@media (min-width: 768px) { :root {';
        $customizer_css4 = ':root #rb-footer-top {';
        $customizer_css5 = ':root .rb-dark-mode #rb-footer-top {';
        $customizer_css6 = ':root #rb-footer {';
        $customizer_css7 = ':root .rb-dark-mode #rb-footer {';
        $customizer_css8 = ':root #rb-footer-bottom {';
        $customizer_css9 = ':root .rb-dark-mode #rb-footer-bottom {';
        $customizer_css10 = ':root #rb-backlink {';
        $customizer_css11 = ':root .rb-dark-mode #rb-backlink {';
        $customizer_css12 = ':root #rb-header-top {';
        $customizer_css13 = ':root .rb-dark-mode #rb-header-top {';
        $customizer_css14 = ':root #rb-mobile-menu-wrap {';
        $customizer_css15 = ':root .rb-dark-mode #rb-mobile-menu-wrap {';
        $customizer_css16 = ':root #rb-header {';
        $customizer_css17 = ':root .rb-dark-mode #rb-header {';
        
        if ( true === get_theme_mod( 'rovenblog_show_cta', true ) && true === get_theme_mod( 'rovenblog_cta_color_toggle', true ) ) {
            // Prepare the css variables for CTA Customzier.
            $cta_bg_color = esc_attr( get_theme_mod( 'rovenblog_bg_color_cta', '#2E2D4D' ) );
            $customizer_css1 .= "--background-color-cta: {$cta_bg_color};";
            $cta_border_color = esc_attr( get_theme_mod( 'rovenblog_border_color_cta', '#2E2D4D' ) );
            $customizer_css1 .= "--border-color-cta: {$cta_border_color};";
            $cta_text_color = esc_attr( get_theme_mod( 'rovenblog_text_color_cta', '#ffffff' ) );
            $customizer_css1 .= "--color-cta: {$cta_text_color};";
            $cta_dmbg_color = esc_attr( get_theme_mod( 'rovenblog_darkmode_bg_color_cta', '#2E2D4D' ) );
            $customizer_css2 .= "--background-color-cta: {$cta_dmbg_color};";
            $cta_dmborder_color = esc_attr( get_theme_mod( 'rovenblog_darkmode_border_color_cta', '#2E2D4D' ) );
            $customizer_css2 .= "--border-color-cta: {$cta_dmborder_color};";
            $cta_dmtext_color = esc_attr( get_theme_mod( 'rovenblog_darkmode_text_color_cta', '#ffffff' ) );
            $customizer_css2 .= "--color-cta: {$cta_dmtext_color};";
        }
        
        $accent_color1 = esc_attr( get_theme_mod( 'rovenblog_accent_color_1', '#2E2D4D' ) );
        if ( '#2E2D4D' !== $accent_color1 ) {
            $customizer_css1 .= "--color-accent-1: {$accent_color1};";
        }
        $accent_color2 = esc_attr( get_theme_mod( 'rovenblog_accent_color_2', '#D50747' ) );
        if ( '#D50747' !== $accent_color2 ) {
            $customizer_css1 .= "--color-accent-2: {$accent_color2};";
        }
        $link_color = esc_attr( get_theme_mod( 'rovenblog_link_color', '#2E2D4D' ) );
        if ( '#2E2D4D' !== $link_color ) {
            $customizer_css1 .= "--color-link: {$link_color};";
        }
        $link_color_hover = esc_attr( get_theme_mod( 'rovenblog_link_color_hover', '#D50747' ) );
        if ( '#D50747' !== $link_color_hover ) {
            $customizer_css1 .= "--color-link-hover: {$link_color_hover};";
        }
        $link_color_active = esc_attr( get_theme_mod( 'rovenblog_link_color_active', '#D50747' ) );
        if ( '#D50747' !== $link_color_active ) {
            $customizer_css1 .= "--color-link-active: {$link_color_active};";
        }
        $d_accent_color_1 = esc_attr( get_theme_mod( 'rovenblog_darkmode_accent_color_1', '#2E2D4D' ) );
        if ( '#2E2D4D' !== $d_accent_color_1 ) {
            $customizer_css2 .= "--color-accent-1: {$d_accent_color_1};";
        }
        $d_accent_color_2 = esc_attr( get_theme_mod( 'rovenblog_darkmode_accent_color_2', '#D50747' ) );
        if ( '#D50747' !== $d_accent_color_2 ) {
            $customizer_css2 .= "--color-accent-2: {$d_accent_color_2};";
        }
        $d_link_color = esc_attr( get_theme_mod( 'rovenblog_darkmode_link_color', '#ffffff' ) );
        if ( '#ffffff' !== $d_link_color ) {
            $customizer_css2 .= "--color-link: {$d_link_color};";
        }
        $d_link_color_hover = esc_attr( get_theme_mod( 'rovenblog_darkmode_link_color_hover', '#f8f8f8' ) );
        if ( '#f8f8f8' !== $d_link_color_hover ) {
            $customizer_css2 .= "--color-link-hover: {$d_link_color_hover};";
        }
        $d_link_color_active = esc_attr( get_theme_mod( 'rovenblog_darkmode_link_color_active', '#f8f8f8' ) );
        if ( '#f8f8f8' !== $d_link_color_active ) {
            $customizer_css2 .= "--color-link-active: {$d_link_color_active};";
        }
        // Prepare the theme Font CSS variables.
        $font_base_size = esc_attr( get_theme_mod( 'rovenblog_font_base_size', '17px' ) );
        if ( '17px' !== $font_base_size ) {
            $customizer_css1 .= "--font-base-size: {$font_base_size};";
        }
        $font_scale_mobile = esc_attr( get_theme_mod( 'rovenblog_font_scale_mobile', '1.067' ) );
        if ( '1.067' !== $font_scale_mobile ) {
            $customizer_css1 .= "--font-scale: {$font_scale_mobile};";
        }
        $font_scale = esc_attr( get_theme_mod( 'rovenblog_font_scale', '1.125' ) );
        if ( '1.125' !== $font_scale ) {
            $customizer_css3 .= "--font-scale: {$font_scale};";
        }
        $sticky_offset = esc_attr( get_theme_mod( 'rovenblog_sticky_offset', '80' ) );
        if ( '80' !== $sticky_offset ) {
            $customizer_css1 .= "--sticky-offset: {$sticky_offset}px;";
        }
        $logo_height = esc_attr( get_theme_mod( 'rovenblog_logo_height_mobile', '60' ) );
        if ( '60' !== $logo_height ) {
            $customizer_css1 .= "--max-height-logo-mobile: {$logo_height}px;";
        }
        $logo_height_tablet = esc_attr( get_theme_mod( 'rovenblog_logo_height_tablet', '70' ) );
        if ( '70' !== $logo_height_tablet ) {
            $customizer_css1 .= "--max-height-logo-tablet: {$logo_height_tablet}px;";
        }
        $logo_height_desktop = esc_attr( get_theme_mod( 'rovenblog_logo_height_desktop', '90' ) );
        if ( '90' !== $logo_height_desktop ) {
            $customizer_css1 .= "--max-height-logo-desktop: {$logo_height_desktop}px;";
        }
        $logo_height_sticky = esc_attr( get_theme_mod( 'rovenblog_logo_sticky_height_mobile', '60' ) );
        if ( '60' !== $logo_height_sticky ) {
            $customizer_css1 .= "--max-height-logo-mobile-sticky: {$logo_height_sticky}px;";
        }
        $logo_height_tablet_sticky = esc_attr( get_theme_mod( 'rovenblog_logo_sticky_height_tablet', '60' ) );
        if ( '60' !== $logo_height_tablet_sticky ) {
            $customizer_css1 .= "--max-height-logo-tablet-sticky: {$logo_height_tablet_sticky}px;";
        }
        $logo_height_desktop_sticky = esc_attr( get_theme_mod( 'rovenblog_logo_sticky_height_desktop', '45' ) );
        if ( '45' !== $logo_height_desktop_sticky ) {
            $customizer_css1 .= "--max-height-logo-desktop-sticky: {$logo_height_desktop_sticky}px;";
        }
        
        if ( true === get_theme_mod( 'rovenblog_header_color_toggle', false ) ) {
            $text_logo_color = esc_attr( get_theme_mod( 'rovenblog_text_logo_color', '#D50747' ) );
            $customizer_css1 .= "--color-logo: {$text_logo_color};";
            $header_icons_color = esc_attr( get_theme_mod( 'rovenblog_header_icons_color', '#000000' ) );
            $customizer_css1 .= "--color-header-icons: {$header_icons_color};";
            $header_icons_hover_color = esc_attr( get_theme_mod( 'rovenblog_header_icons_hover_color', '#D50747' ) );
            $customizer_css1 .= "--color-header-icons-hover: {$header_icons_hover_color};";
            $header_menu_hover_color = esc_attr( get_theme_mod( 'rovenblog_header_menu_hover_color', '#D50747' ) );
            $customizer_css1 .= "--color-menu-hover: {$header_menu_hover_color};";
            $dropdown_menu_color = esc_attr( get_theme_mod( 'rovenblog_dropdown_menu_color', '#000000' ) );
            $customizer_css1 .= "--color-submenu: {$dropdown_menu_color};";
            $dropdown_menu_hover_color = esc_attr( get_theme_mod( 'rovenblog_dropdown_menu_hover_color', '#D50747' ) );
            $customizer_css1 .= "--color-submenu-hover: {$dropdown_menu_hover_color};";
            $d_text_logo_color = esc_attr( get_theme_mod( 'rovenblog_darkmode_text_logo_color', '#D50747' ) );
            $customizer_css2 .= "--color-logo: {$d_text_logo_color};";
            // Header Colors.
            $header_color9 = esc_attr( get_theme_mod( 'rovenblog_header_form1_color', '#000000' ) );
            $customizer_css16 .= "--color-form-elements: {$header_color9};";
            $header_color10 = esc_attr( get_theme_mod( 'rovenblog_header_form2_color', '#94979e' ) );
            $customizer_css16 .= "--color-form-placeholders: {$header_color10};";
            $header_color11 = esc_attr( get_theme_mod( 'rovenblog_header_form3_color', '#45464b' ) );
            $customizer_css16 .= "--color-form-labels: {$header_color11};";
            $header_color12 = esc_attr( get_theme_mod( 'rovenblog_header_form4_color', '#ffffff' ) );
            $customizer_css16 .= "--background-color-form-elements: {$header_color12};";
            $header_color13 = esc_attr( get_theme_mod( 'rovenblog_header_form5_color', '#f4f4f4' ) );
            $customizer_css16 .= "--background-color-form-elements-disabled: {$header_color13};";
            $header_color14 = esc_attr( get_theme_mod( 'rovenblog_header_form6_color', '#ddd' ) );
            $customizer_css16 .= "--border-color-form-elements: {$header_color14};";
            $header_color15 = esc_attr( get_theme_mod( 'rovenblog_header_form7_color', '#bbb' ) );
            $customizer_css16 .= "--border-color-form-elements-focus: {$header_color15};";
            // Header Dark Mode Colors.
            $header_dm_color9 = esc_attr( get_theme_mod( 'rovenblog_header_form1_color_dm', '#777' ) );
            $customizer_css17 .= "--color-form-elements: {$header_dm_color9};";
            $header_dm_color10 = esc_attr( get_theme_mod( 'rovenblog_header_form2_color_dm', '#666' ) );
            $customizer_css17 .= "--color-form-placeholders: {$header_dm_color10};";
            $header_dm_color11 = esc_attr( get_theme_mod( 'rovenblog_header_form3_color_dm', '#777' ) );
            $customizer_css17 .= "--color-form-labels: {$header_dm_color11};";
            $header_dm_color12 = esc_attr( get_theme_mod( 'rovenblog_header_form4_color_dm', '#1c1c1c' ) );
            $customizer_css17 .= "--background-color-form-elements: {$header_dm_color12};";
            $header_dm_color13 = esc_attr( get_theme_mod( 'rovenblog_header_form5_color_dm', '#222222' ) );
            $customizer_css17 .= "--background-color-form-elements-disabled: {$header_dm_color13};";
            $header_dm_color14 = esc_attr( get_theme_mod( 'rovenblog_header_form6_color_dm', '#494949' ) );
            $customizer_css17 .= "--border-color-form-elements: {$header_dm_color14};";
            $header_dm_color15 = esc_attr( get_theme_mod( 'rovenblog_header_form7_color_dm', '#494949' ) );
            $customizer_css17 .= "--border-color-form-elements-focus: {$header_dm_color15};";
        }
        
        
        if ( true === get_theme_mod( 'rovenblog_post_scroll_progress_color_toggle', false ) ) {
            $post_scroll_color = esc_attr( get_theme_mod( 'rovenblog_post_scroll_progress_bar_color', '#D50747' ) );
            $customizer_css1 .= "--background-color-scroll-progress: {$post_scroll_color};";
            $d_post_scroll_color = esc_attr( get_theme_mod( 'rovenblog_darkmode_post_scroll_progress_bar_color', '#2E2D4D' ) );
            $customizer_css2 .= "--background-color-scroll-progress: {$d_post_scroll_color};";
        }
        
        // Prepare the main font CSS variables.
        $body_font = get_theme_mod( 'rovenblog_body_typography', array() );
        if ( isset( $body_font['font-family'] ) ) {
            
            if ( 'DM Sans' !== $body_font['font-family'] ) {
                $body_family = esc_attr( $body_font['font-family'] );
                $customizer_css1 .= "--font-family-body: {$body_family};";
            }
        
        }
        if ( isset( $body_font['variant'] ) ) {
            
            if ( '400' !== $body_font['variant'] ) {
                $body_variant = esc_attr( $body_font['variant'] );
                $customizer_css1 .= "--font-weight-body: {$body_variant};";
            }
        
        }
        if ( isset( $body_font['line-height'] ) ) {
            
            if ( '1.765' !== $body_font['line-height'] ) {
                $body_line = esc_attr( $body_font['line-height'] );
                $customizer_css1 .= "--line-height-body: {$body_line};";
            }
        
        }
        if ( isset( $body_font['letter-spacing'] ) ) {
            
            if ( '0' !== $body_font['letter-spacing'] ) {
                $body_spacing = esc_attr( $body_font['letter-spacing'] );
                $customizer_css1 .= "--letter-spacing-body: {$body_spacing};";
            }
        
        }
        // Prepare the headings font CSS variables.
        $headings_font = get_theme_mod( 'rovenblog_headings_typography', array() );
        if ( isset( $headings_font['font-family'] ) ) {
            
            if ( 'Poppins' !== $headings_font['font-family'] ) {
                $headings_family = esc_attr( $headings_font['font-family'] );
                $customizer_css1 .= "--font-family-headings: {$headings_family};";
            }
        
        }
        if ( isset( $headings_font['variant'] ) ) {
            
            if ( '700' !== $headings_font['variant'] ) {
                $headings_variant = esc_attr( $headings_font['variant'] );
                $customizer_css1 .= "--font-weight-headings: {$headings_variant};";
            }
        
        }
        if ( isset( $headings_font['line-height'] ) ) {
            
            if ( '1.3' !== $headings_font['line-height'] ) {
                $headings_line = esc_attr( $headings_font['line-height'] );
                $customizer_css1 .= "--line-height-headings: {$headings_line};";
            }
        
        }
        if ( isset( $headings_font['letter-spacing'] ) ) {
            
            if ( '0.4px' !== $headings_font['letter-spacing'] ) {
                $headings_spacing = esc_attr( $headings_font['letter-spacing'] );
                $customizer_css1 .= "--letter-spacing-headings: {$headings_spacing};";
            }
        
        }
        // Prepare the cta font CSS variables.
        $cta_font = get_theme_mod( 'rovenblog_cta_typography', array() );
        if ( isset( $cta_font['font-family'] ) ) {
            
            if ( 'DM Sans' !== $cta_font['font-family'] ) {
                $cta_family = esc_attr( $cta_font['font-family'] );
                $customizer_css1 .= "--font-family-cta: {$cta_family};";
            }
        
        }
        if ( isset( $cta_font['variant'] ) ) {
            
            if ( '700' !== $cta_font['variant'] ) {
                $cta_variant = esc_attr( $cta_font['variant'] );
                $customizer_css1 .= "--font-weight-cta: {$cta_variant};";
            }
        
        }
        // Prepare the logo font CSS variables.
        $logo_font = get_theme_mod( 'rovenblog_logo_typography', array() );
        if ( isset( $logo_font['font-family'] ) ) {
            
            if ( 'DM Sans' !== $logo_font['font-family'] ) {
                $logo_family = esc_attr( $logo_font['font-family'] );
                $customizer_css1 .= "--font-family-logo: {$logo_family};";
            }
        
        }
        if ( isset( $logo_font['variant'] ) ) {
            
            if ( '700' !== $logo_font['variant'] ) {
                $logo_variant = esc_attr( $logo_font['variant'] );
                $customizer_css1 .= "--font-weight-logo: {$logo_variant};";
            }
        
        }
        // Prepare the menu font CSS variables.
        $menu_font = get_theme_mod( 'rovenblog_menu_typography', array() );
        if ( isset( $menu_font['font-family'] ) ) {
            
            if ( 'DM Sans' !== $menu_font['font-family'] ) {
                $menu_family = esc_attr( $menu_font['font-family'] );
                $customizer_css1 .= "--font-family-menu: {$menu_family};";
            }
        
        }
        if ( isset( $menu_font['variant'] ) ) {
            
            if ( '700' !== $menu_font['variant'] ) {
                $menu_variant = esc_attr( $menu_font['variant'] );
                $customizer_css1 .= "--font-weight-menu: {$menu_variant};";
            }
        
        }
        // Prepare the submenu font CSS variables.
        $submenu_font = get_theme_mod( 'rovenblog_submenu_typography', array() );
        if ( isset( $submenu_font['font-family'] ) ) {
            
            if ( 'DM Sans' !== $submenu_font['font-family'] ) {
                $submenu_family = esc_attr( $submenu_font['font-family'] );
                $customizer_css1 .= "--font-family-submenu: {$submenu_family};";
            }
        
        }
        if ( isset( $submenu_font['variant'] ) ) {
            
            if ( '400' !== $submenu_font['variant'] ) {
                $submenu_variant = esc_attr( $submenu_font['variant'] );
                $customizer_css1 .= "--font-weight-submenu: {$submenu_variant};";
            }
        
        }
        // Prepare the mobile menu font CSS variables.
        $mobile_menu_font = get_theme_mod( 'rovenblog_mobile_menu_typography', array() );
        if ( isset( $mobile_menu_font['font-family'] ) ) {
            
            if ( 'DM Sans' !== $mobile_menu_font['font-family'] ) {
                $mobile_menu_family = esc_attr( $mobile_menu_font['font-family'] );
                $customizer_css1 .= "--font-family-mobile-menu: {$mobile_menu_family};";
            }
        
        }
        if ( isset( $mobile_menu_font['variant'] ) ) {
            
            if ( '700' !== $mobile_menu_font['variant'] ) {
                $mobile_menu_variant = esc_attr( $mobile_menu_font['variant'] );
                $customizer_css1 .= "--font-weight-mobile-menu: {$mobile_menu_variant};";
            }
        
        }
        // Prepare the mobile submenu font CSS variables.
        $mobile_submenu_font = get_theme_mod( 'rovenblog_mobile_submenu_typography', array() );
        if ( isset( $mobile_submenu_font['font-family'] ) ) {
            
            if ( 'DM Sans' !== $mobile_submenu_font['font-family'] ) {
                $mobile_submenu_family = esc_attr( $mobile_submenu_font['font-family'] );
                $customizer_css1 .= "--font-family-mobile-submenu: {$mobile_submenu_family};";
            }
        
        }
        if ( isset( $mobile_submenu_font['variant'] ) ) {
            
            if ( '400' !== $mobile_submenu_font['variant'] ) {
                $mobile_submenu_variant = esc_attr( $mobile_submenu_font['variant'] );
                $customizer_css1 .= "--font-weight-mobile-submenu: {$mobile_submenu_variant};";
            }
        
        }
        
        if ( true === get_theme_mod( 'rovenblog_show_footer', true ) && true === get_theme_mod( 'rovenblog_footer_color_toggle', false ) ) {
            // Footer Colors.
            $footer_color1 = esc_attr( get_theme_mod( 'rovenblog_footer_bg_color', '#ffffff' ) );
            $customizer_css1 .= "--background-color-footer: {$footer_color1};";
            $footer_color1_dm = esc_attr( get_theme_mod( 'rovenblog_footer_bg_color_dm', '#1c1c1c' ) );
            $customizer_css2 .= "--background-color-footer: {$footer_color1_dm};";
            $footer_color2 = esc_attr( get_theme_mod( 'rovenblog_footer_accent1_color', '#2E2D4D' ) );
            $customizer_css6 .= "--color-accent-1: {$footer_color2};";
            $footer_color3 = esc_attr( get_theme_mod( 'rovenblog_footer_accent2_color', '#D50747' ) );
            $customizer_css6 .= "--color-accent-2: {$footer_color3};";
            $footer_color4 = esc_attr( get_theme_mod( 'rovenblog_footer_muted_color', '#777' ) );
            $customizer_css6 .= "--color-muted: {$footer_color4};";
            $footer_color5 = esc_attr( get_theme_mod( 'rovenblog_footer_text_color', '#000000' ) );
            $customizer_css6 .= "--color-text: {$footer_color5};";
            $footer_color6 = esc_attr( get_theme_mod( 'rovenblog_footer_headings_color', '#111111' ) );
            $customizer_css6 .= "--color-headings: {$footer_color6};";
            $footer_color7 = esc_attr( get_theme_mod( 'rovenblog_footer_border_color', '#ddd' ) );
            $customizer_css6 .= "--border-color: {$footer_color7};";
            $footer_color8 = esc_attr( get_theme_mod( 'rovenblog_footer_bg2_color', '#f4f4f4' ) );
            $customizer_css6 .= "--background-color: {$footer_color8};";
            $footer_color9 = esc_attr( get_theme_mod( 'rovenblog_footer_form1_color', '#000000' ) );
            $customizer_css6 .= "--color-form-elements: {$footer_color9};";
            $footer_color10 = esc_attr( get_theme_mod( 'rovenblog_footer_form2_color', '#94979e' ) );
            $customizer_css6 .= "--color-form-placeholders: {$footer_color10};";
            $footer_color11 = esc_attr( get_theme_mod( 'rovenblog_footer_form3_color', '#45464b' ) );
            $customizer_css6 .= "--color-form-labels: {$footer_color11};";
            $footer_color12 = esc_attr( get_theme_mod( 'rovenblog_footer_form4_color', '#ffffff' ) );
            $customizer_css6 .= "--background-color-form-elements: {$footer_color12};";
            $footer_color13 = esc_attr( get_theme_mod( 'rovenblog_footer_form5_color', '#f4f4f4' ) );
            $customizer_css6 .= "--background-color-form-elements-disabled: {$footer_color13};";
            $footer_color14 = esc_attr( get_theme_mod( 'rovenblog_footer_form6_color', '#ddd' ) );
            $customizer_css6 .= "--border-color-form-elements: {$footer_color14};";
            $footer_color15 = esc_attr( get_theme_mod( 'rovenblog_footer_form7_color', '#bbb' ) );
            $customizer_css6 .= "--border-color-form-elements-focus: {$footer_color15};";
            $footer_color16 = esc_attr( get_theme_mod( 'rovenblog_footer_link1_color', '#2E2D4D' ) );
            $customizer_css6 .= "--color-link: {$footer_color16};";
            $footer_color17 = esc_attr( get_theme_mod( 'rovenblog_footer_link2_color', '#D50747' ) );
            $customizer_css6 .= "--color-link-hover: {$footer_color17};";
            $footer_color18 = esc_attr( get_theme_mod( 'rovenblog_footer_link3_color', '#D50747' ) );
            $customizer_css6 .= "--color-link-active: {$footer_color18};";
            $footer_color19 = esc_attr( get_theme_mod( 'rovenblog_footer_card1_color', '#ffffff' ) );
            $customizer_css6 .= "--background-color-card-1-title: {$footer_color19};";
            $footer_color20 = esc_attr( get_theme_mod( 'rovenblog_footer_card6_color', '#ffffff' ) );
            $customizer_css6 .= "--background-color-card-6-content: {$footer_color20};";
            $footer_color21 = esc_attr( get_theme_mod( 'rovenblog_footer_card7_color', '#ffffff' ) );
            $customizer_css6 .= "--background-color-card-7-content: {$footer_color21};";
            // Footer Dark Mode Colors.
            $footer_dm_color2 = esc_attr( get_theme_mod( 'rovenblog_footer_accent1_color_dm', '#2E2D4D' ) );
            $customizer_css7 .= "--color-accent-1: {$footer_dm_color2};";
            $footer_dm_color3 = esc_attr( get_theme_mod( 'rovenblog_footer_accent2_color_dm', '#D50747' ) );
            $customizer_css7 .= "--color-accent-2: {$footer_dm_color3};";
            $footer_dm_color4 = esc_attr( get_theme_mod( 'rovenblog_footer_muted_color_dm', '#555' ) );
            $customizer_css7 .= "--color-muted: {$footer_dm_color4};";
            $footer_dm_color5 = esc_attr( get_theme_mod( 'rovenblog_footer_text_color_dm', '#999' ) );
            $customizer_css7 .= "--color-text: {$footer_dm_color5};";
            $footer_dm_color6 = esc_attr( get_theme_mod( 'rovenblog_footer_headings_color_dm', '#fff' ) );
            $customizer_css7 .= "--color-headings: {$footer_dm_color6};";
            $footer_dm_color7 = esc_attr( get_theme_mod( 'rovenblog_footer_border_color_dm', '#494949' ) );
            $customizer_css7 .= "--border-color: {$footer_dm_color7};";
            $footer_dm_color8 = esc_attr( get_theme_mod( 'rovenblog_footer_bg2_color_dm', '#333333' ) );
            $customizer_css7 .= "--background-color: {$footer_dm_color8};";
            $footer_dm_color9 = esc_attr( get_theme_mod( 'rovenblog_footer_form1_color_dm', '#777' ) );
            $customizer_css7 .= "--color-form-elements: {$footer_dm_color9};";
            $footer_dm_color10 = esc_attr( get_theme_mod( 'rovenblog_footer_form2_color_dm', '#666' ) );
            $customizer_css7 .= "--color-form-placeholders: {$footer_dm_color10};";
            $footer_dm_color11 = esc_attr( get_theme_mod( 'rovenblog_footer_form3_color_dm', '#777' ) );
            $customizer_css7 .= "--color-form-labels: {$footer_dm_color11};";
            $footer_dm_color12 = esc_attr( get_theme_mod( 'rovenblog_footer_form4_color_dm', '#1c1c1c' ) );
            $customizer_css7 .= "--background-color-form-elements: {$footer_dm_color12};";
            $footer_dm_color13 = esc_attr( get_theme_mod( 'rovenblog_footer_form5_color_dm', '#222222' ) );
            $customizer_css7 .= "--background-color-form-elements-disabled: {$footer_dm_color13};";
            $footer_dm_color14 = esc_attr( get_theme_mod( 'rovenblog_footer_form6_color_dm', '#494949' ) );
            $customizer_css7 .= "--border-color-form-elements: {$footer_dm_color14};";
            $footer_dm_color15 = esc_attr( get_theme_mod( 'rovenblog_footer_form7_color_dm', '#494949' ) );
            $customizer_css7 .= "--border-color-form-elements-focus: {$footer_dm_color15};";
            $footer_dm_color16 = esc_attr( get_theme_mod( 'rovenblog_footer_link1_color_dm', '#ffffff' ) );
            $customizer_css7 .= "--color-link: {$footer_dm_color16};";
            $footer_dm_color17 = esc_attr( get_theme_mod( 'rovenblog_footer_link2_color_dm', '#f8f8f8' ) );
            $customizer_css7 .= "--color-link-hover: {$footer_dm_color17};";
            $footer_dm_color18 = esc_attr( get_theme_mod( 'rovenblog_footer_link3_color_dm', '#f8f8f8' ) );
            $customizer_css7 .= "--color-link-active: {$footer_dm_color18};";
            $footer_dm_color19 = esc_attr( get_theme_mod( 'rovenblog_footer_card1_color_dm', '#444' ) );
            $customizer_css7 .= "--background-color-card-1-title: {$footer_dm_color19};";
            $footer_dm_color20 = esc_attr( get_theme_mod( 'rovenblog_footer_card6_color_dm', '#444' ) );
            $customizer_css7 .= "--background-color-card-6-content: {$footer_dm_color20};";
            $footer_dm_color21 = esc_attr( get_theme_mod( 'rovenblog_footer_card7_color_dm', '#444' ) );
            $customizer_css7 .= "--background-color-card-7-content: {$footer_dm_color21};";
        }
        
        
        if ( true === get_theme_mod( 'rovenblog_show_footer_copyright', true ) && true === get_theme_mod( 'rovenblog_backlink_color_toggle', true ) ) {
            // Footer Copyright Colors.
            $backlink_color1 = esc_attr( get_theme_mod( 'rovenblog_backlink_bg_color', '#ffffff' ) );
            $customizer_css1 .= "--background-color-backlink: {$backlink_color1};";
            $backlink_color1_dm = esc_attr( get_theme_mod( 'rovenblog_backlink_bg_color_dm', '#1c1c1c' ) );
            $customizer_css2 .= "--background-color-backlink: {$backlink_color1_dm};";
            $backlink_color5 = esc_attr( get_theme_mod( 'rovenblog_backlink_text_color', '#000000' ) );
            $customizer_css10 .= "--color-text: {$backlink_color5};";
            $backlink_color16 = esc_attr( get_theme_mod( 'rovenblog_backlink_link1_color', '#2E2D4D' ) );
            $customizer_css10 .= "--color-link: {$backlink_color16};";
            $backlink_color17 = esc_attr( get_theme_mod( 'rovenblog_backlink_link2_color', '#D50747' ) );
            $customizer_css10 .= "--color-link-hover: {$backlink_color17};";
            $backlink_color18 = esc_attr( get_theme_mod( 'rovenblog_backlink_link3_color', '#D50747' ) );
            $customizer_css10 .= "--color-link-active: {$backlink_color18};";
            $backlink_color19 = esc_attr( get_theme_mod( 'rovenblog_backlink_border_color', '#ddd' ) );
            $customizer_css10 .= "--border-color: {$backlink_color19};";
            $backlink_dm_color5 = esc_attr( get_theme_mod( 'rovenblog_backlink_text_color_dm', '#999' ) );
            $customizer_css11 .= "--color-text: {$backlink_dm_color5};";
            $backlink_dm_color16 = esc_attr( get_theme_mod( 'rovenblog_backlink_link1_color_dm', '#ffffff' ) );
            $customizer_css11 .= "--color-link: {$backlink_dm_color16};";
            $backlink_dm_color17 = esc_attr( get_theme_mod( 'rovenblog_backlink_link2_color_dm', '#f8f8f8' ) );
            $customizer_css11 .= "--color-link-hover: {$backlink_dm_color17};";
            $backlink_dm_color18 = esc_attr( get_theme_mod( 'rovenblog_backlink_link3_color_dm', '#f8f8f8' ) );
            $customizer_css11 .= "--color-link-active: {$backlink_dm_color18};";
            $backlink_dm_color19 = esc_attr( get_theme_mod( 'rovenblog_backlink_border_color_dm', '#494949' ) );
            $customizer_css11 .= "--border-color: {$backlink_dm_color19};";
        }
        
        $customizer_css = '';
        if ( ':root {' !== $customizer_css1 ) {
            $customizer_css = $customizer_css1 . '}';
        }
        if ( '.rb-dark-mode {' !== $customizer_css2 ) {
            $customizer_css .= $customizer_css2 . '}';
        }
        if ( '@media (min-width: 768px) { :root {' !== $customizer_css3 ) {
            $customizer_css .= $customizer_css3 . '}}';
        }
        
        if ( true === get_theme_mod( 'rovenblog_show_footer', true ) && true === get_theme_mod( 'rovenblog_footer_color_toggle', false ) ) {
            if ( ':root #rb-footer {' !== $customizer_css6 ) {
                $customizer_css .= $customizer_css6 . '}';
            }
            if ( ':root .rb-dark-mode #rb-footer {' !== $customizer_css7 ) {
                $customizer_css .= $customizer_css7 . '}';
            }
        }
        
        
        if ( true === get_theme_mod( 'rovenblog_show_footer_copyright', true ) && true === get_theme_mod( 'rovenblog_backlink_color_toggle', true ) ) {
            if ( ':root #rb-backlink {' !== $customizer_css10 ) {
                $customizer_css .= $customizer_css10 . '}';
            }
            if ( ':root .rb-dark-mode #rb-backlink {' !== $customizer_css11 ) {
                $customizer_css .= $customizer_css11 . '}';
            }
        }
        
        
        if ( true === get_theme_mod( 'rovenblog_header_top_show', false ) && true === get_theme_mod( 'rovenblog_header_top_color_toggle', false ) ) {
            if ( ':root #rb-header-top {' !== $customizer_css12 ) {
                $customizer_css .= $customizer_css12 . '}';
            }
            if ( ':root .rb-dark-mode #rb-header-top {' !== $customizer_css13 ) {
                $customizer_css .= $customizer_css13 . '}';
            }
        }
        
        
        if ( true === get_theme_mod( 'rovenblog_header_color2_toggle', false ) ) {
            if ( ':root #rb-mobile-menu-wrap {' !== $customizer_css14 ) {
                $customizer_css .= $customizer_css14 . '}';
            }
            if ( ':root .rb-dark-mode #rb-mobile-menu-wrap {' !== $customizer_css15 ) {
                $customizer_css .= $customizer_css15 . '}';
            }
        }
        
        
        if ( true === get_theme_mod( 'rovenblog_header_color_toggle', false ) ) {
            if ( ':root #rb-header {' !== $customizer_css16 ) {
                $customizer_css .= $customizer_css16 . '}';
            }
            if ( ':root .rb-dark-mode #rb-header {' !== $customizer_css17 ) {
                $customizer_css .= $customizer_css17 . '}';
            }
        }
        
        
        if ( false !== $handle ) {
            if ( '' !== $customizer_css ) {
                // Add the compiled css variables resulted from Customizer Kirki options.
                wp_add_inline_style( $handle, $customizer_css );
            }
        } else {
            $customizer_file = get_template_directory() . '/assets/admin/css/generated-style.css';
            
            if ( '' !== $customizer_css || 0 !== filesize( $customizer_file ) && '' === $customizer_css ) {
                global  $wp_filesystem ;
                // Initialize the WP filesystem.
                
                if ( empty($wp_filesystem) ) {
                    require_once ABSPATH . '/wp-admin/includes/file.php';
                    // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
                    WP_Filesystem();
                }
                
                // Write the compiled css variables in the customizer file, used for editor styles.
                $wp_filesystem->put_contents( $customizer_file, $customizer_css );
            }
        
        }
    
    }

}