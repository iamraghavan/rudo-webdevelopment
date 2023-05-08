<?php
/**
 * The template for displaying all pages by default
 *
 * @package Roven-Blog
 */

get_header();

// Get home page layout setting values.
$sections = get_theme_mod( 'rovenblog_home_layout', array( 'hero', 'featured', 'main' ) );
$count    = 0;

// Loop home page templates based on the layout setting.
foreach ( $sections as $section ) {
	get_template_part( 'template-parts/posts/home', $section );

	if ( 0 === $count ) {
		// Area typically used for adding extra content under the first home section only.
		do_action( 'rovenblog_below_first_section' );
		$count ++;
	}
}

get_footer();
