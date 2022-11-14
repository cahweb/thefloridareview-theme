/*
(function($){

    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $('.menu').toggleClass('toggled')
        })

        /*
        $('.dropdown-toggle').on('click', function(e) {
            e.preventDefault()
            $('.dropdown-toggle').parent().removeClass('open')
            $(e.target).parent().addClass('open')
        })

        const dropdowns = document.querySelectorAll('.dropdown-toggle')
        dropdowns.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault()
                dropdowns.forEach(elem => {elem.parentNode.classList.remove('open')})
                e.target.parentNode.classList.add('open')
            })
        })

        /*
        $('.dropdown-toggle').click(function(e) {
            e.preventDefault();
            $('.dropdown-toggle').parent().toggleClass('open');
        });
    });
})(jQuery);
*/

window.onload = function() {
    const dropdowns = document.querySelectorAll('.dropdown-toggle')
    dropdowns.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault()
            dropdowns.forEach(elem => {elem.parentNode.classList.remove('open')})
            e.target.parentNode.classList.add('open')
        })
    })
}