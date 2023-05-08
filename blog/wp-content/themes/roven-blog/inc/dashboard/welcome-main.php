<?php

/**
 * Content of the theme dashboard.
 *
 * @package Roven-Blog
 */
/**
 * Add theme Welcome submenu.
 */
function rovenblog_welcome_panel()
{
    // Free theme menu title and function.
    $title = esc_html__( 'Welcome Page Free - Admin Roven Blog WordPress Theme', 'roven-blog' );
    $function = 'rovenblog_welcome_page_free';
    // Add the theme dasboard for user with customize, install_plugins or import capabilities.
    $rb_capability = 'customize';
    
    if ( current_user_can( 'install_plugins' ) ) {
        $rb_capability = 'install_plugins';
    } elseif ( current_user_can( 'import' ) ) {
        $rb_capability = 'import';
    }
    
    // The theme dashboard page.
    add_theme_page(
        $title,
        esc_html__( 'Roven Blog', 'roven-blog' ),
        $rb_capability,
        'rovenblog_welcome',
        $function,
        32
    );
}

add_action( 'admin_menu', 'rovenblog_welcome_panel' );
/**
 * Theme Welcome page for the submenu, free variant.
 */
function rovenblog_welcome_page_free()
{
    $theme_image = get_template_directory_uri() . '/assets/admin/images/hero.png';
    ?>
	<div id="rb-wrap">

		<div id="rb-dashboard">
			<div id="rb-dashboard-header">
				<div id="rb-dashboard-header-content-left">

					<a class="rb-dashboard-logo" href="https://roventhemes.com/" target="_blank" aria-label="<?php 
    esc_attr_e( 'Roventhemes', 'roven-blog' );
    ?>">
						<img src="<?php 
    echo  esc_url( get_template_directory_uri() . '/assets/admin/images/logo.png' ) ;
    ?>" alt="<?php 
    esc_attr_e( 'Roven Themes Logo', 'roven-blog' );
    ?>">
					</a>

					<?php 
    rovenblog_plugins_version();
    ?>

				</div>	
				<div id="rb-dashboard-header-content-right">

					<a class="rb-dashboard-link" href="https://roventhemes.com" target="_blank">
						<span><?php 
    esc_html_e( 'roventhemes.com', 'roven-blog' );
    ?></span>
						<i class="dashicons dashicons-external"></i>
					</a>

				</div>	
			</div><!-- end #rb-dashboard-header -->
			<div id="rb-dashboard-content-wrap">
				<h1 class="rb-dashboard-hidden"><?php 
    esc_html_e( 'Theme Dashboard', 'roven-blog' );
    ?></h1>
				<div class="rb-dashboard-hero">
					<div class="rb-dashboard-hero-content-left">

						<div class="rb-dashboard-hero-title">
							<?php 
    esc_html_e( 'Roven Blog Dashboard', 'roven-blog' );
    ?>
							<span class="rb-badge rb-badge-info"><?php 
    echo  esc_html( _ROVENBLOG_VERSION ) ;
    ?></span>
						</div>

						<div class="rb-dashboard-hero-description">
							<?php 
    esc_html_e( 'This page contains all the resources we think you might need in order to get the most out of using this theme.', 'roven-blog' );
    ?>
						</div>

					</div>
					<div class="rb-dashboard-hero-content-right">

						<img src="<?php 
    echo  esc_url( $theme_image ) ;
    ?>" alt="<?php 
    esc_attr_e( 'theme preview', 'roven-blog' );
    ?>">

					</div>
				</div><!-- end .rb-dashboard-hero -->

				<div id="rb-dashboard-content">
					<div id="rb-dashboard-content-main">
						<div class="rb-dashboard-panel">
							<div class="rb-dashboard-panel-header">

								<h2 class="rb-dashboard-hidden">
										<?php 
    esc_html_e( 'Theme Dashboard Tabs', 'roven-blog' );
    ?>
								</h2>

								<ul class="rb-dashboard-tabs">
									<li><a class="rb-dashboard-tab" href="#rb-gettingstarted"><?php 
    esc_html_e( 'Getting Started', 'roven-blog' );
    ?></a></li>
									<li><a class="rb-dashboard-tab" href="#rb-demosites"><?php 
    esc_html_e( 'Demo Sites', 'roven-blog' );
    ?></a></li>
									<li><a class="rb-dashboard-tab" href="#rb-plugins"><?php 
    esc_html_e( 'Plugins', 'roven-blog' );
    ?></a></li>
									<li><a class="rb-dashboard-tab" href="#rb-freevspro"><?php 
    esc_html_e( 'Free vs Pro', 'roven-blog' );
    ?></a></li>
									<li><a class="rb-dashboard-tab" href="#rb-helpandsupport"><?php 
    esc_html_e( 'Help & Support', 'roven-blog' );
    ?></a></li>
								</ul>

							</div>
							<div class="rb-dashboard-panel-content">
								<?php 
    // Getting Started tab template.
    get_template_part( 'inc/dashboard/tab', 'getting-started' );
    // Demo Sites tab template.
    get_template_part( 'inc/dashboard/tab', 'demo-sites' );
    // Plugins tab template.
    get_template_part( 'inc/dashboard/tab', 'plugins' );
    // Free vs Pro tab template.
    get_template_part( 'inc/dashboard/tab', 'free-vs-pro' );
    // Help & Support tab template.
    get_template_part( 'inc/dashboard/tab', 'help-support' );
    ?>
							</div>	
						</div><!-- end .rb-dashboard-panel -->

					</div><!-- end #rb-dashboard-content-main -->

					<?php 
    get_template_part( 'inc/dashboard/welcome', 'sidebar' );
    ?>

				</div><!-- end #rb-dashboard-content -->
			</div><!-- end #rb-dashboard-content-wrap -->
		</div><!-- end #rb-dashboard -->

	</div><!-- end #rb-wrap -->
	<?php 
}

/**
 * This function is used for adding warings regarding theme recommended plugin versions.
 */
function rovenblog_plugins_version()
{
    if ( !function_exists( 'get_plugin_data' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    
    if ( is_plugin_active( 'kirki/kirki.php' ) ) {
        $kirki_path = WP_PLUGIN_DIR . '/kirki/kirki.php';
        $rb_kirki = get_plugin_data( $kirki_path );
        // Check if the Kirki plugin is too oudated to work properly with the theme.
        
        if ( version_compare( $rb_kirki['Version'], '4.0.6', '<' ) ) {
            ?>
			<div class="rb-notice rb-notice-warning">
				<p><?php 
            esc_html_e( 'The theme Customizer requires the Kirki plugin to be version 4.0.6 or higher. Please update the plugin.', 'roven-blog' );
            ?></p>
			</div>
			<?php 
        }
    
    }
    
    
    if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) {
        $ocdi_path = WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php';
        $rb_ocdi = get_plugin_data( $ocdi_path );
        // Check if the One Click Demo Import plugin is too oudated to work properly with the theme.
        
        if ( version_compare( $rb_ocdi['Version'], '3.0.0', '<' ) ) {
            ?>
			<div class="rb-notice rb-notice-warning">
				<p><?php 
            esc_html_e( 'The theme demo import requires the One Click Demo Import plugin to be version 3.0.0 or higher. Please update the plugin.', 'roven-blog' );
            ?></p>
			</div>
			<?php 
        }
    
    }

}

/**
 * This function is used for generating the plugins activate button in the dashboard.
 *
 * @param string $rb_path - plugin slug path.
 * @param string $rb_title - plugin title.
 */
function rovenblog_activate_button( $rb_path, $rb_title )
{
    $button_text = __( 'Activate', 'roven-blog' );
    /* translators: %s: Plugin name. */
    $button_label = __( 'Activate', 'roven-blog' );
    // Activation link data.
    $activate_url = add_query_arg( array(
        '_wpnonce' => wp_create_nonce( 'activate-plugin_' . $rb_path ),
        'action'   => 'activate',
        'plugin'   => $rb_path,
    ), network_admin_url( 'plugins.php' ) );
    // Render the activate plugin button.
    printf(
        '<a href="%1$s" class="button activate-now button-primary" aria-label="%2$s">%3$s</a>',
        esc_url( $activate_url ),
        esc_attr( sprintf( $button_label, $rb_title ) ),
        esc_html( $button_text )
    );
}
