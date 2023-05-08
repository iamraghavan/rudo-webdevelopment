( function( $ ) {

	'use strict';

	/**
	* Click handler for theme dashboard notice dismiss.
	* 
	* @param {Event} event Event interface.
	*/
	$( '#rb-welcome-notice' ).on( 'click', '.notice-dismiss', function( event ) {
		$.ajax( {
			type: 'post',
			url: rovenblog_args.rb_ajax_url,
			async: true,
			data: {
				action: 'rovenblog_dismiss_welcome_notice',
				'rb_type': 'rovenblog_notice_ignore_w',
				'rb_noncewelcome': rovenblog_args.rb_noncewelcome
			}
		} );
	} );

} )( jQuery );
