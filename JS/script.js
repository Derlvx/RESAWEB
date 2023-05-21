var buttonId = "test";

document.addEventListener("DOMContentLoaded", function () {

    // Animation pour les ronds derrières le " our services "
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

    // Navbar pour les versions téléphones
    $('.menu-toggle').click(function () {
        $(".nav").toggleClass("mobile-nav");
        $(this).toggleClass("is-active");
    });


    // Partie "dots" servant au contrôle des points sur la page de réservation
    $('#dots2').click(function () {
        document.querySelector(".guestViewer").classList.add("show");
        document.querySelector(".guestViewer").classList.remove("hide");

        document.querySelector(".formViewer").classList.add("hide");
        document.querySelector(".formViewer").classList.remove("show");

        document.querySelector(".mapViewer").classList.add("hide");
        document.querySelector(".mapViewer").classList.remove("show");

        document.querySelector("#dotsActive1").classList.add("hide");
        document.querySelector("#dotsActive1").classList.remove("show");

        document.querySelector("#dotsActive3").classList.add("hide");
        document.querySelector("#dotsActive3").classList.remove("show");

        document.querySelector("#dotsActive2").classList.add("show");
        document.querySelector("#dotsActive2").classList.remove("hide");
        document.getElementById("dots2").setAttribute("disabled", "");
    });

    $('#dots3').click(function () {
        document.querySelector(".formViewer").classList.add("show");
        document.querySelector(".formViewer").classList.remove("hide");

        document.querySelector(".guestViewer").classList.add("hide");
        document.querySelector(".guestViewer").classList.remove("show");

        document.querySelector(".mapViewer").classList.add("hide");
        document.querySelector(".mapViewer").classList.remove("show");

        document.querySelector("#dotsActive1").classList.add("hide");
        document.querySelector("#dotsActive1").classList.remove("show");

        document.querySelector("#dotsActive2").classList.add("hide");
        document.querySelector("#dotsActive2").classList.remove("show");

        document.querySelector("#dotsActive3").classList.add("show");
        document.querySelector("#dotsActive3").classList.remove("hide");
    });

    $('#dots1').click(function () {
        document.querySelector(".mapViewer").classList.add("show");
        document.querySelector(".mapViewer").classList.remove("hide");

        document.querySelector(".guestViewer").classList.add("hide");
        document.querySelector(".guestViewer").classList.remove("show");

        document.querySelector(".formViewer").classList.add("hide");
        document.querySelector(".formViewer").classList.remove("show");

        // Permet d'afficher ou non le point vert pour indiquer sur quel slide on est
        document.querySelector("#dotsActive3").classList.add("hide");
        document.querySelector("#dotsActive3").classList.remove("show");

        document.querySelector("#dotsActive2").classList.add("hide");
        document.querySelector("#dotsActive2").classList.remove("show");

        document.querySelector("#dotsActive1").classList.add("show");
        document.querySelector("#dotsActive1").classList.remove("hide");

        // Permet de reset/désactiver les buttons 
        document.getElementById("dots1").setAttribute("disabled", "");
        document.getElementById("dots2").setAttribute("disabled", "");
        document.getElementById("dots3").setAttribute("disabled", "");
    });


    // Affichage des fiches de composants selon l'id du button cliquer
    $('.components').click(function () {
        buttonId = $(this).attr('id');
        // console.log(buttonId);
        $('#modal-container').removeAttr('class').addClass("unfold");
        $(".modal-" + buttonId).removeClass('dnone');
        $('body').addClass('modal-active');
    })

    // Fermetures des fiches de composants en question
    $('#modal-container').click(function () {
        $(this).addClass('out');
        // console.log(buttonId);
        $(".modal-" + buttonId).addClass('dnone');
        $('body').removeClass('modal-active');
    });

})