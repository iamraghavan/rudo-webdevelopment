<?php

/**
 * Template part for displaying single post contents
 *
 * @package Roven-Blog
 */
$post_share = get_theme_mod( 'rovenblog_post_show_posts_share', true );
$share_location = 'share-bottom';
?>

<div id="rb-content" class="rb-section">

	<div class="rb-section-content">

		<div id="rb-main-content">

			<?php 
?>

			<div id="post-<?php 
the_ID();
?>" <?php 
post_class( 'single-post' );
?>>
				<?php 
the_content();
// Post content pagination arguments.
$args = array(
    'before'         => '<div class="page-links">' . esc_html__( 'Pages:', 'roven-blog' ),
    'after'          => '</div>',
    'link_before'    => '<span class="page-number">',
    'link_after'     => '</span>',
    'next_or_number' => 'number',
    'separator'      => '',
);
wp_link_pages( $args );

if ( has_tag() ) {
    // Post Tags list.
    ?>
					<div class="tags-links">
						<?php 
    the_tags( '', '' );
    ?>
					</div>
				<?php 
}

?>

			</div><!-- end .single-post -->

		</div><!-- end #rb-main-content -->

		<?php 
?>

	</div><!-- end .rb-section-content -->

</div><!-- end #rb-content -->

<?php 

if ( true === $post_share && ('share-bottom' === $share_location || 'share-top-and-bottom' === $share_location) ) {
    ?>
	<div id="rb-share" class="rb-section">

		<div class="rb-section-content">
			<?php 
    // Social media sharing buttons template.
    get_template_part( 'template-parts/socialmedia', 'share' );
    ?>
		</div>

	</div><!-- end #rb-share -->
	<?php 
}

if ( true === get_theme_mod( 'rovenblog_post_show_author_bio', true ) ) {
    // Template for post author info section.
    get_template_part( 'template-parts/post', 'author' );
}