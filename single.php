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
$author_last = get_post_meta( $id, 'author1-last', true );
$author_first = get_post_meta( $id, 'author1-first', true );
$other_authors = get_post_meta( $id, 'other-authors', true );
$auth_url = get_post_meta($id,"auth-url",true);
$auth_info = get_post_meta($id,"auth-info",true);

$other_auth_string = '';

if ( !empty( $other_authors ) ) {

	$other_arr = explode( ',', $other_authors );

	if ( count( $other_arr ) > 1 ) {

		for ( $i = 0; $i < count( $other_arr); $i++ ) {

			if ( $i + 1 == count( $other_arr ) )
				$other_auth_string .= ', and ';
			else
				$other_auth_string .= ', ';

			$other_auth_string .= trim( $other_arr[$i] );
		} // End for
	} else {

		$other_auth_string .= ' and ' . $other_arr[0];
	} // End if
} // End if

$authors = '';
$authors .= ( !empty( $author_first ) ) ? $author_first . ' ' : '';
$authors .= $author_last . $other_auth_string;

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
