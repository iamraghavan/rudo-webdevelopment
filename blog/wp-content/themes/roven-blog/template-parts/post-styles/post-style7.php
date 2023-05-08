<?php

/**
 * Template for non-single posts - Style 7
 *
 * @package Roven-Blog
 */
$postid = get_the_ID();
$thumbnail = has_post_thumbnail();
$card_class = ' rb-card-aspect-ratio-' . $args['thumbnail_type'];

if ( $thumbnail ) {
    $card_class .= ' rb-card-has-thumbnail';
} else {
    $card_class .= ' rb-card-no-thumbnail';
}

if ( !isset( $args['lazy'] ) ) {
    $args['lazy'] = 1;
}
?>
<div class="rb-card-7<?php 
echo  esc_attr( $card_class ) ;
?>">

	<?php 

if ( $thumbnail ) {
    // Get post thumbnail class, srcset and sizes arguments.
    $thumb_data = rovenblog_thumb_size_args(
        $args['thumbnail_type'],
        $args['lazy'],
        1,
        $args['thumbnail_limit']
    );
    ?>
		<div class="rb-card-background">

			<a href="<?php 
    the_permalink();
    ?>" aria-label="<?php 
    esc_attr_e( 'Post Featured Image', 'roven-blog' );
    ?>"><?php 
    the_post_thumbnail( $thumb_data['size'], $thumb_data['args'] );
    ?></a>

		</div>
	<?php 
}

?>

	<div class="rb-card-content">

		<?php 
if ( true === $args['category_enable'] ) {
    
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
				<a class="rb-text-animation-2" href="<?php 
    the_permalink();
    ?>"><?php 
    the_title();
    ?></a>
			</h3>
		<?php 
}

?>

		<?php 

if ( true === $args['author_enable'] || true === $args['date_enable'] || true === $args['comments_enable'] ) {
    ?>
			<div class="rb-card-meta">
				<?php 
    
    if ( true === $args['author_enable'] ) {
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
    
    
    if ( true === $args['date_enable'] ) {
        // Post date.
        ?>
					<span class="rb-card-date"><i class="rovenblog-icon-calendar"></i> <?php 
        echo  get_the_date() ;
        ?></span>
					<?php 
    }
    
    
    if ( true === $args['comments_enable'] ) {
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

</div><!-- end .rb-card-3 -->

<?php 

if ( true === $args['excerpt_enable'] ) {
    // Post excerpt.
    ?>
	<div class="rb-card-excerpt"><?php 
    the_excerpt();
    ?></div>
	<?php 
}
