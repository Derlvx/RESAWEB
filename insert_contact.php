<?php

include("connexion.php");

// Récupération de toute les informations du FORM
$guest_firstname = $_POST["first-name"];
$guest_lastname = $_POST["last-name"];
$guest_mail = $_POST["email"];
$issue = $_POST["issue"];
$date = date('Y-m-d H:i:s');

$requete = "INSERT INTO contact (date_contact,prenom_contact,nom_contact,mail_contact,text_contact) VALUES ('$date','$guest_firstname','$guest_lastname','$guest_mail','$issue')";
$db->query($requete);

header('Location: feedback.php');

?>