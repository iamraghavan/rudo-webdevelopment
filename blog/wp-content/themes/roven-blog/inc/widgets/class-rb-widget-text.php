<?php
/**
 * RovenBlog: Text widget template
 *
 * @package Roven-Blog
 */

/**
 * Adds Roven Blog: Text widget.
 */
class RB_Widget_Text extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'rb_widget_text', // Widget base ID.
			esc_html__( 'Roven Blog: Text', 'roven-blog' ), // Widget name.
			array(
				'description' => esc_html__( 'Text editor and device alignment.', 'roven-blog' ),
				'classname'   => 'rb-widget-text',
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
		$title        = apply_filters( 'widget_title', $instance['title'] );
		$align        = apply_filters( 'widget_align', $instance['align'] );
		$align_mobile = apply_filters( 'widget_align_mobile', $instance['align_mobile'] );
		$align_tablet = apply_filters( 'widget_align_tablet', $instance['align_tablet'] );
		$rb_info      = apply_filters( 'widget_rb_info', $instance['rb_info'] );

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
		<div class="<?php echo esc_attr( $align_mobile . ' ' . $align_tablet . ' ' . $align ); ?>">

			<?php echo wp_kses_post( $rb_info ); ?>

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

		if ( isset( $instance['align'] ) ) {
			$align = $instance['align'];
		} else {
			$align = 'rb-text-align-left-desktop';
		}

		if ( isset( $instance['rb_info'] ) ) {
			$rb_info = $instance['rb_info'];
		} else {
			$rb_info = '';
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
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'rb_info' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rb_info' ) ); ?>" class="custom-widget-wp-editor"><?php echo wp_kses_post( $rb_info ); ?></textarea>
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
		$instance['rb_info']      = ( ! empty( $new_instance['rb_info'] ) ) ? wp_kses_post( $new_instance['rb_info'] ) : '';

		return $instance;
	}

}
