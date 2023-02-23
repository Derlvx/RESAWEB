document.addEventListener("DOMContentLoaded", function () {
    var map = L.map('map').setView([47, 2], 4);

    var markerParis = L.marker([48.86, 2.3]).addTo(map);
    var popupParis = L.popup([48.86, 2.3], {content: '<img src="IMG/popupStore1.jpeg" alt=""><h3>Horizon Paris</h3><p>12 rue Halévy 75009 Paris</p><a href=""><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className:'popupText'});
    markerParis.bindPopup(popupParis);

    var markerLondon = L.marker([51.50, -0.12]).addTo(map);

    var markerBerlin = L.marker([52.51, 13.38]).addTo(map);

    var markerMadrid = L.marker([40.41, -3.70]).addTo(map);

    var markerBruxelles = L.marker([50.84, 4.35]).addTo(map);

    var markerBerne = L.marker([46.94, 7.45]).addTo(map);

    var markerRome = L.marker([41.89, 12.48]).addTo(map);



    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
})

