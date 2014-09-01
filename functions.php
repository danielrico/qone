<?php

// load css
  function load_qone_fonts() {
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Maven+Pro|Open+Sans:400italic,700italic,400,700');
    wp_enqueue_style( 'googleFonts');
    wp_register_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );
    wp_enqueue_style( 'font-awesome');
  }
  add_action('wp_print_styles', 'load_qone_fonts');

// load scripts
  function load_qone_scripts() {
    wp_register_script( 'fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', '', '', 'true');
    wp_enqueue_script( 'fitvids');
    wp_register_script( 'qone', get_stylesheet_directory_uri() . '/js/qone.js', '', '', 'true');
    wp_enqueue_script( 'qone');
  }
  add_action('wp_enqueue_scripts', 'load_qone_scripts');

// Add viewport meta tag to head
  function viewport_meta() { 
    echo '<meta name="viewport" content="width=device-width" />';
  }
  add_filter('wp_head', 'viewport_meta');

// Remove P2 custom formats
  function remove_post_formats() {
    remove_theme_support( 'post-formats' );
  }
  add_action( 'after_setup_theme', 'remove_post_formats', 11 );


// P2 comments overriding to use icons font
function qone_comments( $comment, $args ) {
  $GLOBALS['comment'] = $comment;

  if ( !is_single() && get_comment_type() != 'comment' )
    return;

  $depth          = prologue_get_comment_depth( get_comment_ID() );
  $can_edit_post  = current_user_can( 'edit_post', $comment->comment_post_ID );

  $reply_link     = prologue_get_comment_reply_link(
    array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '', 'reply_text' => __( '<i class="fa fa-comment"></i>' ) ),
    $comment->comment_ID, $comment->comment_post_ID );

  $content_class  = 'commentcontent';
  if ( $can_edit_post )
    $content_class .= ' comment-edit';

  ?>
  <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
    <?php do_action( 'p2_comment' ); ?>

    <?php echo get_avatar( $comment, 32 ); ?>
    <h4>
      <?php echo get_comment_author_link(); ?>
      <span class="meta">
        <?php echo p2_date_time_with_microformat( 'comment' ); ?>
        <span class="actions">
          <a class="thepermalink" href="<?php echo esc_url( get_comment_link() ); ?>" title="<?php esc_attr_e( 'Permalink', 'p2' ); ?>"><i class="fa fa-link"></i></a>
          <?php
          echo $reply_link;

          if ( $can_edit_post )
            edit_comment_link( __( '<i class="fa fa-pencil"></i>' ), '' );

          ?>
        </span>
      </span>
    </h4>
    <div id="commentcontent-<?php comment_ID(); ?>" class="<?php echo esc_attr( $content_class ); ?>"><?php
        echo apply_filters( 'comment_text', $comment->comment_content, $comment );

        if ( $comment->comment_approved == '0' ): ?>
          <p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'p2' ); ?></em></p>
        <?php endif; ?>
    </div>
  <?php
}

// Remove header customization provided by P2 theme
function remove_header_customization() {
  remove_theme_support( 'custom-header');
}
add_action( 'after_setup_theme', 'remove_header_customization', 11 );