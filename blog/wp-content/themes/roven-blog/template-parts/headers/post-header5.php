<?php

/**
 * Template for Post Header Style 5
 *
 * @package Roven-Blog
 */
$postid = get_the_ID();
$thumbnail = has_post_thumbnail();
$category_enable = get_theme_mod( 'rovenblog_post_category', true );
$author_enable = get_theme_mod( 'rovenblog_post_author', true );
$date_enable = get_theme_mod( 'rovenblog_post_date', true );
$comments_enable = get_theme_mod( 'rovenblog_post_comments', true );
$card_class = '';
$rb_fullwidth = false;
if ( true !== get_theme_mod( 'rovenblog_post_show_sidebar' ) ) {
    $card_class = ' rb-card-5-centered-content';
}
if ( !has_post_format( 'video' ) && !has_post_format( 'audio' ) && !has_post_format( 'gallery' ) ) {
    
    if ( $thumbnail ) {
        $card_class .= ' rb-card-has-thumbnail';
    } else {
        $card_class .= ' rb-card-no-thumbnail';
    }

}
?>
<div id="rb-post-header" class="rb-section<?php 
echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
?>">

	<div class="rb-section-content">

		<div class="rb-card-5<?php 
echo  esc_attr( $card_class ) ;
?>">

			<?php 

if ( has_post_format( 'video' ) ) {
    // Video header content.
    $content = apply_filters( 'the_content', get_the_content() );
    $embeds = get_media_embedded_in_content( $content, array(
        'video',
        'object',
        'embed',
        'iframe'
    ) );
    
    if ( !empty($embeds) ) {
        ?>
					<div class="rb-card-header rb-media-wrapper">
						<?php 
        // Iframe and audio allowed tags.
        global  $allowedtags ;
        $attributes = array(
            'src'             => array(),
            'style'           => array(),
            'preload'         => array(),
            'id'              => array(),
            'class'           => array(),
            'type'            => array(),
            'width'           => array(),
            'height'          => array(),
            'frameborder'     => array(),
            'loading'         => array(),
            'title'           => array(),
            'allow'           => array(),
            'allowFullScreen' => array(),
            'controls'        => array(),
        );
        $media_types = array(
            'iframe' => $attributes,
            'audio'  => $attributes,
            'source' => $attributes,
            'video'  => $attributes,
        );
        $allowed = array_merge( $allowedtags, $media_types );
        echo  wp_kses( $embeds[0], $allowed ) ;
        ?>
					</div>	
					<?php 
    }

} elseif ( has_post_format( 'audio' ) ) {
    // Audio header content.
    $content = apply_filters( 'the_content', get_the_content() );
    $embeds = get_media_embedded_in_content( $content, array(
        'audio',
        'object',
        'embed',
        'iframe'
    ) );
    
    if ( !empty($embeds) ) {
        // Check if the embed is a shortcode in order to asign a different class to the header.
        
        if ( '<audio' === substr( $embeds[0], 0, 6 ) ) {
            $card_class = ' rb-audio-alt';
        } else {
            $card_class = ' rb-media-wrapper';
        }
        
        ?>
					<div class="rb-card-header<?php 
        echo  esc_attr( $card_class ) ;
        ?>">
						<?php 
        // Iframe and audio allowed tags.
        global  $allowedtags ;
        $attributes = array(
            'src'             => array(),
            'style'           => array(),
            'preload'         => array(),
            'id'              => array(),
            'class'           => array(),
            'type'            => array(),
            'width'           => array(),
            'height'          => array(),
            'frameborder'     => array(),
            'loading'         => array(),
            'title'           => array(),
            'allow'           => array(),
            'allowFullScreen' => array(),
        );
        $media_types = array(
            'iframe' => $attributes,
            'audio'  => $attributes,
            'source' => $attributes,
        );
        $allowed = array_merge( $allowedtags, $media_types );
        echo  wp_kses( $embeds[0], $allowed ) ;
        ?>
					</div>	
					<?php 
    }

} elseif ( has_post_format( 'gallery' ) ) {
    // Gallery header content.
    ?>
				<div class="rb-card-header">
					<?php 
    
    if ( has_block( 'core/gallery' ) ) {
        // Split content around a block gallery class name.
        $content = apply_filters( 'the_content', get_the_content() );
        $split1 = explode( 'wp-block-gallery-', $content );
        $split2 = explode( 'class="', $split1[0] );
        $split3 = explode( '"', $split1[1] );
        $key_count = count( $split2 );
        $gallery1 = get_post_gallery();
        $occurence = 1;
        $gallery2 = str_replace(
            '<figure>',
            '<figure class="' . $split2[$key_count - 1] . 'wp-block-gallery-' . $split3[0] . '">',
            $gallery1,
            $occurence
        );
        echo  wp_kses_post( $gallery2 ) ;
    } else {
        echo  wp_kses_post( get_post_gallery() ) ;
    }
    
    ?>
				</div>	
				<?php 
} elseif ( $thumbnail ) {
    // Regular post header image.
    $thumbnail_type = get_theme_mod( 'rovenblog_post_settings_aspect', 'hero' );
    // Get post thumbnail class, srcset and sizes arguments.
    
    if ( true === $rb_fullwidth ) {
        $thumb_data = rovenblog_thumb_size_args(
            $thumbnail_type,
            1,
            0,
            '-full'
        );
    } else {
        $thumb_data = rovenblog_thumb_size_args( $thumbnail_type, 1, 0 );
    }
    
    ?>
				<div class="rb-card-header">

					<div class="rb-card-thumbnail">
						<?php 
    the_post_thumbnail( $thumb_data['size'], $thumb_data['args'] );
    ?>
					</div>

				</div><!-- end .rb-card-header -->
			<?php 
}

?>

			<div class="rb-card-content">

				<div class="rb-card-meta">
					<?php 
if ( true === $category_enable ) {
    
    if ( has_category() ) {
        // Begin fetching categories and listing them.
        $post_categories = get_the_terms( $postid, 'category' );
        ?>
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
							<?php 
    }

}
?>
				</div><!-- end .rb-card-meta -->

				<?php 

if ( !empty(trim( get_the_title() )) ) {
    ?>
					<h3 class="rb-card-title">
						<span><?php 
    the_title();
    ?></span>
					</h3>
				<?php 
}

?>

				<?php 

if ( true === $author_enable || true === $date_enable || true === $comments_enable ) {
    ?>
					<div class="rb-card-meta">
						<?php 
    
    if ( true === $author_enable ) {
        // Post author.
        ?>
							<span class="rb-card-author">
								<?php 
        $coauthors = false;
        
        if ( $coauthors ) {
            // Mutiple post authors based on Co-authors plus plugin.
            $co_authors = get_coauthors();
            
            if ( 1 < count( $co_authors ) ) {
                echo  '<i class="rovenblog-icon-users"></i> ' ;
            } else {
                echo  '<i class="rovenblog-icon-user"></i> ' ;
            }
            
            coauthors_posts_links();
        } else {
            // Regular single post author.
            echo  '<i class="rovenblog-icon-user"></i> ' ;
            the_author_posts_link();
        }
        
        ?>
							</span>
							<?php 
    }
    
    
    if ( true === $date_enable ) {
        // Post date.
        ?>
							<span class="rb-card-date"><i class="rovenblog-icon-calendar"></i> <?php 
        echo  get_the_date() ;
        ?></span>
							<?php 
    }
    
    
    if ( true === $comments_enable ) {
        // Post comments count.
        ?>
							<span class="rb-card-comments"><i class="rovenblog-icon-message-square"></i> <?php 
        comments_number( esc_html__( '0', 'roven-blog' ), esc_html__( '1', 'roven-blog' ), '%' );
        ?></span>
						<?php 
    }
    
    ?>
					</div><!-- end .rb-card-meta -->
				<?php 
}

?>

			</div><!-- end .rb-card-content -->

		</div><!-- end .rb-card-5 -->

	</div><!-- end .rb-section-content -->

</div><!-- end #rb-post-header -->
