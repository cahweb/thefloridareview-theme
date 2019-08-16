<?php
/**
 * Template Name: Book Page
 * Template Post Type: Page
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
