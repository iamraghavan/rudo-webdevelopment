<?php

/**
 * Content of the theme notice.
 *
 * @package Roven-Blog
 */
/**
 * Adds theme startup info notice.
 */
function rovenblog_admin_notice()
{
    global  $pagenow ;
    $rb_notice = true;
    // Exclude the notice on the theme dashboard page or when the user doesn't have the relevant capabilities.
    if ( 'themes.php' === $pagenow && isset( $_GET['page'] ) && 'rovenblog_welcome' === $_GET['page'] || !current_user_can( 'install_plugins' ) && !current_user_can( 'import' ) && !current_user_can( 'customize' ) ) {
        $rb_notice = false;
    }
    
    if ( true === $rb_notice ) {
        global  $current_user ;
        $user_id = $current_user->ID;
        // Check if the notice was already dismissed by the current user.
        
        if ( !get_user_meta( $user_id, 'rovenblog_notice_ignore_w' ) ) {
            // Theme notice image and title.
            $theme_image = get_template_directory_uri() . '/assets/admin/images/hero.png';
            $theme_name = __( 'Roven Blog', 'roven-blog' );
            ?>
			<div id="rb-welcome-notice" class="notice rovenblog-notice is-dismissible">

				<div id="rb-wrap">

					<div class="rb-dashboard-hero">
						<div class="rb-dashboard-hero-content-left">

							<div class=".rb-dashboard-hero-greating">
								<?php 
            $user_now = wp_get_current_user();
            /* translators: %s: admin username. */
            printf( esc_html__( 'Hello, %s', 'roven-blog' ), esc_html( $user_now->display_name ) );
            ?>
							</div>

							<div class="rb-dashboard-hero-title"> 

								<?php 
            /* translators: %s: theme name. */
            echo  esc_html( sprintf( __( 'Welcome to %s', 'roven-blog' ), $theme_name ) ) ;
            ?>

								<span class="rb-badge rb-badge-info"><?php 
            echo  esc_html( _ROVENBLOG_VERSION ) ;
            ?></span>
							</div>

							<div class="rb-dashboard-hero-description"> 
								<?php 
            esc_html_e( 'The Roven Blog theme is installed and active. We hope you enjoy using it! Please visit the theme&rsquo;s dasboard where we compiled a list of everything you need to get the most out of using it.', 'roven-blog' );
            ?>
							</div>

							<div class="rb-dashboard-hero-actions">
								<a class="button button-primary" href="<?php 
            echo  esc_url( admin_url( 'themes.php?page=rovenblog_welcome' ) ) ;
            ?>"><?php 
            esc_html_e( 'Go to Dashboard', 'roven-blog' );
            ?></a>
							</div>

							<?php 
            rovenblog_plugins_version();
            ?>

						</div>
						<div class="rb-dashboard-hero-content-right">

							<img src="<?php 
            echo  esc_url( $theme_image ) ;
            ?>" alt="<?php 
            esc_attr_e( 'theme preview', 'roven-blog' );
            ?>">

						</div>
					</div>

				</div><!-- end #rb-wrap -->

			</div>
			<?php 
        }
    
    }

}

add_action( 'admin_notices', 'rovenblog_admin_notice' );