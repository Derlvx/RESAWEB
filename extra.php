<?php

// Connection à la base de donnée
include("connexion.php");

//Récupération de TOUTE les données de la table food
$requeteBase = ('SELECT * FROM food');
$stmtBase = $db->query($requeteBase);
$resultBase = $stmtBase->fetchall(PDO::FETCH_ASSOC);

// Création du JSON start contenant toute la BDD
$fp = fopen('JS/start.json', 'w');
fwrite($fp, json_encode($resultBase));
fclose($fp);

// Récupération de toute les données de la table Etype
$requete2 = ('SELECT * FROM Etype');
$stmt2 = $db->query($requete2);
$result2 = $stmt2->fetchall(PDO::FETCH_ASSOC);

// Pour chaque résultat on vérifie si elle est attribuée en $_GET dans l'url
//  Si oui cela créer une condition du type ext_type = 1 OR 
//  Et rajoute cette forme pour chaque correspondance dans l'url
// Ce qui donnerait ext_type = 1 OR ext_type = 3 OR
foreach ($result2 as $type) {
    if (isset($_GET["{$type["nom_type"]}"])) {
        $clock = 1;
        $condition = $condition . "ext_type = " . $type["id_type"] . " OR ";
        $lien = $lien . "test";
    }
}

// Ici si $condition est attribuée on retire les 3 derniers charactères du string $condition
// Ce qui donnerait ext_type = 1 OR ext_type = 2
if (isset($condition)) {
    $condition = substr($condition, 0, -3);
}
// LA ligne en dessous permet de faire un console.log de la recette obtenu
// echo "<script>console.log('$condition')</script>";

// Création de la requete de base
$requete = ('SELECT * FROM food');

// si $clock est defini on rajoute " WHERE " + $condition
if (isset($clock)) {
    $requete = $requete . " WHERE " . $condition;
    // la ligne du dessous fait un console.log de la requete entière !
    // echo "<script>console.log('$requete')</script>";
}

$requete = $requete . " ORDER BY id DESC LIMIT 8";

if (isset($_GET["all"])) {
    $requete = substr($requete, 0, -24);
    echo "<script>console.log('$requete')</script>";
}

echo "<script>console.log('$requete')</script>";

$stmt = $db->query($requete);
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

//Création du fichier JSON servant pour l'affichage des extras
$fp = fopen('JS/data.json', 'w');
fwrite($fp, json_encode($result));
fclose($fp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="ICONES/NIGHT/FavIconDark.png" id="light-scheme-icon">
    <link rel="icon" href="ICONES/NIGHT/FavIconLight.png" id="dark-scheme-icon">

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Extra - Horizon</title>
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
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="400" class="nav-item"><a href="extra.php" alt="Go to Extra page" class="hover">Extra</a></li>
            </ul>
        </nav>
    </div>

    <section class="extra">

        <h2 data-aos="fade-in" data-aos-duration="2000" data-aos-anchor-placement="top" data-aos-once="true">A BREAK FOR YOUR GAMING session ? 🍕🥤</h2>

        <div class="cartButton" data-aos="fade-in" data-aos-duration="2000" data-aos-anchor-placement="top" data-aos-once="true">
            <a href="#" class="cartCount button" onclick="$('main .callout').toggleClass('open');"><img src="ICONES/NIGHT/cart.svg" alt="Open/Close Cart"><sup></sup>
                <div class="border full-rounded"></div>
            </a>
        </div>

        <main>

            <div class="filterbc" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="200" data-aos-anchor-placement="top" data-aos-once="true">
                <form action="extra.php" method="GET">

                    <?php
                    // Création des checkboxs de filtre a partir des catégories dans la BDD
                    $requete = ('SELECT * FROM Etype');
                    $stmt = $db->query($requete);
                    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $filter) {
                        echo "
                        <div class='filter-checkbox'>
                            <input onclick='save()' class='box' id='{$filter["id_type"]}' type='checkbox' name='{$filter["nom_type"]}'>
                            <label for='{$filter["id_type"]}'>{$filter["nom_type"]}</label>
                        </div>
                        ";
                    }
                    ?>

                    <div class='filter-checkbox'>
                        <input onclick='save()' class='box' id='6' type='checkbox' name='all'>
                        <label for='6'>View All</label>
                    </div>

                    <input type="submit" onclick="window.location.reload()" value="" style="background-image: url(ICONES/NIGHT/search.svg);" aria-label="Search filter">
                </form>
            </div>

            <div class="container" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="400" data-aos-anchor-placement="top" data-aos-once="true">

            </div>

            <div class="callout"></div>

        </main>

    </section>

    <div class="popup popup--icon -success js_success-popup">
        <div class="popup__background"></div>

        <div class="formViewer hide">
            <form id="extra_form" action="insert_extra.php" method="POST">
                <div class="formBackground">
                    <button id="formClose" class="closeButton" aria-label="Close button">x</button>
                    <h3>Checkout Information</h3>
                    <div class="container contact-column">
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
                        <div class="recap">
                            <p>Your Total Order :</p>
                            <p id="popupBillAmount"></p>
                        </div>
                        <button class="full-rounded button--success" aria-label="Make a reservation">
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
                        <p class="calloutSubtext">Required Informations<sup class="supRequired">*</sup></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="viewMoreContainer">
        <!-- $_SERVER['QUERY_STRING'] sert à récuprer toute les variables du $_GET -->
        <a alt="Book a room" href="extra.php?<?php echo $_SERVER['QUERY_STRING'] . "&all=on" ?>">
            <button class="full-rounded button">
                <h4>View More</h4>
                <div class="border full-rounded"></div>
            </button>
        </a>
    </div>

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

        <span>All rights reserved, Horizon © 2023</span>
    </footer>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- Le php sert a empecher le stockage du fichier en cache -->
    <script src="JS/data.json?random=<?= uniqid() ?>"></script>
    <script defer src="JS/start.json"></script>
    <script defer src="JS/cart.js"></script>
    <script defer src="JS/back.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script defer src="JS/script.js"></script>
    <script defer src="JS/fav.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        // Fonctions permettant de sauvegarder les checkboxs pour les filtres ( en local storage )
        let boxes = document.getElementsByClassName('box').length;

        function save() {
            for (let i = 1; i <= boxes; i++) {
                var checkbox = document.getElementById(String(i));
                localStorage.setItem("checkbox" + String(i), checkbox.checked);
            }
        }

        for (let i = 1; i <= boxes; i++) {
            if (localStorage.length > 0) {
                var checked = JSON.parse(localStorage.getItem("checkbox" + String(i)));
                document.getElementById(String(i)).checked = checked;
            }
        }
        window.addEventListener('change', save);
    </script>

</body>

</html>