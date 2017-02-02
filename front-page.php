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

<div class="hero-background" style="background-image: url(<?php the_post_thumbnail_url();?>);">
	<div class="hero-container">
		<div class="feature-issue"></div>
		<div class="feature-issue-content">
			<h3>Hello</h3>
		</div>
	</div>
</div>

<?php
// get_sidebar();
get_footer();

?>