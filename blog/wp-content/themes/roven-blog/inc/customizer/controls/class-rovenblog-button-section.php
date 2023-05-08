<?php
/**
 *  RovenBlog_Button_Section Class Template
 *
 * @package Roven-Blog
 */

/**
 * Simple button section Custom Control.
 */
class RovenBlog_Button_Section extends WP_Customize_Section {

	/**
	 * The type of control being rendered.
	 *
	 *  @var $type - control type.
	 */
	public $type = 'rovenblog-title-section';

	/**
	 * Determines which button should be generated.
	 *
	 *  @var $mode - button type.
	 */
	public $mode = 0;

	/**
	 * Render the control in the customizer
	 */
	public function render() {
		?>
		<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="accordion-section rb-title-section">
			<?php
			if ( 1 === $this->mode ) {
				// Generate Kirki install/activate message and redirect button.
				?>
				<span class="rb-customize-section-description">
					<?php esc_html_e( 'In order to be able to customize the theme you must first install and activate the Kirki Customizer Framework plugin.', 'roven-blog' ); ?>
				</span>

				<a href="<?php echo esc_url( admin_url( 'themes.php?page=rovenblog_welcome#rb-plugins' ) ); ?>" role="button" class="rb-discover-btn button-primary">
					<?php esc_html_e( 'Go to Theme Dashboard > Plugins', 'roven-blog' ); ?>
				</a>
				<?php
			} else {
				// Generate upsell message and button.
				?>
				<span class="rb-customize-section-description">
					<?php esc_html_e( 'More options available in Roven Blog Pro!', 'roven-blog' ); ?>
				</span>

				<a href="https://roventhemes.com/theme/roven-blog-free-wordpress-blog-theme/#theme-pricing" role="button" class="rb-discover-btn button-primary" target="_blank">
					<?php esc_html_e( 'Upgrade Now', 'roven-blog' ); ?>
				</a>
			<?php } ?>
		</li>
		<?php
	}
}
