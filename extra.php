
<?php

    // Connection à la base de donnée
    $connection = mysqli_connect("localhost","root","root","resaweb") or die("Error " . mysqli_error($connection));
    include ("connexion.php");

    //Récupération des données
    $requete = ('SELECT * FROM food');
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

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <title>CART SYSTEME</title>
</head>

<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <a href="index.html"><img class="brandLogo" src="ICONES/NIGHT/LOGO.svg" alt="Company Logo">
            </a>

            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav no-search">
                <li class="nav-item"><a href="index.html#aboutUs">Overview</a></li>
                <li class="nav-item"><a href="#">About us</a></li>
                <li class="nav-item"><a href="catalog.html">Our product</a></li>
                <li class="nav-item"><a href="extra.php">Extra</a></li>
            </ul>
        </nav>
    </div>

    <section class="extra">

        <h2>A BREAK FOR YOUR GAMING session ? 🍕🥤</h2>

        <div class="cartButton">
            <a href="#" class="cartCount button" onclick="$('main .callout').toggleClass('open');"><img
                    src="ICONES/NIGHT/cart.svg" alt=""><sup></sup>
                <div class="border full-rounded"></div>
            </a>
        </div>

        <main>
            <div class="container">

            </div>
            <div class="callout"></div>
        </main>

    </section>

    <div class="popup popup--icon -success js_success-popup">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Success Popup
                </h1>
                <p>Lorem Ipsum dolor sit amet!</p>
                <p>
                    <button class="button button--success" data-for="js_success-popup">Hide Popup</button>
                </p>
        </div>
    </div>

    <footer>

        <p>
            <a href="">Terms</a>
        </p>
        <p>
            <a href="">Privacy</a>
        </p>

        <div class="bottomBrandLogo">
            <a href="index.html"><img src="ICONES/NIGHT/LOGO.svg" alt="Go Top"></a>
        </div>

        <p>
            <a href="FAQ.html">FAQ</a>
        </p>
        <p>
            <a href="">Contact us</a>
        </p>

    </footer>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script defer type="text/javascript" src="JS/data.json"></script>
    <script defer type="text/javascript" src="JS/cart.js"></script>

</body>

</html>