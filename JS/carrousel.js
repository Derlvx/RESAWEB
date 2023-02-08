$(document).ready(function () {
    $('.owl-carousel').owlCarousel({

        loop: true,

        autoplay: {

            delay: 4000,

        },

        margin: 10,

        nav: true,

        dots: true,

        responsive: {

            0: {

                items: 1

            },

            800: {

                nav: true,

                items: 2

            },

            1100: {

                items: 3,

                nav: true

            }

        }

    })
});