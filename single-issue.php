<?php

get_header();

the_post();

// Retrieve ALL THE META VALUES!
$id = get_the_ID();
$thumbnail = get_the_post_thumbnail_url( $id );
$vol_num = get_post_meta( $id, 'vol-num', true );
$issue_num = get_post_meta( $id, 'issue-num', true );
$pub_date = maybe_unserialize( get_post_meta( $id, 'pub-date', true ) );
$cov_date = get_post_meta( $id, 'cov-date', true );
$pur_url = get_post_meta( $id, 'pur-url', true );
$theme = get_post_meta( $id, 'theme', true );
$isbn = get_post_meta( $id, 'isbn', true );
$issn = get_post_meta( $id, 'issn', true );
$editorial = get_post_meta( $id, 'editorial', true );

$cov_date = ( !empty( $cov_date ) ) ? $cov_date : date_format( $pub_date, 'F Y' );

if ( !empty( $editorial ) ) {

    $editorial = wptexturize( $editorial );
    $editorial = convert_smilies( $editorial );
    $editorial = convert_chars( $editorial );
    $editorial = wpautop( $editorial );
}

?>

<div id="primary" class="content-area border-top">
    <main id="main" class="site-main" role="main">

        <h1 class="entry-title issue-title"><?= $vol_num . '.' . $issue_num . ', ' . $cov_date ?></h1>
        <?= ( !empty( $theme ) ) ? '<h3 class="issue-theme"><em>' . $theme . '</em></h3>' : '' ?>

        <div class="issue-block">

            <div class="issue-metadata">

                <div class="issue-img">
                    <img src="<?= $thumbnail ?>" title="<?= get_the_title(); ?>" alt="<?= get_the_title(); ?>">
                    <p class="issue-img-caption"><em>Published: <?= date_format( $pub_date, 'd F, Y' ); ?></em></p>
                </div> <!-- /.issue-img -->

                <div class="issue-purchase-info">
                    <p><a class="issue-purchase-button"<?= ( empty( $pur_url ) ) ? ' disabled' : '' ?> href="<?= ( !empty( $pur_url ) ) ? $pur_url : '#' ?>">PURCHASE</a></p>

                <? if ( !empty( $isbn ) ) : ?>
                    <p><strong>ISBN:</strong> <?= $isbn ?></p>
                <? endif; ?>

                <? if ( !empty( $issn ) ) : ?>
                    <p><strong>ISSN:</strong> <?= $issn ?></p>
                <? endif; ?>

                </div>

                <div class="issue-editorial">

                <?  if ( !empty( $editorial ) ) : ?>
                    <h4>Editorial Staff</h4>

                <?= $editorial ?>

                <?  endif; ?>

                </div> <!-- /.issue-editorial -->

            </div> <!-- /.issue-metadata -->

            <div class="issue-content">

                <? the_content(); ?>

            </div> <!-- /.issue-content -->

        </div> <!-- /.issue-block -->

    </main> <!-- /#main -->
    <? //get_sidebar(); ?>
</div> <!-- /#primary -->

<? get_footer(); ?>
