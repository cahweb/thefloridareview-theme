<?php
/**
 * The Front Page Template
 *
 * I wish it was more explicit how this worked, other than "Name it front-page.php and it
 * will change the front page." Edit this to change the front page.
 *
 * @package cah-starter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">
			<!-- About -->
			<div class="col-sm-12 col-3">
				<?php // This function returns the content using the post slug.
					  // For the homepage posts (about, news, contact) a good way 
				      // to distinguish them is to set their slugs to 'front-about' 
				      // for example. But the function below should be supplied with 
					  // the slug that corresponds to the correct content, because it 
				      // may not be 'front-about' on every site. Same for the others.
					get_post_by_slug("front-about"); 
				?>
			</div>

			<!-- News -->
			<?php // Ideally news and events should be a custom post type or pull from 
			      // a feed, but for now we'll do it simply. ?>
			<div class="col-sm-12 col-6 side-borders">
				<?php get_post_by_slug("front-news"); ?>

				<div> <!-- Events -->
					<?php // get_post_by_slug("front-events"); ?>
					<!-- <button class="more-events">More Events</button> -->
				</div>
			</div>
				

			<!-- Contact -->
			<div class="col-sm-12 col-3">
				<?php get_post_by_slug("front-contact"); ?>
				
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();

?>