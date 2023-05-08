<?php

get_header();
// 404 page card image.
$image_id = get_theme_mod( 'rovenblog_404_image', false );
$image_src = false;

if ( false !== $image_id ) {
    $image_data = wp_get_attachment_image_src( $image_id, 'rovenblog-hero-max' );
    if ( false !== $image_data ) {
        $image_src = $image_data[0];
    }
}

?>
<div id="rb-content" class="rb-section">
	<div class="rb-section-content">
		<div id="rb-main-content">

			<div class="rb-card-7 rb-card-has-thumbnail rb-card-aspect-ratio-hero">

				<?php 

if ( false !== $image_src ) {
    ?>
					<div class="rb-card-background">

						<span><img src="<?php 
    echo  esc_url( $image_src ) ;
    ?>" alt=""></span>

					</div>
				<?php 
}

?>

				<div class="rb-card-content">

					<h3 class="rb-card-title"><?php 
esc_html_e( 'Error 404 - Page not found', 'roven-blog' );
?></h3><!-- end .rb-card-title -->

					<p><?php 
esc_html_e( "The page you are looking for doesn't exist or has been moved.", 'roven-blog' );
?></p>

				</div><!-- end .rb-card-content -->

			</div><!-- end .rb-card-7 -->

		</div>
	</div>
</div>
<?php 
get_footer();