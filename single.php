<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cah-starter
 */
global $post;
the_post();
$id = get_the_ID();
$title = get_the_title();
$body = get_post_meta($id,"body",true);
$authors = get_post_meta($id,"authors",true);
$auth_url = get_post_meta($id,"auth-url",true);
$auth_info = get_post_meta($id,"auth-info",true);

if(empty($body))
	$body = get_the_content();

get_header(); 
?>

	<div id="primary" class="content-area border-top">
		<main id="main" class="site-main" role="main">
			
			<h3><?=$title?></h3>
			<?php echo wpautop($body, true)?>

			<?php if(!empty($authors)) : ?>
				<div class="author">

					<?php if(kdmfi_has_featured_image( "author-image", $id )) : ?>

						<div class="author-image">
							<div style="background-image: url(<?=kdmfi_get_featured_image_src( "author-image", "large", $id )?>);"></div>
						</div>

					<?php endif; ?>


					<div class="author-info">
						<h3><?=$authors?></h3>
						<a href="<?=$auth_url?>"><?=preg_replace('#^https?://#', '',$auth_url)?></a>
						<p><?=$auth_info?></p>
					</div>
				</div>
			
			<?php endif;?>

		</main><!-- #main -->
		<?php get_sidebar();?>
	</div><!-- #primary -->
<?php
get_footer();
