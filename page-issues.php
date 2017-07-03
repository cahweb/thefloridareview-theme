<?php get_header();?>

<div id="primary" class="content-area border-top">
	<main id="main" class="site-main" role="main">
		<?php
			the_post();

			the_title( '<h1 class="entry-title">', '</h1>' );

			the_content();

			$query = new WP_Query(array(
			    'post_type' => 'issue',
			    'post_status' => 'publish',
				'posts_per_page' => -1
			));

			$issues_per_row = 3;
			$count = 0;

			// Array to hold the issue objects so we can sort them by pub_date. I tried doing this
			// with a meta_query array but couldn't get it to work properly. No idea why.
			$issues_array = array();

			// Instead of the standard query Loop, I'm instead loading it into an array, and passing
			// it do the $issues_array that I created.
			while ($query->have_posts()) {
				$query->the_post();
				$id = get_the_id();
				$title = get_the_title();
				$thumbnail = get_the_post_thumbnail_url($id);
				$vol_num = get_post_meta($id,"vol-num",true);
				$issue_num = get_post_meta($id,"issue-num",true);
				$cov_date = get_post_meta($id,"cov-date",true);
				$permalink = get_the_permalink();
				$pub_date = get_post_meta( $id, 'pub-date', true );

				if(empty($thumbnail)){
					$thumbnail = get_stylesheet_directory_uri() . "/public/images/emptyIssue.png";
				}

				$new_array = array(
					'title' => $title,
					'thumbnail' => $thumbnail,
					'vol_num' => $vol_num,
					'issue_num' => $issue_num,
					'cov_date' => $cov_date,
					'permalink' => $permalink,
					'pub_date' => maybe_unserialize( $pub_date ) // WordPress automatically serializes objects, but doesn't unserialize them when you call get_post_meta() for some reason. >_<
				);

				$issues_array[$id] = $new_array;
			}// End while

			wp_reset_postdata();

			// Sort the array by UNIX timestamp. I use $b first because I want them sorted in reverse-chronological order.
			uasort( $issues_array, function( $a, $b ) {

				return date_timestamp_get( $b['pub_date'] ) - date_timestamp_get( $a['pub_date'] );

			});

			foreach( $issues_array as $issue ) {

				$cov_date = ( !empty( $issue['cov_date'] ) ) ? ' | ' . $issue['cov_date'] : ' | ' . date_format( $issue['pub_date'], 'F Y' );

				if($count % $issues_per_row == 0)
					echo "<div class=\"issue-display\">";
		?>
					<div class="issue-container" onclick="location.href='<?=$issue['permalink']?>'">
						<div class="issue-image" style="background-image: url(<?=$issue['thumbnail']?>);"></div>
						<div class="issue-info">
							<h4><?= $issue['vol_num'] . "." . $issue['issue_num'] . $cov_date ?></h4>
						</div>
					</div>

		<?php
				if($count % $issues_per_row == ($issues_per_row-1))
					echo "</div>";
				$count++;
			} // End foreach

		?>
	</main>
	<?php get_sidebar();?>
</div>

<?php get_footer();?>
