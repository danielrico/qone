<?php
/**
 * Single post template.
 *
 * @package P2
 */
?>
<?php get_header(); ?>

<div class="wrapper">

	<main>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<ul id="postlist">
		    		<?php p2_load_entry(); ?>
				</ul>
			<?php endwhile; ?>

		<?php else : ?>

			<ul id="postlist">
				<li class="no-posts">
			    	<h3><?php _e( 'No posts yet!', 'p2' ); ?></h3>
				</li>
			</ul>

		<?php endif; ?>

		<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="navigation cf">
				<p class="nav-older"><?php previous_post_link( '%link', _x( '&larr; %title', 'Previous post link', 'p2' ) ); ?></p>
				<p class="nav-newer"><?php next_post_link( '%link', _x( '%title &rarr;', 'Next post link', 'p2' ) ); ?></p>
			</div>
		<?php endif; ?>

	</main>

</div> <!-- /.wrapper -->

<?php get_footer(); ?>