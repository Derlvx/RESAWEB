<?php

include("connexion.php");

// Récupération de toute les informations du FORM
$nb_de_personne = $_POST["number"];
$date_debut = $_POST["start-date"];
$date_fin = $_POST["end-date"];
$location = $_POST["location"];
$guest_firstname = $_POST["first-name"];
$guest_lastname = $_POST["last-name"];
$guest_mail = $_POST["email"];
$room = $_GET["id"];
$date = date('Y-m-d H:i:s');

// Insertion dans la BDD
$requete = "INSERT INTO Reservation (date_reservation,ext_room,nb_de_personne,date_debut,date_fin,lieu,prenom_reservation,nom_reservation,mail) VALUES ('$date','$room','$nb_de_personne','$date_debut','$date_fin','$location','$guest_firstname','$guest_lastname','$guest_mail')";
$db->query($requete);

?>