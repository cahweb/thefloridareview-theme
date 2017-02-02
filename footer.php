<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cah-starter
 */

?>

	</div><!-- #content -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php wp_nav_menu(array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ));
		?>
		<p>Copyright &copy; 2016 The Florida Review, University of Central Florida</p>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
