<?php get_header();?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php

			the_post();

			the_title( '<h1 class="entry-title">', '</h1>' );

			the_content();

		?>
			<? get_search_form();?>
            
            <div id="cah-ajax-query-container"></div>

	</main>
	<?php //get_sidebar();?>
</div>

<?php get_footer();?>
