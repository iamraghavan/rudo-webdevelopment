<?php
/**
 *  RovenBlog_Upsell_Message Class Template
 *
 * @package Roven-Blog
 */

/**
 * Simple title text Custom Control.
 */
class RovenBlog_Upsell_Message extends WP_Customize_Control {

	/**
	 * The type of control being rendered.
	 *
	 *  @var $type - control type.
	 */
	public $type = 'rovenblog-upsell';

	/**
	 * Defines the upsell link url.
	 *
	 *  @var $rb_link - theme upsell url.
	 */
	public $rb_link = 'https://roventhemes.com/theme/roven-blog-free-wordpress-blog-theme/#theme-pricing';

	/**
	 * Determines which button should be generated.
	 *
	 *  @var $mode - button type.
	 */
	public $mode = 0;

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
		<div class="rb-upsell-wrap">

			<?php
			if ( ! empty( $this->description ) ) {
				// Add the description title first.
				?>
				<p class="rb-customize-title">
					<?php
					if ( 1 === $this->mode ) {
						// Full pro features for the current section.
						esc_html_e( 'Take you blog to the next level with the powerful extra options available exclusively in Roven Blog Pro', 'roven-blog' );
					} else {
						// Partial pro features for the current section.
						esc_html_e( 'Take you blog to the next level with the powerful extra options available in Roven Blog Pro', 'roven-blog' );
					}
					?>
				</p>
				<?php
				if ( is_array( $this->description ) ) {
					// Feature list description.
					?>
					<ul class="rb-customize-pro-features">
						<?php
						// List the pro features of the current section.
						foreach ( $this->description as $rb_line ) {
							?>
							<li><?php echo esc_html( $rb_line ); ?></li>
							<?php
						}
						?>
					</ul>
					<?php
				} else {
					// Regular description.
					echo esc_html( $this->description );
				}
			}

			// Upsell button link.
			if ( ! empty( $this->rb_link ) ) {
				?>
				<a href="<?php echo esc_url( $this->rb_link ); ?>" role="button" class="rb-upsell-btn button-primary" target="_blank">
					<?php esc_html_e( 'Upgrade Now', 'roven-blog' ); ?>
				</a>
			<?php } ?>
		</div>
			<?php
	}
}
