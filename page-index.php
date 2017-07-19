<?php get_header();?>

<div id="primary" class="content-area border-top">
	<main id="main" class="site-main" role="main">
		<?php

			the_title( '<h1 class="entry-title">', '</h1>' );

			the_content();

		?>
			<div id="cah-ajax-query-container"></div>
			
	</main>
	<?php //get_sidebar();?>
</div>

<?php get_footer();?>
