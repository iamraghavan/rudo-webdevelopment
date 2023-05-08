<?php

if ( true === get_theme_mod( 'rovenblog_show_footer', true ) ) {
    // Start Middle Footer Area.
    $footer_cols = get_theme_mod( 'rovenblog_footer_cols', 'cols-1' );
    // The class for aligning the footer content vertically.
    
    if ( true === get_theme_mod( 'rovenblog_footer_vertical', false ) ) {
        $grid_class = $footer_cols . ' rb-grid-align-items-center';
    } else {
        $grid_class = $footer_cols;
    }
    
    $footer_class = '';
    // Add the footer fullwidth class.
    if ( true === get_theme_mod( 'rovenblog_footer_fullwidth', false ) ) {
        $footer_class = 'rb-stretch-fullwidth';
    }
    // Add the footer padding top class.
    if ( true === get_theme_mod( 'rovenblog_footer_padding', false ) ) {
        $footer_class .= ' rb-padding-top';
    }
    ?>
	<div id="rb-footer" class="<?php 
    echo  esc_attr( $footer_class ) ;
    ?>">

		<div id="rb-footer-content">

			<div class="rb-grid <?php 
    echo  esc_attr( $grid_class ) ;
    ?>">

				<div class="rb-grid-item">
					<?php 
    if ( is_active_sidebar( 'rovenblog-footer-1' ) ) {
        dynamic_sidebar( 'rovenblog-footer-1' );
    }
    ?>
				</div>

				<?php 
    
    if ( 'cols-1' !== $footer_cols ) {
        // Middle Footer second column.
        ?>
					<div class="rb-grid-item">
						<?php 
        if ( is_active_sidebar( 'rovenblog-footer-2' ) ) {
            dynamic_sidebar( 'rovenblog-footer-2' );
        }
        ?>
					</div>
					<?php 
    }
    
    
    if ( 'cols-3' === $footer_cols || 'cols-4' === $footer_cols ) {
        // Middle Footer third column.
        ?>
					<div class="rb-grid-item">
						<?php 
        if ( is_active_sidebar( 'rovenblog-footer-3' ) ) {
            dynamic_sidebar( 'rovenblog-footer-3' );
        }
        ?>
					</div>
					<?php 
    }
    
    
    if ( 'cols-4' === $footer_cols ) {
        // Middle Footer fourth column.
        ?>
					<div class="rb-grid-item">
						<?php 
        if ( is_active_sidebar( 'rovenblog-footer-4' ) ) {
            dynamic_sidebar( 'rovenblog-footer-4' );
        }
        ?>
					</div>
				<?php 
    }
    
    ?>
			</div><!-- end .rb-grid -->

		</div><!-- end #rb-footer-content -->

	</div><!-- end #rb-footer -->
	<?php 
}

$rb_copyright = true;
$rb_backlink = true;

if ( true === $rb_copyright ) {
    // Start Footer Copyright Area.
    $backlink_class = '';
    // Add the backlink fullwidth class.
    if ( true === get_theme_mod( 'rovenblog_backlink_fullwidth', false ) ) {
        $backlink_class = 'rb-stretch-fullwidth';
    }
    // Add the backlink padding top class.
    if ( true === get_theme_mod( 'rovenblog_backlink_padding', false ) ) {
        $backlink_class .= ' rb-padding-top';
    }
    // Add the backlink border class.
    
    if ( true === get_theme_mod( 'rovenblog_backlink_border', false ) ) {
        $backlink_class .= ' rb-border-top';
        // Add the backlink border fullwidth class.
        if ( true === get_theme_mod( 'rovenblog_backlink_border_fullwidth', false ) ) {
            $backlink_class .= ' rb-border-top-stretch-fullwidth';
        }
    }
    
    $rb_text = get_theme_mod( 'rovenblog_show_footer_copyright_text', esc_html__( 'Copyright &copy; 2023. All rights reserved', 'roven-blog' ) );
    ?>
	<div id="rb-backlink" class="<?php 
    echo  esc_attr( $backlink_class ) ;
    ?>">

		<div id="rb-backlink-content">

			<p class="rb-text-align-center">
				<?php 
    echo  esc_html( $rb_text ) ;
    
    if ( true === $rb_backlink ) {
        if ( '' !== trim( $rb_text ) ) {
            echo  ' | ' ;
        }
        printf( wp_kses(
            /* translators: 1: link to RovenThemes site. */
            __( 'Roven Blog by <a href="%1$s" target="_blank">RovenThemes</a>.', 'roven-blog' ),
            array(
                'a' => array(
                'href' => array(),
            ),
            )
        ), 'https://roventhemes.com/' );
    }
    
    ?>
			</p>

		</div><!-- end .rb-section-content -->	

	</div><!-- end #rb-backlink -->
<?php 
}

?>

</div><!-- end #rb-wrap -->

<div id="rb-site-overlay"></div>

<?php 
// Mobile Menu template.
get_template_part( 'template-parts/menus/mobile', 'menu' );
wp_footer();
?>
</body>
</html>
