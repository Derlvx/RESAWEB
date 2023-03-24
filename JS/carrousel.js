// Document permettant au carrousel dans les page produit de focntionner
$(document).ready(function () {
    $('.owl-carousel').owlCarousel({

        loop: true,
        // Paramètre loop

        autoplay: {

            delay: 4000,

        },
        // Paramètre autoplay

        margin: 10,

        nav: true,

        dots: false,

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
        // Responsive

    })
});