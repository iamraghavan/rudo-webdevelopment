<?php
/**
 * RovenBlog: Widget Posts template
 *
 * @package Roven-Blog
 */

/**
 * Adds Roven Blog: Social Networks List widget.
 */
class RB_Widget_Posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'rb_widget_posts', // Widget base ID.
			esc_html__( 'Roven Blog: Posts', 'roven-blog' ), // Widget name.
			array(
				'description' => esc_html__( 'Displays a list of posts', 'roven-blog' ),
				'classname'   => 'rb-widget-posts',
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
		$title   = apply_filters( 'widget_title', $instance['title'] );
		$count   = apply_filters( 'widget_count', $instance['count'] );
		$type    = apply_filters( 'widget_type', $instance['type'] );
		$style   = apply_filters( 'widget_style', $instance['style'] );
		$thumb   = apply_filters( 'widget_thumb', $instance['thumb'] );
		$date    = apply_filters( 'widget_date', $instance['date'] );
		$categ   = apply_filters( 'widget_categ', $instance['categ'] );
		$author  = apply_filters( 'widget_author', $instance['author'] );
		$p_tag   = apply_filters( 'widget_p_tag', $instance['p_tag'] );
		$p_categ = apply_filters( 'widget_p_categ', $instance['p_categ'] );

		// Version 1.3.0 fallback for the new category options.
		if ( ! isset( $instance['exclude'] ) ) {
			$instance['exclude'] = '';
		}
		$exclude = apply_filters( 'widget_exclude', $instance['exclude'] );

		if ( 'boxed' === $style ) {
			$ul_class = 'rb-widget-posts-boxed';
		} elseif ( 'line' === $style ) {
			$ul_class = 'rb-widget-posts-line';
		} else {
			$ul_class = 'rb-widget-posts-standard';
		}

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		$args_w = rovenblog_posts_args( $type, $count, 'widget', false, $p_tag, $p_categ );

		if ( 'exclude' === $exclude ) {
			global $rb_widgets;
			// Set posts to exclude based on the stored IDs.
			if ( ! empty( $rb_widgets ) ) {
				$args_w['post__not_in'] = $rb_widgets;
			}
		}

		$query_posts = new WP_Query( $args_w );
		if ( $query_posts->have_posts() ) {
			?>
			<ul class="<?php echo esc_attr( $ul_class ); ?>">
				<?php
				while ( $query_posts->have_posts() ) {
					$query_posts->the_post();
					// Store each post ID for query exclusion.
					if ( 'exclude' === $exclude ) {
						$rb_widgets[] = get_the_ID();
					}
					?>
					<li>
						<?php if ( has_post_thumbnail() && 'thumb' === $thumb ) { ?>
							<div class="rb-widget-posts-thumbnail-wrap">

								<a href="<?php the_permalink(); ?>" aria-label="<?php esc_attr_e( 'Post Featured Image', 'roven-blog' ); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'lozad' ) ); ?></a>

							</div><!-- end .rb-widget-posts-thumbnail-wrap -->
						<?php } ?>

						<div class="rb-widget-posts-content-wrap">

							<?php
							if ( has_category() && 'categ' === $categ ) {
								$p_categ = get_the_terms( get_the_ID(), 'category' );
								?>
								<div class="rb-widget-posts-meta">
									<span class="rb-widget-posts-meta-category"><a href="<?php echo esc_url( get_term_link( $p_categ[0]->term_id, 'category' ) ); ?>"><?php echo esc_html( $p_categ[0]->name ); ?></a></span>
								</div>
								<?php
							}

							if ( ! empty( trim( get_the_title() ) ) ) {
								?>
								<h6 class="rb-widget-posts-title">
									<a class="rb-text-animation-2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h6>
								<?php
							}

							if ( 'author' === $author || 'date' === $date ) {
								?>
								<div class="rb-widget-posts-meta">
									<?php if ( 'date' === $date ) { ?>
										<span class="rb-widget-posts-meta-date"><i class="rovenblog-icon-calendar"></i> <?php echo get_the_date(); ?></span>
										<?php
									}
									if ( 'author' === $author ) {
										?>
										<span class="rb-widget-posts-meta-author"><i class="rovenblog-icon-user"></i> <?php the_author_posts_link(); ?></span>
									<?php } ?>
								</div>
							<?php } ?>

						</div><!-- end .rb-widget-posts-content-wrap -->
					</li>
					<?php
				}
				wp_reset_postdata();
				?>
			</ul>
			<?php
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="rb-sidebar-notice">
				<p><?php esc_html_e( 'There aren\'t any posts or posts that match the widgets display criteria. (this notice is visible only for logged in users that can add widgets)', 'roven-blog' ); ?></p>
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

		if ( isset( $instance['count'] ) ) {
			$count = $instance['count'];
		} else {
			$count = 4;
		}

		if ( isset( $instance['type'] ) ) {
			$type = $instance['type'];
		} else {
			$type = 'recent';
		}

		if ( isset( $instance['style'] ) ) {
			$style = $instance['style'];
		} else {
			$style = 'standard';
		}

		if ( isset( $instance['thumb'] ) ) {
			$thumb = $instance['thumb'];
		} else {
			$thumb = 'thumb';
		}

		if ( isset( $instance['date'] ) ) {
			$date = $instance['date'];
		} else {
			$date = 'date';
		}

		if ( isset( $instance['categ'] ) ) {
			$categ = $instance['categ'];
		} else {
			$categ = '';
		}

		if ( isset( $instance['author'] ) ) {
			$author = $instance['author'];
		} else {
			$author = '';
		}

		if ( isset( $instance['p_categ'] ) ) {
			$p_categ = $instance['p_categ'];
		} else {
			$p_categ = '';
		}

		if ( isset( $instance['p_tag'] ) ) {
			$p_tag = $instance['p_tag'];
		} else {
			$p_tag = '';
		}

		if ( isset( $instance['exclude'] ) ) {
			$exclude = $instance['exclude'];
		} else {
			$exclude = '';
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'roven-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'roven-blog' ); ?></label>
			<input type="number" min="1" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" value="<?php echo intval( $count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php esc_html_e( 'What posts to show:', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>">
				<option value="recent-posts"<?php echo ( 'recent' === $type ) ? ' selected' : ''; ?>><?php esc_html_e( 'recent posts', 'roven-blog' ); ?></option>
				<option value="popular-posts"<?php echo ( 'popular' === $type ) ? ' selected' : ''; ?>><?php esc_html_e( 'popular posts', 'roven-blog' ); ?></option>
				<option value="category-posts"<?php echo ( 'category' === $type ) ? ' selected' : ''; ?>><?php esc_html_e( 'posts from category', 'roven-blog' ); ?></option>
				<option value="tag-posts"<?php echo ( 'tag' === $type ) ? ' selected' : ''; ?>><?php esc_html_e( 'posts from tag', 'roven-blog' ); ?></option>
			</select> 
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Display style:', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
				<option value="standard"<?php echo ( 'standard' === $style ) ? ' selected' : ''; ?>><?php esc_html_e( 'standard', 'roven-blog' ); ?></option>
				<option value="boxed"<?php echo ( 'boxed' === $style ) ? ' selected' : ''; ?>><?php esc_html_e( 'boxed', 'roven-blog' ); ?></option>
				<option value="line"<?php echo ( 'line' === $style ) ? ' selected' : ''; ?>><?php esc_html_e( 'line separator', 'roven-blog' ); ?></option>
			</select> 
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'thumb' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb' ) ); ?>"<?php echo ( 'thumb' === $thumb ) ? ' checked' : ''; ?> value="thumb"><?php esc_html_e( 'Display post featured image?', 'roven-blog' ); ?>
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date' ) ); ?>"<?php echo ( 'date' === $date ) ? ' checked' : ''; ?> value="date"><?php esc_html_e( 'Display post date?', 'roven-blog' ); ?>
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'categ' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'categ' ) ); ?>"<?php echo ( 'categ' === $categ ) ? ' checked' : ''; ?> value="categ"><?php esc_html_e( 'Display post category?', 'roven-blog' ); ?>
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author' ) ); ?>"<?php echo ( 'author' === $author ) ? ' checked' : ''; ?> value="author"><?php esc_html_e( 'Display post author?', 'roven-blog' ); ?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'p_tag' ) ); ?>"><?php esc_html_e( 'Tag (used if "posts from tag" option was selected in "What posts to show"):', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'p_tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'p_tag' ) ); ?>">
				<?php
				$tags_list = get_tags( 'post_tag' );

				if ( ! empty( $tags_list ) ) {

					foreach ( $tags_list as $term ) {
						if ( '' === $p_tag ) {
							$p_tag = $term->term_id;
						}
						?>
						<option value="<?php echo esc_attr( $term->term_id ); ?>"<?php echo ( $term->term_id === $p_tag ) ? ' selected' : ''; ?>><?php echo esc_html( $term->name ); ?></option>
						<?php
					}
				} else {
					?>
					<option value="none" selected><?php esc_html_e( 'There are no post tags.', 'roven-blog' ); ?></option>
					<?php
				}
				?>
			</select> 
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'p_categ' ) ); ?>"><?php esc_html_e( 'Category (used if "posts from category" option was selected in "What posts to show"):', 'roven-blog' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'p_categ' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'p_categ' ) ); ?>">
				<?php
				$categ_list = get_categories( array( 'post_type' => 'post' ) );

				if ( ! empty( $categ_list ) ) {
					foreach ( $categ_list as $categ ) {
						if ( '' === $p_categ ) {
							$p_categ = $categ->term_id;
						}
						?>
						<option value="<?php echo esc_attr( $categ->term_id ); ?>"<?php echo ( $categ->term_id === $p_categ ) ? ' selected' : ''; ?>><?php echo esc_html( $categ->name ); ?></option>
						<?php
					}
				} else {
					?>
					<option value="none" selected><?php esc_html_e( 'There are no post categories.', 'roven-blog' ); ?></option>
					<?php
				}
				?>
			</select> 
		</p>
		<p>
			<input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'exclude' ) ); ?>"<?php echo ( 'exclude' === $exclude ) ? ' checked' : ''; ?> value="exclude">
			<?php esc_html_e( 'Only show unique content (Checking this options makes sure that the posts displayed by this widget are not repeated in other post widgets that also have this option checked). Note: To see the effect of this option you need to check the frontend version of the website.', 'roven-blog' ); ?>
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
		$instance            = array();
		$instance['title']   = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['count']   = ( ! empty( $new_instance['count'] ) ) ? absint( $new_instance['count'] ) : '';
		$instance['type']    = ( ! empty( $new_instance['type'] ) ) ? esc_attr( $new_instance['type'] ) : '';
		$instance['style']   = ( ! empty( $new_instance['style'] ) ) ? esc_attr( $new_instance['style'] ) : '';
		$instance['thumb']   = ( ! empty( $new_instance['thumb'] ) ) ? esc_attr( $new_instance['thumb'] ) : '';
		$instance['date']    = ( ! empty( $new_instance['date'] ) ) ? esc_attr( $new_instance['date'] ) : '';
		$instance['categ']   = ( ! empty( $new_instance['categ'] ) ) ? esc_attr( $new_instance['categ'] ) : '';
		$instance['author']  = ( ! empty( $new_instance['author'] ) ) ? esc_attr( $new_instance['author'] ) : '';
		$instance['p_tag']   = ( ! empty( $new_instance['p_tag'] ) ) ? absint( $new_instance['p_tag'] ) : '';
		$instance['p_categ'] = ( ! empty( $new_instance['p_categ'] ) ) ? absint( $new_instance['p_categ'] ) : '';
		$instance['exclude'] = ( ! empty( $new_instance['exclude'] ) ) ? esc_attr( $new_instance['exclude'] ) : '';

		return $instance;
	}

}
