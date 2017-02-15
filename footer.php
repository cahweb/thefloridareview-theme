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

	<?php // TODO: this should be in it's own partial insteaod of in every footer ?>
	<?php if(is_front_page()) :
	?>
		<?php 
			// TODO: fix this hack. This is a quick fix that should be changed
			// Super janky, if is front page end the #page div which constrains the width
		    // of elements, so that the footer will be full page width ?>	
		</div><!-- #page -->

		<div class="thanks">
			
			<img src="<?=get_stylesheet_directory_uri() . "/public/images/bird.png"?>">
			<h3>40 Years of The Florida Review</h3>
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
