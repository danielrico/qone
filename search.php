<?php
/**
 * Search result template.
 *
 * @package P2
 */
?>
<?php get_header(); ?>

<div class="wrapper">

	<main>
		
		<div id="out_of_post_page_title">
			<?php printf( __( 'Search Results for: %s', 'p2' ), get_search_query() ); ?>
		</div>

		<?php if ( have_posts() ) : ?>

			<ul id="postlist">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php p2_load_entry(); ?>
			<?php endwhile; ?>
			</ul>

		<?php else : ?>

			<div class="no-posts">
			  <h3><?php _e( 'No posts found!', 'p2' ); ?></h3>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'p2' ); ?></p>
				<?php get_search_form(); ?>
			</div>

		<?php endif ?>

		<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="navigation">
				<p class="nav-older"><?php next_posts_link( __( '&larr; Older posts', 'p2' ) ); ?></p>
				<p class="nav-newer"><?php previous_posts_link( __( 'Newer posts &rarr;', 'p2' ) ); ?></p>
			</div>
		<?php endif ?>

	</main>

</div> <!-- /.wrapper -->

<?php get_footer(); ?>