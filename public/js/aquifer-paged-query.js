jQuery(document).ready(function() {

    setupEventHandlers();

    var allButton = jQuery('#all');
    updateSelection(allButton);
    getNewResults(allButton);
});

function setupEventHandlers() {

    jQuery('#filter-bar .flex-item').each(function() {

        jQuery(this).on({
            click: function( event ) {

                event.preventDefault();
                updateSelection(this);
                getNewResults(this);
            }
        });
    });

    setupPageHandlers();
}

function setupPageHandlers() {

    jQuery('#results-display').find('#next-button, #prev-button, #pages > a').each(function() {

        jQuery(this).on({
            click: function( event ) {

                event.preventDefault();
                getNewResults(this);
            }
        });
    });

    var prevButton = jQuery('#results-display').find('#prev-button');
    var nextButton = jQuery('#results-display').find('#next-button');
    var currentSpan = jQuery('#results-display').find('span.current');
    if (currentSpan) {
        var newPage = currentSpan.html();

        if (currentSpan.is(':last-child')) {
            if (!nextButton.hasClass('disabled'))
                nextButton.addClass('disabled');
        } else {
            if (nextButton.hasClass('disabled'))
                nextButton.removeClass('disabled');
        } // End if

        if (newPage) {

            if (newPage == 1) {
                if (!prevButton.hasClass('disabled'))
                    prevButton.addClass('disabled');
            } else {
                if (prevButton.hasClass('disabled'))
                    prevButton.removeClass('disabled');
            } // End if
        } // End if
    } // End if
}

function updateSelection( elem ) {

    jQuery('#filter-bar .active').each(function() {

        jQuery(this).removeClass('active');
    });

    jQuery(elem).addClass('active');
}

function getNewResults( elem ) {

    var reqGenre = null;
    var reqPage = null;
    var currentPage = jQuery('#nav-button-row').find('span.current').html();
    var currentGenre = jQuery('#filter-bar .active').attr('id');

    var id = jQuery(elem).attr('id');

    if ( !id && jQuery(elem).hasClass('page-numbers') ) {
        id = 'page';
    }

    switch (id) {

        case 'all':
            break;
        case 'next-button':
            reqGenre = (currentGenre !== 'all') ? currentGenre : null;
            reqPage = ++currentPage;
            break;
        case 'prev-button':
            reqGenre = (currentGenre !== 'all') ? currentGenre : null;
            reqPage = --currentPage;
            break;
        case 'page':
            reqGenre = (currentGenre !== 'all') ? currentGenre : null;
            reqPage = jQuery(elem).html();
            break;
        default:
            reqGenre = id;
    }

    // Variables to narrow the custom query.
    var displayResults = {
        'all': 'All',
        'fiction': 'Fiction',
        'non-fiction': 'Non-Fiction',
        'poetry': 'Poetry',
        'graphic-narrative': 'Graphic Narrative',
        'digital-stories': 'Digital Stories',
        'interview': 'Interview',
        'book-review': 'Book Review'
    }
    var displayResJSON = JSON.stringify(displayResults);
    var postsPerPage = 10;
    var postType = 'article';

    jQuery.ajax({
        url: js_ajax.ajax_url,
        method: 'POST',
        data: {
            'action':       js_ajax.action,
            'type':         postType;
            'genre':        reqGenre,
            'page':         reqPage,
            'per_page':     postsPerPage,
            'categories':   displayResJSON
        }
    })
        .done(function(resp) {

            jQuery('#results-display').html(resp);

            setupPageHandlers();
        })
        .fail(function(resp) {
            alert( 'Failed!\n' + resp );
        });
}
