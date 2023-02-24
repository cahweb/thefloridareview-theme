<?php
get_header();
?>

<div id="primary" class="content-area">
    <header class="page-header">
        <h1 class="page-title">News &amp; Announcements</h1>
    </header>
    <div id="main" class="container" role="main">
        <?php if (have_posts()) : ?>
            <div class="row">
            <?php while (have_posts()) : the_post(); // Start the Loop ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('col-12'); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?= esc_url(get_permalink()) ?>" rel="bookmark"><?= get_the_title(); ?></a>
                        </h2>
                        <div class="entry-meta">
                        <?php
                            // Gets UNIX timestamp for post time (local)
                            $timestamp = get_the_time('U');

                            // Create a DateTime object and set it to the timestamp
                            $time = date_create();
                            date_timestamp_set($time, $timestamp);

                            $format = "F j, Y";
                        ?>
                            <p class="posted-on"><?= date_format($time, $format); ?></p>
                        </div>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <footer>
                    <?php
                        $tagList = get_the_tag_list( '', ', ', '');
                    ?>
                        <p>Tags: <?= $tagList ?></p>
                    </footer>
                </article>
            <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <p>No announcements available to display.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
