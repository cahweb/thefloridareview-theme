<?php get_header();?>

<div id="primary" class="content-area border-top">
	<main id="main" class="site-main" role="main">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );

			$query = new WP_Query(array(
			    'post_type' => 'issue',
			    'post_status' => 'publish'
			));

			$issues_per_row = 3;
			$count = 0;
			while ($query->have_posts()) {
				$query->the_post();
				$id = get_the_id();
				$title = get_the_title();
				$thumbnail = get_the_post_thumbnail_url($id);
				$vol_num = get_post_meta($id,"vol-num",true);
				$issue_num = get_post_meta($id,"issue-num",true);
				$cov_date = get_post_meta($id,"cov-date",true);
				$permalink = get_the_permalink();
				if($count % $issues_per_row == 0)
					echo "<div class=\"issue-display\">";
		?>
					<div class="issue-container" onclick="location.href='<?=$permalink?>'">
						<div class="issue-image" style="background-image: url(<?=$thumbnail?>);"></div>
						<div class="issue-info">
							<h4><?= $vol_num.".".$issue_num." | ".$cov_date ?></h4>
						</div>
					</div>

		<?php
				if($count % $issues_per_row == ($issues_per_row-1))
					echo "</div>";
				$count++;
			}
		?>
	</main>
	<?php get_sidebar();?>
</div>

<?php get_footer();?>
