/**
 * Aquifer Sorter
 *
 * Script that handles the sort functionality on the main Aquifer page.
 *
 * @author Mike Leavitt
 */

jQuery(document).ready(function($) {

    $('.flex-item').each(function() {
        $(this).on({
            click: function() {
                updateSelection(this);
            }
        });
    });

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


/**
 * Master update function. Changes the various data-is-selected attributes to
 * reflect the current selected category, and then calls the other functions to
 * update the actual look of the page.
 *
 * @param JavaScript DOM Element elem - The element calling the function.
 *
 * @return void
 */
function updateSelection(elem) {

    jQuery('.flex-item').attr("data-is-selected", "false");

    jQuery(elem).attr("data-is-selected", "true");
    var active = jQuery(elem).attr("id");

    updateSortCSS();
    updateSortVisible(active);

    return;
}


/**
 * Updates the appearances of the sort buttons to reflect the currently selected button.
 *
 * @return void
 */
function updateSortCSS() {

    var sortButtons = jQuery('.flex-item');

    sortButtons.each(function() {

        if ( jQuery(this).attr('data-is-selected') == 'true') {
            jQuery(this).css({
                'backgroundColor':  'black',
                'color':            'white'
            });
        } else {
            jQuery(this).css({
                'backgroundColor': 'white',
                'color': 'black'
            });
        }
    });

    return;
}


/**
 * Loops through the article rows, shows all that match the currently selected category,
 * and hides the others.
 *
 * @param string id - The ID of the active select button.
 *
 * @return void
 */
function updateSortVisible(id) {

    var active = id;

    var articles = jQuery('.article-row');

    articles.each(function() {

        if ( jQuery(this).attr('data-is-category') === active || active == 'all') {

            jQuery(this).show();

        } else {
            jQuery(this).hide();
        }
    });

    return;
}
