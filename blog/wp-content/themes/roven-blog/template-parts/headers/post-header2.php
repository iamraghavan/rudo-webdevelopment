<?php

/**
 * Template for Post Header Style 2
 *
 * @package Roven-Blog
 */
$postid = get_the_ID();
$thumbnail = has_post_thumbnail();
$category_enable = get_theme_mod( 'rovenblog_post_category', true );
$thumbnail_type = get_theme_mod( 'rovenblog_post_settings_aspect', 'hero' );
$card_class = '';
$thumbnail_size = '';
$rb_fullwidth = false;

if ( $thumbnail ) {
    $card_class = ' rb-card-has-thumbnail';
} else {
    $card_class = ' rb-card-no-thumbnail';
}

// Prepare the post thumbnail class and ratio variables.

if ( 'landscape' === $thumbnail_type ) {
    $card_class .= ' rb-card-aspect-ratio-landscape';
} elseif ( 'portrait' === $thumbnail_type ) {
    $card_class .= ' rb-card-aspect-ratio-portrait';
} elseif ( 'square' === $thumbnail_type ) {
    $card_class .= ' rb-card-aspect-ratio-square';
} else {
    $card_class .= ' rb-card-aspect-ratio-hero';
}

?>
<div id="rb-post-header" class="rb-section<?php 
echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
?>">

	<div class="rb-section-content">

		<div class="rb-card-2<?php 
echo  esc_attr( $card_class ) ;
?>">

			<?php 

if ( $thumbnail ) {
    // Get post thumbnail class, srcset and sizes arguments.
    
    if ( true === $rb_fullwidth ) {
        $thumb_data = rovenblog_thumb_size_args(
            $thumbnail_type,
            1,
            1,
            '-full'
        );
    } else {
        $thumb_data = rovenblog_thumb_size_args( $thumbnail_type );
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

			<div class="rb-card-content">

				<?php 
if ( true === $category_enable ) {
    
    if ( has_category() ) {
        // Begin fetching categories and listing them.
        $post_categories = get_the_terms( $postid, 'category' );
        ?>
						<div class="rb-card-meta">

							<span class="rb-card-categories">
								<?php 
        $sep_categ = 0;
        $categ_count = 0;
        foreach ( $post_categories as $category ) {
            
            if ( 0 !== $sep_categ ) {
                echo  ' ' ;
            } else {
                $sep_categ = 1;
            }
            
            ?>
									<a href="<?php 
            echo  esc_url( get_term_link( $category->term_id, 'category' ) ) ;
            ?>"><?php 
            echo  esc_html( $category->name ) ;
            ?></a>
									<?php 
            $categ_count++;
            if ( $categ_count >= 2 ) {
                break;
            }
        }
        ?>
							</span>

						</div><!-- end .rb-card-meta -->
						<?php 
    }

}
?>

				<?php 

if ( !empty(trim( get_the_title() )) ) {
    ?>
					<h3 class="rb-card-title">
						<?php 
    the_title();
    ?>
					</h3>
				<?php 
}

?>

			</div><!-- end .rb-card-content -->

		</div><!-- end .rb-card-2 -->

	</div><!-- end .rb-section-content -->

</div><!-- end #rb-post-header -->
