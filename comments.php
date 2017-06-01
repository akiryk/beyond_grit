<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beyond_grit
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">Comments on this post
			<?php
				// printf( // WPCS: XSS OK.
				// 	esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'beyond_grit' ) ),
				// 	number_format_i18n( get_comments_number() ),
				// 	'<span>' . get_the_title() . '</span>'
				// );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'beyond_grit' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'beyond_grit' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'beyond_grit' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'beyond_grit' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'beyond_grit' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'beyond_grit' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'beyond_grit' ); ?></p>
	<?php endif; ?>
	
	<?php 

		$fields =  array(
		  'author' =>
		    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
		    ( $req ? '<span class="required">(required) </span>' : '' ) .
		    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" size="30"' . $aria_req . ' /></p>',

		  'email' =>
		    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
		    ( $req ? '<span class="required">(required) </span>' : '' ) .
		    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" size="30"' . $aria_req . ' /></p>'
		);

		$args = array(
		  'id_form'           => 'commentform',
		  'class_form'      => 'comment-form',
		  'id_submit'         => 'submit',
		  'class_submit'      => 'submit',
		  'name_submit'       => 'submit',
		  'title_reply'       => __( 'Leave a Reply' ),
		  'title_reply_to'    => __( 'Leave a Reply to %s' ),
		  'cancel_reply_link' => __( 'Cancel Reply' ),
		  'label_submit'      => __( 'Post Comment' ),
		  'format'            => 'xhtml',

		  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
		    '</label><textarea id="comment" class="comment-textarea" name="comment" cols="45" rows="8" aria-required="true">' .
		    '</textarea></p>',

		  'must_log_in' => '<p class="must-log-in">' .
		    sprintf(
		      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		    ) . '</p>',

  		  'comment_notes_before' => '<p class="comment-notes">' .
		    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
		    '</p>',

		    'logged_in_as' => '<p class="logged-in-as">' .
		    sprintf(
		    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
		      admin_url( 'profile.php' ),
		      $user_identity,
		      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
		    ) . '</p>',

		  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		);

	?>
	<?php comment_form($args); ?>

	<?php if ( '0' == $comment->comment_approved ) : ?>
		<p>	
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'your-text-domain' ); ?></em>
		</p>
	<?php endif; ?>
</div><!-- #comments -->
