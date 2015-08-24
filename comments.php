<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 *  @package ThemeMove
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
		<h3 class="comments-title">
			<?php
      printf(esc_html__('Comments (%1$s)', 'thememove'), get_comments_number());
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'infinity' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'infinity' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'infinity' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
          'callback'    => 'ThemeMove_comment',
          'avatar_size' => 100
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'infinity' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'infinity' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'infinity' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'infinity' ); ?></p>
	<?php endif; ?>

  <?php
  $commenter     = wp_get_current_commenter();
  $req           = get_option('require_name_email');
  $aria_req      = ($req ? " aria-required='true'" : '');
  $fields        = array(
    'author'        => '<div class="col-md-6">' . '<input id="author" placeholder="' . __('Your name (required)', 'thememove') . '" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
    'email'         => '<div class="col-md-6">' . '<input id="email" placeholder="' . __('Email (required)', 'thememove') . '" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div>',
  );
  $comments_args = array(
    // change the title of send button
    'label_submit'         => 'Submit',
    // change the title of the reply section
    'title_reply'          => 'Write a comment',
    // remove "Text or HTML to be displayed after the set of comment fields"
    'comment_notes_after'  => '',
    'comment_notes_before' => '',
    'fields'               => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => '<div class="col-md-12"><textarea id="comment" rows="8" placeholder="' . __( 'Your comment (required)','thememove' ) . '" name="comment" aria-required="true"></textarea></div>',
  );
  comment_form($comments_args); ?>

</div><!-- #comments -->
