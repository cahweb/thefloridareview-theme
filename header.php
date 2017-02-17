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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400i,600,600i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
	<header id="masthead" class="site-header <?=(in_category("aquifer")) ? "aquifer-header" : "" ?>" role="banner">

		<!-- Navigation -->
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<a class="logo" href="<?=home_url();?>"><?php

			if(is_front_page())
				display_logo(get_stylesheet_directory_uri() . '/public/images/logo.png');
			else if(in_category("aquifer"))
				echo "<img class=\"site-logo aquifer-logo\" src=\"".get_stylesheet_directory_uri().'/public/images/aquifer-compact.png'."\">";
			else
				echo "<img class=\"site-logo bird-logo\" src=\"".get_stylesheet_directory_uri().'/public/images/logobird.png'."\">";

			?></a>

			<button class="menu-toggle" style="background-image: url(<?=get_stylesheet_directory_uri().'/public/images/menu.png'?>);" aria-controls="primary-menu" aria-expanded="false"></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?> 

		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
