<?php
/**
 * The sidebar used for author page
 *
 * @package Roven-Blog
 */

?>
<div id="rb-sidebar-content">
	<?php
	// Check if the sidebar has widgets to display and the current user can add widgets.
	if ( ! is_active_sidebar( 'rovenblog-sidebar-author' ) && current_user_can( 'edit_theme_options' ) ) {
		?>
		<div class="rb-sidebar-notice">

			<p><?php esc_html_e( "The Author Page Sidebar doesn't have any widgets to display. Add widgets", 'roven-blog' ); ?> <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'visit Widgets Area', 'roven-blog' ); ?></a></p>

		</div><!-- end .rb-sidebar-notice -->
		<?php
	} else {
		dynamic_sidebar( 'rovenblog-sidebar-author' );
	}
	?>
</div><!-- end #rb-sidebar-content -->
