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

	<title>
		<?php

			$title = get_bloginfo('name') . " at UCF";

			if (!is_front_page()) {
				global $post;
				$postId = $post->ID;

				$title = get_the_title($postId) . " | " . $title;
			}

			echo $title;

		 ?>
	</title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- UCF Assets -->
	<link rel="icon" href="https://www.ucf.edu/img/pegasus-icon.png" type="image/png">
	<?php // UCF header bar is loaded in functions.php with the other scripts ?>

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600,600i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">


	<?php wp_head(); ?>

	<?php if ("article" == get_post_type() && in_category("aquifer")) : ?>

		<style type="text/css">
			#main p {
				margin-top: 0;
			}

			#main h3 {
				margin-bottom: 20px;
			}
		</style>

	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
	<header id="masthead" class="site-header <?=(in_category("aquifer") || is_page("aquifer")) ? "aquifer-header" : "" ?>" role="banner">

		<!-- Navigation -->
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<a class="logo" href="<?=home_url();?>"><?php

			if(is_front_page())
				display_logo(get_stylesheet_directory_uri() . '/public/images/logo.png');
			else if(is_page_template('page-rupture.php'))
				echo "<img class=\"site-logo aquifer-logo\" src=\"".get_stylesheet_directory_uri().'/public/images/aquifer-compact-2-white.png'."\">";
			else if(in_category("aquifer") || is_page("aquifer"))
				echo "<img class=\"site-logo aquifer-logo\" src=\"".get_stylesheet_directory_uri().'/public/images/aquifer-compact-2.png'."\">";
			else
				echo "<img class=\"site-logo bird-logo\" src=\"".get_stylesheet_directory_uri().'/public/images/logobird.png'."\">";

			?></a>

			<a class="menu-toggle" href="#primary-menu" data-toggle="collapse">
				<div class="menu-toggle" style="background-image: url(<?=get_stylesheet_directory_uri().'/public/images/menu.png'?>);"></div>
			</a>
			<?php /*wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id' => 'primary-menu',
				//'depth' => 2,
			) );*/

				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id' => 'primary-menu',
					'depth' => 2,
					'walker' => new WP_Bootstrap_Navwalker()
				) );
			?>

		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
