<?php

/**
 * Template for page header styles
 *
 * @package Roven-Blog
 */
$thumb_type = get_theme_mod( 'rovenblog_page_featured_aspect', 'hero' );
$thumbnail = has_post_thumbnail();
$pageheader = '';
$rb_fullwidth = false;
$card_style = 'style2';
// Page Header card style.

if ( 'style2' === $card_style ) {
    $pageheader = 'rb-card-2';
} else {
    $pageheader = 'rb-card-1';
}


if ( $thumbnail ) {
    $pageheader .= ' rb-card-has-thumbnail rb-card-aspect-ratio-' . $thumb_type;
} else {
    $pageheader .= ' rb-card-no-thumbnail rb-card-aspect-ratio-' . $thumb_type;
}

?>
<div id="rb-page-header" class="rb-section<?php 
echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
?>">

	<div class="rb-section-content">

		<div class="<?php 
echo  esc_attr( $pageheader ) ;
?>">

			<?php 

if ( $thumbnail ) {
    // Get post thumbnail class, srcset and sizes arguments.
    
    if ( true === $rb_fullwidth ) {
        $thumb_data = rovenblog_thumb_size_args(
            $card_style,
            1,
            1,
            '-full'
        );
    } else {
        $thumb_data = rovenblog_thumb_size_args( $card_style );
    }
    
    ?>
				<div class="rb-card-background">

					<span><?php 
    the_post_thumbnail( $thumb_data['size'], $thumb_data['args'] );
    ?></span>

				</div>
			<?php 
}

?>

			<?php 

if ( !empty(trim( get_the_title() )) ) {
    ?>
				<div class="rb-card-content">

					<h3 class="rb-card-title">
						<?php 
    if ( 'style1' === $card_style ) {
        echo  '<span>' ;
    }
    the_title();
    if ( 'style1' === $card_style ) {
        echo  '</span>' ;
    }
    ?>
					</h3><!-- end .rb-card-title -->

				</div><!-- end .rb-card-content -->
			<?php 
}

?>

		</div><!-- end .rb-card-2 -->

	</div><!-- end .rb-section-content -->

</div><!-- end #rb-page-header -->
