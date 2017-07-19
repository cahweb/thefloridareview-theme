<?php get_header(); ?>

<div id="primary" class="content-area border-top">
    <main id="main" class="site-main" role="main">

    <?php
        $display_categories = array(
            "all" => "All",
            "fiction" => "Fiction",
            "non-fiction" => "Non-Fiction",
            "poetry" => "Poetry",
            "graphic-narrative" => "Graphic Narrative",
            "digital-stories" => "Digital Stories",
            "interview" => "Interview",
            "book-review" => "Book Review"
        );

        the_title( '<h1 class="entry-title">', '</h1>' );
    ?>

        <h4><em>Show:</em></h4>

        <div id="filter-bar" class="flex-container">

            <?php foreach ($display_categories as $key => $item) { ?>

                <div id="<?=$key?>" class="flex-item" data-is-selected="false">
                    <a href="javascript:;"><p><?=strtoupper($item)?></p></a>
                </div>

            <?php
                }
            ?>

        </div> <!-- end filter-bar -->

        <div id="results-display">

            
        </div> <!-- /#results-display -->

    </main>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
