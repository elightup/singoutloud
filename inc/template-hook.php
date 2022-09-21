<?php
// Change Comment form
add_filter( 'comment_form_defaults', 'singoutloud_comment_form_args' );
function singoutloud_comment_form_args( $defaults ) {
	global $user_identity, $id;
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? ' aria-required="true"' : '' );
	$author    = '<p class="comment-form-author">' .
			'<input id="author" name="author" required="true" type="text" class="author" placeholder="Full Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . '/>' .
			'</p>';
	$email     = '<p class="comment-form-email">' .
			'<input id="email" name="email" required="true" type="text" class="email" placeholder="Email Address*" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />' .
			'</p>';
	$url       = '<p class="comment-form-url">' .
		'<input id="url" name="url" type="text" required="true" class="url" placeholder="Website URL" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="3" />' .
		'</p>';

	$comment_field = '<p class="comment-form-comment">' .
					'<textarea id="comment" name="comment" required="true" placeholder="Write Your Comment Here ..." cols="45" rows="8" class="form" tabindex="4" required="true"></textarea>' .
					'</p>';
	$args          = array(
		'fields'               => array(
			'author' => $author,
			'email'  => $email,
			'url'    => $url,
		),
		'comment_field'        => $comment_field,
		'title_reply'          => __( 'Bình luận', 'singoutloud' ),
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
	);
	$args          = wp_parse_args( $args, $defaults );
	return apply_filters( 'singoutloud_comment_form_args', $args, $user_identity, $id, $commenter, $req, $aria_req );
}
