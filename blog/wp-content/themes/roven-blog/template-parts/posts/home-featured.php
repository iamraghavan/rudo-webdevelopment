<?php

/**
 * The template for displaying Home Featured Posts section
 *
 * @package Roven-Blog
 */
$count_f = get_theme_mod( 'rovenblog_home_featured_nr', 2 );
$posts_type = get_theme_mod( 'rovenblog_home_featured_content', 'recent-posts' );
$args_featured = rovenblog_posts_args(
    $posts_type,
    $count_f,
    'rovenblog_home_featured',
    false
);

if ( true === get_theme_mod( 'rovenblog_home_featured_posts_exclude', true ) && 'specific-posts' !== $posts_type ) {
    // Fetch the list of post ids that should be excluded from the loop of this section.
    $exclude = rovenblog_exclusion_list( 'featured' );
    $args_featured['post__not_in'] = $exclude;
}

$query_posts = new WP_Query( $args_featured );

if ( $query_posts->have_posts() ) {
    // Home Featured section Customizer arguments.
    $section_title = get_theme_mod( 'rovenblog_home_featured_title', esc_html__( 'Featured posts', 'roven-blog' ) );
    $nr_cols = intval( get_theme_mod( 'rovenblog_home_featured_cols', 2 ) );
    // Home Featured posts Customizer arguments.
    $style_type = get_theme_mod( 'rovenblog_home_featured_style', 'style2' );
    $category_enable = get_theme_mod( 'rovenblog_home_featured_category', true );
    $excerpt_enable = get_theme_mod( 'rovenblog_home_featured_excerpt', false );
    $thumbnail_type = get_theme_mod( 'rovenblog_home_featured_aspect', 'landscape' );
    $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
    $rb_fullwidth = false;
    // Determine the most suitable image size for the selected image aspect based on the number of columns and grid width.
    
    if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
        $thumbnail_size = '-full';
    } elseif ( 1 === $nr_cols ) {
        $thumbnail_size = '-max';
    } elseif ( 2 === $nr_cols ) {
        
        if ( 1400 < $grid_width || true === $rb_fullwidth ) {
            $thumbnail_size = '-mid';
        } else {
            $thumbnail_size = '-min';
        }
    
    } else {
        $post_count = 0;
        $thumbnail_size = '-min';
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
        $author_enable = get_theme_mod( 'rovenblog_home_featured_author', true );
        $date_enable = get_theme_mod( 'rovenblog_home_featured_date', true );
        $comments_enable = get_theme_mod( 'rovenblog_home_featured_comments', false );
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
    ?>
	<div id="rb-featured-posts" class="rb-section<?php 
    echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
    ?>">

		<?php 
    
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

			<div class="rb-grid mixed cols-<?php 
    echo  $nr_cols ;
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    ?>">

				<?php 
    while ( $query_posts->have_posts() ) {
        ?>
					<div class="rb-grid-item">
						<?php 
        $query_posts->the_post();
        /**
         * Assign a larger thumbnail for every 3rd post since it will be almost full width when browser
         * width is smaller than 992px, unlike the other posts which will be split in 2 columns.
         */
        
        if ( 3 === $nr_cols ) {
            $post_count++;
            
            if ( 3 === $post_count ) {
                $post_count = 0;
                $args['thumbnail_limit'] = '-mid';
            }
        
        }
        
        // Don't add lozad lazy loading to the elements above the fold.
        
        if ( 'featured' === $sections[0] ) {
            
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
    wp_reset_postdata();
    ?>

			</div><!-- end .rb-grid -->

		</div><!-- end .rb-section-content -->

	</div><!-- end #rb-featured-posts -->
	<?php 
}
