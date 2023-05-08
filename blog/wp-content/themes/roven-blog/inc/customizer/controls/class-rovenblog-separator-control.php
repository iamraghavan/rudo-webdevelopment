<?php
/**
 *  RovenBlog_Separator_Control Class Template
 *
 * @package Roven-Blog
 */

/**
 * Generates a separator with title or divider for theme Customizer settings.
 */
class RovenBlog_Separator_Control extends WP_Customize_Control {

	/**
	 * The type of control being rendered.
	 *
	 *  @var $type - control type.
	 */
	public $type = 'rovenblog-separator-control';

	/**
	 * Determines if a divider should be added to the title.
	 *
	 *  @var $divider - divider parameter.
	 */
	public $divider = false;

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		// Title.
		if ( ! empty( $this->label ) ) {
			?>
			<h3 class="rb-customize-control-title"><?php echo esc_html( $this->label ); ?></h3>
			<?php
		}

		// Divider.
		if ( true === $this->divider ) {
			?>
			<hr />
			<?php
		}

		// Description.
		if ( ! empty( $this->description ) ) {
			?>
			<span class="rb-customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php
		}
	}
}
