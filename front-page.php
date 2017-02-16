<?php
/**
 * The Front Page Template
 *
 * I wish it was more explicit how this worked, other than "Name it front-page.php and it
 * will change the front page." Edit this to change the front page.
 *
 * @package cah-starter
 */
get_header(); 

?>

<?php 
	// TODO: fix this hack. This is a quick fix that should be changed
	// Super janky, On front page end the #page div and #content div which constrain 
    // the width of elements, so that the header will be full page width ?>	

</div> <!-- end site container -->
</div> <!-- end site-content -->

<div class="hero-background" style="background-image: url(<?php the_post_thumbnail_url();?>);">
	<div class="hero-container">

		<?php
			$query = new WP_Query(array(
					    'post_type' => 'issue',
					    'post_status' => 'publish',
					    'posts_per_page' => 1
					));

			$query->the_post();
			$issue_id = get_the_id();
			$issue_title = get_the_title();
			$issue_cover_date = get_post_meta($issue_id, "cov-date", true);
			$issue_vol = get_post_meta($issue_id, "vol-num", true);
			$issue_num = get_post_meta($issue_id, "issue-num", true);
			$issue_excerpt = get_the_excerpt();
			$issue_url = get_the_permalink();
		?>

		<div class="feature-issue-image">
			<div style="background-image: url(<?=get_the_post_thumbnail_url();?>);"></div>
		</div>
		<div class="feature-issue-content">
			<img src="<?=get_stylesheet_directory_uri() . "/public/images/bird.png"?>">
			<div class="feature-header">
				<h3>Current Issue</h3>
				<h5><?=$issue_vol.".".$issue_num." | ".$issue_cover_date?></h5>
			</div>
			<p><?=(strlen($issue_excerpt) > 250) ? substr($issue_excerpt,0,250)."..." : $issue_excerpt?></p>
			<!-- <a href="<?=$issue_url?>" class="read-more">Read More</a> -->
		</div>
	</div>
</div>

<?php 
	// TODO: fix this hack. This is a quick fix that should be changed
	// Super janky, On front page start the #page div and #content div which constrain 
    // the width of elements, so that the header will be full page width ?>	

<div id="page" class="site container">
<div id="content" class="site-content">

<div class="banner">
	<img src="<?=get_stylesheet_directory_uri() . "/public/images/banner.png"?>">
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php

			$article_displays = array("Literary Features", "Writer Interviews", "Book Reviews", "Digital Stories");

			$slugs = array(
				"Literary Features" => "literary-features",
				"Writer Interviews" => "interview",
				"Book Reviews" => "book-review",
				"Digital Stories" => "digital-stories"
			);

			foreach ($article_displays as $article_cat) {
		?>

			<div class="article-display">
				<h2><?=$article_cat?></h2>
				<div class="article-container">

					<?php 
					$query = new WP_Query(array(
					    'post_type' => 'article',
					    'post_status' => 'publish',
					    'posts_per_page' => 3,
					    'category_name' => $slugs[$article_cat]
					));

					while ($query->have_posts()) {
					    $query->the_post();
					    $post_id = get_the_id();
					    $post_title = get_the_title();
					    $authors = get_post_meta($post_id,"authors",true);
					    $date = get_post_meta($post_id,"doi",true);
						
						if(kdmfi_has_featured_image("author-image", $post_id))
							$thumbnail = kdmfi_get_featured_image_src( "author-image", "small", $post_id );

					    else if(has_post_thumbnail())
					    	$thumbnail = get_the_post_thumbnail_url($post_id);
					    
					    else
					    	$thumbnail = get_stylesheet_directory_uri() . "/public/images/empty.png";

					?>
						<a href="<?=get_the_permalink();?>">
							<div class="article">
								<div style="background-image: url(<?=$thumbnail?>);"></div>
								<h4><?=$post_title?></h4>
								<h5><?="By ".$authors?></h5>
								<h6><?=$date?></h6>
							</div>
						</a>

					<?php
					}

					wp_reset_postdata();
					?>
				</div>
			</div>


		<?php
		}
		?>
	</main>
	<?php get_sidebar();?>
</div>

<?php
get_footer();

?>