(function (window, $) {

    var html = $('html'),
        nav_button_open = $('#nav-open-btn'),
        nav_button_close = $('#nav-close-btn'),
        nav_class = 'js-nav',
        document_ready_class = 'js-ready',
        hidden=$('#hidden'),
        overlay=$('#hidden-overlay'),
        breakpoint_small=768;

    var search_field = $('.search-form input[type=text]'),
        focus_class = 'focus',
        search_wrap_class = 'search-form';

    var slider = $('#slideshow'),
        slider_controls = '#slideshow .slide-control li a';


    window.Nav_handler = (function () {

        nav_button_open.click(function (evt) {
            evt.preventDefault();
            html.toggleClass(nav_class);
            if(html.hasClass(nav_class)){
                console.log('true');
               $('html,body').animate({
                    scrollTop: hidden.offset().top
                }, 1000);
            }
        });

        nav_button_close.click(function (evt) {
            evt.preventDefault();
            html.removeClass(nav_class);
        });

        $(window).resize(function(){
            if($(window).width()>breakpoint_small && html.hasClass(nav_class)){
                html.removeClass(nav_class);
            }
        });

        $(overlay).click(function(){
           html.toggleClass(nav_class);
        });

        html.addClass(document_ready_class);
    })();

    search_field.focus(function () {
        $(this).closest("." + search_wrap_class).toggleClass(focus_class);
    }).blur(function () {
        $(this).closest("." + search_wrap_class).toggleClass(focus_class);
    });

    slider.flexslider({
        directionNav: false,
        manualControls: slider_controls,
      	randomize: true
    });
})(window, jQuery);