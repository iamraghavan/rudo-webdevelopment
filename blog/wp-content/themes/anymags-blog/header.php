<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#primary">
                <?php esc_html_e( 'Skip to content', 'anymags-blog' ); ?>
            </a>
            <?php
			$show_social_icon = get_theme_mod('anymags_left_header_social_icon_display',true);
			$facebook_url = get_theme_mod('anymags_social_icon_fb_url',true);
			$twitter_url = get_theme_mod('anymags_social_icon_twitter_url',true);
			$youtube_url = get_theme_mod('anymags_social_icon_youtube_url',true);
			$googleplus_url = get_theme_mod('anymags_social_icon_google_url',true);
			$instagram_url = get_theme_mod('anymags_social_icon_instagram_url',true);
			$social_icon_target = get_theme_mod('anymags_social_icon_target_display',true);
			$show_header_menu = get_theme_mod('anymags_header_menu_display',true);
			$anymags_enable_sticky=get_theme_mod('anymags_sticky_menu_enable',true);
			$anymags_nav_class='';
			$has_header_image = has_header_image();
			$banner_image = get_theme_mod('anymags_blog_banner_image_setting',get_theme_file_uri('/assets/images/mgb-default-banner.jpg'));
			$display_image = get_theme_mod('anymags_blog_banner_image_display',true);
			$banner_link = get_theme_mod('anymags_blog_banner_link_url','');
			?>
                <header class="wp-header">
                    <?php
                    if($show_header_menu && has_nav_menu('topbar-menu')|| $show_social_icon){
                    ?>
                    <div class="container-fluid anymag_topbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="topbar-right">
                                        <?php
                                        if ($show_header_menu && has_nav_menu('topbar-menu')) : 
                                            wp_nav_menu(
                                                array(
                                                'theme_location' => 'topbar-menu',
                                                'menu_id'        => 'topbar-menu',
                                                )
                                            );
                                        endif;
                                        ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <?php if($show_social_icon) { ?>
                                        <div class="topbar-left">
                                            <ul class="social-area">
                                                <?php if($facebook_url != "") { ?>
                                                    <li><a href="<?php echo esc_url($facebook_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-facebook"></i></a></li>
                                                    <?php } ?>
                                                    <?php if($twitter_url != "") { ?>
                                                        <li><a href="<?php echo esc_url($twitter_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-twitter"></i></a></li>
                                                    <?php } ?>
                                                    <?php if($youtube_url != "") { ?>
                                                        <li><a href="<?php echo esc_url($youtube_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-youtube-play"></i></a></li>
                                                        <?php } ?>
                                                    <?php if($instagram_url != "") { ?>
                                                        <li><a href="<?php echo esc_url($instagram_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-instagram"></i></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="wp-topbar" <?php if (!empty($has_header_image)) { ?> style="background-image: url(
                        <?php echo esc_url(header_image()); ?>); background-size: cover;"
                            <?php } ?>>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="logo-area">
                                        <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) :
                        ?>
                                            <p class="site-title">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                    <?php bloginfo( 'name' ); ?>
                                                </a>
                                            </p>
                                            <?php
                    else :
                        ?>
                                                <p class="site-title">
                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                        <?php bloginfo( 'name' ); ?>
                                                    </a>
                                                </p>
                                                <?php
                    endif;
                    $anymags_description = get_bloginfo( 'description', 'display' );
                    if ( $anymags_description || is_customize_preview() ) :
                        ?>
                                                    <p class="site-description">
                                                        <?php echo esc_html($anymags_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                    </p>
                                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="add-banner">
                                        <?php if($banner_image==''){ ?>
                                        <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=anymags_blog_banner_image_section' ) ); ?>"><img class="cta-wrap" src="<?php  echo esc_url( get_stylesheet_directory_uri() ) ; ?>/assets/images/mgb-default-banner.jpg"/></a>
                                        <?php }
                                        else{
                                        ?>
                                        <a href="<?php echo esc_url($banner_link);?>" target="_blank"><img src="<?php echo esc_url($banner_image);?>"/></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Navbar Area -->
                    <?php if($anymags_enable_sticky==true){
            $anymags_nav_class .= 'anymags-sticky';
        }?>
                    <div class="container-fluid wrapper anymags-main-navigation <?php echo esc_attr($anymags_nav_class);?> <?php if(is_user_logged_in()) { ?>anymags-blog-sticky <?php } ?><?php if(is_customize_preview()){ ?>anymags-blog-customize-preview<?php } ?>">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="navbar-area menu_w">
                                        <!-- Menu For Desktop Device -->
                                        <nav id="site-navigation" role="navigation" aria-label="<?php esc_html__('Primary', 'anymags-blog')?>">
                                            <?php
                                        if ( has_nav_menu( 'primary-menu' ) ) {
                                        ?>
                                                <button type="button" class="anymags-menu-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                                <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'primary-menu',
                                            'menu_id'        => 'primary-menu',
                                            'menu_class'     => 'nav-menu',
                                            ) );
                                        }
                                        else{
                                            echo '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" class="nav-link" title="' . esc_attr__( 'Add a menu', 'anymags-blog' ) . '">' . esc_html__( 'Add A Menu', 'anymags-blog' ) . '</a>';
                                        }
                                        ?> </nav>
                                        <!-- #site-navigation -->
                                        <a class="skip-link-menu-end-skip" href="javascript:void(0)"></a>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="header-search">
                                        <button aria-label="<?php esc_attr_e( 'search form open', 'anymags-blog' ); ?>" class="search-btn" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"><span><?php esc_html_e( 'Search', 'anymags-blog' ); ?></span><i class="fa fa-search"></i></button>
                                        <div class="header-search-form search-modal cover-modal" data-modal-target-string=".search-modal">
                                            <div class="header-search-inner-wrap">
                                            <a class="skip-link-search-back-skip" href="javascript:void(0)"></a>
                                            <?php get_search_form();?> 
                                                <button aria-label="<?php esc_attr_e( 'search form close', 'anymags-blog' ); ?>" class="close" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"></button>
                                            </div>
                                        </div>
                                        <a class="skip-link-search-skip" href="javascript:void(0)"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>