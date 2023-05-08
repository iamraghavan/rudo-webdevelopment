<?php

/**
 * The template for displaying home page latest posts or static page content
 *
 * @package Roven-Blog
 */
$sidebar = get_theme_mod( 'rovenblog_home_show_sidebar', true );
$rb_fullwidth = false;
// Check if Home is set to show a static page or the latest posts.

if ( is_front_page() && !is_home() ) {
    // Home is a static page.
    
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
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
            if ( true === $sidebar ) {
                get_sidebar( 'home' );
            }
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

} elseif ( true === get_theme_mod( 'rovenblog_home_show_recent', true ) && have_posts() ) {
    // Home is set to show the latest posts.
    ?>
	<div id="rb-content" class="rb-section<?php 
    echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
    ?>">

		<?php 
    $section_title = get_theme_mod( 'rovenblog_home_recent_posts_title', esc_html__( 'Latest posts', 'roven-blog' ) );
    
    if ( '' !== $section_title ) {
        $title_style = get_theme_mod( 'rovenblog_section_title_style', 'none' );
        
        if ( 'none' !== $title_style ) {
            $title_class = ' rb-section-title-' . $title_style;
        } else {
            $title_class = '';
        }
        
        ?>
			<div class="rb-section-title<?php 
        echo  esc_attr( $title_class ) ;
        ?>">
				<?php 
        
        if ( 'style-6' === $title_style ) {
            echo  '<h2>' . esc_html( $section_title ) . '</h2>' ;
            ?>
					<svg width="33" height="6" xmlns="https://www.w3.org/2000/svg">
								<path d="M0,4c1.505,0,2.195-0.809,3.069-1.832C3.936,1.152,4.919,0,6.743,0c1.899,0,3.008,1.29,3.898,2.326
								C11.534,3.364,12.131,4,13.128,4c1.505,0,2.195-0.809,3.069-1.832C17.064,1.152,18.047,0,19.871,0c1.9,0,3.009,1.29,3.899,2.326
								C24.662,3.364,25.26,4,26.257,4c1.506,0,2.195-0.809,3.069-1.832C30.193,1.152,31.177,0,33,0v3.528
								c-0.859,0-1.354,0.327-2.152,0.906C29.884,5.131,28.685,6,26.257,6c-1.966,0-3.096-0.812-4.003-1.465
								c-0.869-0.624-1.448-1.007-2.383-1.007c-0.859,0-1.354,0.327-2.152,0.906C16.755,5.131,15.556,6,13.128,6
								c-1.966,0-3.096-0.812-4.004-1.465C8.256,3.91,7.677,3.528,6.743,3.528c-0.859,0-1.354,0.327-2.152,0.906C3.626,5.131,2.428,6,0,6V4
								z"/>
							</svg>
					<?php 
        } elseif ( 'style-7' === $title_style || 'style-8' === $title_style || 'style-10' === $title_style ) {
            echo  '<h2><span>' . esc_html( $section_title ) . '</span></h2>' ;
        } else {
            echo  '<h2>' . esc_html( $section_title ) . '</h2>' ;
        }
        
        ?>
			</div>
		<?php 
    }
    
    ?>

		<div class="rb-section-content">

			<div id="rb-main-content">

				<?php 
    // Main Home Posts Customizer arguments.
    $style_type = get_theme_mod( 'rovenblog_home_recent_posts_style', 'style8' );
    $nr_cols = intval( get_theme_mod( 'rovenblog_home_recent_posts_grid_cols', 1 ) );
    $grid_type = 'grid';
    $thumbnail_type = get_theme_mod( 'rovenblog_home_recent_posts_aspect', 'landscape' );
    $category_enable = get_theme_mod( 'rovenblog_home_recent_posts_category', true );
    $excerpt_enable = get_theme_mod( 'rovenblog_home_recent_posts_excerpt', true );
    $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
    // Determine the most suitable image size for the selected image aspect based on the number of columns and grid width.
    
    if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
        $thumbnail_size = '-full';
    } elseif ( 1 === $nr_cols ) {
        
        if ( true === $sidebar && 1400 >= $grid_width ) {
            $thumbnail_size = '-mid';
        } else {
            $thumbnail_size = '-max';
        }
    
    } elseif ( 2 === $nr_cols ) {
        
        if ( true !== $sidebar && (1400 < $grid_width || true === $rb_fullwidth) ) {
            $thumbnail_size = '-mid';
        } else {
            $thumbnail_size = '-min';
        }
    
    } else {
        $thumbnail_size = '-min';
    }
    
    if ( 'masonry' === $grid_type ) {
        $thumbnail_type = 'masonry';
    }
    // Prepare post template arguments.
    
    if ( 'style1' === $style_type || 'style2' === $style_type ) {
        $args = array(
            'category_enable' => $category_enable,
            'thumbnail_type'  => $thumbnail_type,
            'thumbnail_limit' => $thumbnail_size,
            'excerpt_enable'  => $excerpt_enable,
        );
    } else {
        // Post style 3, 4, 5, 6 and 7 specific arguments.
        $icons_enable = false;
        $author_enable = get_theme_mod( 'rovenblog_home_recent_posts_author', true );
        $date_enable = get_theme_mod( 'rovenblog_home_recent_posts_date', true );
        $comments_enable = get_theme_mod( 'rovenblog_home_recent_posts_comments', true );
        $args = array(
            'category_enable' => $category_enable,
            'thumbnail_type'  => $thumbnail_type,
            'thumbnail_limit' => $thumbnail_size,
            'icons_enable'    => $icons_enable,
            'author_enable'   => $author_enable,
            'date_enable'     => $date_enable,
            'comments_enable' => $comments_enable,
            'excerpt_enable'  => $excerpt_enable,
        );
    }
    
    $sections = get_theme_mod( 'rovenblog_home_layout', array( 'hero', 'featured', 'main' ) );
    $col_count = 0;
    
    if ( 'masonry' === $grid_type ) {
        // Posts masonry layout.
        ?>
					<div id="rb-posts-list" class="rb-masonry-grid cols-<?php 
        echo  $nr_cols ;
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>">

						<?php 
        while ( have_posts() ) {
            ?>
							<div class="rb-masonry-grid-item">
								<?php 
            the_post();
            // Don't add lozad lazy loading to the elements above the fold.
            
            if ( 'main' === $sections[0] ) {
                
                if ( $nr_cols + $nr_cols > $col_count ) {
                    $args['lazy'] = 0;
                } else {
                    $args['lazy'] = 1;
                }
                
                $col_count++;
            }
            
            // Post template based on style.
            get_template_part( 'template-parts/post-styles/post', $style_type, $args );
            ?>
							</div>
						<?php 
        }
        ?>

					</div><!-- end .rb-masonry-grid -->
					<?php 
    } else {
        // Posts grid layout.
        ?>
					<div id="rb-posts-list" class="rb-grid cols-<?php 
        echo  $nr_cols ;
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>">

						<?php 
        while ( have_posts() ) {
            ?>
							<div class="rb-grid-item">
								<?php 
            the_post();
            // Don't add lozad lazy loading to the elements above the fold.
            
            if ( 'main' === $sections[0] ) {
                
                if ( $nr_cols + $nr_cols > $col_count ) {
                    $args['lazy'] = 0;
                } else {
                    $args['lazy'] = 1;
                }
                
                $col_count++;
            }
            
            // Post template based on style.
            get_template_part( 'template-parts/post-styles/post', $style_type, $args );
            ?>
							</div>
							<?php 
        }
        ?>

					</div><!-- end .rb-grid -->
					<?php 
    }
    
    // Uses WordPress pagination with some arguments.
    rovenblog_pagination();
    ?>

			</div><!-- end #rb-main-content -->

			<?php 
    if ( true === $sidebar ) {
        get_sidebar( 'home' );
    }
    ?>

		</div><!-- end .rb-section-content -->

	</div><!-- end #rb-content -->
	<?php 
}
