<?php
/**
 * RovenBlog_Divider_Control Class Template
 *
 * @package Roven-Blog
 */

/**
 * Simple divider Custom Control
 */
class RovenBlog_Divider_Control extends WP_Customize_Control {

	/**
	 * The type of control being rendered.
	 *
	 *  @var $type - control type.
	 */
	public $type = 'rovenblog-divider-control';

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
		<hr class="rb-divider">
		<?php
	}
}
