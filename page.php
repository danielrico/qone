<?php
/**
 * Static page template.
 *
 * @package P2
 */
?>
<?php get_header(); ?>

<div class="wrapper">

	<main>
		<div id="page_post">
			<h2><?php the_title(); ?></h2>
			<ul id="postlist">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php p2_load_entry(); ?>
					<?php endwhile; ?>

				<?php endif; ?>
			</ul>
		</div>
	</main>

</div> <!-- /.wrapper -->

<?php get_footer(); ?>