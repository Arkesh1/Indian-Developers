<?php
/*
 * The template for displaying comments part
*/
if ( post_password_required() )
	return;
?>	

	<div id="comments" class="cloux-comments">
		<?php if ( have_comments() ) {  ?>
			<div class="comment-list content-box">
				<?php echo cloux_title( $title = esc_html__( 'Comments', 'cloux' ), $style = "style-4", $align = "left" ); ?>
				<ol>
					<?php

						if ( function_exists( 'cloux_comment' ) ) {
							$callback = 'cloux_comment';
						} else {
							$callback = '';
						}
						
						wp_list_comments( array(
							'style' => 'ol',
							'short_ping' => true,
							'avatar_size' => 100,
							'callback' => $callback,
							'reply_text' => '' . esc_html__( 'Reply', 'cloux' ),
						) );
					?>
				
					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
						<nav class="navigation comment-navigation" role="navigation">
							<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment Navigation', 'cloux' ); ?></h1>
							<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'cloux' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'cloux' ) ); ?></div>
						</nav>
					<?php } ?>

					<?php if ( ! comments_open() && get_comments_number() ) { ?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'cloux' ); ?></p>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>

		<div class="comment-form content-box">
			<?php
				$comments_args = array(
					'id_form' => '',
					'id_submit' => '',
					'title_reply_before' => '',
					'title_reply_after' => '',
					'title_reply' => cloux_title( $title = esc_html__( 'Leave', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'a Comment', 'cloux' ) ),
					'title_reply_to' => cloux_title( $title = esc_html__( 'Reply', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'Comment', 'cloux' ) ),
					'cancel_reply_link' => esc_html__( 'Cancel Reply', 'cloux'),
					'label_submit' => esc_html__( 'Post Comment', 'cloux'),
					'comment_field' => '<div class="form-textarea"><textarea class="form-control" placeholder="' . esc_html__( 'Your Comment', 'cloux' ) . '" name="comment" class="commentbody" id="comment" rows="4" tabindex="4"></textarea></div>',
					'comment_notes_before' => '',
					'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>
							'<div class="form-inputs"><div class="item name"><input class="form-control" type="text" placeholder="' . esc_html__( 'Name', 'cloux' ) . '" name="author" id="author" value="' . esc_attr( $comment_author ) . '" size="22" tabindex="1"' . ( $req ? "aria-required='true'" : '' ). ' /></div>',

						'email' =>
							'<div class="item email"><input class="form-control" type="text" placeholder="' . esc_html__( 'Email', 'cloux' ) . '" name="email" id="email" value="' . esc_attr( $comment_author_email ) . '" size="22" tabindex="1"' . ( $req ? "aria-required='true'" : '' ). ' /></div>',

						'url' =>
							'<div class="item website"><input class="form-control" type="text" placeholder="' . esc_html__('Website URL', 'cloux') . '" name="url" id="url" value="' . esc_attr($comment_author_url) . '" size="22" tabindex="1" /></div>',

						'submit' =>
							'<div class="item button"><button type="submit"/>' . esc_html__('Submit', 'cloux') . '</button></div></div>'
						)
					),
				);
				
				comment_form( $comments_args );
			?>
		</div>
	</div>