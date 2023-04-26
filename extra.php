<?php

// Connection à la base de donnée
include("connexion.php");

//Récupération de TOUTE les données

$requete2 = ('SELECT * FROM Etype');
$stmt2 = $db->query($requete2);
$result2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
foreach ($result2 as $type) { 
    if (isset($_GET["{$type["nom_type"]}"])){
        $clock = 1;
        $condition = $condition . "ext_type = " . $type["id_type"] . " OR " ;
    }  
}
$condition = substr($condition,0,-3);
echo "<script>console.log('$condition')</script>";

$requete = ('SELECT * FROM food');
if (isset($clock)){
    $requete = $requete . " WHERE " . $condition;
    echo "<script>console.log('$requete BONSOIR')</script>";
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
            <a href="#" class="cartCount button" onclick="$('main .callout').toggleClass('open');"><img src="ICONES/NIGHT/cart.svg" alt=""><sup></sup>
                <div class="border full-rounded"></div>
            </a>
        </div>

        <main>

            <div class="filterbc">
                <form action="extra.php" method="GET">

                    <div class='filter-checkbox'>
                        <input class='box' id='checkbox_0' type='checkbox' name='all' checked>
                        <label for='checkbox_0'>All</label>
                    </div>

                    <?php
                    $requete = ('SELECT * FROM Etype');
                    $stmt = $db->query($requete);
                    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $room) {
                        echo "
                        <div class='filter-checkbox'>
                            <input onclick='save()' class='box' id='{$room["id_type"]}' type='checkbox' name='{$room["nom_type"]}'>
                            <label for='{$room["id_type"]}'>{$room["nom_type"]}</label>
                        </div>
                        ";
                    }
                    ?>
                    <input type="submit" value="">
                </form>
            </div>

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

    <script>
        let boxes = document.getElementsByClassName('box').length;

        function save() {
            for (let i = 1; i <= boxes; i++) {
                var checkbox = document.getElementById(String(i));
                localStorage.setItem("checkbox" + String(i), checkbox.checked);
            }
        }

        //for loading
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