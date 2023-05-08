<?php

/**
 * Content of the "Help & Support" tab.
 *
 * @package Roven-Blog
 */
$theme_type = 'free';
?>
<div id="rb-helpandsupport">
	<h3><?php 
esc_html_e( 'Help & Support', 'roven-blog' );
?></h3>

	<div class="rb-card-grid">

		<div class="rb-card-grid-item">

			<!-- Priority Support -->
			<div class="rb-dashboard-card">
				<div class="rb-dashboard-card-content">

					<h4 class="rb-dashboard-card-title">
						<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-support-priority.png' ) ;
?>" alt="">
						<?php 
esc_html_e( 'Priority Support ', 'roven-blog' );
?>
						<span class="rb-badge rb-badge-pro"><?php 
esc_html_e( 'PRO', 'roven-blog' );
?></span>
					</h4>

					<p class="rb-dashboard-card-description">
						<?php 
esc_html_e( 'Receive priority email support from the theme&rsquo;s developers. Our goal is to respond to support requests in 24 hours or quicker.', 'roven-blog' );
?>
					</p>

					<div class="rb-dashboard-card-actions">

						<?php 

if ( 'free' === $theme_type ) {
    ?>
							<a class="rb-btn button-primary" href="https://roventhemes.com/theme/roven-blog-free-wordpress-blog-theme/#theme-pricing" target="_blank"> 
								<?php 
    esc_html_e( 'Upgrade to Pro', 'roven-blog' );
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

if ( 'free' === $theme_type ) {
    ?>
			<div class="rb-card-grid-item">	

				<!-- Standard Support -->
				<div class="rb-dashboard-card">
					<div class="rb-dashboard-card-content">

						<h4 class="rb-dashboard-card-title">
							<img src="<?php 
    echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-support.png' ) ;
    ?>" alt="">
							<?php 
    esc_html_e( 'Standard Support', 'roven-blog' );
    ?>
						</h4>

						<p class="rb-dashboard-card-description">
						<?php 
    esc_html_e( 'Don&rsquo;t hesitate cu contact us with any question regarding the theme.', 'roven-blog' );
    ?> 
						</p>

						<div class="rb-dashboard-card-actions">

							<a class="button" href="https://wordpress.org/support/theme/roven-blog/"target="_blank"> 
								<?php 
    esc_html_e( 'Get Support', 'roven-blog' );
    ?> 
							</a>

						</div>

					</div>
				</div><!-- end .rb-dashboard-card -->	
			</div>
		<?php 
}

?>
		<div class="rb-card-grid-item">

			<!-- Documentation -->
			<div class="rb-dashboard-card">
				<div class="rb-dashboard-card-content">

					<h4 class="rb-dashboard-card-title">
						<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-documentation.png' ) ;
?>" alt="">
						<?php 
esc_html_e( 'Documentation', 'roven-blog' );
?>
					</h4>

					<p class="rb-dashboard-card-description">
					<?php 
esc_html_e( 'The theme comes with detailed documentation that covers all aspect of setting up and working with the theme.', 'roven-blog' );
?>
					</p>

					<div class="rb-dashboard-card-actions">

						<a class="button" href="https://rovenblog.roventhemes.com/documentation/" target="_blank"> 
							<?php 
esc_html_e( 'Read documentation', 'roven-blog' );
?>
						</a>

					</div>

				</div>
			</div><!-- end .rb-dashboard-card -->
		</div>
		<div class="rb-card-grid-item">

			<!-- Changelog -->
			<div class="rb-dashboard-card">
				<div class="rb-dashboard-card-content">

					<h4 class="rb-dashboard-card-title">
						<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-changelog.png' ) ;
?>" alt="">
						<?php 
esc_html_e( 'Changelog', 'roven-blog' );
?>
					</h4>

					<p class="rb-dashboard-card-description">
					<?php 
esc_html_e( 'The changelog contains a list of all the changes made to the theme from a version to another and can help you easily stay up to date with the theme&rsquo;s development.', 'roven-blog' );
?>
					</p>

					<div class="rb-dashboard-card-actions">

						<a class="button" href="https://rovenblog.roventhemes.com/changelog.txt" target="_blank">
							<?php 
esc_html_e( 'View Changelog', 'roven-blog' );
?>
						</a>

					</div>

				</div>
			</div><!-- end .rb-dashboard-card -->							
		</div>
		<div class="rb-card-grid-item">

			<!-- Child theme -->
			<div class="rb-dashboard-card">
				<div class="rb-dashboard-card-content">

					<h4 class="rb-dashboard-card-title">
						<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/icon-child-theme.png' ) ;
?>" alt="">
						<?php 
esc_html_e( 'Child Theme ', 'roven-blog' );
?>
					</h4>

					<p class="rb-dashboard-card-description">
					<?php 
esc_html_e( 'Changes made to the theme files are usually overwritten when the theme is updated. You can avoid this by using a child theme. We have prepared one for you. Just download it and activate it. Any changes made in the customizer prior to activating the child theme will be lost, so make sure to activate it first if you want to use a child theme.', 'roven-blog' );
?>
					</p>

					<div class="rb-dashboard-card-actions">

						<?php 

if ( 'free' === $theme_type ) {
    // Free theme child theme variant.
    ?>
							<a class="button" href="https://rovenblog.roventhemes.com/1-0-x/roven-blog-child.zip" target="_blank"> 
								<?php 
    esc_html_e( 'Download Child Theme (Roven Blog)', 'roven-blog' );
    ?>
							</a>
						<?php 
}

?>
					</div>

				</div>
			</div><!-- end .rb-dashboard-card -->							
		</div>
	</div>

</div>
