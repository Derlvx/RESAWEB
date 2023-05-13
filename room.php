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
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="300" class="nav-item"><a href="catalog.html">Catalog</a></li>
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
                        <p>
                            The Intel Core i7 13900K is a high-performance computer part that works well for playing games, making videos or other intensive applications. i7 intergrates a high clock speed, multiple cores, and support for hyper-threading technology. 13th Gen Intel® Core™ processors deliver highly flexible architecture and industry-leading tools for the ultimate in performance customization.</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-two dnone" id="two">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-cg-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>RTX 4090 TI</h2>
                        <p>NVIDIA® GeForce RTX™ 40 Series GPUs deliver extreme speed to gamers and creators. Based on the high-efficiency NVIDIA Ada Lovelace architecture, these GPUs are a breakthrough in AI-optimized performance and graphics capabilities. Dive into ultra-realistic virtual worlds with ray tracing and extremely high frame rate with very low latency graphic rendering. Discover revolutionary new ways to create content and accelerate your workflows in new ways.</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-three dnone" id="three">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-ram-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2> Fury Beast DDR4</h2>
                        <p>Kingston FURY™ Beast DDR4 RGB1 delivers a boost of performance and style with speeds of up to 3733MT/s*, aggressive styling and RGB lighting that runs the length of the module for smooth and stunning effects. Customise the RGB lighting effects by using Kingston FURY CTRL software and its patented Infrared Sync Technology. 100% tested at speed and backed by a lifetime warranty, it’s an easy, worry-free upgrade for your Intel or AMD-based system.</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-four dnone" id="four">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-gchair-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>Secretlabb Classic Chair</h2>
                        <p>More comfort. More customization. Exceptional durability. With design innovations developed through many hours of research, the Secretlab Classic is the first gaming chair in its class. Improve your game with optimized ergonomics - trust Secretab as well as the pro gamers around the world.</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-five dnone" id="five">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-kb-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>APEX PRO TKL WIRELESS</h2>
                        <p>World's fastest OmniPoint 2.0 adjustable switches with 11x quicker response and 10x swifter actuation. Customize the sensitivity of every key from a speedy 0.2mm to a deliberate 3.8mm. Program two different actions to the same key for powerful gaming shortcuts. Esports-ready tenkeyless design. Lag-free Quantum 2.0 Dual Wireless with a 2.4GHz connection and Bluetooth 5.0. OLED Smart Display delivers information at a glance from games and apps</p>
                    </div>
                    <button class="modal-close">×</button>
                </div>
            </div>

            <div class="modal modal-six dnone" id="six">
                <div class="modal-content">
                    <div class="modal-img" style="background-image: url(IMG/modal-screen-teamSuite.png);">
                    </div>
                    <div class="modal-text">
                        <h2>AOC Q27G2E/BK</h2>
                        <p>The AOC Q27G2E/BK offers a 27” VA panel with QHD resolution, ShadowControl and super contrast ratio of 3000:1. Enjoy the most responsive gameplay and fastest battles with its stutter-free Adaptive Sync, 144 Hz overclocked to 155 Hz refresh rate, 1ms MPRT and low input lag to decrease motion blur and input-output delay. Gaming has never been so fun and intense.</p>
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
                        <h2>Logitech Brio 500</h2>
                        <p>The Logitech BRIO 500 webcam allows you to record and stream video using Full HD 1080p resolution. Thanks to it, you get a quality image for your phone calls, your videos or your recordings. With many features such as automatic exposure, automatic framing or show mode, you will be able to provide your audience with the best possible image.</p>
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
                        <h2>DualSense Wireless Controller</h2>
                        <p>The DualSense wireless controller for PS5 offers immersive haptic feedback, dynamic adaptive triggers and a built-in microphone, all integrated into an iconic design.</p>
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

        <span><p>All rights reserved, Horizon © 2023</p></span>
    </footer>

    <script defer type="text/javascript" src="JS/script.js"></script>
    <script defer type="text/javascript" src="JS/carrousel.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>