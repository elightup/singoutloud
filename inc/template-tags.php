<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package singoutloud
 */
function singoutloud_post_new() {
	?>
	<div class="new-home__item">
		<div class="new-home__image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
		<div class="new-home__title">
			<p class="date"><?= get_the_date( 'd/m' );?></p>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
	</div>
	<?php
}

if ( ! function_exists( 'singoutloud_comment_template' ) ) {

	function singoutloud_comment_template( $comment, $args, $depth ) {
		?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<div class="comment-avatar">
					<?php echo wp_kses_post( get_avatar( $comment, $args['avatar_size'] ) ); ?>
				</div>
				<div class="comment-text">
					<div class="comment-header">
						<div class="comment-meta">
							<span class="comment-author vcard">
								<?php
								printf(
									'<span class="fn">%1$s</span><span class="screen-reader-text says">%2$s</span>',
									wp_kses_post( get_comment_author_link() ),
									esc_html__( 'says:', 'singoutloud' )
								);
								?>
							</span><!-- .comment-author -->

							<div class="comment-metadata">
								<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
									<?php
									/* translators: 1: Comment date, 2: Comment time. */
									$comment_timestamp = sprintf( __( '%1$s - at %2$s', 'singoutloud' ), get_comment_date( 'd M Y', $comment ), get_comment_time() );
									?>
									<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
										<?php echo esc_html( $comment_timestamp ); ?>
									</time>
								</a>
							</div><!-- .comment-metadata -->
						</div>
						<?php
						echo get_comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below'  => 'div-comment',
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
									'reply_text' => sprintf( __( 'Reply %s', 'singoutloud' ), SingOutLoud_Icons::render( 'reply', false ) ),
								)
							)
						);
						?>
					</div>
					<div class="comment-content entry-content">

						<?php

						comment_text();

						if ( '0' === $comment->comment_approved ) {
							?>
							<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'singoutloud' ); ?></p>
							<?php
						}

						?>

					</div><!-- .comment-content -->

					<?php

					$by_post_author = singoutloud_is_comment_by_post_author( $comment );

					if ( $by_post_author ) {
						?>

						<footer class="comment-footer-meta">

							<?php
							if ( get_edit_comment_link() ) {
								echo '<span class="comment-edit-link"><a href="' . esc_url( get_edit_comment_link() ) . '">' . esc_html__( 'Edit', 'singoutloud' ) . '</a></span>';
							}
							if ( $by_post_author ) {
								echo '<span class="bypostauthor">' . esc_html__( 'By Post Author', 'singoutloud' ) . '</span>';
							}
							?>

						</footer>

						<?php
					}
					?>
				</div>
			</article><!-- .comment-body -->

		<?php
	}
}

/**
 * Check if the specified comment is written by the author of the post commented on.
 *
 * @param object $comment Comment data.
 *
 * @return bool
 */
function singoutloud_is_comment_by_post_author( $comment = null ) {
	if ( is_object( $comment ) && $comment->user_id > 0 ) {

		$user = get_userdata( $comment->user_id );
		$post = get_post( $comment->comment_post_ID );

		if ( ! empty( $user ) && ! empty( $post ) ) {

			return $comment->user_id === $post->post_author;

		}
	}
	return false;
}
