<?php

/**
 * Template part for displaying Header Hero Posts section
 *
 * @package Roven-Blog
 */
$count_h = get_theme_mod( 'rovenblog_home_header_hero_posts_nr', 2 );
$posts_type = get_theme_mod( 'rovenblog_home_header_hero_content', 'recent-posts' );
$args_hero = rovenblog_posts_args(
    $posts_type,
    $count_h,
    'rovenblog_home_header_hero',
    false
);

if ( true === get_theme_mod( 'rovenblog_home_header_hero_exclude', true ) && 'specific-posts' !== $posts_type ) {
    $exclude = rovenblog_exclusion_list( 'hero' );
    $args_hero['post__not_in'] = $exclude;
}

$query_posts = new WP_Query( $args_hero );

if ( $query_posts->have_posts() ) {
    // Header hero posts Customizer arguments.
    $style_type = get_theme_mod( 'rovenblog_home_header_hero_style', 'style3' );
    $thumbnail_type = 'hero';
    $category_enable = false;
    $structure_type = 'slider';
    $excerpt_enable = false;
    $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
    $rb_fullwidth = false;
    $rb_slides = 1;
    // Determine the most suitable image size for the selected image aspect based on the number of columns and grid width.
    
    if ( 'grid' === $structure_type ) {
        $nr_cols = intval( get_theme_mod( 'rovenblog_home_header_hero_cols_nr', 1 ) );
        
        if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
            $thumbnail_size = '-full';
        } elseif ( 1 === $nr_cols ) {
            $thumbnail_size = '-max';
        } elseif ( 2 === $nr_cols && (1400 < $grid_width || true === $rb_fullwidth) ) {
            $thumbnail_size = '-mid';
        } else {
            $thumbnail_size = '-min';
        }
    
    } else {
        $nr_cols = intval( $rb_slides );
        
        if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
            $thumbnail_size = '-full';
        } elseif ( 1 === $nr_cols ) {
            $thumbnail_size = '-max';
        } else {
            $thumbnail_size = '-mid';
        }
    
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
        $author_enable = get_theme_mod( 'rovenblog_home_header_hero_author', true );
        $date_enable = get_theme_mod( 'rovenblog_home_header_hero_date', true );
        $comments_enable = get_theme_mod( 'rovenblog_home_header_hero_comments', true );
        $theme_type = 'free';
        
        if ( 'free' === $theme_type && 'style3' === $style_type ) {
            $category_enable = true;
            $author_enable = true;
            $date_enable = true;
            $comments_enable = true;
        }
        
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
    ?>
	<div id="rb-header-hero" class="rb-section<?php 
    echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
    ?>">

		<div class="rb-section-content">

			<?php 
    
    if ( 'grid' === $structure_type ) {
        // Header hero section grid mode.
        $col_count = 0;
        ?>
				<div class="rb-grid cols-<?php 
        echo  $nr_cols ;
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>">

					<?php 
        while ( $query_posts->have_posts() ) {
            ?>
						<div class="rb-grid-item">
							<?php 
            $query_posts->the_post();
            // Don't add lozad lazy loading to the elements above the fold.
            
            if ( 'hero' === $sections[0] ) {
                
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
    } else {
        // Header hero section slider mode.
        ?>
				<div class="rb-slider cols-<?php 
        echo  $nr_cols ;
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>">	

					<div class="rb-slider-content">

						<ul class="rb-slider-slides" data-slick='{"autoplay": false, "infinite": true }'>
							<?php 
        while ( $query_posts->have_posts() ) {
            ?>
								<li>
									<?php 
            $query_posts->the_post();
            // Don't add lozad lazy loading to the elements above the fold.
            if ( 'hero' === $sections[0] ) {
                $args['lazy'] = 0;
            }
            // Post template based on style.
            get_template_part( 'template-parts/post-styles/post', $style_type, $args );
            ?>
								</li>
							<?php 
        }
        ?>
						</ul>

						<div class="rb-slider-arrows"></div>

					</div><!-- end .rb-slider-content -->

					<div class="rb-slider-pager"></div>

				</div><!-- end .rb-slider -->
			<?php 
    }
    
    ?>		
		</div><!-- end .rb-section-content -->

	</div><!-- end #rb-header-hero -->
	<?php 
    wp_reset_postdata();
}
