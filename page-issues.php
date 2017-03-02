<?php get_header();?>

<div id="primary" class="content-area border-top">
	<main id="main" class="site-main" role="main">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );

			$query = new WP_Query(array(
			    'post_type' => 'issue',
			    'post_status' => 'publish',
			    'posts_per_page' => 3
			));

			$count = 0;
			while ($query->have_posts()) {
				$query->the_post();

				if($count == 0)
					echo "<div class=\"issue-display\">";
		?>
					<div class="issue-container">
						<div class="issue-image"></div>
						<div class="issue-info">
							<h4>41.5 | Summer 2017</h4>
						</div>
					</div>

		<?php
				if($count == 0)
					echo "</div>";
				$count++;
			}
		?>
	</main>
	<?php get_sidebar();?>
</div>

<?php get_footer();?>
