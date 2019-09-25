$(document).ready(function () {
    $('.owl-content .owl-carousel').owlCarousel({
        stagePadding: 4,
        loop: true,
        // loop: false,
        margin: 5,
        autoplay: 2000,
        // autoplay: 0,
        smartSpeed: 1000, // duration of change of 1 slide
        // smartSpeed: 0,
        responsiveClass: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        navContainer: '.owl-content .custom-nav',
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4,
                autoplay: false
            }
        }
    });
});
