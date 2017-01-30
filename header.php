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
	<?php // All scripts should be loaded in functions.php using cah_starter_scripts() or equivalent ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- UCF Assets -->
	<link rel="icon" href="http://www.ucf.edu/img/pegasus-icon.png" type="image/png">
	<?php // UCF header bar is loaded in functions.php with the other scripts ?>

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:700" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
	<header id="masthead" class="site-header" role="banner">

		<!-- Navigation -->
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<a class="logo" href="<?=home_url();?>"><?php display_logo(get_stylesheet_directory_uri() . '/public/images/logo.png');?></a>

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'cah-starter' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

		</nav><!-- #site-navigation -->
		
		<?php 
			// Get image on frontpage post to use as the full width hero image
			// Only if this is the homepage though
			// Uses MetaSlider to display the image(s). 
			// Get MetaSlider or figure something else out.
			if (is_front_page()) { 
				// Display logo found at the location in the argument
				// this is a custom function, found in functions.php
    			//echo do_shortcode("[metaslider id=12]"); 
    		}
		?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
