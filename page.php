<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cah-starter
 */

get_header(); ?>
	<?php
		the_post(); 
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
				the_title( '<h1 class="entry-title">', '</h1>' );
				the_content();
			?>
		</main><!-- #main -->
		<?php get_sidebar();?>
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
