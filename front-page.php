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
		<div class="feature-issue-image">
			<div></div>
		</div>
		<div class="feature-issue-content">
			<img src="<?=wp_get_attachment_url(33)?>">
			<div class="feature-header">
				<h2>Current Issue</h2>
				<h5>41.1 | Winter 2017</h5>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae imperdiet turpis, in volutpat purus. In in ante vel urna viverra commodo laoreet eget nulla. Duis vitae sapien risus. Nulla et mollis eros.</p>
		</div>
	</div>
</div>

<?php
// get_sidebar();
get_footer();

?>