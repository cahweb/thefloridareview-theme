<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cah-starter
 */
?>

<div class="sidebar">
	<?php $post_type = get_post_type();?>
	<h2><?=($post_type != "article") ? "Announcements" : "Read More"?></h2>

	<ul>
		<?php
			wp_reset_postdata();

			if($post_type == "article")
				$query = new WP_Query(array(
				    'post_type' => 'article',
				    'post_status' => 'publish',
				    'posts_per_page' => 10
				));
			else
				$query = new WP_Query(array(
				    'post_type' => 'post',
				    'post_status' => 'publish',
				    'posts_per_page' => 3,
				    'category_name' => $slugs['announement']
				));

			while ($query->have_posts()) {
			    $query->the_post();
			    $post_id = get_the_id();
			    $post_title = get_the_title();

				echo "<a href=\"".get_the_permalink()."\"><li>".$post_title."</a>";

			}

		?>
	</ul>

	<?php

		$uploads_folder = wp_upload_dir();
		$more_url = get_site_url();

		if ($post_type != "article") {

			$more_url .= "/about";

		} else {

			$more_url .= "/aquifer";
		}

	?>

	<a href=<?=$more_url?>>More...</a>

	<div class="feed-link">
		<a href="<?=get_site_url()?>/feed"><img class="img-responsive" src="<?=$uploads_folder['baseurl']?>/2017/03/feed-icon-28x28.png" alt="Subscribe!" title="Subscribe!" /></a>
	</div> <!-- /.feed-link -->

</div>
