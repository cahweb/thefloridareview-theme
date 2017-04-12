/* Aquifer Sorter
 *
 * Script that handles the sort functionality on the main Aquifer page.
 *
 * By: Mike Leavitt
 */

jQuery(document).ready(function($) {

    var url = window.location.href;
    var patt1 = /\/aquifer\//

    //Checks to see if we're on the Aquifer page.
    if (patt1.test(url)) {

        // RegExp pattern, grouping together everything after the # marker.
        var patt2 = /.*(#.*)/i;

        if (patt2.test(url)) {
            //Grabs whatever is after the # marker.
            activeType = patt2.exec(url)[1];

            //Tests to see if there's anything there.
            if (activeType != null) {

                //If so, updates the selected category right off the bat.
                updateSelection(activeType);
            }

        } else {

            //Otherwise, defaults to "All".
            updateSelection("#all");
        }
    }
});

/* Master update function. Accepts a JQuery/HTML #id as a parameter, changes the various
 * data-is-selected attributes to reflect the current selected category (the passed #id),
 * and then calls the other functions to update the actual look of the page.
 */
function updateSelection(id) {

    jQuery('.flex-item').attr("data-is-selected", "false");

    jQuery(id).attr("data-is-selected", "true");
    var active = jQuery(id).attr("id");

    updateSortCSS();
    updateSortVisible(active);

    return;
}

/* Updates the appearances of the sort buttons to reflect the currently selected button.
 */
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

/* Loops through the article rows, shows all that match the currently selected category,
 * and hides the others.
 */
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
