<?php
/**
 * RovenBlog: Categories widget template
 *
 * @package Roven-Blog
 */

/**
 * Adds Roven Blog: Social Networks List widget.
 */
class RB_Widget_Categories extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'rb_widget_categories', // Widget base ID.
			esc_html__( 'Roven Blog: Categories', 'roven-blog' ), // Widget name.
			array(
				'description' => esc_html__( 'Displays a list of all the post categories', 'roven-blog' ),
				'classname'   => 'rb-widget-categories',
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
		$categ  = apply_filters( 'widget_categ', $instance['categ'] );
		$parent = apply_filters( 'widget_parent', $instance['parent'] );

		// Version 1.3.0 fallback for the new category options.
		if ( ! isset( $instance['categories'] ) ) {
			$instance['categories'] = '';
		}
		if ( ! isset( $instance['limited'] ) ) {
			$instance['limited'] = '';
		}
		$selected = apply_filters( 'widget_categories', $instance['categories'] );
		$limited  = apply_filters( 'widget_limited', $instance['limited'] );

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		if ( 'limited' === $limited ) {
			$categories = array();
			foreach ( $selected as $c_id ) {
				$c_obj = get_category( $c_id );
				if ( $c_obj ) {
					$categories[] = $c_obj;
				}
			}
		} else {
			if ( 'categ' === $categ ) {
				$args_c = array(
					'post_type'  => 'post',
					'hide_empty' => false,
					'pad_counts' => true,
				);
			} else {
				$args_c = array( 'post_type' => 'post' );
			}

			if ( 'parent' === $parent ) {
				$args_c['parent'] = 0;
			}

			$categories = get_categories( $args_c );
		}
		if ( ! empty( $categories ) ) {
			?>
			<ul>
				<?php
				if ( 'number' === $number ) {
					foreach ( $categories as $category ) {
						?>
						<li><a class="rb-text-animation-2" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a> <span><?php echo esc_html( $category->category_count ); ?></span></li>
						<?php
					}
				} else {
					foreach ( $categories as $category ) {
						?>
						<li><a class="rb-text-animation-2" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
						<?php
					}
				}
				?>
			</ul>
			<?php
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="rb-sidebar-notice">
				<p><?php esc_html_e( 'This widget cannot display anything because the selected categories were removed. (this notice is visible only for logged in users that can add widgets)', 'roven-blog' ); ?></p>
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

		if ( isset( $instance['categ'] ) ) {
			$categ = $instance['categ'];
		} else {
			$categ = '';
		}

		if ( isset( $instance['number'] ) ) {
			$number = $instance['number'];
		} else {
			$number = 'number';
		}

		if ( isset( $instance['parent'] ) ) {
			$parent = $instance['parent'];
		} else {
			$parent = '';
		}

		if ( isset( $instance['categories'] ) ) {
			$categories = $instance['categories'];
		} else {
			$categories = '';
		}

		if ( isset( $instance['limited'] ) ) {
			$limited = $instance['limited'];
		} else {
			$limited = '';
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'categ' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'categ' ) ); ?>"<?php echo ( 'categ' === $categ ) ? ' checked' : ''; ?> value="categ"><?php esc_html_e( 'Display empty categories?', 'roven-blog' ); ?>
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"<?php echo ( 'number' === $number ) ? ' checked' : ''; ?> value="number"><?php esc_html_e( 'Show number of posts?', 'roven-blog' ); ?>
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'parent' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'parent' ) ); ?>"<?php echo ( 'parent' === $parent ) ? ' checked' : ''; ?> value="parent"><?php esc_html_e( 'Show parent categories only?', 'roven-blog' ); ?>
		</p>
		<?php
		$categ_list = get_categories(
			array(
				'post_type'  => 'post',
				'hide_empty' => false,
				'pad_counts' => true,
			)
		);
		if ( ! empty( $categ_list ) ) {
			?>
			<p>
				<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limited' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limited' ) ); ?>"<?php echo ( 'limited' === $limited ) ? ' checked' : ''; ?> value="limited"><?php esc_html_e( 'Show only the selected categories', 'roven-blog' ); ?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>"><?php esc_html_e( 'Selected Categories:', 'roven-blog' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'categories' ) ); ?>[]" multiple="multiple">
					<?php foreach ( $categ_list as $category ) { ?>
						<option value="<?php echo esc_attr( $category->term_id ); ?>"<?php echo ( in_array( $category->term_id, $categories, true ) ) ? ' selected' : ''; ?>><?php echo esc_html( $category->name ); ?></option>
					<?php } ?>
				</select>
				<span><?php esc_html_e( 'Multiple categories can be selected by pressing CTRL + Click or Shift + Click', 'roven-blog' ); ?></span>
			</p>
			<?php
		}
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
		$instance               = array();
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['number']     = ( ! empty( $new_instance['number'] ) ) ? esc_attr( $new_instance['number'] ) : '';
		$instance['categ']      = ( ! empty( $new_instance['categ'] ) ) ? esc_attr( $new_instance['categ'] ) : '';
		$instance['parent']     = ( ! empty( $new_instance['parent'] ) ) ? esc_attr( $new_instance['parent'] ) : '';
		$instance['categories'] = ( ! empty( $new_instance['categories'] ) ) ? esc_sql( $new_instance['categories'] ) : '';
		$instance['limited']    = ( ! empty( $new_instance['limited'] ) ) ? esc_attr( $new_instance['limited'] ) : '';

		return $instance;
	}

}
