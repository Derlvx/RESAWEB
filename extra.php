<?php

// Connection à la base de donnée
include("connexion.php");

//Récupération de TOUTE les données

$requeteBase = ('SELECT * FROM food');
$stmtBase = $db->query($requeteBase);
$resultBase = $stmtBase->fetchall(PDO::FETCH_ASSOC);

$fp = fopen('JS/start.json', 'w');
fwrite($fp, json_encode($resultBase));
fclose($fp);

$requete2 = ('SELECT * FROM Etype');
$stmt2 = $db->query($requete2);
$result2 = $stmt2->fetchall(PDO::FETCH_ASSOC);

foreach ($result2 as $type) {
    if (isset($_GET["{$type["nom_type"]}"])) {
        $clock = 1;
        $condition = $condition . "ext_type = " . $type["id_type"] . " OR ";
    }
}

if (isset($condition)) {
    $condition = substr($condition, 0, -3);
}
// echo "<script>console.log('$condition')</script>";

$requete = ('SELECT * FROM food');

if (isset($clock)) {
    $requete = $requete . " WHERE " . $condition;
    // echo "<script>console.log('$requete BONSOIR')</script>";
}

$stmt = $db->query($requete);
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

//Création du fichier JSON servant pour le panier
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

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Extra - Horizon</title>
</head>

<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <a data-aos="fade-down" data-aos-duration="750" href="index.php"><img class="brandLogo" src="ICONES/NIGHT/LOGO.svg" alt="Company Logo">
            </a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav no-search">
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="100" class="nav-item"><a href="index.php#aboutUs">Overview</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="200" class="nav-item"><a href="aboutus.php">About us</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="300" class="nav-item"><a href="catalog.php">Our product</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="400" class="nav-item"><a href="extra.php">Extra</a></li>
            </ul>
        </nav>
    </div>

    <section class="extra">

        <h2>A BREAK FOR YOUR GAMING session ? 🍕🥤</h2>

        <div class="cartButton">
            <a href="#" class="cartCount button" onclick="$('main .callout').toggleClass('open');"><img src="ICONES/NIGHT/cart.svg" alt=""><sup></sup>
                <div class="border full-rounded"></div>
            </a>
        </div>

        <main>

            <div class="filterbc">
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
                    <input type="submit" value="" style="background-image: url(ICONES/NIGHT/search.svg);">
                </form>
            </div>

            <div class="container">

            </div>
            <div class="callout"></div>

        </main>

    </section>

    <div class="popup popup--icon -success js_success-popup">
        <div class="popup__background"></div>

        <div class="formViewer hide">
            <form id="extra_form" action="insert_extra.php" method="POST">
                <div class="formBackground">
                    <button id="formClose" class="closeButton">x</button>
                    <h3>Checkout Information</h3>
                    <div class="container contact-column">
                        <div class="formLine">
                            <div class="form-control">
                                <input type="text" name="first-name" class="form-input" placeholder="none" required>
                                <label for="first-name" class="form-label">First Name<sup class="supRequired">*</sup></label>
                            </div>
                            <div class="form-control">
                                <input type="text" name="last-name" class="form-input" placeholder="none" required>
                                <label for="last-name" class="form-label">Last Name<sup class="supRequired">*</sup></label>
                            </div>
                        </div>
                        <div class="form-control">
                            <input type="email" name="email" class="form-input" placeholder="none" required>
                            <label for="email" class="form-label">Email<sup class="supRequired">*</sup></label>
                        </div>
                        <div class="recap">
                            <p>Your Total Order :</p>
                            <p id="popupBillAmount"></p>
                        </div>
                        <button class="full-rounded button--success">
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

    <footer>

        <p>
            <a href="terms.php">Terms</a>
        </p>
        <p>
            <a href="privacy.php">Privacy</a>
        </p>

        <div class="bottomBrandLogo">
            <a href="index.php"><img src="ICONES/NIGHT/LOGO.svg" alt="Go Top"></a>
        </div>

        <p>
            <a href="FAQ.php">FAQ</a>
        </p>
        <p>
            <a href="contact.php">Contact us</a>
        </p>

    </footer>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script defer type="text/javascript" src="JS/data.json"></script>
    <script defer type="text/javascript" src="JS/cart.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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