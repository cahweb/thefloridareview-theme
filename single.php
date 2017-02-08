<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cah-starter
 */
global $post;
$id = get_the_ID();
$title = get_the_title();
$body = get_post_meta($id,"body",true);
get_header(); 
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h3><?=$title?></h3>
			<?php echo $body?>
		</main><!-- #main -->
		<?php get_sidebar();?>
	</div><!-- #primary -->
<?php
get_footer();
