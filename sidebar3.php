<?php

echo '<div class="sidebar">';
global $post;

$id = $post->ID;

$parents = get_post_ancestors( $id );

if ( !empty( $parents ) ) {

    $parent = get_post( $parents[0] );

    $parent_name = $parent->post_name;

    $sidebar_id = 'sidebar-' . $parent_name;

    dynamic_sidebar( $sidebar_id );

} else {

    dynamic_sidebar( 'sidebar-main' );
}

echo '</div>';
?>
