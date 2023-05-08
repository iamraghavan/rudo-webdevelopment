<?php

/**
 * Content of the "Plugins" tab.
 *
 * @package Roven-Blog
 */
$theme_type = 'free';
$hide_import = false;
$theme_name = __( 'Roven Blog', 'roven-blog' );
?>
<!-- Plugins -->
<div id="rb-plugins">

	<h3><?php 
esc_html_e( 'Plugins', 'roven-blog' );
?></h3>

	<div class="rb-dashboard-card">
		<div class="rb-dashboard-card-content">

			<h4 class="rb-dashboard-card-title">
				<?php 
esc_html_e( 'Plugins overview', 'roven-blog' );
?>
			</h4>

			<p class="rb-dashboard-card-description">
				<?php 
esc_html_e( 'The following is a list of various plugins that can enhance you website in different ways. All the plugins listed here has been tested and are 100% compatible with the theme.', 'roven-blog' );
?>
			</p>

			<ul>
				<li>
					<?php 
echo  wp_kses( __( '<strong>Kirki</strong> - plugin must be installed to be able to edit theme settings', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
				</li>
				<li>
					<?php 
echo  wp_kses(
    /* translators: %s: theme name. */
    sprintf( __( '<strong>Force Regenerate Thumbnails</strong> - you need to install it and use it if you already had images on the website prior to installing the %s Theme', 'roven-blog' ), $theme_name ),
    array(
        'strong' => array(),
    )
) ;
?>
				</li>
				<li>
					<?php 
echo  wp_kses( __( '<strong>One click demo import</strong> - plugin must be installed to be able to import demos', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
				</li>
				<li>
					<?php 
echo  wp_kses( __( '<strong>Other plugins</strong> - these plugins can extend the functionality of your website by adding a newsletter sign-up, displaying Instagram Feeds, adding contact forms etc. We advise you to read the description on what each of them does and decide if you need them or not.', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
				</li>
				<?php 

if ( 'free' === $theme_type ) {
    ?>
					<li>
						<?php 
    echo  wp_kses( __( '<strong>Plugins marked as pro</strong> are fully integrated only in the PRO version of the theme', 'roven-blog' ), array(
        'strong' => array(),
    ) ) ;
    ?>
					</li>
				<?php 
}

?>
			</ul>

		</div>
	</div>
	<form id="plugin-filter" method="post">
		<div class="rb-card-grid">
			<?php 
$plugins_update = get_site_transient( 'update_plugins' )->response;
// The theme relevant plugins install/update/activate cards will be generated based on this list.
$plugin_list = array(
    array(
    'slug'   => 'kirki',
    'banner' => 'https://ps.w.org/kirki/assets/banner-772x250.png',
    'title'  => esc_html__( 'Kirki Customizer Framework', 'roven-blog' ),
    'info'   => __( 'The Ultimate Customizer Framework for WordPress Theme Developers. <strong>Used to create the theme&rsquo;s customizable options in the Customizer.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/kirki/',
    'path'   => 'kirki/kirki.php',
    'class'  => 'Kirki',
),
    array(
    'slug'   => 'force-regenerate-thumbnails',
    'banner' => 'https://ps.w.org/force-regenerate-thumbnails/assets/banner-772x250.jpg',
    'title'  => esc_html__( 'Force Regenerate Thumbnails ', 'roven-blog' ),
    'info'   => __( 'Import demo content, widgets and theme settings with one click. <strong>If you have content on the website prior to installing and activating the theme, you will need to regenerate thumbnails for all images. This plugin does just that.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/force-regenerate-thumbnails/',
    'path'   => 'force-regenerate-thumbnails/force-regenerate-thumbnails.php',
    'class'  => 'ForceRegenerateThumbnails',
),
    array(
    'slug'   => 'one-click-demo-import',
    'banner' => 'https://ps.w.org/one-click-demo-import/assets/banner-772x250.png',
    'title'  => esc_html__( 'One Click Demo Import ', 'roven-blog' ),
    'info'   => __( 'Import your demo content, widgets and theme settings with one click. <strong>The theme comes with multiple demos that can be imported using this plugin.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/one-click-demo-import/',
    'path'   => 'one-click-demo-import/one-click-demo-import.php',
    'class'  => 'OCDI_Plugin',
),
    array(
    'slug'   => 'contact-form-7',
    'banner' => 'https://ps.w.org/contact-form-7/assets/banner-772x250.png',
    'title'  => esc_html__( 'Contact Form 7 ', 'roven-blog' ),
    'info'   => __( 'Just another contact form plugin. Simple but flexible.', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/contact-form-7/',
    'path'   => 'contact-form-7/wp-contact-form-7.php',
    'class'  => 'WPCF7',
),
    array(
    'slug'   => 'mailchimp-for-wp',
    'banner' => 'https://ps.w.org/mailchimp-for-wp/assets/banner-772x250.png',
    'title'  => esc_html__( 'MC4WP: Mailchimp for WordPress', 'roven-blog' ),
    'info'   => __( 'The #1 (unofficial) Mailchimp plugin. Allows you to add various sign-up methods to your WordPress site.', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/mailchimp-for-wp/',
    'path'   => 'mailchimp-for-wp/mailchimp-for-wp.php',
    'class'  => 'MC4WP_Plugin',
),
    array(
    'slug'   => 'instagram-feed',
    'banner' => 'https://ps.w.org/instagram-feed/assets/banner-772x250.png',
    'title'  => esc_html__( 'Smash Balloon Social Photo Feed', 'roven-blog' ),
    'info'   => __( 'Formerly "Instagram Feed". Display clean, customizable, and responsive Instagram feeds from multiple accounts. Supports Instagram oEmbeds.', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/instagram-feed/',
    'path'   => 'instagram-feed/instagram-feed.php',
    'class'  => 'SBI_Global_Settings',
),
    array(
    'slug'   => 'woocommerce',
    'banner' => 'https://ps.w.org/woocommerce/assets/banner-772x250.png',
    'title'  => esc_html__( 'WooCommerce', 'roven-blog' ),
    'info'   => __( 'WooCommerce is the world&rsquo;s most popular open-source eCommerce solution. <strong>Use it to add a shop to your blog.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/woocommerce/',
    'path'   => 'woocommerce/woocommerce.php',
    'class'  => 'WooCommerce',
),
    array(
    'slug'   => 'wordpress-seo',
    'banner' => 'https://ps.w.org/wordpress-seo/assets/banner-772x250.png',
    'title'  => esc_html__( 'Yoast SEO ', 'roven-blog' ),
    'info'   => __( 'Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using the Yoast SEO plugin.', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/wordpress-seo/',
    'path'   => 'wordpress-seo/wp-seo.php',
    'class'  => 'WPSEO_Rank',
),
    array(
    'slug'   => 'seo-by-rank-math',
    'banner' => 'https://ps.w.org/seo-by-rank-math/assets/banner-772x250.png',
    'title'  => esc_html__( 'Rank Math SEO', 'roven-blog' ),
    'info'   => __( 'Rank Math SEO is the Best WordPress SEO plugin combines the features of many SEO tools in a single package & helps you multiply your SEO traffic.', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/seo-by-rank-math/',
    'path'   => 'seo-by-rank-math/rank-math.php',
    'class'  => 'RankMath',
),
    array(
    'slug'   => 'co-authors-plus',
    'banner' => 'https://ps.w.org/co-authors-plus/assets/banner-772x250.jpg',
    'title'  => esc_html__( 'Co-Authors Plus', 'roven-blog' ),
    'info'   => __( 'Assign multiple bylines to posts, pages, and custom post types via a search-as-you-type input box. <strong>A good solution if you have multiple authors contributing to a post.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/co-authors-plus/',
    'path'   => 'co-authors-plus/co-authors-plus.php',
    'class'  => 'CoAuthors_Plus',
),
    array(
    'slug'   => 'searchwp-live-ajax-search',
    'banner' => 'https://ps.w.org/searchwp-live-ajax-search/assets/banner-772x250.png',
    'title'  => esc_html__( 'SearchWP Live Ajax Search', 'roven-blog' ),
    'info'   => __( 'Template powered live search for any WordPress theme. <strong>Enables the header search box to show live search results while a user types.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/searchwp-live-ajax-search/',
    'path'   => 'searchwp-live-ajax-search/searchwp-live-ajax-search.php',
    'class'  => 'SearchWP_Live_Search',
),
    array(
    'slug'   => 'amp',
    'banner' => 'https://ps.w.org/amp/assets/banner-772x250.png',
    'title'  => esc_html__( 'AMP', 'roven-blog' ),
    'info'   => __( 'An easier path to great Page Experience for everyone. Powered by AMP. <strong>Creates AMP versions of your blog pages that load much faster but are limited design wise.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/amp/',
    'path'   => 'amp/amp.php',
    'class'  => 'AMP_Theme_Support',
),
    array(
    'slug'   => 'adrotate',
    'banner' => 'https://ps.w.org/adrotate/assets/banner-772x250.jpg',
    'title'  => esc_html__( 'AdRotate Banner Manager - AdSense Ads & more', 'roven-blog' ),
    'info'   => __( 'Advertising is easy with AdRotate. manage, schedule, rotate and track your ads you make yourself or get from Amazon, Adsense, affiliates and many more. <strong>You can configure ads and it generates shortcodes that you can easily insert in the theme&rsquo;s ad locations.</strong>', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/adrotate/',
    'path'   => 'adrotate/adrotate.php',
    'class'  => 'adrotate_widgets',
),
    array(
    'slug'   => 'loco-translate',
    'banner' => 'https://ps.w.org/loco-translate/assets/banner-772x250.jpg',
    'title'  => esc_html__( 'Loco Translate', 'roven-blog' ),
    'info'   => __( 'Translate WordPress plugins and themes directly in your browser', 'roven-blog' ),
    'link'   => 'https://wordpress.org/plugins/loco-translate/',
    'path'   => 'loco-translate/loco.php',
    'class'  => 'LocoHeaders',
)
);
if ( $hide_import ) {
    // Remove the One Click Demo Import plugin when the demo was disabled via whitelabel.
    unset( $plugin_list[2] );
}
// Loop theme plugins and generate their install/update/activate cards.
foreach ( $plugin_list as $plugin_data ) {
    ?>
				<div class="rb-card-grid-item">

					<div class="rb-dashboard-card plugin-card plugin-card-<?php 
    echo  esc_attr( $plugin_data['slug'] ) ;
    ?>">
						<div class="rb-dashboard-card-header">

							<img src="<?php 
    echo  esc_url( $plugin_data['banner'] ) ;
    ?>" alt="">

						</div>
						<div class="rb-dashboard-card-content">

							<h4 class="rb-dashboard-card-title">
								<?php 
    // Plugin title.
    echo  esc_html( $plugin_data['title'] ) ;
    // Create a plugin specific badge.
    
    if ( 'kirki' === $plugin_data['slug'] ) {
        ?>
									<span class="rb-badge rb-badge-pro"><?php 
        esc_html_e( 'REQUIRED', 'roven-blog' );
        ?></span>
								<?php 
    } elseif ( 'one-click-demo-import' === $plugin_data['slug'] ) {
        ?>
									<span class="rb-badge rb-badge-pro"><?php 
        esc_html_e( 'REQUIRED TO IMPORT DEMO CONTENT', 'roven-blog' );
        ?></span>
								<?php 
    } elseif ( 'woocommerce' === $plugin_data['slug'] || 'co-authors-plus' === $plugin_data['slug'] || 'searchwp-live-ajax-search' === $plugin_data['slug'] || 'amp' === $plugin_data['slug'] || 'adrotate' === $plugin_data['slug'] ) {
        ?>
									<span class="rb-badge rb-badge-pro"><?php 
        esc_html_e( 'PRO', 'roven-blog' );
        ?></span>
								<?php 
    }
    
    ?>
							</h4>

							<p class="rb-dashboard-card-description">
								<?php 
    // Plugin custom description.
    echo  wp_kses( $plugin_data['info'], array(
        'strong' => array(),
    ) ) ;
    ?>
							</p>

							<?php 
    $compatible_check = true;
    $rb_update_check = array_key_exists( $plugin_data['path'], $plugins_update );
    // Check if there is a plugin update available and display compatibility messages if necessary.
    
    if ( $rb_update_check ) {
        $requires_php = ( isset( $plugins_update[$plugin_data['path']]->requires_php ) ? $plugins_update[$plugin_data['path']]->requires_php : null );
        $requires_wp = ( isset( $plugins_update[$plugin_data['path']]->requires ) ? $plugins_update[$plugin_data['path']]->requires : null );
        $compatible_php = is_php_version_compatible( $requires_php );
        $compatible_wp = is_wp_version_compatible( $requires_wp );
        // Check if the plugin is compatible with the user's WordPress and server PHP versions.
        
        if ( !$compatible_wp && !$compatible_php ) {
            $compatible_check = false;
            ?>
									<div class="rb-notice rb-notice-warning">
										<p><?php 
            esc_html_e( 'This plugin cannot be updated because it is not compatible with your WordPress and PHP version.', 'roven-blog' );
            ?></p>
									</div>
									<?php 
        } elseif ( !$compatible_wp ) {
            $compatible_check = false;
            ?>
									<div class="rb-notice rb-notice-warning">
										<p><?php 
            esc_html_e( 'This plugin cannot be updated because it is not compatible with your WordPress.', 'roven-blog' );
            ?></p>
									</div>
									<?php 
        } elseif ( !$compatible_php ) {
            $compatible_check = false;
            ?>
									<div class="rb-notice rb-notice-warning">
										<p><?php 
            esc_html_e( 'This plugin cannot be updated because it is not compatible with your PHP version.', 'roven-blog' );
            ?></p>
									</div>
									<?php 
        }
    
    }
    
    // Check if the current user is not allowed to install plugins.
    
    if ( !current_user_can( 'install_plugins' ) ) {
        ?>
								<div class="rb-notice rb-notice-error">
									<p><?php 
        esc_html_e( 'We have detected that your user type isn\'t allowed to install plugins. If you set it up, then the easiest way to fix this is to make sure it is an administrator. If someone else set it up for you, contact them regarding this.', 'roven-blog' );
        ?></p>
								</div>
							<?php 
    }
    
    ?>

						</div>
						<div class="rb-dashboard-card-footer">
							<div class="rb-dashboard-card-left">

								<a class="rb-dashboard-link" href="<?php 
    echo  esc_url( $plugin_data['link'] ) ;
    ?>" target="_blank">
									<span><?php 
    esc_html_e( 'details', 'roven-blog' );
    ?></span>
									<i class="dashicons dashicons-external"></i>
								</a>

							</div>
							<div class="rb-dashboard-card-right">

								<?php 
    // Check if this is the free theme variant and and the current plugin is relevant to the pro theme only.
    
    if ( 'free' === $theme_type && ('woocommerce' === $plugin_data['slug'] || 'co-authors-plus' === $plugin_data['slug'] || 'searchwp-live-ajax-search' === $plugin_data['slug'] || 'amp' === $plugin_data['slug'] || 'adrotate' === $plugin_data['slug']) ) {
        ?>
									<a class="rb-btn button-primary" href="https://roventhemes.com/theme/roven-blog-free-wordpress-blog-theme/#theme-pricing" target="_blank"> 
										<?php 
        esc_html_e( 'Upgrade to Pro', 'roven-blog' );
        ?>
									</a>
								<?php 
    } else {
        ?>
									<div class="action-links rb-action-links">
										<?php 
        
        if ( $rb_update_check ) {
            // Check if the plugin is compatible and the current user is allowed to update it.
            
            if ( $compatible_check && current_user_can( 'install_plugins' ) ) {
                // Update link data.
                $update_link = add_query_arg( array(
                    'action'   => 'upgrade-plugin',
                    'plugin'   => $plugin_data['path'],
                    '_wpnonce' => wp_create_nonce( 'upgrade-plugin_' . $plugin_data['slug'] ),
                ), esc_url( network_admin_url( 'update.php' ) ) );
                // Render the Update button.
                printf(
                    '<a class="button update-now aria-button-if-js" data-plugin="%s" data-slug="%s" href="%s" aria-label="%s" data-name="%s">%s</a>',
                    esc_attr( $plugin_data['path'] ),
                    esc_attr( $plugin_data['slug'] ),
                    esc_url( $update_link ),
                    /* translators: %s: Plugin name and version. */
                    esc_attr( sprintf( __( 'Update %s now', 'roven-blog' ), $plugin_data['title'] ) ),
                    esc_attr( $plugin_data['title'] ),
                    esc_html__( 'Update Now', 'roven-blog' )
                );
                // Add the Plugin activation button if it's not actived already.
                
                if ( !is_plugin_active( $plugin_data['path'] ) ) {
                    echo  '<p></p>' ;
                    rovenblog_activate_button( $plugin_data['path'], $plugin_data['title'] );
                }
            
            } else {
                // The plugin can't be updated due a compatibility issue or a lack of user capability.
                ?>
												<button type="button" class="button button-disabled" disabled="disabled"><?php 
                esc_html_e( 'Cannot Update', 'roven-blog' );
                ?></button>
												<?php 
            }
        
        } elseif ( is_plugin_active( $plugin_data['path'] ) ) {
            // The plugin is already activated, no further actions are needed.
            ?>
											<button type="button" class="button button-disabled" disabled="disabled"><?php 
            esc_html_e( 'Activated', 'roven-blog' );
            ?></button>
											<?php 
        } elseif ( file_exists( WP_PLUGIN_DIR . '/' . $plugin_data['path'] ) ) {
            // The plugin is installed, but not yet activated.
            // Check if the plugin is compatible and the current user is allowed to activate it.
            
            if ( current_user_can( 'install_plugins' ) && $compatible_check ) {
                // Add the Plugin activation button.
                rovenblog_activate_button( $plugin_data['path'], $plugin_data['title'] );
            } else {
                ?>
												<button type="button" class="button button-disabled" disabled="disabled"><?php 
                esc_html_e( 'Cannot Activate', 'roven-blog' );
                ?></button>
												<?php 
            }
        
        } else {
            // The plugin is not installed. Create the install button if the user are the appropriate capability.
            
            if ( current_user_can( 'install_plugins' ) ) {
                $install_link = add_query_arg( array(
                    '_wpnonce' => wp_create_nonce( 'install-plugin_' . $plugin_data['slug'] ),
                    'action'   => 'install-plugin',
                    'plugin'   => $plugin_data['slug'],
                ), esc_url( network_admin_url( 'plugins.php' ) ) );
                // Render the Install button.
                // This button will also activate the plugin on success via a trigger in admin-dashboard js script.
                printf(
                    '<a class="install-now button" data-slug="%s" href="%s" aria-label="%s" data-name="%s">%s</a>',
                    esc_attr( $plugin_data['slug'] ),
                    esc_url( $install_link ),
                    /* translators: %s: Plugin name and version. */
                    esc_attr( sprintf( __( 'Install %s now', 'roven-blog' ), $plugin_data['title'] ) ),
                    esc_attr( $plugin_data['title'] ),
                    esc_html__( 'Install & Activate', 'roven-blog' )
                );
            } else {
                // The user is not allowed to install plugins.
                ?>
												<button type="button" class="button button-disabled" disabled="disabled"><?php 
                esc_html_e( 'Cannot Install', 'roven-blog' );
                ?></button>
												<?php 
            }
        
        }
        
        ?>
									</div>
								<?php 
    }
    
    ?>

							</div>
						</div>

					</div><!-- end .rb-dashboard-card -->
				</div>
			<?php 
}
?>
		</div><!-- end .rb-card-grid -->
	</form>
</div>
