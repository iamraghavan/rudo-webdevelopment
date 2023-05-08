<?php

/**
 * Template for Post Header Style 4
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

if ( $thumbnail ) {
    $card_class = ' rb-card-has-thumbnail';
} else {
    $card_class = ' rb-card-no-thumbnail';
}

if ( true !== get_theme_mod( 'rovenblog_post_show_sidebar' ) ) {
    $card_class .= ' rb-card-4-centered-content';
}
?>
<div id="rb-post-header" class="rb-section<?php 
echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
?>">
	<div class="rb-section-content">

		<div class="rb-card-4<?php 
echo  esc_attr( $card_class ) ;
?>">

			<div class="rb-card-header">

				<?php 

if ( $thumbnail ) {
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
					<div class="rb-card-thumbnail">

						<?php 
    the_post_thumbnail( $thumb_data['size'], $thumb_data['args'] );
    ?>

					</div>
				<?php 
}

?>

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

			</div><!-- end .rb-card-header -->

			<div class="rb-card-content">

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

				<?php 

if ( true === $author_enable && true === $date_enable && true === $comments_enable ) {
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

		</div><!-- end .rb-card-4 -->

	</div><!-- end .rb-section-content -->

</div><!-- end #rb-post-header -->

