<?php
/**
 * Header template.
 *
 * @package P2
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header>
    <div class="wrapper cf">
      <?php do_action( 'before' ); ?>

      <h1><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

      <div class="show_menu" title="<?php _e( 'Menu', 'p2' ) ?>"><i class="fa fa-bars"></i></div>

      <?php if ( current_user_can( 'publish_posts' ) ) : ?>
        <a href="" id="mobile-post-button" style="display: none;"><?php _e( 'Post', 'p2' ) ?></a>
      <?php endif; ?>
    </div>
  </header>