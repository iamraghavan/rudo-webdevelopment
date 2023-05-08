/**
 * Scripts within the customizer controls window.
 *
 * Informs the preview when users open various sections and redirects to home page when sections are closed.
 */

( function( $ ) {

	wp.customize.bind( 'ready', function() {

		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_page_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-single-page', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_home_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_home_header_hero', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home-hero', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_home_featured_posts', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home-featured', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_home_recent_posts', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home-recent', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_home_header_hero1', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home-hero1', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_home_header_hero2', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home-hero2', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_area1', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home-area1', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_area2', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-home-area2', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_404_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-404', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_archive_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-archive', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_archive_featured', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-archive-featured', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_search_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-search', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_author_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-author', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_post_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-single-post', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_post_related_posts', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-related-posts', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_social_media', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-social-media', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );
		
		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_woocommerce_settings', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-woocommerce', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );

		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_cta', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-cta', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );

		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_header', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-header', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );

		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_header_top', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-header-top', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );

		// Detect when the section is expanded or closed in order to redirect the preview and/or initiate scrolling to a specific zone.
		wp.customize.section( 'rovenblog_footer', function( section ) {

			section.expanded.bind( function( isExpanding ) {

				if ( isExpanding ) {
					// Send the data for initiating the the Customizer redirect when the section opens.
					wp.customize.previewer.send( 'rb-footer', { expanded: isExpanding } );
				} else {
					// Redirect the Customizer Preview to home when closing the section, if it's not on that page already.
					if ( wp.customize.settings.url.home != wp.customize.previewer.previewUrl() ) {
						wp.customize.previewer.previewUrl.set( wp.customize.settings.url.home );
					}
				}
			} );

		} );

	} );

} )( jQuery );