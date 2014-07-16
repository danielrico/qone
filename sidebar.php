<?php
/**
 * Sidebar template.
 *
 * @package P2
 */
?>
<?php if ( !p2_get_hide_sidebar() ) : ?>
	<aside class="cf">
		<div id="sidebar_inner">
			<?php do_action( 'before_sidebar' ); ?>

			<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div role="navigation" class="site-navigation main-navigation widget">
				<h2 class="assistive-text"><?php _e( 'Menu', 'p2' ); ?></h2>
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'fallback_cb'    => '__return_false',
				) ); ?>
			</div>
			<?php endif; ?>

			<ul class="widget">
				<h2><?php _e( 'Options', 'p2' ); ?></h2>
				<li><a href="#" id="togglecomments"> <?php _e( 'Toggle Comment Threads', 'p2' ); ?></a></li>
			</ul>

			<ul>
				<?php
				if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar() ) {
					the_widget( 'P2_Recent_Comments', array(), array( 'before_widget' => '<li> ', 'after_widget' => '</li>', 'before_title' =>'<h2>', 'after_title' => '</h2>' ) );
					the_widget( 'P2_Recent_Tags', array(), array( 'before_widget' => '<li> ', 'after_widget' => '</li>', 'before_title' =>'<h2>', 'after_title' => '</h2>' ) );
				}
				?>
			</ul>
			
		</div>
	</aside>
<?php endif; ?>