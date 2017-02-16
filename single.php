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
$authors = get_post_meta($id,"authors",true);
$auth_url = get_post_meta($id,"auth-url",true);
$auth_info = get_post_meta($id,"auth-info",true);
get_header(); 
?>

	<div id="primary" class="content-area border-top">
		<main id="main" class="site-main" role="main">
			<?php if(has_post_thumbnail())
				echo "<div class=\"article-banner\" style=\"background-image: url(".get_the_post_thumbnail_url().");\"></div>"; 
			?>
			<h3><?=$title?></h3>
			<?php echo wpautop($body, true)?>
			<div class="author">
				<div class="author-image">
					<div style="background-image: url(<?= (kdmfi_has_featured_image( "author-image", $id )) ?kdmfi_get_featured_image_src( "author-image", "large", $id ) : get_stylesheet_directory_uri() . "/public/images/profilepic.png" ?>);"></div>
				</div>
				<div class="author-info">
					<h3><?=$authors?></h3>
					<a href="<?=$auth_url?>"><?=preg_replace('#^https?://#', '',$auth_url)?></a>
					<p><?=$auth_info?></p>
				</div>
			</div>
		</main><!-- #main -->
		<?php get_sidebar();?>
	</div><!-- #primary -->
<?php
get_footer();
