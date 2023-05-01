<?php

include("connexion.php");

$guest_firstname = $_POST["first-name"];
$guest_lastname = $_POST["last-name"];
$guest_mail = $_POST["email"];
$date = date('Y-m-d H:i:s');

$extra = $_GET['my_json'];
$extra = json_decode($extra);
var_dump($extra);

$i = 0;
foreach($extra as $key=>$value){
    $i++;
    ${'id_'.$i} = $value->id;
    echo ${'id_'.$i};
    // echo $value->id;
    ${'qty_'.$i} = $value->qty;
    echo ${'qty_'.$i};
    // echo $value->qty;

    $requete = "INSERT INTO Reservation (date_reservation,ext_food,quantite,prenom_reservation,nom_reservation,mail) VALUES ('$date','$value->id','$value->qty','$guest_firstname','$guest_lastname','$guest_mail')";
    $db->query($requete);

}
