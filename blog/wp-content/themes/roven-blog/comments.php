<?php
/**
 * The template for displaying comments
 *
 * @package Roven-Blog
 */

// Leave if the post is password protected and the visitor has not entered the passowrd.
if ( post_password_required() ) {
	return;
}
?>

<div id="rb-comments" class="rb-section">

	<div class="rb-section-content">

		<div class="rb-toggle">

			<div class="rb-toggle-header">
				<a class="rb-toggle-trigger" href="#"><span> <?php comments_number( esc_html__( '0 Comments', 'roven-blog' ), esc_html__( '1 Comment', 'roven-blog' ), esc_html__( '(%) Comments', 'roven-blog' ) ); ?></span> </a>
			</div>

			<div class="rb-toggle-content">

				<div id="comments" class="comments-area">

					<?php
					// Comment navigation above.
					if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
						?>
						<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">

							<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'roven-blog' ); ?></h2>

							<div class="nav-links">
								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'roven-blog' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'roven-blog' ) ); ?></div>
							</div>

						</nav>
					<?php } ?>

					<ol class="comment-list">
						<?php
						// Lists user comments.
						wp_list_comments(
							array(
								'style'       => 'ul',
								'short_ping'  => false,
								'avatar_size' => 64,
							)
						);
						?>
					</ol>

					<?php
					// Comment navigation below.
					if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
						?>
						<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">

							<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'roven-blog' ); ?></h2>

							<div class="nav-links">
								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'roven-blog' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'roven-blog' ) ); ?></div>
							</div>

						</nav>
					<?php } ?>
				</div><!-- end #comments -->

				<?php
				// Displays the comment form with customized html.
				comment_form(
					array(
						'class_submit'         => 'btn btn-default-1 bordered btn-lg',
						'cancel_reply_link'    => esc_html__( 'Cancel reply', 'roven-blog' ),
						'label_submit'         => esc_html__( 'Post comment', 'roven-blog' ),
						'title_reply'          => esc_html__( 'Leave a Reply', 'roven-blog' ),
						'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</h5>',
						'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . esc_html__( 'Your email address will not be published.', 'roven-blog' ) . '</span> ' . esc_html__( 'Required fields are marked', 'roven-blog' ) . ' <span class="required">*</span>',
						'id_form'              => 'comment-form',
						'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'roven-blog' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true"></textarea></p>',
						'fields'               => array(
							'author' => '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'roven-blog' ) . ' <span class="required">*</span></label><input id="author" name="author" value="" size="30" maxlength="245" aria-required="true" type="text"></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'roven-blog' ) . ' <span class="required">*</span></label><input id="email" name="email" value="" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" type="email"></p>',
							'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'roven-blog' ) . '</label><input id="url" name="url" value="" size="30" maxlength="200" type="url"></p>',
						),
					)
				);
				?>

			</div><!-- end .rb-toggle-content -->

		</div><!-- end .rb-toggle -->

	</div><!-- end .rb-section-content -->

</div><!-- end #rb-comments -->
