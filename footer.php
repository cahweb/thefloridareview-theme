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

	<?php if(is_front_page()) :
	?>
		
		<div class="thanks">
			
			<img src="<?=get_stylesheet_directory_uri() . "/public/images/bird.png"?>">
			<h2>40 Years of The Florida Review</h2>
			<p>The Florida Review, the literary journal published twice yearly by the University of Central Florida. Our artistic mission is to publish the best poetry and prose written by the world's most excitin emerging and established writers. Our thanks to all those who have submitted, subscribed donated, read and supported TFR.</p>

		</div>	

	<?php endif;?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php wp_nav_menu(array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ));
		?>
		<p>Copyright &copy; 2016 The Florida Review, University of Central Florida</p>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
