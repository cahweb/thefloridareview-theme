jQuery(document).ready(function($) {

    $("#all").attr("data-is-selected", "true");

    updateSortCSS();
});

function updateSelection(id) {

    jQuery('.flex-item').attr("data-is-selected", "false");

    jQuery(id).attr("data-is-selected", "true");
    var active = jQuery(id).attr("id");

    updateSortCSS();
    updateSortVisible(active);
}

function updateSortCSS() {

    var sortButtons = jQuery('.flex-item').toArray();

    for (i in sortButtons) {

        if (jQuery(sortButtons[i]).attr("data-is-selected") == "true") {

            jQuery(sortButtons[i]).css("backgroundColor", "black");
            jQuery(sortButtons[i]).css("color", "white");

        } else {

            jQuery(sortButtons[i]).css("backgroundColor", "white");
            jQuery(sortButtons[i]).css("color", "black");
        }
    }

    return;
}

function updateSortVisible(id) {

    var active = id;

    var articles = jQuery('.article-row').toArray();

    for (i in articles) {

        if (jQuery(articles[i]).attr("data-is-category") === active || active == "all") {

            jQuery(articles[i]).show();

        } else {
            jQuery(articles[i]).hide();
        }
    }

    return;
}
