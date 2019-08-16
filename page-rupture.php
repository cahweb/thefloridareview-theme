<?php
/**
* Template Name: Rupture Page Template
* Template Post Type: article, page
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>

<?php get_header();?>

<input type="button" value="" id = "play">
<input type="button" id="pause">
<input type="button" id="stop">

<div class = "container">
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
global $post;
the_post();
the_content();
//$content = get_the_content($post);
//echo $content;?>
</div>


<?php get_footer();?>
