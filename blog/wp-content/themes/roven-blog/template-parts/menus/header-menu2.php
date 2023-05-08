<?php

/**
 * Template part for displaying header with logo on left and menu on right
 *
 * @package Roven-Blog
 */
// Header Menu Customizer arguments.
$show_search = get_theme_mod( 'rovenblog_show_search_box', true );
$darkmode_toggler = get_theme_mod( 'rovenblog_show_darkmode_toggler', true );
$logo_source = get_theme_mod( 'rovenblog_logo_source', 'text-logo' );

if ( 'image-logo' === $logo_source ) {
    $logo_id = get_theme_mod( 'rovenblog_logo_id', false );
    $logo_dark_id = get_theme_mod( 'rovenblog_darkmode_logo_id', false );
    $logo2_id = get_theme_mod( 'rovenblog_logo_retina_id', false );
    $logo2_dark_id = get_theme_mod( 'rovenblog_darkmode_logo_retina_id', false );
    $logo_light = false;
    $logo_dark = false;
    $logo_light_2x = false;
    $logo_dark_2x = false;
    $rb_id_light = false;
    $rb_id_dark = false;
    // Check if an image for logo was provided and save the src of that image.
    
    if ( false !== $logo2_id ) {
        $logo_data2 = wp_get_attachment_image_src( $logo2_id, 'full' );
        
        if ( false !== $logo_data2 ) {
            $logo_light_2x = $logo_data2[0];
            $logo_dark_2x = $logo_data2[0];
            $logo_light = $logo_data2[0];
            $logo_dark = $logo_data2[0];
            $rb_id_light = $logo2_id;
            $rb_id_dark = $logo2_id;
        }
    
    }
    
    
    if ( false !== $logo_id ) {
        $logo_data = wp_get_attachment_image_src( $logo_id, 'full' );
        
        if ( false !== $logo_data ) {
            $logo_light = $logo_data[0];
            $logo_dark = $logo_data[0];
            $rb_id_light = $logo_id;
            $rb_id_dark = $logo_id;
        }
    
    }
    
    
    if ( false !== $logo2_dark_id ) {
        $logo_dark_data2 = wp_get_attachment_image_src( $logo2_dark_id, 'full' );
        
        if ( false !== $logo_dark_data2 ) {
            $logo_dark_2x = $logo_dark_data2[0];
            $logo_dark = $logo_dark_data2[0];
            $rb_id_dark = $logo2_dark_id;
        }
    
    }
    
    
    if ( false !== $logo_dark_id ) {
        $logo_dark_data = wp_get_attachment_image_src( $logo_dark_id, 'full' );
        
        if ( false !== $logo_dark_data ) {
            $logo_dark = $logo_dark_data[0];
            $rb_id_dark = $logo_dark_id;
        }
    
    }
    
    // Logo images alt text.
    
    if ( false !== $rb_id_light ) {
        $alt_light = get_post_meta( $rb_id_light, '_wp_attachment_image_alt', true );
    } else {
        $alt_light = false;
    }
    
    
    if ( false !== $rb_id_dark ) {
        $alt_dark = get_post_meta( $rb_id_dark, '_wp_attachment_image_alt', true );
    } else {
        $alt_dark = false;
    }

} else {
    $text_logo = get_theme_mod( 'rovenblog_text_logo', esc_html__( 'rovenblog', 'roven-blog' ) );
}

$header_class = '';
?>
<div id="rb-header" class="rb-logo-left<?php 
echo  esc_attr( $header_class ) ;
?>">

	<div id="rb-header-content">

		<div class="rb-header-navbar rb-hide-on-desktop">

			<div class="rb-header-navbar-col">

				<a class="rb-logo" href="<?php 
echo  esc_url( home_url( '/' ) ) ;
?>" aria-label="<?php 
esc_attr_e( 'Home Link', 'roven-blog' );
?>">
					<?php 

if ( 'image-logo' === $logo_source ) {
    // Dark mode Logo image.
    
    if ( false !== $logo_dark && false !== $logo_dark_2x ) {
        ?>
							<img loading="lazy" class="rb-logo-image-dark-mode" src="<?php 
        echo  esc_url( $logo_dark ) ;
        ?>" srcset="<?php 
        echo  esc_url( $logo_dark ) ;
        ?> 1x, <?php 
        echo  esc_url( $logo_dark_2x ) ;
        ?> 2x"<?php 
        echo  ( $alt_dark ? ' alt="' . esc_attr( $alt_dark ) . '"' : '' ) ;
        ?>>
							<?php 
    } elseif ( false !== $logo_dark ) {
        ?>
							<img loading="lazy" class="rb-logo-image-dark-mode" src="<?php 
        echo  esc_url( $logo_dark ) ;
        ?>"<?php 
        echo  ( $alt_dark ? ' alt="' . esc_attr( $alt_dark ) . '"' : '' ) ;
        ?>>
							<?php 
    }
    
    // Standard Logo image.
    
    if ( false !== $logo_light && false !== $logo_light_2x ) {
        ?>
							<img loading="lazy" class="rb-logo-image-light-mode" src="<?php 
        echo  esc_url( $logo_light ) ;
        ?>" srcset="<?php 
        echo  esc_url( $logo_light ) ;
        ?> 1x, <?php 
        echo  esc_url( $logo_light_2x ) ;
        ?> 2x"<?php 
        echo  ( $alt_light ? ' alt="' . esc_attr( $alt_light ) . '"' : '' ) ;
        ?>>
							<?php 
    } elseif ( false !== $logo_light ) {
        ?>
							<img loading="lazy" class="rb-logo-image-light-mode" src="<?php 
        echo  esc_url( $logo_light ) ;
        ?>"<?php 
        echo  ( $alt_light ? ' alt="' . esc_attr( $alt_light ) . '"' : '' ) ;
        ?>>
							<?php 
    }

} else {
    // Text Logo.
    echo  esc_html( $text_logo ) ;
}

?>
				</a>

			</div><!-- end .rb-header-navbar-col -->

			<div class="rb-header-navbar-col"></div>

			<div class="rb-header-navbar-col">

				<?php 

if ( true === $darkmode_toggler ) {
    // Darkmode toggle icon.
    ?>
					<a class="rb-color-scheme-toggler" href="#" aria-label="<?php 
    esc_attr_e( 'Color scheme toggler', 'roven-blog' );
    ?>">
						<i class="rovenblog-icon-moon"></i>
					</a>
					<?php 
}


if ( true === $show_search ) {
    // Search icon.
    ?>
					<a class="rb-search-toggler" href="#" aria-label="<?php 
    esc_attr_e( 'Search toggler', 'roven-blog' );
    ?>">
						<i class="rovenblog-icon-search"></i>
					</a>
				<?php 
}

?>

				<a class="rb-mobile-menu-trigger" href="#" aria-label="<?php 
esc_attr_e( 'Mobile Menu Trigger', 'roven-blog' );
?>">
					<i class="rovenblog-icon-menu"></i>
				</a>

			</div><!-- end .rb-header-navbar-col -->

		</div><!-- end .rb-header-navbar -->

		<div class="rb-header-navbar rb-hide-on-mobile rb-hide-on-tablet">

			<div class="rb-header-navbar-col">

				<a class="rb-logo" href="<?php 
echo  esc_url( home_url( '/' ) ) ;
?>" aria-label="<?php 
esc_attr_e( 'Home Link', 'roven-blog' );
?>">
					<?php 

if ( 'image-logo' === $logo_source ) {
    // Dark mode Logo image.
    
    if ( false !== $logo_dark ) {
        ?>
							<img loading="lazy" class="rb-logo-image-dark-mode" src="<?php 
        echo  esc_url( $logo_dark ) ;
        ?>"<?php 
        echo  ( $alt_dark ? ' alt="' . esc_attr( $alt_dark ) . '"' : '' ) ;
        ?>>
							<?php 
    }
    
    // Standard Logo image.
    
    if ( false !== $logo_light ) {
        ?>
							<img loading="lazy" class="rb-logo-image-light-mode" src="<?php 
        echo  esc_url( $logo_light ) ;
        ?>"<?php 
        echo  ( $alt_light ? ' alt="' . esc_attr( $alt_light ) . '"' : '' ) ;
        ?>>
							<?php 
    }

} else {
    // Text Logo.
    echo  esc_html( $text_logo ) ;
}

?>
				</a>

			</div><!-- end .rb-header-navbar-col -->

			<div class="rb-header-navbar-col">

				<div id="primary-menu" class="menu">
					<?php 
// Theme Main navigation menu.

if ( has_nav_menu( 'rovenblog-nav-menu1' ) ) {
    wp_nav_menu( array(
        'theme_location' => 'rovenblog-nav-menu1',
        'menu_id'        => 'rovenblog-menu1',
        'container'      => false,
    ) );
} elseif ( current_user_can( 'edit_theme_options' ) ) {
    // No menu was assigned, notify via message only the users who can assign nav menus.
    ?>
						<div class="rb-navmenu-notice">
							<p><?php 
    esc_html_e( 'No menu assigned to this display location. Assign a menu', 'roven-blog' );
    ?> 
							<a href="<?php 
    echo  esc_url( admin_url( 'nav-menus.php' ) ) ;
    ?>"><?php 
    esc_html_e( 'visit Menus edit page', 'roven-blog' );
    ?></a> 
							<?php 
    esc_html_e( '(this notice is visible only for logged in users that can assign menus)', 'roven-blog' );
    ?></p>
						</div>
						<?php 
}

?>
				</div>

			</div><!-- end .rb-header-navbar-col -->

			<div class="rb-header-navbar-col">
				<?php 

if ( true === $darkmode_toggler ) {
    // Darkmode toggle icon.
    ?>
					<a class="rb-color-scheme-toggler " href="#">
						<i class="rovenblog-icon-moon"></i>
					</a>
					<?php 
}


if ( true === $show_search ) {
    // Search icon.
    ?>
					<a class="rb-search-toggler" href="#" aria-label="<?php 
    esc_attr_e( 'Search toggler', 'roven-blog' );
    ?>">
						<i class="rovenblog-icon-search"></i>
					</a>
				<?php 
}

?>
			</div><!-- end .rb-header-navbar-col -->

		</div><!-- end .rb-header-navbar -->

		<?php 

if ( true === $show_search ) {
    // Diplay an alternative search form for the header.
    $args['header_search'] = true;
    get_template_part( 'searchform', null, $args );
}

?>

	</div><!-- end #rb-header-content -->

</div><!-- end #rb-header -->
