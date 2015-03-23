<?php
/**
 * Displays the content and meta information for a post object.
 *
 * @package P2
 */
?>
<li id="prologue-<?php the_ID(); ?>" <?php post_class(); ?>>
	<article class="the_post">
	<?php

	/*
	 * Post meta
	 */

	if ( ! is_page() ):
		$author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
		$posts_by_title   = sprintf(
			__( 'Posts by %1$s ( @%2$s )', 'p2' ),
			get_the_author_meta( 'display_name' ),
			get_the_author_meta( 'user_nicename' )
		); ?>

		<a href="<?php echo esc_attr( $author_posts_url ); ?>" title="<?php echo esc_attr( $posts_by_title ); ?>" class="post-avatar">
			<?php echo get_avatar( get_the_author_meta('user_email'), 48 ); ?>
		</a>
	<?php endif; ?>
	<table><tr><td>
		<?php if ( ! is_page() ): ?>
			<div class="post_author_date"><a href="<?php echo esc_attr( $author_posts_url ); ?>" title="<?php echo esc_attr( $posts_by_title ); ?>"><?php the_author(); ?></a>
			<?php endif; ?>
			<?php	if ( ! is_page() ) {
					echo p2_date_time_with_microformat();
			} ?></div>

			<?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : ?>
			<div class="tags">
				<?php tags_with_count( '', __( 'Tags:' , 'p2' ) .' ', ', ' ); ?>
			</div>
		<?php endif; ?>
	</td></tr></table>

	<div class="actions">
			<a href="<?php the_permalink(); ?>" class="thepermalink<?php if ( is_singular() ) { ?> printer-only<?php } ?>" title="<?php esc_attr_e( 'Permalink', 'p2' ); ?>"><i class="icon-link"></i></a>
			<?php
			if ( ! is_singular() )

			if ( comments_open() && ! post_password_required() ) {
					echo post_reply_link( array(
						'before'        => isset( $before_reply_link ) ? $before_reply_link : '',
						'after'         => '',
						'reply_text'    => '<i class="icon-comment"></i>',
						'add_below'     => 'comments'
					), get_the_ID() );
			}

			if ( current_user_can( 'edit_post', get_the_ID() ) ) : ?> <a href="<?php echo ( get_edit_post_link( get_the_ID() ) ); ?>" class="edit-post-link" rel="<?php the_ID(); ?>" title="<?php esc_attr_e( 'Edit', 'p2' ); ?>"><i class="icon-pencil"></i></a>
			<?php endif; ?>

			<?php do_action( 'p2_action_links' ); ?>
		</div>

	<?php
	/*
	 * Content
	 */
	?>

	<div id="content-<?php the_ID(); ?>" class="postcontent">
	<?php
		p2_title();
		the_content( __( '(More ...)' , 'p2' ) );
	?>
	</div>
</article><!-- /.the_post -->

	<?php
	/*
	 * Comments
	 */

	$comment_field = '<div class="form"><textarea id="comment" class="expand50-100" name="comment" cols="45" rows="3"></textarea></div> <label class="post-error" for="comment" id="commenttext_error"></label>';

	$comment_notes_before = '<p class="comment-notes">' . ( get_option( 'require_name_email' ) ? sprintf( ' ' . __( 'Required fields are marked %s', 'p2' ), '<span class="required">*</span>' ) : '' ) . '</p>';

	$p2_comment_args = array(
		'title_reply'           => __( 'Reply', 'p2' ),
		'comment_field'         => $comment_field,
		'comment_notes_before'  => $comment_notes_before,
		'comment_notes_after'   => '<span class="progress spinner-comment-new"></span>',
		'label_submit'          => __( 'Reply', 'p2' ),
		'id_submit'             => 'comment-submit',
	);

	?>

	<?php if ( get_comments_number() > 0 && ! post_password_required() ) : ?>
		<div class="discussion" style="display: none">
			<p>
				<?php p2_discussion_links(); ?>
				<a href="#" class="show-comments"><?php _e( 'Toggle Comments', 'p2' ); ?></a>
			</p>
		</div>
	<?php endif;

	wp_link_pages( array( 'before' => '<p class="page-nav">' . __( 'Pages:', 'p2' ) ) ); ?>

	<?php if ( p2_is_ajax_request() ) : ?>
		<ul id="comments-<?php the_ID(); ?>" class="commentlist inlinecomments"></ul>
	<?php else :
		comments_template();
		$pc = 0;
		if ( p2_show_comment_form() && $pc == 0 && ! post_password_required() ) :
			$pc++; ?>
			<div class="respond-wrap" <?php echo ( ! is_singular() ) ? 'style="display: none; "' : ''; ?>>
				<?php comment_form( $p2_comment_args ); ?>
			</div><?php
		endif;
	endif; ?>
</li>
