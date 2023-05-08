<?php

/**
 * Template part for displaying suitable messages when no content is found
 *
 * @package Roven-Blog
 */
$rb_fullwidth1 = false;
$rb_fullwidth2 = false;
?>
<div id="rb-none-header" class="rb-section<?php 
echo  ( $rb_fullwidth1 ? ' rb-stretch-fullwidth' : '' ) ;
?>">

	<div class="rb-section-title">

		<h3><?php 
esc_html_e( 'Nothing Found', 'roven-blog' );
?></h3>

	</div>

</div><!-- end #rb-none-header -->

<div id="rb-content" class="rb-section<?php 
echo  ( $rb_fullwidth2 ? ' rb-stretch-fullwidth' : '' ) ;
?>">

	<div class="rb-section-content">

		<div id="rb-main-content">

			<?php 

if ( is_home() && current_user_can( 'publish_posts' ) ) {
    // No posts created or published.
    printf( '<p>' . wp_kses(
        /* translators: 1: link to WP admin new post page. */
        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'roven-blog' ),
        array(
            'a' => array(
            'href' => array(),
        ),
        )
    ) . '</p>', esc_url( admin_url( 'post-new.php' ) ) );
} elseif ( is_search() ) {
    // There were no search results.
    ?>

				<p><?php 
    esc_html_e( 'Sorry, but nothing matched your search terms.', 'roven-blog' );
    ?></p>

				<div class="rb-none-search widget widget_search">
					<?php 
    get_search_form();
    ?>
				</div>
				<?php 
} else {
    // General situation where no content is found.
    ?>

				<p><?php 
    esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'roven-blog' );
    ?></p>
				<?php 
    get_search_form();
}

?>

		</div><!-- end #rb-main-content -->

		<?php 
$rb_sidebar = true;

if ( is_home() && is_front_page() || is_front_page() && true === get_theme_mod( 'rovenblog_home_show_sidebar', true ) ) {
    get_sidebar( 'home' );
} elseif ( is_search() && true === get_theme_mod( 'rovenblog_search_show_sidebar', true ) ) {
    get_sidebar( 'search' );
} elseif ( is_author() && true === get_theme_mod( 'rovenblog_author_show_sidebar', true ) ) {
    get_sidebar( 'author' );
} elseif ( is_single() && true === get_theme_mod( 'rovenblog_post_show_sidebar' ) ) {
    get_sidebar( 'post' );
} elseif ( (is_category() || is_tag() || is_date()) && true === get_theme_mod( 'rovenblog_archive_show_sidebar', true ) ) {
    get_sidebar( 'archive' );
} else {
    $rb_sidebar = false;
}

?>

	</div><!-- end .rb-section-content -->

</div><!-- end #rb-content -->
