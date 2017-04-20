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
$authors = get_post_meta($id,"authors",true);
$auth_url = get_post_meta($id,"auth-url",true);
$auth_info = get_post_meta($id,"auth-info",true);

get_header();
?>

	<div id="primary" class="content-area border-top">
		<main id="main" class="site-main" role="main">

			<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
			<?php the_content();?>

			<?php if(!empty($authors)) : ?>
				<div class="author">

					<?php if(kdmfi_has_featured_image( "author-image", $id )) : ?>

						<div class="author-image">
							<div style="background-image: url(<?=kdmfi_get_featured_image_src( "author-image", "large", $id )?>);"></div>
						</div>

					<?php endif; ?>


					<div class="author-info">
						<h3><?=$authors?></h3>
						<?php if(!empty($auth_url)) : ?><a href="<?=$auth_url?>"><?=preg_replace('#^https?://#', '',$auth_url)?></a><?php endif; ?>
						<?php echo wpautop($auth_info, true)?>
					</div>
				</div>

			<?php endif;?>

		</main><!-- #main -->
		<?php get_sidebar();?>
	</div><!-- #primary -->
<?php
get_footer();
