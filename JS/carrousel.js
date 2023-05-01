// Document permettant au carrousel dans les page produit de focntionner
$(document).ready(function () {
    $('.owl-carousel').owlCarousel({

        // Paramètre loop
        loop: true,

        // Paramètre autoplay
        autoplay: {

            delay: 4000,

        },

        margin: 10,

        nav: true,

        dots: false,

        // Responsive
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