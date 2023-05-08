<?php
include("connexion.php");

// Ici le PHP sert a récupérer l'id dans l'url et afficher les bonnes informations liées à l'id de la chambre

$requete = "SELECT * FROM room WHERE id_room = " . $_GET["id"];

$stmt = $db->query($requete);

$resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sono&display=swap" rel="stylesheet">


    <!-- Import Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Import OWL Carrousel Librairies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>Room - Horizon</title>
</head>

<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <a data-aos="fade-down" data-aos-duration="750" href="index.html"><img class="brandLogo" src="ICONES/NIGHT/LOGO.svg" alt="Company Logo">
            </a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav no-search">
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="100" class="nav-item"><a href="index.html#aboutUs">Overview</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="200" class="nav-item"><a href="aboutus.html">About us</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="300" class="nav-item"><a href="catalog.html">Our product</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="400" class="nav-item"><a href="extra.php">Extra</a></li>
            </ul>
        </nav>
    </div>



    <header class="headerHome">
        <img src="<?php foreach ($resultat as $room) echo "{$room["photo_room"]}" ?>" class="backgroundHome" alt="">
        <div class="titleHome">
            <h1><?php foreach ($resultat as $room) echo "{$room["nom_room"]}" ?></h1>
            <!-- Le href avec du php sert a faire passer l'id de la chambre qui va être réservé -->
            <a href="book.php?id=<?php echo $_GET["id"] ?>">
                <button class="full-rounded button">
                    <h4>Book Now</h4>
                    <div class="border full-rounded"></div>
                </button>
            </a>
        </div>
        <img src="ICONES/NIGHT/SCROLL.svg" alt="SCROLL" class="scroll">
    </header>

    <section class="sub">
        <h2 data-aos="fade-in" data-aos-duration="2000" data-aos-anchor-placement="top" data-aos-once="true">subscription</h2>
        <div class="offer">

            <div class="offerContent" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100" data-aos-anchor-placement="top" data-aos-once="true">
                <h3>4 guests</h3>
                <!-- Affichage du prix de la chambre en PHP -->
                <p><?php foreach ($resultat as $room) echo "{$room["prix_4"]}" ?>$<span>/ day</span></p>
            </div>

            <span class="vertical-line" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200" data-aos-anchor-placement="top" data-aos-once="true"></span>

            <div class="offerContent" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300" data-aos-anchor-placement="top" data-aos-once="true">
                <h3>6 guests</h3>
                <p><?php foreach ($resultat as $room) echo "{$room["prix_6"]}" ?>$<span>/ day</span></p>
            </div>

            <span class="vertical-line" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400" data-aos-anchor-placement="top" data-aos-once="true"></span>

            <div class="offerContent" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500" data-aos-anchor-placement="top" data-aos-once="true">
                <h3>8 guests</h3>
                <p><?php foreach ($resultat as $room) echo "{$room["prix_8"]}" ?>$<span>/ day</span></p>
            </div>
        </div>
        <div class="terms" class="vertical-line" data-aos="fade-right" data-aos-duration="1000" data-aos-anchor-placement="top" data-aos-once="true">
            <p>Food is not included*</p>
        </div>
    </section>

    <section class="productInformation" data-aos="fade-up" data-aos-duration="2000" data-aos-anchor-placement="top" data-aos-once="true">
        <h2>information</h2>
        <!-- Description de la chambre en PHP -->
        <p><?php foreach ($resultat as $room) echo "{$room["description_room"]}" ?></p>
    </section>

    <!-- Les images et noms des jeux sont insérées dans le carousel -->
    <section class="carousel" data-aos="fade-in" data-aos-duration="2000" data-aos-anchor-placement="top" data-aos-once="true">
        <h2>showcase games</h2>
        <div class="owl-carousel owl-theme">
            <div>
                <div class="carousel_item" style="background-image: url('<?php foreach ($resultat as $room) echo "{$room["game_one"]}" ?>');">
                    <div class="overlay">
                        <h3><?php foreach ($resultat as $room) echo "{$room["nom_game_one"]}" ?></h3>
                    </div>
                </div>
            </div>
            <div>
                <div class="carousel_item" style="background-image: url('<?php foreach ($resultat as $room) echo "{$room["game_two"]}" ?>');">
                    <div class="overlay">
                        <h3><?php foreach ($resultat as $room) echo "{$room["nom_game_two"]}" ?></h3>
                    </div>
                </div>
            </div>
            <div>
                <div class="carousel_item" style="background-image: url('<?php foreach ($resultat as $room) echo "{$room["game_three"]}" ?>');">
                    <div class="overlay">
                        <h3><?php foreach ($resultat as $room) echo "{$room["nom_game_three"]}" ?></h3>
                    </div>
                </div>
            </div>
            <div>
                <div class="carousel_item" style="background-image: url('<?php foreach ($resultat as $room) echo "{$room["game_four"]}" ?>');">
                    <div class="overlay">
                        <h3><?php foreach ($resultat as $room) echo "{$room["nom_game_four"]}" ?></h3>
                    </div>
                </div>
            </div>
            <div>
                <div class="carousel_item" style="background-image: url('<?php foreach ($resultat as $room) echo "{$room["game_five"]}" ?>');">
                    <div class="overlay">
                        <h3><?php foreach ($resultat as $room) echo "{$room["nom_game_five"]}" ?></h3>
                    </div>
                </div>
            </div>
            <div>
                <div class="carousel_item" style="background-image: url('<?php foreach ($resultat as $room) echo "{$room["game_six"]}" ?>');">
                    <div class="overlay">
                        <h3><?php foreach ($resultat as $room) echo "{$room["nom_game_six"]}" ?></h3>
                    </div>
                </div>
            </div>
            <div>
                <div class="carousel_item" style="background-image: url('<?php foreach ($resultat as $room) echo "{$room["game_seven"]}" ?>');">
                    <div class="overlay">
                        <h3><?php foreach ($resultat as $room) echo "{$room["nom_game_seven"]}" ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-container">
        <div class="modal-background">

            <div class="modal modal-one dnone" id="one">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-processor-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>INTEL CORE I7</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-two dnone" id="two">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-cg-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>RTX 3080 TI</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-three dnone" id="three">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-ram-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>THREE</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-four dnone" id="four">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-gchair-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>FOUR</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-five dnone" id="five">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-kb-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>FIVE</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-six dnone" id="six">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-screen-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>SIX</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-seven dnone" id="seven">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-cam-teamSuite.png);">
                        <!-- <img src="IMG/modal-processor-teamSuite.png" alt=""> -->
                    </div>
                    <div class="modal-text">
                        <h2>SEVEN</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-eight dnone" id="eight">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-controller-teamSuite.png);">
                        <!-- <img src="IMG/modal-processor-teamSuite.png" alt=""> -->
                    </div>
                    <div class="modal-text">
                        <h2>EIGHT</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies porta nisi, vel
                            dignissim nibh. Ut quis magna tincidunt arcu facilisis aliquet. Nulla at tellus vel tortor
                            tempor ullamcorper. Nulla pharetra diam ac neque tristique aliquet. Curabitur leo orci,
                            tincidunt vel magna ac, rutrum blandit massa. Nam ut turpis pulvinar, aliquet odio et</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

        </div>
    </div>

    <section class="configuration" data-aos="fade-in" data-aos-duration="2000" data-aos-anchor-placement="top" data-aos-once="true">

        <h2>components & peripheral</h2>

        <div class="componentsContent" style="background-image: url('IMG/computer.png');">

            <div class="componentsNav">
                <button class="componentsButton components" id="one">
                    <img src="ICONES/NIGHT/processor.svg" alt="">
                </button>
                <button class="componentsButton components" id="two">
                    <img src="ICONES/NIGHT/graphic-card.svg" alt="">
                </button>
                <button class="componentsButton components" id="three">
                    <img src="ICONES/NIGHT/ram.svg" alt="">
                </button>
                <button class="componentsButton components" id="four">
                    <img src="ICONES/NIGHT/gaming chair.svg" alt="">
                </button>
                <button class="componentsButton components" id="five">
                    <img src="ICONES/NIGHT/keyboard.svg" alt="">
                </button>
                <button class="componentsButton components" id="six">
                    <img src="ICONES/NIGHT/screen.svg" alt="">
                </button>
                <button class="componentsButton components" id="seven">
                    <img src="ICONES/NIGHT/webcam.svg" alt="">
                </button>
                <button class="componentsButton components" id="eight">
                    <img src="ICONES/NIGHT/controller.svg" alt="">
                </button>
            </div>

        </div>

    </section>

    <footer>

        <p>
            <a href="terms.html">Terms</a>
        </p>
        <p>
            <a href="privacy.html">Privacy</a>
        </p>

        <div class="bottomBrandLogo">
            <a href="index.html"><img src="ICONES/NIGHT/LOGO.svg" alt="Go Top"></a>
        </div>

        <p>
            <a href="FAQ.html">FAQ</a>
        </p>
        <p>
            <a href="contact.html">Contact us</a>
        </p>

    </footer>

    <script defer type="text/javascript" src="JS/script.js"></script>
    <script defer type="text/javascript" src="JS/carrousel.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>