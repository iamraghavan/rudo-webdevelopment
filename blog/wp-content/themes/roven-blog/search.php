<?php

/**
 * The template for displaying search results pages
 *
 * @package Roven-Blog
 */
get_header();
$rb_fullwidth1 = false;
?>
<div id="rb-search-header" class="rb-section<?php 
echo  ( $rb_fullwidth1 ? ' rb-stretch-fullwidth' : '' ) ;
?>">

	<div class="rb-section-title">

		<p class="rb-color-mute">
			<strong>
				<?php 
global  $wp_query ;
/* translators: %s: search query. */
printf( esc_html__( '%s Posts Matching', 'roven-blog' ), intval( $wp_query->found_posts ) );
?>
			</strong>
		</p>

		<h1><?php 
the_search_query();
?></h1>

	</div>

</div><!-- end #rb-search-header -->
<?php 

if ( have_posts() ) {
    // Search page Customizer arguments.
    $nr_cols = intval( get_theme_mod( 'rovenblog_search_grid_columns', 1 ) );
    $grid_type = 'grid';
    // Search posts Customizer arguments.
    $style_type = get_theme_mod( 'rovenblog_search_style', 'style8' );
    $category_enable = get_theme_mod( 'rovenblog_search_category', true );
    $thumbnail_type = get_theme_mod( 'rovenblog_search_aspect', 'landscape' );
    $excerpt_enable = get_theme_mod( 'rovenblog_search_excerpt', true );
    $sidebar = get_theme_mod( 'rovenblog_search_show_sidebar', true );
    $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
    $rb_fullwidth = false;
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
        $author_enable = get_theme_mod( 'rovenblog_search_author', true );
        $date_enable = get_theme_mod( 'rovenblog_search_date', true );
        $comments_enable = get_theme_mod( 'rovenblog_search_comments', true );
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
    
    ?>
	<div id="rb-content" class="rb-section<?php 
    echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
    ?>">

		<div class="rb-section-content">

			<div id="rb-main-content">

				<?php 
    
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
        get_sidebar( 'search' );
    }
    ?>

		</div><!-- end .rb-section-content -->

	</div><!-- end #rb-content -->
	<?php 
} else {
    // There is no content, use content-none template.
    get_template_part( 'template-parts/content', 'none' );
}

get_footer();