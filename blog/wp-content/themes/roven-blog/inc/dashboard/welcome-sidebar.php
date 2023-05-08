<?php

/**
 * Content of the theme dashboard sidebar.
 *
 * @package Roven-Blog
 */
$theme_type = 'free';
?>
<div id="rb-dashboard-content-sidebar">

	<?php 

if ( 'free' === $theme_type ) {
    ?>
		<!-- Upgrade to Pro -->	
		<div class="rb-dashboard-panel">
			<div class="rb-dashboard-panel-header">

				<h3 class="rb-dashboard-panel-header-title">
					<?php 
    esc_html_e( 'Upgrade to Pro', 'roven-blog' );
    ?>
				</h3>

			</div>
			<div class="rb-dashboard-panel-content">

				<p>
					<?php 
    esc_html_e( 'Unlock the full potential of you website by upgrading to the Pro version of the Roven Blog theme!', 'roven-blog' );
    ?>	
				</p>

				<a class="rb-btn button button-primary" href="https://roventhemes.com/theme/roven-blog-free-wordpress-blog-theme/" target="_blank">
					<?php 
    esc_html_e( 'Discover Roven Blog Pro', 'roven-blog' );
    ?>
				</a>

			</div>	
		</div><!-- end .rb-dashboard-panel -->
	<?php 
}

?>

	<!-- Review Theme on WordPress.org -->	
	<div class="rb-dashboard-panel">
		<div class="rb-dashboard-panel-header">

			<h3 class="rb-dashboard-panel-header-title">
				<?php 
esc_html_e( 'Review the theme', 'roven-blog' );
?>
			</h3>

		</div>
		<div class="rb-dashboard-panel-content">

			<img src="<?php 
echo  esc_url( get_template_directory_uri() . '/assets/admin/images/rating.png' ) ;
?>" alt="review stars">

			<p>
				<?php 
esc_html_e( 'If you like using the theme please consider writing a review.', 'roven-blog' );
?>
			</p>

			<a class="rb-btn button" href="https://wordpress.org/support/theme/roven-blog/reviews/?filter=5#new-post" target="_blank">
				<?php 
esc_html_e( 'Submit a review', 'roven-blog' );
?>
			</a>

		</div>	
	</div><!-- end .rb-dashboard-panel -->		

	<!-- Provide Feedback -->	
	<div class="rb-dashboard-panel">
		<div class="rb-dashboard-panel-header">

			<h3 class="rb-dashboard-panel-header-title">
				<?php 
esc_html_e( 'Have an idea or feedback?', 'roven-blog' );
?>
			</h3>

		</div>
		<div class="rb-dashboard-panel-content">

			<p>
			<?php 
esc_html_e( 'We are always looking for ways to make our themes better, so if you have a suggestion please share it with us!', 'roven-blog' );
?>
			</p>

			<p>
				<a class="rb-dashboard-link" href="https://support.roventhemes.com/" target="_blank">
					<span><?php 
esc_html_e( 'Submit an idea', 'roven-blog' );
?></span>
					<i class="dashicons dashicons-external"></i>
				</a>
			</p>	

		</div>	
	</div><!-- end .rb-dashboard-panel -->

</div><!-- end #rb-dashboard-content-sidebar -->
