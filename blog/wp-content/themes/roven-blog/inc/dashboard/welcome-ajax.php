<?php
/**
 * Contains ajax functions used for the theme dashboard functionalities.
 *
 * @package Roven-Blog
 */

add_action( 'wp_ajax_rovenblog_activate_plugin', 'rovenblog_activate_plugin' );
/**
 * This function is used for activating plugins from the theme dashboard.
 */
function rovenblog_activate_plugin() {
	// Check if a security nonce and plugin basename slug were provided by the ajax call.
	if ( isset( $_POST['rb_nonce'] ) && isset( $_POST['rb_plugin'] ) ) {
		// Check if the current user is allowed to install plugins.
		if ( current_user_can( 'install_plugins' ) ) {
			// Check the provided security nonce.
			if ( false !== wp_verify_nonce( sanitize_key( $_POST['rb_nonce'] ), 'activate-plugin_' . sanitize_text_field( wp_unslash( $_POST['rb_plugin'] ) ) ) ) {
				$rb_plugin = sanitize_text_field( wp_unslash( $_POST['rb_plugin'] ) );
				// Check if the plugin is already active.
				if ( ! is_plugin_active( $rb_plugin ) ) {
					// Activate the plugin.
					$rb_activate = activate_plugin( $rb_plugin );
					// Check if there were activation errors.
					if ( is_wp_error( $rb_activate ) ) {
						wp_die( esc_html( $rb_activate->get_error_message() ) );
					} else {
						wp_die( 1 );
					}
				} else {
					// The plugin is already active.
					wp_die( esc_html__( 'Activation failed: the plugin was already activated.', 'roven-blog' ) );
				}
			}
		} else {
			// The current user is not allowed to install plugins.
			wp_die( esc_html__( 'Activation failed: sorry, you are not allowed to install plugins on this site.', 'roven-blog' ) );
		}
	}
	// Not all the required data was provided by the ajax call.
	wp_die( esc_html__( 'Activation failed: invalid data provided!', 'roven-blog' ) );
}

add_action( 'wp_ajax_rovenblog_dismiss_welcome_notice', 'rovenblog_dismiss_welcome_notice' );
/**
 * This function is used via ajax for disabling the welcome notice for the current user.
 */
function rovenblog_dismiss_welcome_notice() {
	// Check if a security nonce and type were provided by the ajax call.
	if ( isset( $_POST['rb_noncewelcome'] ) && isset( $_POST['rb_type'] ) ) {
		// Verify the nonce and the type.
		if ( false !== wp_verify_nonce( sanitize_key( $_POST['rb_noncewelcome'] ), 'rovenblog-welcome-notice' ) && 'rovenblog_notice_ignore_w' === $_POST['rb_type'] ) {
			// Set the notice ignore meta for the current user.
			global $current_user;
			$user_id = $current_user->ID;
			add_user_meta( $user_id, 'rovenblog_notice_ignore_w', 'true', true );
		}
	}

	exit;
}
