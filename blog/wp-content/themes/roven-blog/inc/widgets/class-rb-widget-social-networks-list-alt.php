<?php
/**
 * RovenBlog: Social Networks List Alternative widget template
 *
 * @package Roven-Blog
 */

/**
 * Adds Roven Blog: Social Networks List widget.
 */
class RB_Widget_Social_Networks_List_Alt extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'rb_social_networks_list_alt', // Widget base ID.
			esc_html__( 'Roven Blog: Social Networks Alternative', 'roven-blog' ), // Widget name.
			array(
				'description' => esc_html__( 'Displays an alternative list of links to social network websites', 'roven-blog' ),
				'classname'   => 'rb-widget-social-networks-list-alt',
			) // Widget description and class args.
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title     = apply_filters( 'widget_title', $instance['title'] );
		$align     = apply_filters( 'widget_align', $instance['align'] );
		$rb_hide   = apply_filters( 'widget_rb_hide', $instance['rb_hide'] );
		$rb_color  = apply_filters( 'widget_rb_color', $instance['rb_color'] );
		$facebook  = apply_filters( 'widget_facebook', $instance['facebook'] );
		$instagram = apply_filters( 'widget_instagram', $instance['instagram'] );
		$twitter   = apply_filters( 'widget_twitter', $instance['twitter'] );
		$linkedin  = apply_filters( 'widget_linkedin', $instance['linkedin'] );
		$youtube   = apply_filters( 'widget_youtube', $instance['youtube'] );
		$tumblr    = apply_filters( 'widget_tumblr', $instance['tumblr'] );
		$pinterest = apply_filters( 'widget_pinterest', $instance['pinterest'] );
		$dribbble  = apply_filters( 'widget_dribbble', $instance['dribbble'] );
		$medium    = apply_filters( 'widget_medium', $instance['medium'] );
		$sm500px   = apply_filters( 'widget_sm500px', $instance['sm500px'] );
		$xing      = apply_filters( 'widget_xing', $instance['xing'] );
		$vimeo     = apply_filters( 'widget_vimeo', $instance['vimeo'] );
		$vk        = apply_filters( 'widget_vk', $instance['vk'] );
		$github    = apply_filters( 'widget_github', $instance['github'] );
		$flickr    = apply_filters( 'widget_flickr', $instance['flickr'] );
		$bitbucket = apply_filters( 'widget_bitbucket', $instance['bitbucket'] );
		$reddit    = apply_filters( 'widget_reddit', $instance['reddit'] );
		$steam     = apply_filters( 'widget_steam', $instance['steam'] );
		$twitch    = apply_filters( 'widget_twitch', $instance['twitch'] );
		$sm_layout = get_theme_mod( 'rovenblog_social_widgets_layout', array( 'facebook', 'instagram', 'twitter', 'linkedin', 'youtube', 'tumblr', 'pinterest', 'dribbble', 'medium', '500px', 'xing', 'vimeo', 'vk', 'github', 'flickr', 'bitbucket', 'reddit', 'steam', 'twitch' ) );

		// Version 1.3.0 fallback for the new align options.
		if ( 'rb-text-align-left' === $align || 'rb-text-align-right' === $align || 'rb-text-align-center' === $align ) {
			if ( ! isset( $instance['align_mobile'] ) ) {
				$instance['align_mobile'] = $align . '-mobile';
			}
			if ( ! isset( $instance['align_tablet'] ) ) {
				$instance['align_tablet'] = $align . '-tablet';
			}

			$align = $instance['align'] . '-desktop';
		}
		if ( ! isset( $instance['align_mobile'] ) ) {
			$instance['align_mobile'] = 'rb-text-align-left-mobile';
		}
		if ( ! isset( $instance['align_tablet'] ) ) {
			$instance['align_tablet'] = 'rb-text-align-left-tablet';
		}

		$align_mobile = apply_filters( 'widget_align_mobile', $instance['align_mobile'] );
		$align_tablet = apply_filters( 'widget_align_tablet', $instance['align_tablet'] );

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		if ( 'rb_hide' === $rb_hide ) {
			$align .= ' rb-widget-social-networks-list-alt-hide-name';
		}
		if ( 'rb-alt' === $rb_color ) {
			$align .= ' rb-widget-social-networks-list-alt-same-color';
		}
		?>
		<ul class="<?php echo esc_attr( $align_mobile . ' ' . $align_tablet . ' ' . $align ); ?>">
			<?php
			foreach ( $sm_layout as $social_media ) {
				if ( 'facebook' === $social_media ) {
					if ( '' !== trim( $facebook ) ) {
						?>
						<li class="rb-color-facebook">
							<a href="<?php echo esc_url( $facebook ); ?>" target="_blank">
								<i class="rovenblog-icon-facebook-square"></i>
								<span><?php esc_html_e( 'facebook', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'instagram' === $social_media ) {
					if ( '' !== trim( $instagram ) ) {
						?>
						<li class="rb-color-instagram">
							<a href="<?php echo esc_url( $instagram ); ?>" target="_blank">
								<i class="rovenblog-icon-instagram"></i>
								<span><?php esc_html_e( 'instagram', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'twitter' === $social_media ) {
					if ( '' !== trim( $twitter ) ) {
						?>
						<li class="rb-color-twitter">
							<a href="<?php echo esc_url( $twitter ); ?>" target="_blank">
								<i class="rovenblog-icon-twitter"></i>
								<span><?php esc_html_e( 'twitter', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'linkedin' === $social_media ) {
					if ( '' !== trim( $linkedin ) ) {
						?>
						<li class="rb-color-linkedin">
							<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank">
								<i class="rovenblog-icon-linkedin-square"></i>
								<span><?php esc_html_e( 'linkedin', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'youtube' === $social_media ) {
					if ( '' !== trim( $youtube ) ) {
						?>
						<li class="rb-color-youtube">
							<a href="<?php echo esc_url( $youtube ); ?>" target="_blank">
								<i class="rovenblog-icon-youtube"></i>
								<span><?php esc_html_e( 'youtube', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'tumblr' === $social_media ) {
					if ( '' !== trim( $tumblr ) ) {
						?>
						<li class="rb-color-tumblr">
							<a href="<?php echo esc_url( $tumblr ); ?>" target="_blank">
								<i class="rovenblog-icon-tumblr"></i>
								<span><?php esc_html_e( 'tumblr', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'pinterest' === $social_media ) {
					if ( '' !== trim( $pinterest ) ) {
						?>
						<li class="rb-color-pinterest">
							<a href="<?php echo esc_url( $pinterest ); ?>" target="_blank">
								<i class="rovenblog-icon-pinterest"></i>
								<span><?php esc_html_e( 'pinterest', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'dribbble' === $social_media ) {
					if ( '' !== trim( $dribbble ) ) {
						?>
						<li class="rb-color-dribbble">
							<a href="<?php echo esc_url( $dribbble ); ?>" target="_blank">
								<i class="rovenblog-icon-dribbble"></i>
								<span><?php esc_html_e( 'dribbble', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'medium' === $social_media ) {
					if ( '' !== trim( $medium ) ) {
						?>
						<li class="rb-color-medium">
							<a href="<?php echo esc_url( $medium ); ?>" target="_blank">
								<i class="rovenblog-icon-medium"></i>
								<span><?php esc_html_e( 'medium', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( '500px' === $social_media ) {
					if ( '' !== trim( $sm500px ) ) {
						?>
						<li class="rb-color-500px">
							<a href="<?php echo esc_url( $sm500px ); ?>" target="_blank">
								<i class="rovenblog-icon-500px"></i>
								<span><?php esc_html_e( '500px', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'xing' === $social_media ) {
					if ( '' !== trim( $xing ) ) {
						?>
						<li class="rb-color-xing">
							<a href="<?php echo esc_url( $xing ); ?>" target="_blank">
								<i class="rovenblog-icon-xing"></i>
								<span><?php esc_html_e( 'xing', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'vimeo' === $social_media ) {
					if ( '' !== trim( $vimeo ) ) {
						?>
						<li class="rb-color-vimeo">
							<a href="<?php echo esc_url( $vimeo ); ?>" target="_blank">
								<i class="rovenblog-icon-vimeo"></i>
								<span><?php esc_html_e( 'vimeo', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'vk' === $social_media ) {
					if ( '' !== trim( $vk ) ) {
						?>
						<li class="rb-color-vk">
							<a href="<?php echo esc_url( $vk ); ?>" target="_blank">
								<i class="rovenblog-icon-vk"></i>
								<span><?php esc_html_e( 'vk', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'github' === $social_media ) {
					if ( '' !== trim( $github ) ) {
						?>
						<li class="rb-color-github">
							<a href="<?php echo esc_url( $github ); ?>" target="_blank">
								<i class="rovenblog-icon-github"></i>
								<span><?php esc_html_e( 'github', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'flickr' === $social_media ) {
					if ( '' !== trim( $flickr ) ) {
						?>
						<li class="rb-color-flickr">
							<a href="<?php echo esc_url( $flickr ); ?>" target="_blank">
								<i class="rovenblog-icon-flickr"></i>
								<span><?php esc_html_e( 'flickr', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'bitbucket' === $social_media ) {
					if ( '' !== trim( $bitbucket ) ) {
						?>
						<li class="rb-color-bitbucket">
							<a href="<?php echo esc_url( $bitbucket ); ?>" target="_blank">
								<i class="rovenblog-icon-bitbucket"></i>
								<span><?php esc_html_e( 'bitbucket', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'reddit' === $social_media ) {
					if ( '' !== trim( $reddit ) ) {
						?>
						<li class="rb-color-reddit">
							<a href="<?php echo esc_url( $reddit ); ?>" target="_blank">
								<i class="rovenblog-icon-reddit"></i>
								<span><?php esc_html_e( 'reddit', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'steam' === $social_media ) {
					if ( '' !== trim( $steam ) ) {
						?>
						<li class="rb-color-steam">
							<a href="<?php echo esc_url( $steam ); ?>" target="_blank">
								<i class="rovenblog-icon-steam"></i>
								<span><?php esc_html_e( 'steam', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				} elseif ( 'twitch' === $social_media ) {
					if ( '' !== trim( $twitch ) ) {
						?>
						<li class="rb-color-twitch">
							<a href="<?php echo esc_url( $twitch ); ?>" target="_blank">
								<i class="rovenblog-icon-twitch"></i>
								<span><?php esc_html_e( 'twitch', 'roven-blog' ); ?></span>
							</a>
						</li>
						<?php
					}
				}
			}
			?>
		</ul>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = '';
		}

		if ( isset( $instance['align'] ) ) {
			$align = $instance['align'];
		} else {
			$align = 'rb-text-align-left-desktop';
		}

		// Version 1.3.0 fallback for the new align options.
		if ( 'rb-text-align-left' === $align || 'rb-text-align-right' === $align || 'rb-text-align-center' === $align ) {
			if ( ! isset( $instance['align_mobile'] ) ) {
				$instance['align_mobile'] = $align . '-mobile';
			}
			if ( ! isset( $instance['align_tablet'] ) ) {
				$instance['align_tablet'] = $align . '-tablet';
			}

			$align = $instance['align'] . '-desktop';
		}

		if ( isset( $instance['align_mobile'] ) ) {
			$align_mobile = $instance['align_mobile'];
		} else {
			$align_mobile = 'rb-text-align-left-mobile';
		}

		if ( isset( $instance['align_tablet'] ) ) {
			$align_tablet = $instance['align_tablet'];
		} else {
			$align_tablet = 'rb-text-align-left-tablet';
		}

		if ( isset( $instance['rb_hide'] ) ) {
			$rb_hide = $instance['rb_hide'];
		} else {
			$rb_hide = '';
		}

		if ( isset( $instance['rb_color'] ) ) {
			$rb_color = $instance['rb_color'];
		} else {
			$rb_color = 'rb-default';
		}

		if ( isset( $instance['facebook'] ) ) {
			$facebook = $instance['facebook'];
		} else {
			$facebook = '';
		}

		if ( isset( $instance['instagram'] ) ) {
			$instagram = $instance['instagram'];
		} else {
			$instagram = '';
		}

		if ( isset( $instance['twitter'] ) ) {
			$twitter = $instance['twitter'];
		} else {
			$twitter = '';
		}

		if ( isset( $instance['linkedin'] ) ) {
			$linkedin = $instance['linkedin'];
		} else {
			$linkedin = '';
		}

		if ( isset( $instance['youtube'] ) ) {
			$youtube = $instance['youtube'];
		} else {
			$youtube = '';
		}

		if ( isset( $instance['tumblr'] ) ) {
			$tumblr = $instance['tumblr'];
		} else {
			$tumblr = '';
		}

		if ( isset( $instance['pinterest'] ) ) {
			$pinterest = $instance['pinterest'];
		} else {
			$pinterest = '';
		}

		if ( isset( $instance['dribbble'] ) ) {
			$dribbble = $instance['dribbble'];
		} else {
			$dribbble = '';
		}

		if ( isset( $instance['medium'] ) ) {
			$medium = $instance['medium'];
		} else {
			$medium = '';
		}

		if ( isset( $instance['sm500px'] ) ) {
			$sm500px = $instance['sm500px'];
		} else {
			$sm500px = '';
		}

		if ( isset( $instance['xing'] ) ) {
			$xing = $instance['xing'];
		} else {
			$xing = '';
		}

		if ( isset( $instance['vimeo'] ) ) {
			$vimeo = $instance['vimeo'];
		} else {
			$vimeo = '';
		}

		if ( isset( $instance['vk'] ) ) {
			$vk = $instance['vk'];
		} else {
			$vk = '';
		}

		if ( isset( $instance['github'] ) ) {
			$github = $instance['github'];
		} else {
			$github = '';
		}

		if ( isset( $instance['flickr'] ) ) {
			$flickr = $instance['flickr'];
		} else {
			$flickr = '';
		}

		if ( isset( $instance['bitbucket'] ) ) {
			$bitbucket = $instance['bitbucket'];
		} else {
			$bitbucket = '';
		}

		if ( isset( $instance['reddit'] ) ) {
			$reddit = $instance['reddit'];
		} else {
			$reddit = '';
		}

		if ( isset( $instance['steam'] ) ) {
			$steam = $instance['steam'];
		} else {
			$steam = '';
		}

		if ( isset( $instance['twitch'] ) ) {
			$twitch = $instance['twitch'];
		} else {
			$twitch = '';
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'align_mobile' ) ); ?>"><?php esc_html_e( 'Align content mobile:', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'align_mobile' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'align_mobile' ) ); ?>">
				<option value="rb-text-align-left-mobile"<?php echo ( 'rb-text-align-left-mobile' === $align_mobile ) ? ' selected' : ''; ?>><?php esc_html_e( 'Left', 'roven-blog' ); ?></option>
				<option value="rb-text-align-center-mobile"<?php echo ( 'rb-text-align-center-mobile' === $align_mobile ) ? ' selected' : ''; ?>><?php esc_html_e( 'Center', 'roven-blog' ); ?></option>
				<option value="rb-text-align-right-mobile"<?php echo ( 'rb-text-align-right-mobile' === $align_mobile ) ? ' selected' : ''; ?>><?php esc_html_e( 'Right', 'roven-blog' ); ?></option>
			</select> 
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'align_tablet' ) ); ?>"><?php esc_html_e( 'Align content tablet:', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'align_tablet' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'align_tablet' ) ); ?>">
				<option value="rb-text-align-left-tablet"<?php echo ( 'rb-text-align-left-tablet' === $align_tablet ) ? ' selected' : ''; ?>><?php esc_html_e( 'Left', 'roven-blog' ); ?></option>
				<option value="rb-text-align-center-tablet"<?php echo ( 'rb-text-align-center-tablet' === $align_tablet ) ? ' selected' : ''; ?>><?php esc_html_e( 'Center', 'roven-blog' ); ?></option>
				<option value="rb-text-align-right-tablet"<?php echo ( 'rb-text-align-right-tablet' === $align_tablet ) ? ' selected' : ''; ?>><?php esc_html_e( 'Right', 'roven-blog' ); ?></option>
			</select> 
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'align' ) ); ?>"><?php esc_html_e( 'Align content desktop:', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'align' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'align' ) ); ?>">
				<option value="rb-text-align-left-desktop"<?php echo ( 'rb-text-align-left-desktop' === $align ) ? ' selected' : ''; ?>><?php esc_html_e( 'Left', 'roven-blog' ); ?></option>
				<option value="rb-text-align-center-desktop"<?php echo ( 'rb-text-align-center-desktop' === $align ) ? ' selected' : ''; ?>><?php esc_html_e( 'Center', 'roven-blog' ); ?></option>
				<option value="rb-text-align-right-desktop"<?php echo ( 'rb-text-align-right-desktop' === $align ) ? ' selected' : ''; ?>><?php esc_html_e( 'Right', 'roven-blog' ); ?></option>
			</select> 
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rb_hide' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rb_hide' ) ); ?>"<?php echo ( 'rb_hide' === $rb_hide ) ? ' checked' : ''; ?> value="rb_hide"><?php esc_html_e( 'Hide social network name', 'roven-blog' ); ?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rb_color' ) ); ?>"><?php esc_html_e( 'Social media icons color:', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rb_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rb_color' ) ); ?>">
				<option value="rb-default"<?php echo ( 'rb-default' === $rb_color ) ? ' selected' : ''; ?>><?php esc_html_e( 'brand color', 'roven-blog' ); ?></option>
				<option value="rb-alt"<?php echo ( 'rb-alt' === $rb_color ) ? ' selected' : ''; ?>><?php esc_html_e( 'same color', 'roven-blog' ); ?></option>
			</select> 
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'facebook URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'instagram URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'twitter URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'linkedin URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'youtube URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php esc_html_e( 'tumblr URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" type="text" value="<?php echo esc_attr( $tumblr ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'pinterest URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php esc_html_e( 'dribbble URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'medium' ) ); ?>"><?php esc_html_e( 'medium URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'medium' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'medium' ) ); ?>" type="text" value="<?php echo esc_attr( $medium ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sm500px' ) ); ?>"><?php esc_html_e( '500px URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sm500px' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sm500px' ) ); ?>" type="text" value="<?php echo esc_attr( $sm500px ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'xing' ) ); ?>"><?php esc_html_e( 'xing URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'xing' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'xing' ) ); ?>" type="text" value="<?php echo esc_attr( $xing ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php esc_html_e( 'vimeo URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" type="text" value="<?php echo esc_attr( $vimeo ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>"><?php esc_html_e( 'vk URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vk' ) ); ?>" type="text" value="<?php echo esc_attr( $vk ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>"><?php esc_html_e( 'github URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" type="text" value="<?php echo esc_attr( $github ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php esc_html_e( 'flickr URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" type="text" value="<?php echo esc_attr( $flickr ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'bitbucket' ) ); ?>"><?php esc_html_e( 'bitbucket URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bitbucket' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bitbucket' ) ); ?>" type="text" value="<?php echo esc_attr( $bitbucket ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'reddit' ) ); ?>"><?php esc_html_e( 'reddit URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'reddit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'reddit' ) ); ?>" type="text" value="<?php echo esc_attr( $reddit ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'steam' ) ); ?>"><?php esc_html_e( 'steam URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'steam' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'steam' ) ); ?>" type="text" value="<?php echo esc_attr( $steam ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitch' ) ); ?>"><?php esc_html_e( 'twitch URL:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitch' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitch' ) ); ?>" type="text" value="<?php echo esc_attr( $twitch ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = array();
		$instance['title']        = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['align_mobile'] = ( ! empty( $new_instance['align_mobile'] ) ) ? esc_attr( $new_instance['align_mobile'] ) : '';
		$instance['align_tablet'] = ( ! empty( $new_instance['align_tablet'] ) ) ? esc_attr( $new_instance['align_tablet'] ) : '';
		$instance['align']        = ( ! empty( $new_instance['align'] ) ) ? esc_attr( $new_instance['align'] ) : '';
		$instance['rb_hide']      = ( ! empty( $new_instance['rb_hide'] ) ) ? esc_attr( $new_instance['rb_hide'] ) : '';
		$instance['rb_color']     = ( ! empty( $new_instance['rb_color'] ) ) ? esc_attr( $new_instance['rb_color'] ) : '';
		$instance['facebook']     = ( ! empty( $new_instance['facebook'] ) ) ? esc_url_raw( $new_instance['facebook'] ) : '';
		$instance['instagram']    = ( ! empty( $new_instance['instagram'] ) ) ? esc_url_raw( $new_instance['instagram'] ) : '';
		$instance['twitter']      = ( ! empty( $new_instance['twitter'] ) ) ? esc_url_raw( $new_instance['twitter'] ) : '';
		$instance['linkedin']     = ( ! empty( $new_instance['linkedin'] ) ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
		$instance['youtube']      = ( ! empty( $new_instance['youtube'] ) ) ? esc_url_raw( $new_instance['youtube'] ) : '';
		$instance['tumblr']       = ( ! empty( $new_instance['tumblr'] ) ) ? esc_url_raw( $new_instance['tumblr'] ) : '';
		$instance['pinterest']    = ( ! empty( $new_instance['pinterest'] ) ) ? esc_url_raw( $new_instance['pinterest'] ) : '';
		$instance['dribbble']     = ( ! empty( $new_instance['dribbble'] ) ) ? esc_url_raw( $new_instance['dribbble'] ) : '';
		$instance['medium']       = ( ! empty( $new_instance['medium'] ) ) ? esc_url_raw( $new_instance['medium'] ) : '';
		$instance['sm500px']      = ( ! empty( $new_instance['sm500px'] ) ) ? esc_url_raw( $new_instance['sm500px'] ) : '';
		$instance['xing']         = ( ! empty( $new_instance['xing'] ) ) ? esc_url_raw( $new_instance['xing'] ) : '';
		$instance['vimeo']        = ( ! empty( $new_instance['vimeo'] ) ) ? esc_url_raw( $new_instance['vimeo'] ) : '';
		$instance['vk']           = ( ! empty( $new_instance['vk'] ) ) ? esc_url_raw( $new_instance['vk'] ) : '';
		$instance['github']       = ( ! empty( $new_instance['github'] ) ) ? esc_url_raw( $new_instance['github'] ) : '';
		$instance['flickr']       = ( ! empty( $new_instance['flickr'] ) ) ? esc_url_raw( $new_instance['flickr'] ) : '';
		$instance['bitbucket']    = ( ! empty( $new_instance['bitbucket'] ) ) ? esc_url_raw( $new_instance['bitbucket'] ) : '';
		$instance['reddit']       = ( ! empty( $new_instance['reddit'] ) ) ? esc_url_raw( $new_instance['reddit'] ) : '';
		$instance['steam']        = ( ! empty( $new_instance['steam'] ) ) ? esc_url_raw( $new_instance['steam'] ) : '';
		$instance['twitch']       = ( ! empty( $new_instance['title'] ) ) ? esc_url_raw( $new_instance['twitch'] ) : '';

		return $instance;
	}

}
