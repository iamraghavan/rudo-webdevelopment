<?php
/**
 *  RovenBlog_Title_Section Class Template
 *
 * @package Roven-Blog
 */

/**
 * Simple title section Custom Control.
 */
class RovenBlog_Title_Section extends WP_Customize_Section {

	/**
	 * The type of control being rendered.
	 *
	 *  @var $type - control type.
	 */
	public $type = 'rovenblog-title-section';

	/**
	 * Render the control in the customizer
	 */
	public function render() {
		?>
		<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="accordion-section rb-title-section">
			<?php
			if ( ! empty( $this->title ) ) {
				?>
				<h3><?php echo esc_html( $this->title ); ?></h3>
				<?php
			}
			if ( ! empty( $this->description ) ) {
				?>
				<span class="description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
		</li>
		<?php
	}
}
