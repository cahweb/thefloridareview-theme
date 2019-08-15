
<div class="sidebar">
    <ul class="sidebar-menu">

<?
    global $post;
    
    if ( is_page() ) {

        $id = $post->ID;
        $parents = get_post_ancestors( $id );

        if ( !empty( $parents ) ) {

            $parent = get_post( $parents[0] );

            $sb_id = 'sidebar-' . $parent->post_name;

            dynamic_sidebar( $sb_id );

        } else {

            dynamic_sidebar( 'sidebar-main' );
        }

    } else {
        dynamic_sidebar( 'sidebar-main' );
    }
?>
    </ul>
</div>
