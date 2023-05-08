<?php

/**
 * Template part for displaying the archive author info section
 *
 * @package Roven-Blog
 */
$authors = array();
$rb_avatar = true;
$rb_name = true;
$rb_info = true;
$rb_fullwidth = false;
?>
<div id="rb-author-info" class="rb-section<?php 
echo  ( $rb_fullwidth ? ' rb-stretch-fullwidth' : '' ) ;
?>">

	<div class="rb-section-content">

		<?php 
if ( !$authors ) {
    // Regular single post author.
    $authors[] = get_the_author_meta( 'ID' );
}
foreach ( $authors as $author_id ) {
    ?>
			<div class="rb-author-box">

				<?php 
    
    if ( $rb_avatar ) {
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
    
    if ( true === $rb_name ) {
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
    
    
    if ( true === $rb_info ) {
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
