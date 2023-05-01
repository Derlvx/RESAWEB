<?php

include("connexion.php");

// Récupération des informations du formulaire
$guest_firstname = $_POST["first-name"];
$guest_lastname = $_POST["last-name"];
$guest_mail = $_POST["email"];
$date = date('Y-m-d H:i:s');

// Récupération des informations précédement insérer dans l'url lors de la commande dans la page EXTRA
$extra = $_GET['my_json'];
// Décodage de la chaine de caractère pour en faire un format JSON
$extra = json_decode($extra);
var_dump($extra);

// Fonction d'insertion des commande 
$i = 0;
// Pour chaque object
foreach($extra as $key=>$value){

    // Incrémentation de la variable i
    $i++;

    // Création de variable contenant l'id du produit, exemple id_1 = 2
    ${'id_'.$i} = $value->id;

    // echo ${'id_'.$i};
    // echo $value->id;

    // Création de variable contenant la quantité du produit, exemple qty_1 = 5
    ${'qty_'.$i} = $value->qty;

    // echo ${'qty_'.$i};
    // echo $value->qty;

    // Insertion de toute les informations collectés dans la BDD
    $requete = "INSERT INTO Reservation (date_reservation,ext_food,quantite,prenom_reservation,nom_reservation,mail) VALUES ('$date','$value->id','$value->qty','$guest_firstname','$guest_lastname','$guest_mail')";
    $db->query($requete);

}

?>