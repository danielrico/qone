<?php
/**
 * Footer template.
 *
 * @package P2
 */
?>

<?php get_sidebar(); ?>

<footer>
	<div class="wrapper">
		<p>
			<?php echo prologue_poweredby_link(); ?>
		   <?php printf( __( 'Theme: %1$s by %2$s', 'p2' ), 'P2', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		   + <a href="http://www.daniel-rico.com/qone">Qone</a> by <a rel="designer" href="http://www.daniel-rico.com">Daniel Rico</a>.
		</p>
  </div>
</footer>

<div id="notify"></div>

<?php wp_footer(); ?>

</body>
</html>