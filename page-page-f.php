<?php

    get_header();
	
	echo "asdf";

    $args = array(
        'post_type' => 'article',
        'posts_per_page' => -1
    );

    query_posts( $args );

    if ( have_posts() ) {

        while ( have_posts() ) {

            the_post();

            $id = get_the_ID();

            $authors = maybe_unserialize( get_post_meta( $id, 'authors', true ) );
            $author_last = get_post_meta( $id, 'author1-last', true );
            $author_first = get_post_meta( $id, 'author1-first', true );
            $other_authors = get_post_meta( $id, 'other-authors', true );

            if ( is_array( $authors ) ) {

                $author_last_new = $authors[1]['last'];
                $author_first_new = $authors[1]['first'] . ' ' . $authors[1]['middle'];
                $other_authors_new = '';

                for ( $i = 2; $i < count( $authors ); $i++ ) {

                    if ( empty( $authors[$i]['last'] ) )
                        continue;

                    $other_authors_new .= ( !empty( $authors[$i]['first'] ) ) ? $authors[$i]['first'] : '' ;
                    $other_authors_new .= ( !empty( $authors[$i]['middle'] ) ) ? ' ' . $authors[$i]['middle'] : '';
                    $other_authors_new .= ' ' . $authors[$i]['last'];

                    if ( $i + 1 < count( $authors ) )
                        $other_authors_new .= ', ';

                } // End for

            } else {

                $patt1 = '/ \sand\s | ,\sand\s | ,\s | \sfor\sTFR | \s\&\s /x';

                $authors_split = preg_split( $patt1, $authors );

                $author1 = explode( ' ', trim( $authors_split[0] ) );

                $num_names = count( $author1 );

                for ( $i = 0; $i < $num_names; $i++ ) {

                    if ( $i + 1 == $num_names ) {

                        $author_last_new = $author1[$i];

                    } elseif ( $i == 0 ) {

                        $author_first_new = $author1[$i];

                    } else {

                        $author_first_new .= ' ' . $author1[$i];
                    } // End if

                } // End for

                $other_authors_new = '';

                for ( $i = 1; $i < count( $authors_split ); $i++ ) {

                    $other_authors_new .= trim( $authors_split[$i] );

                    if ( $i + 1 < count( $authors_split ) )
                        $other_authors_new .= ', ';

                } // End for

            } // End if

            if ( strcasecmp( $author_last, $author_last_new ) != 0 )
                $author_last = $author_last_new;

            if ( strcasecmp( $author_first, $author_first_new ) != 0 )
                $author_first = $author_first_new;

            if ( strcasecmp( $other_authors, $other_authors_new ) != 0 )
                $other_authors = $other_authors_new;

            update_post_meta( $id, 'author1-last', $author_last );
            update_post_meta( $id, 'author1-first', $author_first );
            update_post_meta( $id, 'other-authors', $other_authors );
            delete_post_meta( $id, 'authors' );

        } // End while

        wp_reset_postdata();
    } // End if

    wp_reset_query();

    get_footer();
?>
