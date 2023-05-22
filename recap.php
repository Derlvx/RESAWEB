<?php

include("connexion.php");

$nb_de_personne = $_POST["number"];
$date_debut = $_POST["start-date"];
$location = $_POST["location"];
$guest_firstname = $_POST["first-name"];
$guest_lastname = $_POST["last-name"];
$guest_mail = $_POST["email"];
$room = $_GET["id"];

$requete = "SELECT * FROM room WHERE id_room = $room";
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
    <title>recap - Horizon</title>
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
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="100" class="nav-item"><a href="index.html#aboutUs" title="Go to Overview">Overview</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="200" class="nav-item"><a href="aboutus.html" title="Go to About us page">About us</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="300" class="nav-item"><a href="catalog.html" title="Go to Catalog page">Catalog</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="400" class="nav-item"><a href="extra.php" title="Go to Extra page">Extra</a></li>
            </ul>
        </nav>
    </div>

    <form action="insert_book.php?id=<?php echo $_GET["id"] ?>" method="POST">
        <section class="contactForm" data-aos="fade-in" data-aos-duration="2000" data-aos-anchor-placement="top" data-aos-once="true">

            <div class="formBackground recapBackground">
                <h3>Your Recap</h3>

                <div class="dnone">
                <input type="text" name="first-name" value="<?php echo $guest_firstname ?>">
                <input type="text" name="last-name" value="<?php echo $guest_firstname ?>">
                <input type="text" name="email" value="<?php echo $guest_mail ?>">
                <input type="date" name="start-date" value="<?php echo $date_debut ?>">
                <input type="text" name="number" value="<?php echo $nb_de_personne ?>">
                <input type="text" name="location" value="<?php echo $location ?>">

                </div>

                <div class="container contact-column recapContainer">

                    <div class="formLine">

                        <div>
                            <p>First name : <?php echo $guest_firstname ?></p>
                        </div>

                        <div>
                            <p>Last name : <?php echo $guest_lastname ?></p>
                        </div>

                    </div>

                    <div>
                        <p>Your email is : <?php echo $guest_mail ?></p>
                    </div>

                    <div class="horizontalLine"></div>

                    <div class="recapRoom">

                        <div class="roomImage" style="background-image: url(<?php foreach ($resultat as $review) echo "{$review["photo_room"]}" ?>);"></div>

                        <div>
                            <p class="recapRoomName">
                                <?php foreach ($resultat as $review) echo "{$review["nom_room"]}" ?>
                            </p>
                            <p>x<?php echo $nb_de_personne ?> customers</p>
                        </div>
                        <p>
                            <?php
                            switch ($nb_de_personne) {
                                case 4:
                                    echo $review["prix_4"];
                                    break;
                                case 6:
                                    echo $review["prix_6"];
                                    break;
                                case 8:
                                    echo $review["prix_8"];
                            } ?>
                            $
                        </p>
                        <p><?php echo $date_debut ?></p>
                    </div>

                    <div class="horizontalLine"></div>

                    <div class="formLine buttonLine">

                        <button class="full-rounded" aria-label="Send recap">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <span>Send</span>
                        </button>
                    </div>

                </div>
            </div>

        </section>
    </form>

    <footer>

        <p>
            <a href="terms.html" title="Go to Terms page">Terms</a>
        </p>
        <p>
            <a href="privacy.html" title="Go to Privacy page">Privacy</a>
        </p>

        <div class="bottomBrandLogo">
            <a href="index.html"><img src="ICONES/NIGHT/LOGO.svg" alt="Go to home page"></a>
        </div>

        <p>
            <a href="FAQ.html" title="Go to FAQ page">FAQ</a>
        </p>
        <p>
            <a href="contact.html" title="Go to Contact page">Contact us</a>
        </p>

        <span>All rights reserved, Horizon © 2023</span>
    </footer>
    <script defer src="JS/script.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</body>

</html>