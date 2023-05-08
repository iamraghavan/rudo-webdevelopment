<?php
/**
 * RovenBlog: Custom Logo widget template
 *
 * @package Roven-Blog
 */

/**
 * Adds Roven Blog: Custom Logo widget.
 */
class RB_Widget_Logo extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'rb_widget_logo', // Widget base ID.
			esc_html__( 'Roven Blog: Custom Logo', 'roven-blog' ), // Widget name.
			array(
				'description' => esc_html__( 'Displays a logo.', 'roven-blog' ),
				'classname'   => 'rb-widget-logo',
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
		$title           = apply_filters( 'widget_title', $instance['title'] );
		$align           = apply_filters( 'widget_align', $instance['align'] );
		$rb_link         = apply_filters( 'widget_rb_link', $instance['rb_link'] );
		$logo_id         = apply_filters( 'widget_rb_logo', $instance['rb_logo'] );
		$logo_dark_id    = apply_filters( 'widget_rb_logo_dm', $instance['rb_logo_dm'] );
		$logo2_id        = apply_filters( 'widget_rb_logo2', $instance['rb_logo2'] );
		$logo2_dark_id   = apply_filters( 'widget_rb_logo_dm2', $instance['rb_logo_dm2'] );
		$logo_default    = false;
		$logo_dark       = false;
		$logo_default_2x = false;
		$logo_dark_2x    = false;

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

		$rb_id_light = false;
		$rb_id_dark  = false;
		if ( false !== $logo2_id ) {
			$logo_data2 = wp_get_attachment_image_src( $logo2_id, 'full' );

			if ( false !== $logo_data2 ) {
				$logo_default_2x = $logo_data2[0];
				$logo_dark_2x    = $logo_data2[0];
				$logo_default    = $logo_data2[0];
				$logo_dark       = $logo_data2[0];
				$rb_id_light     = $logo2_id;
				$rb_id_dark      = $logo2_id;
			}
		}

		if ( false !== $logo_id ) {
			$logo_data = wp_get_attachment_image_src( $logo_id, 'full' );

			if ( false !== $logo_data ) {
				$logo_default = $logo_data[0];
				$logo_dark    = $logo_data[0];
				$rb_id_light  = $logo_id;
				$rb_id_dark   = $logo_id;
			}
		}

		if ( false !== $logo2_dark_id ) {
			$logo_dark_data2 = wp_get_attachment_image_src( $logo2_dark_id, 'full' );

			if ( false !== $logo_dark_data2 ) {
				$logo_dark_2x = $logo_dark_data2[0];
				$logo_dark    = $logo_dark_data2[0];
				$rb_id_dark   = $logo2_dark_id;
			}
		}

		if ( false !== $logo_dark_id ) {
			$logo_dark_data = wp_get_attachment_image_src( $logo_dark_id, 'full' );

			if ( false !== $logo_dark_data ) {
				$logo_dark  = $logo_dark_data[0];
				$rb_id_dark = $logo_dark_id;
			}
		}
		// Logo images alt text.
		if ( false !== $rb_id_light ) {
			$alt_light = get_post_meta( $rb_id_light, '_wp_attachment_image_alt', true );
		} else {
			$alt_light = false;
		}
		if ( false !== $rb_id_dark ) {
			$alt_dark = get_post_meta( $rb_id_dark, '_wp_attachment_image_alt', true );
		} else {
			$alt_dark = false;
		}
		?>
		<div class="<?php echo esc_attr( $align_mobile . ' ' . $align_tablet . ' ' . $align ); ?>">

			<a href="<?php echo ( $rb_link ) ? esc_url( $rb_link ) : '#'; ?>" aria-label="<?php esc_attr_e( 'Logo link', 'roven-blog' ); ?>">
			<?php
			if ( false !== $logo_dark && false !== $logo_dark_2x ) {
				?>
				<img loading="lazy" class="rb-widget-logo-dark-mode lozad" src="<?php echo esc_url( $logo_dark ); ?>" srcset="<?php echo esc_url( $logo_dark ); ?> 1x, <?php echo esc_url( $logo_dark_2x ); ?> 2x"<?php echo ( $alt_dark ) ? ' alt="' . esc_attr( $alt_dark ) . '"' : ''; ?>>
				<?php
			} elseif ( false !== $logo_dark ) {
				?>
				<img loading="lazy" class="rb-widget-logo-dark-mode lozad" src="<?php echo esc_url( $logo_dark ); ?>"<?php echo ( $alt_dark ) ? ' alt="' . esc_attr( $alt_dark ) . '"' : ''; ?>>
				<?php
			}

			if ( false !== $logo_default && false !== $logo_default_2x ) {
				?>
				<img loading="lazy" class="rb-widget-logo-light-mode lozad" src="<?php echo esc_url( $logo_default ); ?>" srcset="<?php echo esc_url( $logo_default ); ?> 1x, <?php echo esc_url( $logo_default_2x ); ?> 2x"<?php echo ( $alt_light ) ? ' alt="' . esc_attr( $alt_light ) . '"' : ''; ?>>
				<?php
			} elseif ( false !== $logo_default ) {
				?>
				<img loading="lazy" class="rb-widget-logo-light-mode lozad" src="<?php echo esc_url( $logo_default ); ?>"<?php echo ( $alt_light ) ? ' alt="' . esc_attr( $alt_light ) . '"' : ''; ?>>
				<?php
			}
			?>
			</a>

		</div>
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

		if ( isset( $instance['rb_link'] ) ) {
			$rb_link = $instance['rb_link'];
		} else {
			$rb_link = '';
		}

		if ( isset( $instance['rb_logo'] ) ) {
			$rb_logo = $instance['rb_logo'];
		} else {
			$rb_logo = '';
		}

		if ( isset( $instance['rb_logo_dm'] ) ) {
			$rb_logo_dm = $instance['rb_logo_dm'];
		} else {
			$rb_logo_dm = '';
		}

		if ( isset( $instance['rb_logo2'] ) ) {
			$rb_logo2 = $instance['rb_logo2'];
		} else {
			$rb_logo2 = '';
		}

		if ( isset( $instance['rb_logo_dm2'] ) ) {
			$rb_logo_dm2 = $instance['rb_logo_dm2'];
		} else {
			$rb_logo_dm2 = '';
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rb_link' ) ); ?>"><?php esc_html_e( 'Logo Link:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rb_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rb_link' ) ); ?>" type="text" value="<?php echo esc_attr( $rb_link ); ?>" />
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
		<?php
		$image_none = get_template_directory_uri() . '/assets/admin/images/placeholder.png';
		$image_path = get_template_directory_uri() . '/assets/admin/images/placeholder.png';

		if ( '' !== $rb_logo ) {
			$image_data = wp_get_attachment_image_src( $rb_logo, 'rovenblog-size-small' );
			if ( false !== $image_data ) {
				$image_path = $image_data[0];
			}
		}
		?>
		<p>
			<input name="<?php echo esc_attr( $this->get_field_name( 'rb_logo' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo' ) ); ?>" type="hidden" class="custom_upload_image" value="<?php echo esc_attr( $rb_logo ); ?>">
			<img name="<?php echo esc_attr( $this->get_field_name( 'rb_logo' ) ); ?>_img" src="<?php echo esc_url( $image_path ); ?>" class="rb_preview_image" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo' ) ); ?>_preview_image"><br>
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo' ) ); ?>_trigger" class="custom_upload_image_button button rovenblog_custom_image_upload_trigger" name="custom_upload_image_button" type="button" value="<?php esc_attr_e( 'Select Logo Image', 'roven-blog' ); ?>" onclick="rovenblog_upload_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo' ) ); ?>','<?php echo esc_attr( $this->get_field_name( 'rb_logo' ) ); ?>')">
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo' ) ); ?>_upload_input_clear" class="button rovenblog_clear_img custom_upload_image_button" value="<?php esc_attr_e( 'Remove Image', 'roven-blog' ); ?>" type="button" onclick="rovenblog_clear_image_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo' ) ); ?>', '<?php echo esc_attr( $image_none ); ?>')">
		</p>
		<?php
		$image_none = get_template_directory_uri() . '/assets/admin/images/placeholder.png';
		$image_path = get_template_directory_uri() . '/assets/admin/images/placeholder.png';

		if ( '' !== $rb_logo2 ) {
			$image_data = wp_get_attachment_image_src( $rb_logo2, 'rovenblog-size-small' );
			if ( false !== $image_data ) {
				$image_path = $image_data[0];
			}
		}
		?>
		<p>
			<input name="<?php echo esc_attr( $this->get_field_name( 'rb_logo2' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo2' ) ); ?>" type="hidden" class="custom_upload_image" value="<?php echo esc_attr( $rb_logo2 ); ?>">
			<img name="<?php echo esc_attr( $this->get_field_name( 'rb_logo2' ) ); ?>_img" src="<?php echo esc_url( $image_path ); ?>" class="rb_preview_image" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo2' ) ); ?>_preview_image"><br>
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo2' ) ); ?>_trigger" class="custom_upload_image_button button rovenblog_custom_image_upload_trigger" name="custom_upload_image_button" type="button" value="<?php esc_attr_e( 'Select Logo Retina Image', 'roven-blog' ); ?>" onclick="rovenblog_upload_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo2' ) ); ?>','<?php echo esc_attr( $this->get_field_name( 'rb_logo2' ) ); ?>')">
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo2' ) ); ?>_upload_input_clear" class="button rovenblog_clear_img custom_upload_image_button" value="<?php esc_attr_e( 'Remove Image', 'roven-blog' ); ?>" type="button" onclick="rovenblog_clear_image_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo2' ) ); ?>', '<?php echo esc_attr( $image_none ); ?>')">
		</p>
		<?php
		$image_none = get_template_directory_uri() . '/assets/admin/images/placeholder.png';
		$image_path = get_template_directory_uri() . '/assets/admin/images/placeholder.png';

		if ( '' !== $rb_logo_dm ) {
			$image_data = wp_get_attachment_image_src( $rb_logo_dm, 'rovenblog-size-small' );
			if ( false !== $image_data ) {
				$image_path = $image_data[0];
			}
		}
		?>
		<p>
			<input name="<?php echo esc_attr( $this->get_field_name( 'rb_logo_dm' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm' ) ); ?>" type="hidden" class="custom_upload_image" value="<?php echo esc_attr( $rb_logo_dm ); ?>">
			<img name="<?php echo esc_attr( $this->get_field_name( 'rb_logo_dm' ) ); ?>_img" src="<?php echo esc_url( $image_path ); ?>" class="rb_preview_image" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm' ) ); ?>_preview_image"><br>
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm' ) ); ?>_trigger" class="custom_upload_image_button button rovenblog_custom_image_upload_trigger" name="custom_upload_image_button" type="button" value="<?php esc_attr_e( 'Select Logo Dark Image', 'roven-blog' ); ?>" onclick="rovenblog_upload_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm' ) ); ?>','<?php echo esc_attr( $this->get_field_name( 'rb_logo_dm' ) ); ?>')">
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm' ) ); ?>_upload_input_clear" class="button rovenblog_clear_img custom_upload_image_button" value="<?php esc_attr_e( 'Remove Image', 'roven-blog' ); ?>" type="button" onclick="rovenblog_clear_image_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm' ) ); ?>', '<?php echo esc_attr( $image_none ); ?>')">
		</p>
		<?php
		$image_none = get_template_directory_uri() . '/assets/admin/images/placeholder.png';
		$image_path = get_template_directory_uri() . '/assets/admin/images/placeholder.png';

		if ( '' !== $rb_logo_dm2 ) {
			$image_data = wp_get_attachment_image_src( $rb_logo_dm2, 'rovenblog-size-small' );
			if ( false !== $image_data ) {
				$image_path = $image_data[0];
			}
		}
		?>
		<p>
			<input name="<?php echo esc_attr( $this->get_field_name( 'rb_logo_dm2' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm2' ) ); ?>" type="hidden" class="custom_upload_image" value="<?php echo esc_attr( $rb_logo_dm2 ); ?>">
			<img name="<?php echo esc_attr( $this->get_field_name( 'rb_logo_dm2' ) ); ?>_img" src="<?php echo esc_url( $image_path ); ?>" class="rb_preview_image" id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm2' ) ); ?>_preview_image"><br>
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm2' ) ); ?>_trigger" class="custom_upload_image_button button rovenblog_custom_image_upload_trigger" name="custom_upload_image_button" type="button" value="<?php esc_attr_e( 'Select Logo Retina Dark Image', 'roven-blog' ); ?>" onclick="rovenblog_upload_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm2' ) ); ?>','<?php echo esc_attr( $this->get_field_name( 'rb_logo_dm2' ) ); ?>')">
			<input id="<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm2' ) ); ?>_upload_input_clear" class="button rovenblog_clear_img custom_upload_image_button" value="<?php esc_attr_e( 'Remove Image', 'roven-blog' ); ?>" type="button" onclick="rovenblog_clear_image_trigger('<?php echo esc_attr( $this->get_field_id( 'rb_logo_dm2' ) ); ?>', '<?php echo esc_attr( $image_none ); ?>')">
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
		$instance['rb_link']      = ( ! empty( $new_instance['rb_link'] ) ) ? esc_url_raw( $new_instance['rb_link'] ) : '';
		$instance['rb_logo']      = ( ! empty( $new_instance['rb_logo'] ) ) ? absint( $new_instance['rb_logo'] ) : '';
		$instance['rb_logo_dm']   = ( ! empty( $new_instance['rb_logo_dm'] ) ) ? absint( $new_instance['rb_logo_dm'] ) : '';
		$instance['rb_logo2']     = ( ! empty( $new_instance['rb_logo2'] ) ) ? absint( $new_instance['rb_logo2'] ) : '';
		$instance['rb_logo_dm2']  = ( ! empty( $new_instance['rb_logo_dm2'] ) ) ? absint( $new_instance['rb_logo_dm2'] ) : '';

		return $instance;
	}

}
