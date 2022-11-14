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

			wp_reset_postdata();

			the_post();
			$thanks = get_the_content();
	?>
		<?php
			// TODO: fix this hack. This is a quick fix that should be changed
			// Super janky, if is front page end the #page div which constrains the width
		    // of elements, so that the footer will be full page width ?>
		</div><!-- #page -->

		<div class="thanks">

			<img src="<?=get_stylesheet_directory_uri() . "/public/images/bird.png"?>">
			<?php
				echo wpautop($thanks);
			?>

		</div>

	<?php endif;?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php wp_nav_menu(array( 'theme_location' => 'footer_menu', 'menu_id' => 'footer-menu' ));

			$uploads_folder = wp_upload_dir();
		?>
		<div class="feed-link">
			<a href="<?=get_site_url()?>/feed"><img class="img-responsive" src="<?=$uploads_folder['baseurl']?>/2017/03/feed-icon-28x28.png" alt="Subscribe!" title="Subscribe!" /></a>
		</div> <!-- /.feed-link -->

		<p>Copyright &copy; <?php echo date('Y'); ?> The Florida Review, University of Central Florida</p>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
