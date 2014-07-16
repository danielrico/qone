<?php
/**
 * Author template.
 *
 * @package P2
 */
?>
<?php get_header(); ?>

<div class="wrapper">
	<?php if ( p2_user_can_post() && !is_archive() ) : ?>
		<?php locate_template( array( 'post-form.php' ), true ); ?>
	<?php endif; ?>
	<main>

		<?php if ( have_posts() ) : ?>

			<div id="out_of_post_page_title">
				<?php printf( _x( 'Updates from %s', 'Author name', 'p2' ), p2_get_archive_author() ); ?>
			</div>

			<ul id="postlist">
				<?php while ( have_posts() ) : the_post(); ?>
		    		<?php p2_load_entry(); ?>
				<?php endwhile; ?>
			</ul>

		<?php else : ?>

			<div id="out_of_post_page_title"><?php _e( 'Not Found', 'p2' ); ?></div>
			<p><?php _e( 'Apologies, but the page you requested could not be found.', 'p2' ); ?></p>

		<?php endif; ?>

		<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="navigation">
				<p class="nav-older"><?php next_posts_link( __( '&larr; Older posts', 'p2' ) ); ?></p>
				<p class="nav-newer"><?php previous_posts_link( __( 'Newer posts &rarr;', 'p2' ) ); ?></p>
			</div>
		<?php endif; ?>

	</main>

</div> <!-- /.wrapper -->

<?php get_footer(); ?>