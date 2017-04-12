<?php get_header();?>

<div id="primary" class="content-area border-top">
	<main id="main" class="site-main" role="main">
		<?php

			$display_categories = array(
				"all" => "All",
				"fiction" => "Fiction",
				"non-fiction" => "Non-Fiction",
				"poetry" => "Poetry",
				"graphic-narrative" => "Graphic Narrative",
				"digital-stories" => "Digital Stories",
				"interview" => "Interview",
				"book-review" => "Book Review"
			);

			the_title( '<h1 class="entry-title">', '</h1>' );

		?>

		<h4><em>Show:</em></h4>

		<div id="filter-bar" class="flex-container">

			<?php foreach ($display_categories as $key => $item) { ?>

				<div id="<?=$key?>" class="flex-item" data-is-selected="false" onclick="updateSelection(this)">
					<a href="#<?=$key?>"><p><?=strtoupper($item)?></p></a>
				</div>

			<?php
				}
			?>

		</div> <!-- end filter-bar -->

		<?php
			$query = new WP_Query(array(
			    'post_type' => 'article',
			    'post_status' => 'publish',
			    'category_name' => 'aquifer',
				'posts_per_page' => -1
			));

			while ($query->have_posts()) {
				$query->the_post();
				$id = get_the_id();
				$title = get_the_title();
				$excerpt = get_the_excerpt();
				$permalink = get_the_permalink();
				$pub_date = get_the_date();
				$author = get_post_meta($id, "authors", true);
				$categories = get_the_category();

				//Get the article's relevant categories for display in the article row
				$categories_to_show = [];

				foreach ($categories as $cat) {

					if (in_array($cat->name, $display_categories))
						array_push($categories_to_show, $cat->name);
				}

				//Arrange categories in a string for filter handling.
				$js_filter_list = "";

				foreach ($categories_to_show as $cat) {

					$js_filter_list .= str_replace(" ", "-", $cat);

					if (next($categories_to_show) !== false)
						$js_filter_list .= " ";
				}

				$js_filter_list = strtolower($js_filter_list);

				// Skip the filler content
				if ($title == "Coming Soon!")
					continue;

				if(kdmfi_has_featured_image("author-image", $id) && !has_post_thumbnail())
					$thumbnail = kdmfi_get_featured_image_src( "author-image", "small", $id );

			    else if(has_post_thumbnail())
			    	$thumbnail = get_the_post_thumbnail_url($id);

			    else
			    	$thumbnail = get_stylesheet_directory_uri() . "/public/images/empty.png";
		?>
				<div class="article-row" data-is-category="<?=$js_filter_list?>"><a href="<?=$permalink?>">
					<div class="article-thumb" style="background-image: url(<?=$thumbnail?>);"></div>
					<div class="article-text">
						<h4><?=$title?></h4>
						<p><em>By <?=$author?></em></p>
						<p><?=substr($excerpt,0,125)?></p></a>
						<p style="margin-top: 10px; font-size: 12px;" onclick="updateSelection('#<?=$js_filter_list?>')"><em>

							<?php $cat_out = "";
								 foreach ($categories_to_show as $cat_name) {

									 $cat_out .= "<a href=\"#" . strtolower(str_replace(" ", "-", $cat_name)) . "\">" . $cat_name . "</a><span style=\"float: right;\">Published: " . $pub_date . "</span>";

									 if (next($categories_to_show) !== false)
									 	$cat_out .= ", ";
								 }

								 echo $cat_out;
							?></em></p>
					</div> <!-- end article-text -->
				</div> <!-- end article-row -->

		<?php
			}
		?>
	</main>
	<?php get_sidebar();?>
</div>

<?php get_footer();?>
