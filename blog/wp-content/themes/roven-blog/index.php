<?php

/**
 * The template for displaying posts
 *
 * @package Roven-Blog
 */
get_header();

if ( have_posts() ) {
    $archive_title = get_theme_mod( 'rovenblog_archive_show_title', true );
    $archive_description = get_theme_mod( 'rovenblog_archive_show_description', true );
    $rb_fullwidth1 = false;
    
    if ( true === $archive_title || true === $archive_description ) {
        // Archive Title and Description section.
        ?>
		<div id="rb-archive-category-header" class="rb-section<?php 
        echo  ( $rb_fullwidth1 ? ' rb-stretch-fullwidth' : '' ) ;
        ?>">

			<div class="rb-section-title">

				<div class="rb-content-no-sidebar-width rb-color-mute">
					<?php 
        if ( true === $archive_title ) {
            the_archive_title( '<h1>', '</h1>' );
        }
        if ( true === $archive_description ) {
            the_archive_description( '<p>', '</p>' );
        }
        ?>
				</div>

			</div><!-- end .rb-section-title -->

		</div><!-- end #rb-archive-category-header -->
		<?php 
    }
    
    // Archive/Category page Customizer arguments.
    $nr_cols = intval( get_theme_mod( 'rovenblog_archive_grid_columns', 1 ) );
    $grid_type = 'grid';
    // Archive/Category posts Customizer arguments.
    $style_type = get_theme_mod( 'rovenblog_archive_style', 'style8' );
    $category_enable = get_theme_mod( 'rovenblog_archive_category', true );
    $thumbnail_type = get_theme_mod( 'rovenblog_archive_aspect', 'landscape' );
    $excerpt_enable = get_theme_mod( 'rovenblog_archive_excerpt', true );
    $sidebar = get_theme_mod( 'rovenblog_archive_show_sidebar', true );
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
        $author_enable = get_theme_mod( 'rovenblog_archive_author', true );
        $date_enable = get_theme_mod( 'rovenblog_archive_date', true );
        $comments_enable = get_theme_mod( 'rovenblog_archive_comments', true );
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
    if ( (is_category() || is_tag() || is_date()) && true === $sidebar ) {
        get_sidebar( 'archive' );
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