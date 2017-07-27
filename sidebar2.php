<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cah-starter
 */

?>

<div class="sidebar">

<?
global $post;

if ( is_page() && $post->post_parent ) {

    $parent = get_post( $post->$post_parent );

    $parent_name = $parent->post_name;

    $sidebar_id = 'sidebar-' . $parent_name;

    dynamic_sidebar( $sidebar_id );

} else {

    dynamic_sidebar( 'sidebar-main' );
}

?>

</div>
