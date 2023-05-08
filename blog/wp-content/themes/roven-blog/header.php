<?php

/**
 * The header for the theme
 *
 * @package Roven-Blog
 */
?>

<!doctype html>
<html <?php 
language_attributes();
?>>
	<head>
		<meta charset="<?php 
bloginfo( 'charset' );
?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php 
wp_head();
?>
	</head>

	<body <?php 
body_class();
?>>

		<div id="rb-wrap">
			<a class="rb-skip-link screen-reader-text" href="#rb-main-content"><?php 
esc_html_e( 'Skip to content', 'roven-blog' );
?></a>
			<?php 
wp_body_open();

if ( true === get_theme_mod( 'rovenblog_show_cta', true ) && class_exists( 'Kirki' ) ) {
    // Theme CTA section.
    $cta_class = '';
    // Add the CTA border bottom class.
    
    if ( true === get_theme_mod( 'rovenblog_cta_border_bottom', true ) ) {
        $cta_class .= ' rb-border-bottom';
        // Add the CTA border bottom fullwidth class.
        if ( true === get_theme_mod( 'rovenblog_cta_border_fullwidth', true ) ) {
            $cta_class .= ' rb-border-bottom-stretch-fullwidth';
        }
    }
    
    ?>
				<div id="rb-cta" class="<?php 
    echo  esc_attr( $cta_class ) ;
    ?>">

					<div id="rb-cta-content">

						<p class="rb-text-align-center">
							<?php 
    echo  esc_html( get_theme_mod( 'rovenblog_cta_text', esc_html__( 'CTA Text here...', 'roven-blog' ) ) ) ;
    ?>
						</p>

					</div><!-- end #rb-cta-content -->

				</div><!-- end #rb-cta -->
				<?php 
}


if ( true === get_theme_mod( 'rovenblog_header_top_show', false ) ) {
    // Start Header Top Area.
    $header_class = '';
    // Add the header top border class.
    
    if ( true === get_theme_mod( 'rovenblog_header_top_border', true ) ) {
        $header_class .= ' rb-border-bottom';
        // Add the header top border fullwidth class.
        if ( true === get_theme_mod( 'rovenblog_header_top_border_fullwidth', true ) ) {
            $header_class .= ' rb-border-bottom-stretch-fullwidth';
        }
    }
    
    $header_top_cols = get_theme_mod( 'rovenblog_header_top_cols', 'cols-2' );
    // The class for aligning the footer content vertically.
    
    if ( true === get_theme_mod( 'rovenblog_header_top_vertical', true ) ) {
        $grid_class = $header_top_cols . ' rb-grid-align-items-center';
    } else {
        $grid_class = $header_top_cols;
    }
    
    ?>
				<div id="rb-header-top" class="<?php 
    echo  esc_attr( $header_class ) ;
    ?>">

					<div id="rb-header-top-content"<?php 
    echo  ( get_theme_mod( 'rovenblog_header_top_mobile_show', false ) ? ' class="rb-hide-on-mobile"' : '' ) ;
    ?>>

						<div class="rb-grid <?php 
    echo  esc_attr( $grid_class ) ;
    ?>">

							<div class="rb-grid-item<?php 
    echo  ( get_theme_mod( 'rovenblog_header_top_mobile_col1', false ) ? ' rb-hide-on-mobile' : '' ) ;
    ?>">
								<?php 
    if ( is_active_sidebar( 'rovenblog-header-top1' ) ) {
        dynamic_sidebar( 'rovenblog-header-top1' );
    }
    ?>
							</div><!-- end .rb-grid-item -->

							<?php 
    
    if ( 'cols-2' === $header_top_cols ) {
        // Top Footer second column.
        ?>
								<div class="rb-grid-item<?php 
        echo  ( get_theme_mod( 'rovenblog_header_top_mobile_col2', false ) ? ' rb-hide-on-mobile' : '' ) ;
        ?>">
									<?php 
        if ( is_active_sidebar( 'rovenblog-header-top2' ) ) {
            dynamic_sidebar( 'rovenblog-header-top2' );
        }
        ?>
								</div><!-- end .rb-grid-item -->
								<?php 
    }
    
    ?>

						</div><!-- end .rb-grid -->

					</div><!-- end #rb-header-top-content -->	

				</div><!-- end #rb-header-top -->
				<?php 
}

// Determine the header menu template ( based on logo placement ).
$header_layout = 'logo-top-menu-right';

if ( 'logo-center-menu-split' === $header_layout ) {
    get_template_part( 'template-parts/menus/header', 'menu3' );
} elseif ( 'logo-top-menu-right' === $header_layout ) {
    get_template_part( 'template-parts/menus/header', 'menu2' );
} else {
    get_template_part( 'template-parts/menus/header', 'menu1' );
}

// Area typically used for adding the extra content under header.
do_action( 'rovenblog_below_nav_menu' );
// Rankmath and YoastSEO breadrcrumbs section.
$breadcrumbs_rankmath = function_exists( 'rank_math_the_breadcrumbs' );
$breadcrumbs_yoast = function_exists( 'yoast_breadcrumb' );

if ( !is_home() && !is_front_page() && ($breadcrumbs_rankmath || $breadcrumbs_yoast) ) {
    ?>
				<div id="rb-breadcrumbs" class="rb-section">

					<div class="rb-section-content">
						<?php 
    
    if ( $breadcrumbs_rankmath ) {
        rank_math_the_breadcrumbs();
    } else {
        ?>
							<nav aria-label="breadcrumbs" class="yoast-breadcrumb">
								<?php 
        yoast_breadcrumb();
        ?>
							</nav>
						<?php 
    }
    
    ?>
					</div><!-- end .rb-section-content -->

				</div><!-- end #rb-breadcrumbs -->
				<?php 
}
