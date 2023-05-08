(function($){
	
	'use strict';

	// Tabs
	
	var target = null;
	
	var tabs = $('.rb-dashboard-tab').on('click', function() {
		target = $(this.hash).removeAttr('id');
		if (location.hash === this.hash) {
			setTimeout(update, 0);
		}
	});
	
	var targets = tabs.map(function() {
		return this.hash;
	}).get();
	
	var panels = $(targets.join(',')).each(function() {
		$(this).data('old-id', this.id);
	});

	function update() {
		if (target) {
			target.attr('id', target.data('old-id'));
			target = null;
		}
		var hash = window.location.hash;
		if (targets.indexOf(hash) !== -1) {
			show(hash);
		}
	}

	function show(id) {
		if (!id) {
			id = targets[0];
		}
		tabs.removeClass('selected').filter(function() {
			return (this.hash === id);
		}).addClass('selected');
		panels.hide().filter(id).show();
	}

	$(window).on('hashchange', update);

	if (targets.indexOf(window.location.hash) !== -1) {
		update();
	} else {
		show();
	}
	
		// Plugin Install and Activate
	
	/**
	 * Click handler for plugin updates in the theme dashboard - plugins tab.
	 * 
	 * @param {Event} event Event interface.
	 */
	$( '.rb-action-links' ).on( 'click', '.update-now', function( event ) {
		var $button = $( event.target );
		event.preventDefault();

		if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
			return;
		}

		window.wp.updates.maybeRequestFilesystemCredentials( event );

		rb_update_plugin( {
			plugin: $button.data( 'plugin' ),
			slug:   $button.data( 'slug' )
		} );
	} );

	var $document = $( document );
	/**
	 * Sends an Ajax request to the server to update a plugin.
	 * 
	 * @param {Object}               args         Arguments.
	 * @param {string}               args.plugin  Plugin basename.
	 * @param {string}               args.slug    Plugin slug.
	 * @param {updatePluginSuccess=} args.success Optional. Success callback. Default: rb_update_success
	 * @param {updatePluginError=}   args.error   Optional. Error callback. Default: rb_update_failure
	 * @return {$.promise} A jQuery promise that represents the request, decorated with an abort() method.
	 */
	function rb_update_plugin( args ) {
		var $card, $message, message,
			$adminBarUpdates = $( '#wp-admin-bar-updates' );

		args = _.extend( {
			success: rb_update_success,
			error: rb_update_failure
		}, args );

		$card    = $( '.plugin-card-' + args.slug );
		$message = $card.find( '.update-now' ).addClass( 'updating-message' );
		message    = rovenblog_args.text_updating + $message.data( 'name' );

		// Remove previous error messages, if any.
		$card.removeClass( 'plugin-card-update-failed' ).find( '.notice.notice-error' ).remove();

		$adminBarUpdates.addClass( 'spin' );

		if ( $message.html() !== rovenblog_args.text_updating2 ) {
			$message.data( 'originaltext', $message.html() );
		}

		$message.attr( 'aria-label', message ).text( rovenblog_args.text_updating2 );

		$document.trigger( 'wp-plugin-updating', args );

		return window.wp.updates.ajax( 'update-plugin', args );
	}

	/**
	 * Updates the UI appropriately after a successful plugin update.
	 *
	 * @param {Object} response            Response from the server.
	 * @param {string} response.slug       Slug of the plugin to be updated.
	 * @param {string} response.plugin     Basename of the plugin to be updated.
	 * @param {string} response.pluginName Name of the plugin to be updated.
	 * @param {string} response.oldVersion Old version of the plugin.
	 * @param {string} response.newVersion New version of the plugin.
	 */
	function rb_update_success( response ) {
		var $updateMessage, $adminBarUpdates = $( '#wp-admin-bar-updates' );

		$updateMessage = $( '.plugin-card-' + response.slug ).find( '.update-now' ).removeClass( 'updating-message' ).addClass( 'button-disabled updated-message' );

		$adminBarUpdates.removeClass( 'spin' );

		$updateMessage.attr( 'aria-label', response.pluginName + rovenblog_args.text_updated2 ).text( rovenblog_args.text_updated );

		window.wp.a11y.speak( rovenblog_args.text_update_s );

		//window.wp.updates.decrementCount( 'plugin' );

		$document.trigger( 'wp-plugin-update-success', response );
	}

	/**
	 * Updates the UI appropriately after a failed plugin update.
	 *
	 * @since 4.2.0
	 * @since 4.6.0 More accurately named `updatePluginError`.
	 *
	 * @param {Object}  response              Response from the server.
	 * @param {string}  response.slug         Slug of the plugin to be updated.
	 * @param {string}  response.plugin       Basename of the plugin to be updated.
	 * @param {string=} response.pluginName   Optional. Name of the plugin to be updated.
	 * @param {string}  response.errorCode    Error code for the error that occurred.
	 * @param {string}  response.errorMessage The error that occurred.
	 */
	function rb_update_failure( response ) {
		var $card, errorMessage, $adminBarUpdates = $( '#wp-admin-bar-updates' );

		if ( ! window.wp.updates.isValidResponse( response, 'update' ) ) {
			return;
		}

		if ( window.wp.updates.maybeHandleCredentialError( response, 'update-plugin' ) ) {
			return;
		}
		
		errorMessage = 'Update failed: ' + response.errorMessage;

		$( '.plugin-card-' + response.slug + ' .rb-dashboard-card-content' ).addClass( 'plugin-card-update-failed' )
		.append( '<div class="notice notice-error rb-notice rb-notice-error is-dismissible"><p>' + errorMessage + '</p></div>' );

		$card = $( '.plugin-card-' + response.slug );

		$card.find( '.update-now' ).text( rovenblog_args.text_update_f ).removeClass( 'updating-message' );
		
		if ( response.pluginName ) {
			$card.find( '.update-now' ).attr( 'aria-label', response.pluginName + rovenblog_args.text_update_f2 );
		} else {
			$card.find( '.update-now' ).removeAttr( 'aria-label' );
		}

		$card.on( 'click', '.notice.is-dismissible .notice-dismiss', function() {
			// Use same delay as the total duration of the notice fadeTo + slideUp animation.
			setTimeout( function() {
				$card.removeClass( 'plugin-card-update-failed' ).find( '.column-name a' ).trigger( 'focus' );

				$card.find( '.update-now' ).attr( 'aria-label', false ).text( rovenblog_args.text_update );
			}, 200 );
		} );		

		$adminBarUpdates.removeClass( 'spin' );
		
		window.wp.a11y.speak( errorMessage, 'assertive' );

		$document.trigger( 'wp-plugin-update-error', response );
	};

	/**
	 * Click handler for plugin activation in the theme dashboard - plugins tab.
	 * 
	 * @param {Event} event Event interface.
	 */
	var rb_activates_slug = null;

	$( '.rb-action-links' ).on( 'click', '.activate-now', function( event ) {
		var $button = $( event.target );
		event.preventDefault();

		if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
			return;
		}

		// Get plugin activation security nonce.
		var activate_nonce = $button.attr( 'href' ).substring(
			$button.attr( 'href' ).indexOf( '_wpnonce=' ) + 9, 
			$button.attr( 'href' ).lastIndexOf( '&action' )
		);

		// Get plugin basename.
		var activate_plugin = $button.attr( 'href' ).substring(
			$button.attr( 'href' ).indexOf( 'plugin=' ) + 7
		);

		// Get plugin slug.
		var plugin_slug = $button.attr( 'href' ).substring(
			$button.attr( 'href' ).indexOf( 'plugin=' ) + 7,
			$button.attr( 'href' ).lastIndexOf( '/' )
		);

		rb_activates_slug = plugin_slug;

		var $card, $message, $adminBarUpdates = $( '#wp-admin-bar-updates' );

		$card    = $( '.plugin-card-' + plugin_slug );
		$message = $card.find( '.activate-now' ).addClass( 'updating-message' );

		// Remove previous error messages, if any.
		$card.removeClass( 'plugin-card-activate-failed' ).find( '.notice.notice-error' ).remove();

		$adminBarUpdates.addClass( 'spin' );

		$button.text( rovenblog_args.text_activating ).addClass( 'button-disabled' ).attr( 'disabled', 'disabled' );

		if ( $message.html() !== rovenblog_args.text_activating ) {
			$message.data( 'originaltext', $message.html() );
		}

		var data = {
			'action': 'rovenblog_activate_plugin',
			'rb_nonce': activate_nonce,
			'rb_plugin': activate_plugin
		};

		$.post( rovenblog_args.rb_ajax_url, data, rb_activation_result );
	} );

	/**
	 * Handles the success and failure results of the theme dashboard plugin activation.
	 *
	 * @param {string}  response Response from the server.
	 */
	function rb_activation_result( response ) {
		if ( 1 == response ) {
		var $adminBarUpdates = $( '#wp-admin-bar-updates' );

		$( '.plugin-card-' + rb_activates_slug ).find( '.activate-now' ).removeClass( 'updating-message' )
				.addClass( 'button-disabled updated-message' ).text( rovenblog_args.text_activated );
	
		$adminBarUpdates.removeClass( 'spin' );

		if ( 'one-click-demo-import' == rb_activates_slug ) {
			$( '#rb-demosites-ocdi' ).removeClass( 'rb-hide' );
			$( '#rb-demosites-no-ocdi' ).addClass( 'rb-hide' );
			$( '#rb-card-demosites-ocdi' ).removeClass( 'rb-hide' );
			$( '#rb-card-demosites-no-ocdi' ).addClass( 'rb-hide' );
		}

		if ( 'kirki' == rb_activates_slug ) {
			$( '#rb-card-customizer-kirki' ).removeClass( 'rb-hide' );
			$( '#rb-card-customizer-no-kirki' ).addClass( 'rb-hide' );
		}

		} else {
			var $card, $adminBarUpdates = $( '#wp-admin-bar-updates' );

			$( '.plugin-card-' + rb_activates_slug+ ' .rb-dashboard-card-content' ).addClass( 'plugin-card-activate-failed' )
			.append( '<div class="notice notice-error rb-notice rb-notice-error is-dismissible"><p>' + response + '</p><button type="button" class="notice-dismiss rb-dismiss"><span class="screen-reader-text">' + rovenblog_args.text_dismiss + '</span></button></div>' );
	
			$card = $( '.plugin-card-' + rb_activates_slug );
	
			$card.find( '.activate-now' ).text( rovenblog_args.text_activate_f ).removeClass( 'updating-message' ).attr( 'disabled', 'disabled' );

			$card.on( 'click', '.notice.is-dismissible .rb-dismiss', function() {
				$card.find( '.notice.notice-error' ).remove();

				// Use same delay as the total duration of the notice fadeTo + slideUp animation.
				setTimeout( function() {
					$card.removeClass( 'plugin-card-activate-failed' ).find( '.column-name a' ).trigger( 'focus' );
	
					$card.find( '.activate-now' ).attr( 'aria-label', false ).text( rovenblog_args.text_activate ).removeAttr( 'disabled' ).removeClass( 'button-disabled' );
				}, 200 );
			} );		
	
			$adminBarUpdates.removeClass( 'spin' );
		}
	}

	/**
	 * Click handler for plugin installs in theme dashboard Plugins tab.
	 *
	 * @param {Event} event Event interface.
	 */
	$( '.rb-action-links' ).on( 'click', '.install-now', function( event ) {
		var $button = $( event.target );
		event.preventDefault();

		if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
			return;
		}

		if ( window.wp.updates.shouldRequestFilesystemCredentials && ! window.wp.updates.ajaxLocked ) {
			window.wp.updates.requestFilesystemCredentials( event );

			$document.on( 'credential-modal-cancel', function() {
				var $message = $( '.install-now.updating-message' );

				$message.removeClass( 'updating-message' ).text( rovenblog_args.text_install );

				window.wp.a11y.speak( rovenblog_args.text_cancel );
			} );
		}

		rb_installPlugin( {
			slug: $button.data( 'slug' )
		} );
	} );

	/**
	 * Sends an Ajax request to the server to install a plugin.
	 *
	 * @param {Object}                args         Arguments.
	 * @param {string}                args.slug    Plugin identifier in the WordPress.org Plugin repository.
	 * @param {installPluginSuccess=} args.success Optional. Success callback. Default: window.wp.updates.installPluginSuccess
	 * @param {installPluginError=}   args.error   Optional. Error callback. Default: window.wp.updates.installPluginError
	 * @return {$.promise} A jQuery promise that represents the request, decorated with an abort() method.
	 */
	function rb_installPlugin( args ) {
		var $card    = $( '.plugin-card-' + args.slug ),
			$message = $card.find( '.install-now' );

		args = _.extend( {
			success: rb_installPluginSuccess,
			error: rb_installPluginError
		}, args );

		if ( 'import' === pagenow ) {
			$message = $( '[data-slug="' + args.slug + '"]' );
		}

		if ( $message.html() !== rovenblog_args.text_installing ) {
			$message.data( 'originaltext', $message.html() );
		}

		$message.addClass( 'updating-message' ).attr( 'aria-label', rovenblog_args.text_installing ).text( rovenblog_args.text_installing );

		window.wp.a11y.speak( rovenblog_args.text_wait_i );

		// Remove previous error messages, if any.
		$card.removeClass( 'plugin-card-install-failed' ).find( '.notice.notice-error' ).remove();

		$document.trigger( 'wp-plugin-installing', args );

		return window.wp.updates.ajax( 'install-plugin', args );
	}

	/**
	 * Updates the UI appropriately after a successful plugin install.
	 *
	 * @param {Object} response             Response from the server.
	 * @param {string} response.slug        Slug of the installed plugin.
	 * @param {string} response.pluginName  Name of the installed plugin.
	 * @param {string} response.activateUrl URL to activate the just installed plugin.
	 */
	function rb_installPluginSuccess( response ) {
		var $message = $( '.plugin-card-' + response.slug ).find( '.install-now' );

		$message
			.removeClass( 'updating-message' )
			.addClass( 'updated-message installed button-disabled' )
			.attr( 'aria-label', rovenblog_args.text_installed )
			.text( rovenblog_args.text_installed );

		window.wp.a11y.speak( rovenblog_args.text_complet_i );

		$document.trigger( 'wp-plugin-install-success', response );

		if ( response.activateUrl ) {
			setTimeout( function() {

				// Transform the 'Install' button into an 'Activate' button.
				$message.removeClass( 'install-now installed button-disabled updated-message' )
					.addClass( 'activate-now button-primary' )
					.attr( 'href', response.activateUrl );

				// Trigger the plugin activation via button click.
				$message.trigger( "click" );

			}, 1000 );
		}
	}

	/**
	 * Updates the UI appropriately after a failed plugin install.
	 *
	 * @param {Object}  response              Response from the server.
	 * @param {string}  response.slug         Slug of the plugin to be installed.
	 * @param {string=} response.pluginName   Optional. Name of the plugin to be installed.
	 * @param {string}  response.errorCode    Error code for the error that occurred.
	 * @param {string}  response.errorMessage The error that occurred.
	 */
	function rb_installPluginError( response ) {
		var $card   = $( '.plugin-card-' + response.slug ),
			$button = $card.find( '.install-now' ),
			errorMessage;

		if ( ! window.wp.updates.isValidResponse( response, 'install' ) ) {
			return;
		}

		if ( window.wp.updates.maybeHandleCredentialError( response, 'install-plugin' ) ) {
			return;
		}

		$card
			.addClass( 'plugin-card-update-failed' )
			.append( '<div class="notice notice-error notice-alt is-dismissible"><p>' + rovenblog_args.text_install_f + response.errorMessage + '</p></div>' );

		$card.on( 'click', '.notice.is-dismissible .notice-dismiss', function() {

			// Use same delay as the total duration of the notice fadeTo + slideUp animation.
			setTimeout( function() {
				$card
					.removeClass( 'plugin-card-update-failed' )
					.find( '.column-name a' ).trigger( 'focus' );
			}, 200 );
		} );

		$button
			.removeClass( 'updating-message' ).addClass( 'button-disabled' )
			.attr( 'aria-label', rovenblog_args.text_install_f2 )
			.text( rovenblog_args.text_install_f2 );

		window.wp.a11y.speak( errorMessage, 'assertive' );

		$document.trigger( 'wp-plugin-install-error', response );
	};
	
	//
	
})(jQuery);	

