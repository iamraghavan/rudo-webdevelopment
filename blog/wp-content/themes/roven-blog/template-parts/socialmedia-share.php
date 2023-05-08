<?php
/**
 * The template for displaying the post social share links
 *
 * @package Roven-Blog
 */

$title1 = wp_strip_all_tags( get_the_title() );
$title2 = str_replace( ' ', '%20', $title1 );
$title3 = str_replace( ' ', '+', $title1 );

// Social Media Share Layout option.
$social_layout = get_theme_mod( 'rovenblog_post_social_share', array( 'Facebook', 'Twitter', 'Linkedin', 'Pinterest', 'WhatsApp' ) );
?>
<ul class="rb-social-share">
	<li><small class="rb-color-mute"><?php esc_html_e( 'SHARE', 'roven-blog' ); ?></small></li>
	<?php
	foreach ( $social_layout as $social_media ) {
		if ( 'Facebook' === $social_media ) {
			?>
			<li><a class="rb-bg-color-facebook" rel="nofollow" target="_blank" href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>' aria-label="<?php esc_attr_e( 'Share on Facebook', 'roven-blog' ); ?>"><i class="rovenblog-icon-facebook"></i></a></li>
			<?php
		} elseif ( 'Twitter' === $social_media ) {
			// Optional Twitter handle.
			$via_t          = '';
			$twitter_handle = str_replace( 'https://twitter.com/', '', get_theme_mod( 'rovenblog_post_twitter_link' ) );
			$twitter_handle = str_replace( '/', '', $twitter_handle );
			if ( '' !== trim( $twitter_handle ) ) {
				$via_t = '&amp;via=' . $twitter_handle;
			}
			?>
			<li><a class="rb-bg-color-twitter" rel="nofollow" target="_blank" href='https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo esc_attr( $title2 ) . esc_attr( $via_t ); ?>' aria-label="<?php esc_attr_e( 'Share on Twitter', 'roven-blog' ); ?>"><i class="rovenblog-icon-twitter"></i></a></li>
			<?php
		} elseif ( 'Linkedin' === $social_media ) {
			?>
			<li><a class="rb-bg-color-linkedin" rel="nofollow" target="_blank" href='https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr( $title3 ); ?>' aria-label="<?php esc_attr_e( 'Share on Linkedin', 'roven-blog' ); ?>"><i class="rovenblog-icon-linkedin"></i></a></li>
			<?php
		} elseif ( 'Pinterest' === $social_media ) {
			?>
			<li><a class="rb-bg-color-pinterest" rel="nofollow" target="_blank" href='https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url(); ?>&amp;description=<?php echo esc_attr( $title3 ); ?>' aria-label="<?php esc_attr_e( 'Share on Pinterest', 'roven-blog' ); ?>"><i class="rovenblog-icon-pinterest"></i></a></li>
			<?php
		} elseif ( 'Tumblr' === $social_media ) {
			?>
			<li><a class="rb-bg-color-tumblr" rel="nofollow" target="_blank" href='https://www.tumblr.com/share/link?url=<?php the_permalink(); ?>' aria-label="<?php esc_attr_e( 'Share on Tumblr', 'roven-blog' ); ?>"><i class="rovenblog-icon-tumblr"></i></a></li>
			<?php
		} elseif ( 'Reddit' === $social_media ) {
			?>
			<li><a class="rb-bg-color-reddit" rel="nofollow" target="_blank" href='https://reddit.com/submit?url=<?php the_permalink(); ?>' aria-label="<?php esc_attr_e( 'Share on Reddit', 'roven-blog' ); ?>"><i class="rovenblog-icon-reddit"></i></a></li>
			<?php
		} elseif ( 'GetPocket' === $social_media ) {
			?>
			<li><a class="rb-bg-color-get-pocket" rel="nofollow" target="_blank" href='https://getpocket.com/save?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr( $title2 ); ?>' aria-label="<?php esc_attr_e( 'Share on GetPocket', 'roven-blog' ); ?>"><i class="rovenblog-icon-get-pocket"></i></a></li>
			<?php
		} elseif ( 'VK' === $social_media ) {
			?>
			<li><a class="rb-bg-color-vk" rel="nofollow" target="_blank" href='https://vk.com/share.php?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr( $title2 ); ?>' aria-label="<?php esc_attr_e( 'Share on VK', 'roven-blog' ); ?>"><i class="rovenblog-icon-vk"></i></a></li>
			<?php
		} elseif ( 'Odnoklassniki' === $social_media ) {
			?>
			<li><a class="rb-bg-color-odnoklassniki" rel="nofollow" target="_blank" href='https://connect.ok.ru/dk?cmd=WidgetSharePreview&amp;st.cmd=WidgetSharePreview&amp;st.shareUrl=<?php the_permalink(); ?>' aria-label="<?php esc_attr_e( 'Share on Odnoklassniki', 'roven-blog' ); ?>"><i class="rovenblog-icon-odnoklassniki"></i></a></li>
			<?php
		} elseif ( 'WhatsApp' === $social_media ) {
			?>
			<li class="rb-mobile-only"><a class="rb-bg-color-whatsapp" rel="nofollow" href="whatsapp://send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share" target="_blank" aria-label="<?php esc_attr_e( 'Share on WhatsApp', 'roven-blog' ); ?>"><i class="rovenblog-icon-whatsapp"></i></a></li>
			<?php
		}
	}
	?>
</ul>
