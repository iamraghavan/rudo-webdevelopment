<?php

/**
 * Content of the "Demo Sites" tab.
 *
 * @package Roven-Blog
 */

if ( class_exists( 'OCDI_Plugin' ) ) {
    $rb_ocdi = true;
} else {
    $rb_ocdi = false;
}

?>
<!-- Demo Sites -->
<div id="rb-demosites">

	<!-- Card: One Click Demo Import Plugin is not activated -->
	<div id="rb-demosites-no-ocdi" class="<?php 
echo  ( $rb_ocdi ? 'rb-hide' : '' ) ;
?>">

		<h3><?php 
esc_html_e( 'Demo Sites', 'roven-blog' );
?></h3>

		<div class="rb-dashboard-card">
			<div class="rb-dashboard-card-content">

				<h4 class="rb-dashboard-card-title">
					<?php 
esc_html_e( 'Before you can import demo content', 'roven-blog' );
?>
				</h4>

				<p class="rb-dashboard-card-description">
					<?php 
echo  wp_kses( __( 'The theme requires the <strong>One Click Demo Import</strong> plugin to be installed and activated in order to be able to import demos.', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
				</p>

				<?php 

if ( file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) ) {
    ?>
					<div class="rb-notice rb-notice-warning">
						<p><?php 
    esc_html_e( 'The One Click Demo Import plugin is installed but not activated.', 'roven-blog' );
    ?></p>
					</div>
				<?php 
}

?>

				<div class="rb-dashboard-card-actions">

					<a class="button" href="#rb-plugins"> 
					<?php 
esc_html_e( 'Go to Plugins', 'roven-blog' );
?>
					</a>

				</div>

			</div>
		</div>

	</div><!-- end #rb-ocdi-unavailable -->

	<!-- Card: One Click Demo Import Plugin is activated -->
	<div id="rb-demosites-ocdi" class="<?php 
echo  ( $rb_ocdi ? '' : 'rb-hide' ) ;
?>">
		<h3><?php 
esc_html_e( 'Demo Sites', 'roven-blog' );
?></h3>

		<?php 

if ( !current_user_can( 'import' ) ) {
    ?>
			<div class="rb-notice rb-notice-error">
				<h2><?php 
    esc_html_e( 'You need a higher level of permission.', 'roven-blog' );
    ?></h2>
				<p><?php 
    esc_html_e( 'Sorry, you are not allowed to import content into this site.', 'roven-blog' );
    ?></p>
			</div>
		<?php 
}

?>

		<div class="rb-dashboard-card">
			<div class="rb-dashboard-card-content">

				<h4 class="rb-dashboard-card-title">
					<?php 
esc_html_e( 'Demos overview', 'roven-blog' );
?>
				</h4>

				<p class="rb-dashboard-card-description">
					<strong><?php 
esc_html_e( 'We strongly recommend you create a backup of your website before importing content!', 'roven-blog' );
?></strong>
				</p>

				<p><?php 
esc_html_e( 'There are 3 types of import options available:', 'roven-blog' );
?></p>

				<ol>
					<li>
						<?php 
echo  wp_kses( __( '<strong>Full Demo</strong> - imports demo content, customizer options and widgets. Any existing widgets prior to import are moved to Inactive Widgets. All theme customizer options are reset and the demo customizer options are imported. Any existing pages and posts are not affected in any way, the demo posts and pages are added on top.', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
					</li>
					<li>
						<?php 
echo  wp_kses( __( '<strong>Customizer Demo</strong> - only imports demo customizer settings with the exception of logo settings and ad settings. All theme customizer options are reset and the demo customizer options are imported. Doesn&rsquo;t add any content.', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
					</li>
					<li>
						<?php 
echo  wp_kses( __( '<strong>Color / Typography Customizer Demo</strong> - imports customizer settings related to typography and colors. Doesn&rsquo;t reset other customizer options. Doesn&rsquo;t add any content.', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
					</li>
				</ol>

				<p>
					<?php 
esc_html_e( 'If a demo requires additional plugins to be installed for it to fully import, you will be notified and be able to choose which plugins to install. The plugins chosen will automatically be installed and activated during import.', 'roven-blog' );
?>
				</p>

			</div>
		</div>
		<br>
		<h3><?php 
esc_html_e( 'Full Demos', 'roven-blog' );
?></h3>
		<?php 
// The theme rdemo cards will be generated based on this list.
$rb_demos = array(
    array(
    'name' => __( 'Free Demo Site 1', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/',
),
    array(
    'name' => __( 'Free Demo Site 2', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/demo2/',
),
    array(
    'name' => __( 'Free Demo Site 3', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/demo3/',
),
    array(
    'name' => __( 'Free Demo Site 4', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/demo4/',
),
    array(
    'name' => __( 'Pro Demo Site 1', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/main/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/',
),
    array(
    'name' => __( 'Pro Demo Site 2 - Fashion', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/fashion/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/fashion/',
),
    array(
    'name' => __( 'Pro Demo Site 3 - Food', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/food/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/food/',
),
    array(
    'name' => __( 'Pro Demo Site 4 - Tech', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/tech/full-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/tech/',
),
    array(
    'name' => __( 'Free Demo Site 1 (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/main/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/',
),
    array(
    'name' => __( 'Free Demo Site 2 (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo2/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/demo2/',
),
    array(
    'name' => __( 'Free Demo Site 3 (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo3/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/demo3/',
),
    array(
    'name' => __( 'Free Demo Site 4 (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/free/demo4/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/free/demo4/',
),
    array(
    'name' => __( 'Pro Demo Site 1 (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/main/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/',
),
    array(
    'name' => __( 'Pro Demo Site 2 - Fashion (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/fashion/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/fashion/',
),
    array(
    'name' => __( 'Pro Demo Site 3 - Food (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/food/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/food/',
),
    array(
    'name' => __( 'Pro Demo Site 4 - Tech (Customizer Only)', 'roven-blog' ),
    'img'  => 'https://rovenblog.roventhemes.com/1-0-x/importer/pro/tech/customizer-demo/preview.png',
    'site' => 'https://rovenblog.roventhemes.com/1-0-x/pro/tech/',
)
);
$theme_type = 'free';
$count = 0;
$limit1 = 8;
$limit2 = 3;
$limit3 = 11;
$limit4 = 15;
// Loop the theme demo cards.
foreach ( $rb_demos as $rb_demo ) {
    // Determine the Section title.
    
    if ( 0 === $count ) {
        echo  '<div class="rb-card-grid">' ;
    } elseif ( $limit1 === $count ) {
        echo  '</div><br><h3>' . esc_html__( 'Customizer Demos', 'roven-blog' ) . '</h3><div class="rb-card-grid">' ;
    }
    
    ?>
			<div class="rb-card-grid-item">

				<div class="rb-dashboard-card">
					<div class="rb-dashboard-card-header">

						<img src="<?php 
    echo  esc_url( $rb_demo['img'] ) ;
    ?>" alt="">

					</div>
					<div class="rb-dashboard-card-content">

						<h4 class="rb-dashboard-card-title">
							<?php 
    echo  esc_html( $rb_demo['name'] ) ;
    
    if ( $count > $limit2 && $count < $limit1 || $count > $limit3 && $count <= $limit4 ) {
        // Dsiplay the pro badge.
        ?>
								<span class="rb-badge rb-badge-pro"><?php 
        esc_html_e( 'PRO', 'roven-blog' );
        ?></span>
							<?php 
    }
    
    ?>
						</h4>

					</div>
					<div class="rb-dashboard-card-footer">
						<div class="rb-dashboard-card-left">

							<a class="rb-dashboard-link" href="<?php 
    echo  esc_url( $rb_demo['site'] ) ;
    ?>" target="_blank">
								<span><?php 
    esc_html_e( 'preview demo', 'roven-blog' );
    ?></span>
								<i class="dashicons dashicons-external"></i>
							</a>

						</div>

						<div class="rb-dashboard-card-right">

							<?php 
    // Check if this is the free theme variant, which demo import buttons should be available and if the current user is allowed to import.
    
    if ( ($count > $limit2 && $count < $limit1 || $count > $limit3 && $count <= $limit4) && 'free' === $theme_type ) {
        ?>
								<a class="rb-btn button-primary" href="https://roventhemes.com/theme/roven-blog-free-wordpress-blog-theme/#theme-pricing" target="_blank"> 
									<?php 
        esc_html_e( 'Upgrade to Pro', 'roven-blog' );
        ?>
								</a>
							<?php 
    } elseif ( !current_user_can( 'import' ) ) {
        ?>
								<button type="button" class="button button-disabled" disabled="disabled"><?php 
        esc_html_e( 'Cannot Import', 'roven-blog' );
        ?></button>
							<?php 
    } elseif ( 'free' === $theme_type && $count > $limit2 ) {
        ?>
								<a class="rb-btn button" href="<?php 
        echo  esc_url( admin_url( 'themes.php?page=one-click-demo-import&amp;step=import&amp;import=' . ($count - 4) ) ) ;
        ?>">
									<?php 
        esc_html_e( 'Import', 'roven-blog' );
        ?>
								</a>
							<?php 
    } else {
        ?>
								<a class="rb-btn button" href="<?php 
        echo  esc_url( admin_url( 'themes.php?page=one-click-demo-import&amp;step=import&amp;import=' . $count ) ) ;
        ?>">
									<?php 
        esc_html_e( 'Import', 'roven-blog' );
        ?>
								</a>
							<?php 
    }
    
    ?>
						</div>
					</div>
				</div><!-- end .rb-dashboard-card -->
			</div>
			<?php 
    $count++;
}
echo  '</div>' ;
?>
	</div><!-- end #rb-ocdi-available -->

</div><!-- end #rb-demosites -->
