<?php
/**
 * RovenBlog: Archives widget template
 *
 * @package Roven-Blog
 */

/**
 * Adds Roven Blog: Social Networks List widget.
 */
class RB_Widget_Archives extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'rb_widget_archives', // Widget base ID.
			esc_html__( 'Roven Blog: Archives', 'roven-blog' ), // Widget name.
			array(
				'description' => esc_html__( 'Displays a list of Archives', 'roven-blog' ),
				'classname'   => 'rb-widget-archive',
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
		$title  = apply_filters( 'widget_title', $instance['title'] );
		$number = apply_filters( 'widget_number', $instance['number'] );

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		if ( 'number' === $number ) {
			$args_a = array(
				'type'            => 'monthly',
				'format'          => 'html',
				'show_post_count' => true,
				'echo'            => false,
			);
		} else {
			$args_a = array(
				'type'            => 'monthly',
				'format'          => 'html',
				'show_post_count' => false,
				'echo'            => false,
			);
		}

		$archives = wp_get_archives( $args_a );
		if ( '' !== $archives ) {
			?>
			<ul>
				<?php
				$archives = str_replace( '<a href', '<a class="rb-text-animation-2" href', $archives );
				$archives = str_replace( '&nbsp;(', '<span>', $archives );
				$archives = str_replace( ')</li>', '</span></li>', $archives );

				echo wp_kses_post( $archives );
				?>
			</ul>
			<?php
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="rb-sidebar-notice">
				<p><?php esc_html_e( 'This widget cannot display anything because there aren\'t any post archives. (this notice is visible only for logged in users that can add widgets)', 'roven-blog' ); ?></p>
			</div><!-- end .rb-sidebar-notice -->
			<?php
		}
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

		if ( isset( $instance['number'] ) ) {
			$number = $instance['number'];
		} else {
			$number = 'number';
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"<?php echo ( 'number' === $number ) ? ' checked' : ''; ?> value="number"><?php esc_html_e( 'Show number of posts?', 'roven-blog' ); ?>
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
		$instance           = array();
		$instance['title']  = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? esc_attr( $new_instance['number'] ) : '';
		return $instance;
	}

}
