<?php

/**
 * The template for displaying all pages by default
 *
 * @package Roven-Blog
 */
get_header();

if ( have_posts() ) {
    // There is content, start the Loop.
    while ( have_posts() ) {
        the_post();
        
        if ( class_exists( 'WooCommerce' ) ) {
            
            if ( is_cart() || is_checkout() || is_account_page() ) {
                // Disable header and sidebar on cart, checkout and account pages.
                $header = false;
                $sidebar = false;
            } else {
                $header = get_theme_mod( 'rovenblog_show_page_header', true );
            }
        
        } else {
            $header = get_theme_mod( 'rovenblog_show_page_header', true );
        }
        
        if ( true === $header ) {
            // Page specific header template.
            get_template_part( 'template-parts/headers/header', 'page' );
        }
        ?>
		<div id="rb-content" class="rb-section">

			<div class="rb-section-content">

				<div id="rb-main-content">
					<?php 
        the_content();
        // Page content pagination arguments.
        $args = array(
            'before'         => '<div class="page-links">' . esc_html__( 'Pages:', 'roven-blog' ),
            'after'          => '</div>',
            'link_before'    => '<span class="page-number">',
            'link_after'     => '</span>',
            'next_or_number' => 'number',
            'separator'      => '',
        );
        wp_link_pages( $args );
        ?>
				</div><!-- end #rb-main-content -->

				<?php 
        ?>

			</div><!-- end .rb-section-content -->

		</div><!-- end #rb-content -->
		<?php 
        if ( comments_open() || get_comments_number() ) {
            comments_template( '', true );
        }
    }
} else {
    // There is no content, use content-none template.
    get_template_part( 'template-parts/content', 'none' );
}

get_footer();