document.addEventListener("DOMContentLoaded", function () {

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

    $('.menu-toggle').click(function () {
        $(".nav").toggleClass("mobile-nav");
        $(this).toggleClass("is-active");
    });


// LA MAGIE NOIRE ???!!!
// $('.leaflet-marker-pane').click(function () {
//     console.log('BONSOIR');
// });

$('.selectGuest').click(function () {
    document.querySelector(".guestViewer").classList.add("hide");
    document.querySelector(".guestViewer").classList.remove("show");

    document.querySelector(".formViewer").classList.add("show");
    document.querySelector(".formViewer").classList.remove("hide");

    document.querySelector("#dotsActive2").classList.add("hide");
    document.querySelector("#dotsActive2").classList.remove("show");

    document.querySelector("#dotsActive3").classList.add("show");
    document.querySelector("#dotsActive3").classList.remove("hide");
});

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

    document.querySelector("#dotsActive3").classList.add("hide");
    document.querySelector("#dotsActive3").classList.remove("show");

    document.querySelector("#dotsActive2").classList.add("hide");
    document.querySelector("#dotsActive2").classList.remove("show");

    document.querySelector("#dotsActive1").classList.add("show");
    document.querySelector("#dotsActive1").classList.remove("hide");
});

    // var el = document.getElementById('selectMap');
    // if (el) {
    //     el.addEventListener("click", function visible(event) {
    //         console.log('BONSOIR')
    //     });
    // }

})