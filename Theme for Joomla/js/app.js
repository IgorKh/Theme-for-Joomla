jQuery(".search-form input").focus(function () {
    jQuery(this).closest(".search-form").toggleClass("focus");
    jQuery(this).siblings("button").toggleClass("focus");
}).blur(function () {
    jQuery(this).closest(".search-form").toggleClass("focus");
    jQuery(this).siblings("button").toggleClass("focus");
});


jQuery('.burger').click(function (ev) {
    ev.preventDefault();

    jQuery('#visible-wrap').toggleClass('shift');
});


jQuery('#slideshow').flexslider({
    directionNav: false,
    manualControls: '#slideshow .slide-control li a'
});