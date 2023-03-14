document.addEventListener("DOMContentLoaded", function () {
    var map = L.map('map').setView([47, 2], 4);

    var markerParis = L.marker([48.86, 2.3], { alt: 'Paris' }).addTo(map);
    var popupParis = L.popup([48.86, 2.3], { content: '<img src="IMG/popupStore1.jpeg" alt=""><h3>Horizon Paris</h3><p>12 rue Halévy 75009 Paris</p><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className: 'popupText' });
    markerParis.bindPopup(popupParis);

    var markerLondon = L.marker([51.50, -0.12], { alt: 'London' }).addTo(map);
    var popupLondon = L.popup([51.50, -0.12], { content: '<img src="IMG/popupStore2.jpeg" alt=""><h3>Horizon London</h3><p>235 Regent Street, London W1B 2EL</p><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className: 'popupText' });
    markerLondon.bindPopup(popupLondon);

    var markerBerlin = L.marker([52.51, 13.38], { alt: 'Berlin' }).addTo(map);
    var popupBerlin = L.popup([52.51, 13.38], { content: '<img src="IMG/popupStore3.jpeg" alt=""><h3>Horizon Berlin</h3><p>Kurfürstendamm 26, 10719 Berlin</p><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className: 'popupText' });
    markerBerlin.bindPopup(popupBerlin);

    var markerMadrid = L.marker([40.41, -3.70], { alt: 'Madrid' }).addTo(map);
    var popupMadrid = L.popup([40.41, -3.70], { content: '<img src="IMG/popupStore4.jpeg" alt=""><h3>Horizon Madrid</h3><p>Prta del Sol, 1, 28013 Madrid</p><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className: 'popupText' });
    markerMadrid.bindPopup(popupMadrid);

    var markerBruxelles = L.marker([50.84, 4.35], { alt: 'Bruxelles' }).addTo(map);
    var popupBruxelles = L.popup([50.84, 4.35], { content: '<img src="IMG/popupStore5.jpeg" alt=""><h3>Horizon Bruxelles</h3><p>Av. de la Toison Or 2628, 1050 Bruxelles</p><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className: 'popupText' });
    markerBruxelles.bindPopup(popupBruxelles);

    var markerBerne = L.marker([46.94, 7.45], { alt: 'Berne' }).addTo(map);
    var popupBerne = L.popup([46.94, 7.45], { content: '<img src="IMG/popupStore6.jpeg" alt=""><h3>Horizon Berne</h3><p>Marktgasse 60, 3011 Bern</p><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className: 'popupText' });
    markerBerne.bindPopup(popupBerne);

    var markerRome = L.marker([41.89, 12.48], { alt: 'Rome' }).addTo(map);
    var popupRome = L.popup([41.89, 12.48], { content: '<img src="IMG/popupStore7.jpeg" alt=""><h3>Horizon Rome</h3><p>Via del Corso, 181-188, 00186 Roma RM</p><button class="full-rounded"><h5>Select</h5><div class="border full-rounded"></div></button>', className: 'popupText' });
    markerRome.bindPopup(popupRome);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    var geocoder = L.Control.geocoder({
        defaultMarkGeocode: false
    })
        .on('markgeocode', function (e) {
            var bbox = e.geocode.bbox;
            var poly = L.polygon([
                bbox.getSouthEast(),
                bbox.getNorthEast(),
                bbox.getNorthWest(),
                bbox.getSouthWest()
            ]).addTo(map);
            map.fitBounds(poly.getBounds());
        })
        .addTo(map);


})

