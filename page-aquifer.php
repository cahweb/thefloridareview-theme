<?php get_header();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php

			the_post();

			the_title( '<h1 class="entry-title">', '</h1>' );

		?>
			<div id="cah-ajax-query-container"></div>
		<?
			the_content();
		?>
	</main>
	<?php get_sidebar(); ?>
</div>

<?php get_footer();?>
