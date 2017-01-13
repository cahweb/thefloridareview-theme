<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cah-starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- UCF Assets -->
	<link rel="icon" href="http://www.ucf.edu/img/pegasus-icon.png" type="image/png">
	<script type="text/javascript" id="ucfhb-script" src="//universityheader.ucf.edu/bar/js/university-header.js"></script> 


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cah-starter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php 
			// Get image on frontpage post to use as the full width hero image
			$image_id = get_post_thumbnail_id();
			$image_url_array = wp_get_attachment_image_src($image_id, 'imagenail-size', true);
			$image_url = $thumb_url_array[0];
		?>

		<!-- Branding -->
		<div class="site-branding" style="background: url("<?php $image_url; ?>");">
			
			


		</div><!-- .site-branding -->

		<!-- Navigation -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cah-starter' ); ?></button>

			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
