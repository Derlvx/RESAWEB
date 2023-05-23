<!DOCTYPE html>

<?php
// Ici le PHP sert a récupérer l'id dans l'url et afficher les bonnes informations liées à l'id de la chambre
include("connexion.php");

$requete = "SELECT * FROM room WHERE id_room = " . $_GET["id"];

$stmt = $db->query($requete);

$resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="leaflet-search.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Book - Horizon</title>
</head>

<body>

    <div class="nav-wrapper">
        <nav class="navbar">
            <a data-aos="fade-down" data-aos-duration="750" href="index.html"><img class="brandLogo" src="ICONES/NIGHT/LOGO.svg" alt="Go to home page">
            </a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav no-search">
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="100" class="nav-item"><a href="index.html#aboutUs" alt="Go to Overview">Overview</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="200" class="nav-item"><a href="aboutus.html" alt="Go to About us page">About us</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="300" class="nav-item"><a href="catalog.html" alt="Go to Catalog page">Catalog</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="400" class="nav-item"><a href="extra.php" alt="Go to Extra page">Extra</a></li>
            </ul>
        </nav>
    </div>

    <!-- Récupération et envoie de l'id de la chambre à insert_book.php -->
    <form action="recap.php?id=<?php echo $_GET["id"] ?>" name="contact" class="contact-inform form" method="post">
        <section class="cartContainer">


            <!-- Label non modifiable pour l'input de recherche ! -->
            <div class="mapViewer">
                <div class="mapBackground">
                    <section class="mapContainer">
                        <h3>CHOOSE A LOCATION</h3>
                        <div id="map"></div>
                    </section>
                </div>
            </div>

            <div class="guestViewer hide">
                <div class="guestBackground">
                    <h3>CHOOSE NUMBER OF GUEST</h3>
                    <div class="offerContainer">
                        <div class="guestCard">
                            <img src="ICONES/NIGHT/one.svg" alt="">
                            <div class="offerContent">
                                <h3>4 guests</h3>
                                <p><?php foreach ($resultat as $room) echo "{$room["prix_4"]}" ?>$ <span>/ day</span></p>
                            </div>
                            <div class="selectButton guestButton">
                                <input class="radio" type="radio" name="number" id="radio2-1" value="4" onclick="selectGuest()" required>
                                <label for="radio2-1">select</label>
                                <div class="border full-rounded"></div>
                            </div>
                        </div>
                        <div class="guestCard">
                            <img src="ICONES/NIGHT/two.svg" alt="">
                            <div class="offerContent">
                                <h3>6 guests</h3>
                                <p><?php foreach ($resultat as $room) echo "{$room["prix_6"]}" ?>$ <span>/ day</span></p>
                            </div>
                            <div class="selectButton guestButton">
                                <input class="radio" type="radio" name="number" id="radio2-2" value="6" onclick="selectGuest()" required>
                                <label for="radio2-2">select</label>
                                <div class="border full-rounded"></div>
                            </div>
                        </div>
                        <div class="guestCard">
                            <img src="ICONES/NIGHT/three.svg" alt="">
                            <div class="offerContent">
                                <h3>8 guests</h3>
                                <p><?php foreach ($resultat as $room) echo "{$room["prix_8"]}" ?>$ <span>/ day</span></p>
                            </div>
                            <div class="selectButton guestButton">
                                <input class="radio" type="radio" name="number" id="radio2-3" value="8" onclick="selectGuest()" required>
                                <label for="radio2-3">select</label>
                                <div class="border full-rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="formViewer hide">
                <div class="formBackground">
                    <h3>Book a room</h3>
                    <div class="contactContainer contact-column">

                        <div class="formLine">
                            <div class="form-control">
                                <input type="text" name="first-name" class="form-input" placeholder="none" id="first-name" maxlength="50" required>
                                <label for="first-name" class="form-label">First Name<sup class="supRequired">*</sup></label>
                            </div>
                            <div class="form-control">
                                <input type="text" name="last-name" class="form-input" placeholder="none" id="last-name" maxlength="50" required>
                                <label for="last-name" class="form-label">Last Name<sup class="supRequired">*</sup></label>
                            </div>
                        </div>
                        <div class="form-control">
                            <input type="email" name="email" class="form-input" placeholder="none" id="email" maxlength="50" required>
                            <label for="email" class="form-label">Email<sup class="supRequired">*</sup></label>
                        </div>
                        <div class="formLine">
                            <div class="form-control">
                                <!-- Attribution d'une date minimum à l'aide de la date d'aujourd"hui en php -->
                                <input type="date" name="start-date" class="form-input" min="<?= date('Y-m-d') ?>" id="start-date" required>
                                <label for="start-date" class="form-label">Choose a date<sup class="supRequired">*</sup></label>
                            </div>
                        </div>
                        <div class="formContainerButton">
                            <button class="full-rounded button">
                                <h4>Continue</h4>
                                <div class="border full-rounded"></div>
                            </button>
                        </div>
                        <p class="calloutSubtext">Required Informations<sup class="supRequired">*</sup></p>
                    </div>
                </div>
            </div>
            <ul class="checkoutBar">
                <button id="dots1" disabled="true" aria-label="Go to place selection">
                    <li class="progressDots">
                        <div id="dotsActive1" class="dotsActive show"></div>
                    </li>
                </button>
                <button id="dots2" disabled="true" aria-label="Go to number of guests selection">
                    <li class="progressDots">
                        <div id="dotsActive2" class="dotsActive hide"></div>
                    </li>
                </button>
                <button id="dots3" disabled="true" aria-label="Go to book informat">
                    <li class="progressDots">
                        <div id="dotsActive3" class="dotsActive hide" disabled></div>
                    </li>
                </button>
            </ul>
        </section>
    </form>

    <footer>

        <p>
            <a href="terms.html" alt="Go to Terms page">Terms</a>
        </p>
        <p>
            <a href="privacy.html" alt="Go to Privacy page">Privacy</a>
        </p>

        <div class="bottomBrandLogo">
            <a href="index.html"><img src="ICONES/NIGHT/LOGO.svg" alt="Go to home page"></a>
        </div>

        <p>
            <a href="FAQ.html" alt="Go to FAQ page">FAQ</a>
        </p>
        <p>
            <a href="contact.html" alt="Go to Contact page">Contact us</a>
        </p>

        <span>
            All rights reserved, Horizon © 2023
        </span>
    </footer>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="JS/map.js"></script>

    <script defer src="JS/back.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script defer src="JS/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        var maplocation = 0;

        // Fonctions permettant d'afficher ou de cacher les pages de réservation
        function selectMap(maplocation) {
            document.querySelector(".mapViewer").classList.add("hide");
            document.querySelector(".mapViewer").classList.remove("show");

            document.querySelector(".guestViewer").classList.add("show");
            document.querySelector(".guestViewer").classList.remove("hide");

            document.querySelector("#dotsActive1").classList.add("hide");
            document.querySelector("#dotsActive1").classList.remove("show");

            document.querySelector("#dotsActive2").classList.add("show");
            document.querySelector("#dotsActive2").classList.remove("hide");

            document.getElementById("dots1").removeAttribute('disabled');
        }

        function selectGuest(maplocation) {
            document.querySelector(".guestViewer").classList.add("hide");
            document.querySelector(".guestViewer").classList.remove("show");

            document.querySelector(".formViewer").classList.add("show");
            document.querySelector(".formViewer").classList.remove("hide");

            document.querySelector("#dotsActive2").classList.add("hide");
            document.querySelector("#dotsActive2").classList.remove("show");

            document.querySelector("#dotsActive3").classList.add("show");
            document.querySelector("#dotsActive3").classList.remove("hide");
            document.getElementById("dots2").removeAttribute('disabled');
        }
    </script>

</body>

</html>