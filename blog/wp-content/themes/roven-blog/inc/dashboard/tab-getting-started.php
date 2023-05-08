<?php

/**
 * Content of the "Getting Started" tab.
 *
 * @package Roven-Blog
 */
$theme_type = 'free';
$theme_name = __( 'Roven Blog', 'roven-blog' );
$rb_whitelabel = false;
// Check if the One Click Demo Import plugin is active.

if ( class_exists( 'OCDI_Plugin' ) ) {
    $rb_ocdi = true;
} else {
    $rb_ocdi = false;
}

// Check if the Kirki Framework plugin is active.

if ( class_exists( 'Kirki' ) ) {
    $rb_kirki = true;
} else {
    $rb_kirki = false;
}

?>
<div id="rb-gettingstarted">

	<h3><?php 
esc_html_e( 'Getting Started', 'roven-blog' );
?></h3>

	<div class="rb-card-grid">
		<div class="rb-card-grid-item"> 

			<div class="rb-dashboard-card">
				<div class="rb-dashboard-card-content">

					<h4 class="rb-dashboard-card-title">
						<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-plugins.png' ) ;
?>" alt="">
						<?php 
esc_html_e( 'Install required and recommended plugins', 'roven-blog' );
?>
					</h4>

					<?php 
// Check if the current user can isntall plugins and display relevant messages.

if ( current_user_can( 'install_plugins' ) ) {
    ?>
						<p class="rb-dashboard-card-description">
							<?php 
    /* translators: %s: theme name. */
    echo  esc_html( sprintf( __( 'The first thing you should do after installing and activating the %s theme is to install and activate the required plugins along with other plugins you might need.', 'roven-blog' ), $theme_name ) ) ;
    ?>
						</p>

						<div class="rb-dashboard-card-actions">

							<a class="button" href="#rb-plugins"><?php 
    esc_html_e( ' Go to Plugins ', 'roven-blog' );
    ?></a>

						</div>
					<?php 
} else {
    ?>
						<div class="rb-notice rb-notice-error">
							<h2><?php 
    esc_html_e( 'You need a higher level of permission.', 'roven-blog' );
    ?></h2>
							<p><?php 
    esc_html_e( 'Sorry, you are not allowed to install plugins on this site.', 'roven-blog' );
    ?></p>
						</div>
					<?php 
}

?>

				</div>
			</div><!-- end .rb-dashboard-card -->	
		</div>
		<div class="rb-card-grid-item"> 

			<!-- Customizer quicklinks, kirki installed-->
			<div id="rb-card-customizer-kirki" class="rb-dashboard-card<?php 
echo  ( $rb_kirki ? '' : ' rb-hide' ) ;
?>">
				<div class="rb-dashboard-card-content">

					<h4 class="rb-dashboard-card-title">
						<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-customizer.png' ) ;
?>" alt="">
						<?php 
esc_html_e( 'Customizer quick links', 'roven-blog' );
?>
					</h4>

					<?php 

if ( current_user_can( 'customize' ) ) {
    ?>
						<div class="rb-dashboard-card-actions">

							<ul>
								<li><a href="<?php 
    echo  esc_url( admin_url( '/customize.php?autofocus[section]=rovenblog_header' ) ) ;
    ?>"><?php 
    esc_html_e( 'Upload Logo ', 'roven-blog' );
    ?></a></li>
								<li><a href="<?php 
    echo  esc_url( admin_url( '/customize.php?autofocus[section]=rovenblog_color_settings' ) ) ;
    ?>"><?php 
    esc_html_e( 'Customize Colors ', 'roven-blog' );
    ?></a></li>
								<li><a href="<?php 
    echo  esc_url( admin_url( '/customize.php?autofocus[section]=rovenblog_font_settings' ) ) ;
    ?>"><?php 
    esc_html_e( 'Customize Typography ', 'roven-blog' );
    ?></a></li>
								<li><a href="<?php 
    echo  esc_url( admin_url( '/customize.php?autofocus[section]=rovenblog_theme_settings' ) ) ;
    ?>"><?php 
    esc_html_e( 'General Theme Options ', 'roven-blog' );
    ?></a></li>
								<li><a href="<?php 
    echo  esc_url( admin_url( '/customize.php?autofocus[section]=rovenblog_header' ) ) ;
    ?>"><?php 
    esc_html_e( 'Header Options ', 'roven-blog' );
    ?></a></li>
								<li><a href="<?php 
    echo  esc_url( admin_url( '/customize.php?autofocus[section]=rovenblog_footer' ) ) ;
    ?>"><?php 
    esc_html_e( 'Footer Options ', 'roven-blog' );
    ?></a></li>
								<li><a href="<?php 
    echo  esc_url( admin_url( '/customize.php?autofocus[section]=rovenblog_post_settings' ) ) ;
    ?>"><?php 
    esc_html_e( 'Post Settings ', 'roven-blog' );
    ?></a></li>
							</ul>

						</div>
					<?php 
} else {
    ?>
						<div class="rb-notice rb-notice-error">
							<p><?php 
    esc_html_e( 'We have detected that your user type isn\'t allowed to update Customizer settings. If you set it up, then the easiest way to fix this is to make sure it is an administrator. If someone else set it up for you, contact them regarding this.', 'roven-blog' );
    ?></p>
						</div>
					<?php 
}

?>
				</div>
			</div><!-- end .rb-dashboard-card -->

			<!-- Customizer quicklinks, kirki not installed  -->
			<div id="rb-card-customizer-no-kirki" class="rb-dashboard-card<?php 
echo  ( $rb_kirki ? ' rb-hide' : '' ) ;
?>">
				<div class="rb-dashboard-card-content">

					<h4 class="rb-dashboard-card-title">
						<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-customizer.png' ) ;
?>" alt="">
						<?php 
esc_html_e( 'Customizer quick links', 'roven-blog' );
?>
					</h4>

					<p class="rb-dashboard-card-description">
						<?php 
echo  wp_kses( __( 'In order to be able to customize the theme you must first install and activate the <strong>Kirki Customizer Framework</strong> plugin.', 'roven-blog' ), array(
    'strong' => array(),
) ) ;
?>
					</p>

					<?php 

if ( file_exists( WP_PLUGIN_DIR . '/kirki/kirki.php' ) ) {
    ?>
						<div class="rb-notice rb-notice-warning">
							<p><?php 
    esc_html_e( 'The Kirki Customizer Framework plugin is installed but not activated.', 'roven-blog' );
    ?></p>
						</div>
					<?php 
}

?>

					<div class="rb-dashboard-card-actions">

						<a class="button" href="#rb-plugins"><?php 
esc_html_e( ' Go to Plugins ', 'roven-blog' );
?></a>

					</div>

				</div>
			</div><!-- end .rb-dashboard-card -->

		</div><!-- end .rb-card-grid-item -->

		<?php 

if ( !$rb_whitelabel ) {
    ?>
			<div class="rb-card-grid-item"> 
				<!-- Demo Sites, one click demo import installed-->
				<div id="rb-card-demosites-ocdi" class="rb-dashboard-card<?php 
    echo  ( $rb_ocdi ? '' : ' rb-hide' ) ;
    ?>">
					<div class="rb-dashboard-card-content">

						<h4 class="rb-dashboard-card-title">
							<img src="<?php 
    echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-demos-import.png' ) ;
    ?>" alt="">

							<?php 
    esc_html_e( 'Demo sites', 'roven-blog' );
    ?>
						</h4>

						<?php 
    
    if ( current_user_can( 'import' ) ) {
        ?>
							<p class="rb-dashboard-card-description">
								<?php 
        
        if ( 'free' === $theme_type ) {
            esc_html_e( 'Roven Blog comes with a variety of demos that you can import in order to jumpstart you site development. Upgrade to the PRO version of the theme to instantly unlock all demos.', 'roven-blog' );
        } else {
            esc_html_e( 'Roven Blog comes with a variety of demos that you can import in order to jumpstart you site development.', 'roven-blog' );
        }
        
        ?>
							</p>

							<div class="rb-dashboard-card-actions">

								<a class="button" href="#rb-demosites"><?php 
        esc_html_e( ' Go to Demos ', 'roven-blog' );
        ?></a>

							</div>
						<?php 
    } else {
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

					</div>
				</div><!-- end .rb-dashboard-card -->

				<!-- Demo Sites, one click demo import not installed  -->
				<div id="rb-card-demosites-no-ocdi" class="rb-dashboard-card<?php 
    echo  ( $rb_ocdi ? ' rb-hide' : '' ) ;
    ?>">
					<div class="rb-dashboard-card-content">

						<h4 class="rb-dashboard-card-title">
							<img src="<?php 
    echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-demos-import.png' ) ;
    ?>" alt="">
							<?php 
    esc_html_e( 'Demo sites', 'roven-blog' );
    ?>
						</h4>

						<p class="rb-dashboard-card-description">
							<?php 
    echo  wp_kses( __( 'Roven Blog comes with a variety of demos that you can import in order to jumpstart you site development. The <strong>One Click Demo Import</strong> plugin must be installed and activated before demos can be imported.', 'roven-blog' ), array(
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

							<a class="button" href="#rb-plugins"><?php 
    esc_html_e( ' Go to Plugins ', 'roven-blog' );
    ?></a>

						</div>

					</div>
				</div><!-- end .rb-dashboard-card -->

			</div>

			<div class="rb-card-grid-item"> 

				<!-- Get help-->
				<div class="rb-dashboard-card">
					<div class="rb-dashboard-card-content">

						<h4 class="rb-dashboard-card-title">
							<img src="<?php 
    echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-knowledge-base.png' ) ;
    ?>" alt="">
							<?php 
    esc_html_e( 'Need help getting started?', 'roven-blog' );
    ?>
						</h4>

						<p class="rb-dashboard-card-description">
							<?php 
    esc_html_e( 'The help and support section contains the theme documentation and changelog. You can also download a child theme from there as well contact us regarding and problem you are facing with the theme.', 'roven-blog' );
    ?>
						</p>

						<div class="rb-dashboard-card-actions">

							<a class="button" href="#rb-helpandsupport"><?php 
    esc_html_e( ' Go to Help & Support ', 'roven-blog' );
    ?></a>

						</div>

					</div>
				</div><!-- end .rb-dashboard-card -->
			</div>
			<?php 
}


if ( 'free' === $theme_type ) {
    // Display the pro recommandation for the free theme variant.
    ?>
			<div class="rb-card-grid-item"> 

				<!-- Roven Blog vs Roven Blog PRO-->
				<div class="rb-dashboard-card">
					<div class="rb-dashboard-card-content">

						<h4 class="rb-dashboard-card-title">
							<img src="<?php 
    echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-compare.png' ) ;
    ?>" alt="">
							<?php 
    esc_html_e( 'Not sure if Roven Blog is enough for your needs?', 'roven-blog' );
    ?>
						</h4>

						<p class="rb-dashboard-card-description">
							<?php 
    esc_html_e( 'We prepared an in depth comparison between Roven Blog and Roven Blog PRO to help you figure out what version of the theme is right for your needs.', 'roven-blog' );
    ?>
						</p>

						<div class="rb-dashboard-card-actions">

							<a class="button" href="#rb-freevspro"><?php 
    esc_html_e( ' Go to Free vs Pro ', 'roven-blog' );
    ?></a>

						</div>

					</div>
				</div><!-- end .rb-dashboard-card -->
			</div>
		<?php 
}

?>
	</div>

</div>
