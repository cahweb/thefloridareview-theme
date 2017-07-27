<?php

echo '<div class="sidebar">';
global $post;

$id = $post->ID;

$parents = get_post_ancestors( $id );

if ( !empty( $parents ) ) {

    $parent = get_post( $parents[0] );

    $parent_name = $parent->post_name;

    echo '<p>' . $parent_name . '</p>';

} else {

    echo '<p>NULL</p>';
}

echo '</div>';
?>
