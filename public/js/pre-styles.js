jQuery(document).ready(function() {
    
    addPreStyles();
});

function addPreStyles() {

    var fontURL = "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600,600i";

    jQuery('#content_ifr').contents().find('head').append(

        jQuery('<link rel="stylesheet" />').attr('href', fontURL)
    );

    var newStyles = "#tinymce pre {\n\tfont-family: 'Open Sans', sans-serif;\n\tline-height: 2;\n\tmargin-top: 20px;\n}";

    jQuery('#content_ifr').contents().find('head').append(

        jQuery('<style type="text/css" />').html(newStyles)
    );
}
