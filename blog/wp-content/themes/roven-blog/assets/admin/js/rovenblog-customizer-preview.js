/**
 * File rovenblog-customizer-preview.js.
 *
 * Handle Customizer Preview redirects and scroll.
 */

( function( $ ) {

	// Collect information from rovenblog-customizer-controls.js about which sections are opening.
	wp.customize.bind( 'preview-ready', function() {

		wp.customize.preview.bind( 'rb-single-page', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.single_page ) {
				if ( ! $( 'body' ).hasClass( 'page' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.single_page );
				}
			}
		});

		wp.customize.preview.bind( 'rb-home', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url',rovenblog_data.home );
				}
			}
		});

		wp.customize.preview.bind( 'rb-home-hero', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.home + '#rb-header-hero' );
				} else if ( ! window.location.href.indexOf( '#rb-header-hero' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-header-hero' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-header-hero").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-home-featured', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.home + '#rb-featured-posts' );
				} else if ( ! window.location.href.indexOf( '#rb-featured-posts' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-featured-posts' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-featured-posts").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-home-recent', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.home + '#rb-content' );
				} else if ( ! window.location.href.indexOf( '#rb-content' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-content' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-content").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-home-hero1', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.home + '#rb-post-block-1' );
				} else if ( ! window.location.href.indexOf( '#rb-post-block-1' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-post-block-1' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-post-block-1").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-home-hero2', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.home + '#rb-post-block-2' );
				} else if ( ! window.location.href.indexOf( '#rb-post-block-2' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-post-block-2' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-post-block-2").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-home-area1', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.home + '#rb-widgetable-post-block' );
				} else if ( ! window.location.href.indexOf( '#rb-widgetable-post-block' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-widgetable-post-block' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-widgetable-post-block").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-home-area2', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.home + '#rb-widgetable-post-block-2' );
				} else if ( ! window.location.href.indexOf( '#rb-widgetable-post-block-2' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-widgetable-post-block-2' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-widgetable-post-block-2").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-404', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'error404' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.single_post + 'rs404example' );
				}
			}
		});

		wp.customize.preview.bind( 'rb-archive', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.categ ) {
				if ( ! $( 'body' ).hasClass( 'archive' ) || $( 'body' ).hasClass( 'author' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.categ );
				}
			}
		});

		wp.customize.preview.bind( 'rb-archive-featured', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.categ ) {
				if ( ! $( 'body' ).hasClass( 'archive' ) || $( 'body' ).hasClass( 'author' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.categ + '#rb-archive-featured-posts' );
				} else if ( ! window.location.href.indexOf( '#rb-archive-featured-posts' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-archive-featured-posts' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-archive-featured-posts").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-search', function( data ) {
			if ( true === data.expanded ) {
				if ( ! $( 'body' ).hasClass( 'search' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.search );
				}
			}
		});

		wp.customize.preview.bind( 'rb-author', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.author ) {
				if ( ! $( 'body' ).hasClass( 'author' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.author );
				}
			}
		});

		wp.customize.preview.bind( 'rb-single-post', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.single_post ) {
				if ( ! $( 'body' ).hasClass( 'single-post' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.single_post );
				}
			}
		});

		wp.customize.preview.bind( 'rb-related-posts', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.single_post ) {
				if ( ! $( 'body' ).hasClass( 'single-post' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.single_post + '#rb-related-posts' );
				} else if ( ! window.location.href.indexOf( '#rb-related-posts' ) > -1 ) {
					// Scroll to the relevant area if the url doen't have the anchor.
					if ( $( '#rb-related-posts' ).length ) {
						$('html, body').animate({
							scrollTop: $("#rb-related-posts").offset().top
						});
					}
				}
			}
		});

		wp.customize.preview.bind( 'rb-social-media', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.author ) {
				if ( ! $( 'body' ).hasClass( 'single-post' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.single_post );
				}
			}
		});

		wp.customize.preview.bind( 'rb-woocommerce', function( data ) {
			if ( true === data.expanded && 'rb-no-redirect' != rovenblog_data.shop ) {
				if ( ! $( 'body' ).hasClass( 'woocommerce' ) ) {
					// Redirect if it's not on a relevant page for the opened section.
					wp.customize.preview.send( 'url', rovenblog_data.shop );
				}
			}
		});

		wp.customize.preview.bind( 'rb-cta', function( data ) {
			if ( true === data.expanded ) {
				if ( $( "#rb-cta" ).length ) {
					$('html, body').animate({
						scrollTop: $("#rb-cta").offset().top
					});
				}
			}
		});
		
		wp.customize.preview.bind( 'rb-header', function( data ) {
			if ( true === data.expanded ) {
				if ( $( '#rb-header' ).length ) {
					$("html, body").animate({ scrollTop: 0 },0);
				}
			}
		});
		
		wp.customize.preview.bind( 'rb-header-top', function( data ) {
			if ( true === data.expanded ) {
				if ( $( '#rb-header-top' ).length ) {
					$('html, body').animate({
						scrollTop: $("#rb-header-top").offset().top
					});
				}
			}
		});

		wp.customize.preview.bind( 'rb-footer', function( data ) {
			if ( true === data.expanded ) {
				if ( $( '#rb-footer-top' ).length ) {
					$('html, body').animate({
						scrollTop: $("#rb-footer-top").offset().top
					});
				} else if ( $( '#rb-footer' ).length ) {
					$('html, body').animate({
						scrollTop: $("#rb-footer").offset().top
					});
				} else if ( $( '#rb-footer-bottom' ).length ) {
					$('html, body').animate({
						scrollTop: $("#rb-footer-bottom").offset().top
					});
				}
			}
		});

		// Scroll to the relevant section if the url contains a specific anchor.
		if ( window.location.href.indexOf( '#rb-header-hero' ) > -1 ) {
			if ( $( '#rb-header-hero' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-header-hero").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-featured-posts' ) > -1 ) {
			if ( $( '#rb-featured-posts' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-featured-posts").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-content' ) > -1 ) {
			if ( $( '#rb-content' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-content").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-post-block-1' ) > -1 ) {
			if ( $( '#rb-post-block-1' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-post-block-1").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-post-block-2' ) > -1 ) {
			if ( $( '#rb-post-block-2' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-post-block-2").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-widgetable-post-block' ) > -1 ) {
			if ( $( '#rb-widgetable-post-block' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-widgetable-post-block").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-widgetable-post-block-2' ) > -1 ) {
			if ( $( '#rb-widgetable-post-block-2' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-widgetable-post-block-2").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-archive-featured-posts' ) > -1 ) {
			if ( $( '#rb-archive-featured-posts' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-archive-featured-posts").offset().top
				});
			}
		} else if ( window.location.href.indexOf( '#rb-related-posts' ) > -1 ) {
			if ( $( '#rb-related-posts' ).length ) {
				$('html, body').animate({
					scrollTop: $("#rb-related-posts").offset().top
				});
			}
		}
	});
	
} )( jQuery );