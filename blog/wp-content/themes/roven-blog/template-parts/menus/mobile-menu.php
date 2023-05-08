<?php

/**
 * Template part for displaying mobile navigation menu
 *
 * @package Roven-Blog
 */
?>
<div id="rb-mobile-menu-wrap">

	<div id="rb-mobile-menu-content">

		<div id="rb-mobile-menu-content-inner">

			<div id="rb-mobile-menu" class="menu">
				<?php 

if ( has_nav_menu( 'rovenblog-nav-menu4' ) ) {
    // Mobile navigation menu.
    wp_nav_menu( array(
        'theme_location' => 'rovenblog-nav-menu4',
        'container'      => false,
    ) );
} elseif ( current_user_can( 'edit_theme_options' ) ) {
    // No menu was assigned, notify via message only the users who can assign nav menus.
    ?>
					<div class="rb-navmenu-notice">
						<p><?php 
    esc_html_e( 'No menu assigned to this display location. Assign a menu', 'roven-blog' );
    ?> 
						<a href="<?php 
    echo  esc_url( admin_url( 'nav-menus.php' ) ) ;
    ?>"><?php 
    esc_html_e( 'visit Menus edit page', 'roven-blog' );
    ?></a> 
						<?php 
    esc_html_e( '(this notice is visible only for logged in users that can assign menus)', 'roven-blog' );
    ?></p>
					</div>
					<?php 
}

?>
			</div><!-- end .menu -->

			<?php 
?>

		</div><!-- end #rb-mobile-menu-content-inner -->

	</div><!-- end #rb-mobile-menu-content -->

	<div id="rb-mobile-menu-header">

		<a id="rb-mobile-menu-close" href="#" aria-label="<?php 
esc_attr_e( 'Close Mobile Menu', 'roven-blog' );
?>"><i class="rovenblog-icon-x"></i></a>

	</div><!-- end #rb-mobile-menu-header -->

</div><!-- end #rb-mobile-menu-wrap -->
