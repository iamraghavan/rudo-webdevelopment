<?php

/**
 * Template part for displaying the single post author info section
 *
 * @package Roven-Blog
 */
?>
<div id="rb-author-info" class="rb-section">

	<div class="rb-section-content">

		<?php 
$authors[] = get_the_author_meta( 'ID' );
foreach ( $authors as $author_id ) {
    ?>
			<div class="rb-author-box">

				<?php 
    
    if ( true === get_theme_mod( 'rovenblog_post_show_avatar', true ) ) {
        ?>
					<div class="rb-author-avatar">
						<?php 
        echo  get_avatar( $author_id, 90 ) ;
        ?>
					</div><!-- end .rb-author-avatar -->
				<?php 
    }
    
    ?>

				<div class="rb-author-details">
					<?php 
    // Post author name and link.
    
    if ( true === get_theme_mod( 'rovenblog_post_show_author_name', true ) ) {
        $author_name = get_the_author_meta( 'display_name', $author_id );
        ?>
						<h4>
							<a href="<?php 
        echo  esc_url( get_author_posts_url( $author_id ) ) ;
        ?>" title="<?php 
        echo  esc_attr( $author_name ) ;
        ?>"><?php 
        echo  esc_html( $author_name ) ;
        ?></a>
						</h4>
						<?php 
    }
    
    
    if ( true === get_theme_mod( 'rovenblog_post_show_author_info', true ) ) {
        // Post author info.
        ?>
						<p><?php 
        the_author_meta( 'description', $author_id );
        ?></p>
						<?php 
    }
    
    ?>
				</div><!-- end .rb-author-details -->

			</div><!-- end .rb-author-box -->
		<?php 
}
?>

	</div><!-- end .rb-section-content -->	

</div><!-- end #rb-author-info -->
