<?php

/**
 * The template for displaying all single posts
 *
 * @package Roven-Blog
 */
get_header();

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        $count_toggle = get_theme_mod( 'rovenblog_view_count_toggle', false );
        $count_type = get_theme_mod( 'rovenblog_view_count_type', 'php' );
        if ( true === $count_toggle && 'php' === $count_type ) {
            // Post view counting php variant only.
            rovenblog_view_count( get_the_ID() );
        }
        $header_style = 'style3';
        // Determine what post header template should be used and get that template.
        
        if ( 'style5' === $header_style || has_post_format( 'video' ) || has_post_format( 'audio' ) || has_post_format( 'gallery' ) ) {
            get_template_part( 'template-parts/headers/post', 'header5' );
        } elseif ( 'style1' === $header_style ) {
            get_template_part( 'template-parts/headers/post', 'header1' );
        } elseif ( 'style2' === $header_style ) {
            get_template_part( 'template-parts/headers/post', 'header2' );
        } elseif ( 'style4' === $header_style ) {
            get_template_part( 'template-parts/headers/post', 'header4' );
        } elseif ( 'style5' === $header_style ) {
            get_template_part( 'template-parts/headers/post', 'header5' );
        } elseif ( 'style6' === $header_style ) {
            get_template_part( 'template-parts/headers/post', 'header6' );
        } elseif ( 'style7' === $header_style ) {
            get_template_part( 'template-parts/headers/post', 'header7' );
        } elseif ( 'style8' === $header_style ) {
            get_template_part( 'template-parts/headers/post', 'header8' );
        } else {
            get_template_part( 'template-parts/headers/post', 'header3' );
        }
        
        get_template_part( 'template-parts/content', 'post' );
        if ( true === get_theme_mod( 'rovenblog_post_show_related_posts', true ) ) {
            // The Related Posts section.
            get_template_part( 'template-parts/posts/related', 'posts' );
        }
        if ( comments_open() || get_comments_number() ) {
            comments_template( '', true );
        }
        
        if ( true === get_theme_mod( 'rovenblog_post_show_scroll_progress_bar', true ) ) {
            // Post scroll progress bar.
            ?>
			<div id="rb-scroll-progress"></div>
			<?php 
        }
    
    }
} else {
    // There is no content, use content-none template.
    get_template_part( 'template-parts/content', 'none' );
}

get_footer();