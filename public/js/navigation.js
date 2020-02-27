jQuery(document).ready(function(){
    jQuery(".menu-toggle").click(function(){
        jQuery(".menu").toggleClass("toggled")
    });
});

(function($){

    $(document).ready(function() {

        $('.dropdown-toggle').click(function(e) {
            e.preventDefault();
            $('.dropdown-toggle').parent().toggleClass('open');
        });
    });
})(jQuery);