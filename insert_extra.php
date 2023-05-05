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
// var_dump($extra);

// Fonction d'insertion des commande 
$i = 0;
// Pour chaque object
foreach ($extra as $key => $value) {

    // Incrémentation de la variable i
    $i++;

    // Création de variable contenant l'id du produit, exemple id_1 = 2
    ${'id_' . $i} = $value->id;

    // echo ${'id_'.$i};
    // echo $value->id;

    // Création de variable contenant la quantité du produit, exemple qty_1 = 5
    ${'qty_' . $i} = $value->qty;

    // echo ${'qty_'.$i};
    // echo $value->qty;

    // Insertion de toute les informations collectés dans la BDD
    $requete = "INSERT INTO Reservation (date_reservation,ext_food,quantite,prenom_reservation,nom_reservation,mail) VALUES ('$date','$value->id','$value->qty','$guest_firstname','$guest_lastname','$guest_mail')";
    $db->query($requete);
}

$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        .es-button {
            text-decoration: none !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
        }

        @media only screen and (max-width:600px) {

            p,
            ul li,
            ol li,
            a {
                line-height: 150% !important
            }

            h1,
            h2,
            h3,
            h1 a,
            h2 a,
            h3 a {
                line-height: 120%
            }

            h1 {
                font-size: 30px !important;
                text-align: center
            }

            h2 {
                font-size: 26px !important;
                text-align: center
            }

            h3 {
                font-size: 20px !important;
                text-align: center
            }

            .es-header-body h1 a,
            .es-content-body h1 a,
            .es-footer-body h1 a {
                font-size: 30px !important
            }

            .es-header-body h2 a,
            .es-content-body h2 a,
            .es-footer-body h2 a {
                font-size: 26px !important
            }

            .es-header-body h3 a,
            .es-content-body h3 a,
            .es-footer-body h3 a {
                font-size: 20px !important
            }

            .es-menu td a {
                font-size: 12px !important
            }

            .es-header-body p,
            .es-header-body ul li,
            .es-header-body ol li,
            .es-header-body a {
                font-size: 14px !important
            }

            .es-content-body p,
            .es-content-body ul li,
            .es-content-body ol li,
            .es-content-body a {
                font-size: 14px !important
            }

            .es-footer-body p,
            .es-footer-body ul li,
            .es-footer-body ol li,
            .es-footer-body a {
                font-size: 14px !important
            }

            .es-infoblock p,
            .es-infoblock ul li,
            .es-infoblock ol li,
            .es-infoblock a {
                font-size: 12px !important
            }

            *[class="gmail-fix"] {
                display: none !important
            }

            .es-m-txt-c,
            .es-m-txt-c h1,
            .es-m-txt-c h2,
            .es-m-txt-c h3 {
                text-align: center !important
            }

            .es-m-txt-r,
            .es-m-txt-r h1,
            .es-m-txt-r h2,
            .es-m-txt-r h3 {
                text-align: right !important
            }

            .es-m-txt-l,
            .es-m-txt-l h1,
            .es-m-txt-l h2,
            .es-m-txt-l h3 {
                text-align: left !important
            }

            .es-m-txt-r img,
            .es-m-txt-c img,
            .es-m-txt-l img {
                display: inline !important
            }

            .es-button-border {
                display: block !important
            }

            a.es-button,
            button.es-button {
                font-size: 20px !important;
                display: block !important;
                border-left-width: 0px !important;
                border-right-width: 0px !important
            }

            .es-adaptive table,
            .es-left,
            .es-right {
                width: 100% !important
            }

            .es-content table,
            .es-header table,
            .es-footer table,
            .es-content,
            .es-footer,
            .es-header {
                width: 100% !important;
                max-width: 600px !important
            }

            .es-adapt-td {
                display: block !important;
                width: 100% !important
            }

            .adapt-img {
                width: 100% !important;
                height: auto !important
            }

            .es-m-p0 {
                padding: 0 !important
            }

            .es-m-p0r {
                padding-right: 0 !important
            }

            .es-m-p0l {
                padding-left: 0 !important
            }

            .es-m-p0t {
                padding-top: 0 !important
            }

            .es-m-p0b {
                padding-bottom: 0 !important
            }

            .es-m-p20b {
                padding-bottom: 20px !important
            }

            .es-mobile-hidden,
            .es-hidden {
                display: none !important
            }

            tr.es-desk-hidden,
            td.es-desk-hidden,
            table.es-desk-hidden {
                width: auto !important;
                overflow: visible !important;
                float: none !important;
                max-height: inherit !important;
                line-height: inherit !important
            }

            tr.es-desk-hidden {
                display: table-row !important
            }

            table.es-desk-hidden {
                display: table !important
            }

            td.es-desk-menu-hidden {
                display: table-cell !important
            }

            .es-menu td {
                width: 1% !important
            }

            table.es-table-not-adapt,
            .esd-block-html table {
                width: auto !important
            }

            table.es-social {
                display: inline-block !important
            }

            table.es-social td {
                display: inline-block !important
            }

            .es-m-p5 {
                padding: 5px !important
            }

            .es-m-p5t {
                padding-top: 5px !important
            }

            .es-m-p5b {
                padding-bottom: 5px !important
            }

            .es-m-p5r {
                padding-right: 5px !important
            }

            .es-m-p5l {
                padding-left: 5px !important
            }

            .es-m-p10 {
                padding: 10px !important
            }

            .es-m-p10t {
                padding-top: 10px !important
            }

            .es-m-p10b {
                padding-bottom: 10px !important
            }

            .es-m-p10r {
                padding-right: 10px !important
            }

            .es-m-p10l {
                padding-left: 10px !important
            }

            .es-m-p15 {
                padding: 15px !important
            }

            .es-m-p15t {
                padding-top: 15px !important
            }

            .es-m-p15b {
                padding-bottom: 15px !important
            }

            .es-m-p15r {
                padding-right: 15px !important
            }

            .es-m-p15l {
                padding-left: 15px !important
            }

            .es-m-p20 {
                padding: 20px !important
            }

            .es-m-p20t {
                padding-top: 20px !important
            }

            .es-m-p20r {
                padding-right: 20px !important
            }

            .es-m-p20l {
                padding-left: 20px !important
            }

            .es-m-p25 {
                padding: 25px !important
            }

            .es-m-p25t {
                padding-top: 25px !important
            }

            .es-m-p25b {
                padding-bottom: 25px !important
            }

            .es-m-p25r {
                padding-right: 25px !important
            }

            .es-m-p25l {
                padding-left: 25px !important
            }

            .es-m-p30 {
                padding: 30px !important
            }

            .es-m-p30t {
                padding-top: 30px !important
            }

            .es-m-p30b {
                padding-bottom: 30px !important
            }

            .es-m-p30r {
                padding-right: 30px !important
            }

            .es-m-p30l {
                padding-left: 30px !important
            }

            .es-m-p35 {
                padding: 35px !important
            }

            .es-m-p35t {
                padding-top: 35px !important
            }

            .es-m-p35b {
                padding-bottom: 35px !important
            }

            .es-m-p35r {
                padding-right: 35px !important
            }

            .es-m-p35l {
                padding-left: 35px !important
            }

            .es-m-p40 {
                padding: 40px !important
            }

            .es-m-p40t {
                padding-top: 40px !important
            }

            .es-m-p40b {
                padding-bottom: 40px !important
            }

            .es-m-p40r {
                padding-right: 40px !important
            }

            .es-m-p40l {
                padding-left: 40px !important
            }

            .es-desk-hidden {
                display: table-row !important;
                width: auto !important;
                overflow: visible !important;
                max-height: inherit !important
            }
        }
    </style>
</head>

<body style="width:100%;font-family:arial, helvetica neue, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
    <div class="es-wrapper-color" style="background-color:#FFFFFF">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FFFFFF">
            <tr>
                <td valign="top" style="padding:0;Margin:0">
                    <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                        <tr>
                            <td align="center" style="padding:0;Margin:0">
                                <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                    <tr>
                                        <td class="esdev-adapt-off" align="left" bgcolor="#333333" style="padding:20px;Margin:0;background-color:#333333">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="left" style="padding:0;Margin:0;font-size:0px"><a target="_blank" href="https://dphan-nguyen.butmmi.o2switch.site/resaweb/index.php" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-decoration:underline;color:#926B4A;font-size:14px"><img src="https://dzuktc.stripocdn.email/content/guids/70e58a58-7a03-4064-8d07-4e5f7deebff8/images/logo.png" alt="Logo" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="120" title="Logo" height="23"></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" style="padding:0;Margin:0">
                                                                    <h1 style="Margin:0;line-height:36px;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#333333">
                                                                        Thanks for your order !<br></h1>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px">
                                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">
                                                                        To redeem it, you just need to present
                                                                        the QR code below to one of our staff
                                                                        member.&nbsp;And we will take care of the rest</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="bonsoir adapt-img" src="https://dphan-nguyen.butmmi.o2switch.site/resaweb/IMG/qr-code.png" alt style="margin:2rem;display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="200" height="200"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" style="padding:0;Margin:0">
                                                                    <h2 style="Margin:0;line-height:36px;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#333333">
                                                                        ORDER # 
';

$message = $message . rand(1000000, 99999999) . "</h2>";

$message = $message . '<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">' . date("d/m/Y") . '</p>';

$message = $message . '</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" class="es-content" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
<tr>
<td align="center" style="padding:0;Margin:0">
<table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
<tr>
<td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
<table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
    <td align="left" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:20px">
        <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
            ITEMS ORDERED</p>
    </td>
</tr>
<tr>
    <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
            <tr>
                <td style="padding:0;Margin:0;border-bottom:1px solid #333333;background:none;height:1px;width:100%;margin:0px">
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
';

foreach ($extra as $key => $value) {

    $requete = "SELECT * FROM food WHERE id = $value->id";

    $stmt = $db->query($requete);

    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach ($resultat as $review)

        $message2 = '';

    $message2 = $message2 . '<tr>
    <td class="esdev-adapt-off" align="left" style="padding:20px;Margin:0">
        <table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="border-collapse:collapse;border-spacing:0px;width:560px">
            <tr>
                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                    <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="border-collapse:collapse;border-spacing:0px;float:left">
                        <tr>
                            <td align="left" style="padding:0;Margin:0;width:125px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;font-size:0px">
                                            <img class="adapt-img p_image" src="';

    $message2 = $message2 .'https://dphan-nguyen.butmmi.o2switch.site/resaweb/'. $review["photo"];

    $message2 = $message2 . '" alt="Sony WH-1000XM4" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="125" title="Sony WH-1000XM4" height="125">
    </td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td style="padding:0;Margin:0;width:20px"></td>
<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="border-collapse:collapse;border-spacing:0px;float:left">
<tr>
<td align="left" style="padding:0;Margin:0;width:125px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
    <td align="left" class="es-m-p0t es-m-p0b es-m-txt-l" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
        <h3 style="Margin:0;line-height:24px;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#333333">
            <strong class="p_name">';

    $message2 = $message2 . $review["name"];

    $message2 = $message2 . '</strong>
    </h3>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td style="padding:0;Margin:0;width:20px"></td>
<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="border-collapse:collapse;border-spacing:0px;float:left">
<tr>
<td align="left" style="padding:0;Margin:0;width:176px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="right" class="es-m-p0t es-m-p0b" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px" class="p_description">';

    $message2 = $message2 . 'x' . $value->qty . '</p>';

    $message2 = $message2 . '</td>
    </tr>
</table>
</td>
</tr>
</table>
</td>
<td style="padding:0;Margin:0;width:20px"></td>
<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
<table cellpadding="0" cellspacing="0" class="es-right" align="right" style="border-collapse:collapse;border-spacing:0px;float:right">
<tr>
<td align="left" style="padding:0;Margin:0;width:74px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
    <tr>
        <td align="right" class="es-m-p0t es-m-p0b" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
            <p class="p_price" style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">';

    $message2 = $message2 . $review["rate"] * $value->qty . '$</p>';

    $message2 = $message2 . '</td>
    </tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>';

    $message = $message . $message2;
    $message2 = '';
}

$message = $message . '
<tr>
                                        <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
                                                                    <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td style="padding:0;Margin:0;border-bottom:1px solid #333333;background:none;height:1px;width:100%;margin:0px">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="esdev-adapt-off" align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                            <table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="border-collapse:collapse;border-spacing:0px;width:560px">
                                                <tr>
                                                    <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="border-collapse:collapse;border-spacing:0px;float:left">
                                                            <tr>
                                                                <td align="left" style="padding:0;Margin:0;width:466px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="right" style="padding:0;Margin:0">
                                                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">
                                                                                    <b>Total</b></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td style="padding:0;Margin:0;width:20px"></td>
                                                    <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="border-collapse:collapse;border-spacing:0px;float:right">
                                                            <tr>
                                                                <td align="left" style="padding:0;Margin:0;width:74px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="right" style="padding:0;Margin:0">
                                                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">
';

$message = $message . '<strong>' . '$' . $_GET["total"] . '</strong>';

$message = $message . '</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
<table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="left" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:20px">
<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
CUSTOMER INFORMATION</p>
</td>
</tr>
<tr>
<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td style="padding:0;Margin:0;border-bottom:1px solid #a0937d;background:none;height:1px;width:100%;margin:0px">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="left" style="padding:0;Margin:0">
<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">
<span>

';

$message = $message . $guest_firstname . " " . $guest_lastname . '</span><br>' . $guest_mail;

$message = $message . '</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" class="es-content" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
<tr>
<td align="center" style="padding:0;Margin:0">
<table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
<tr>
<td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px">
<table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
    <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
        <tr>
            <td style="padding:0;Margin:0;border-bottom:1px solid #999999;background:none;height:1px;width:100%;margin:0px">
            </td>
        </tr>
    </table>
</td>
</tr>
<tr>
<td align="left" style="padding:0;Margin:0;padding-top:10px">
    <h2 style="Margin:0;line-height:29px;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#333333">
        <b>Any Questions?</b>
    </h2>
</td>
</tr>
<tr>
<td align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px">
    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">
        For everything else you want to know…</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="es-m-p10r es-m-p10l" align="left" style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
<!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:265px" valign="top"><![endif]-->
<table cellpadding="0" cellspacing="0" align="left" class="es-left" style="border-collapse:collapse;border-spacing:0px;float:left">
<tr>
<td align="center" valign="top" style="padding:0;Margin:0;width:265px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
    <span class="es-button-border" style="border-style:solid;border-color:#2CB543;background:#666666;border-width:0px;display:block;border-radius:30px;width:auto;"><a href="https://viewstripo.email" class="es-button" target="_blank" style="text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;color:#FFFFFF;font-size:18px;padding:10px 20px 10px 20px;display:block;background:#666666;border-radius:30px;font-family:arial, helvetica neue, helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center;padding-left:20px;padding-right:20px">FAQ</a></span>
</td>
</tr>
</table>
</td>
</tr>
</table>
<!--[if mso]></td><td style="width:30px"></td><td style="width:265px" valign="top"><![endif]-->
<table cellpadding="0" cellspacing="0" class="es-right" align="right" style="border-collapse:collapse;border-spacing:0px;float:right">
<tr>
<td align="left" style="padding:0;Margin:0;width:265px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
    <span class="es-button-border" style="border-style:solid;border-color:#2CB543;background:#666666;border-width:0px;display:block;border-radius:30px;width:auto;"><a href="https://viewstripo.email" class="es-button" target="_blank" style="text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;color:#FFFFFF;font-size:18px;padding:10px 20px 10px 20px;display:block;background:#666666;border-radius:30px;font-family:arial, helvetica neue, helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center;padding-left:20px;padding-right:20px">Contact
            Us</a></span>
</td>
</tr>
</table>
</td>
</tr>
</table><!--[if mso]></td></tr></table><![endif]-->
</td>
</tr>
</table>
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#E3CDC1;background-repeat:repeat;background-position:center top">
<tr>
<td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#ffffff">
<table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
<tr>
<td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px">
<table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="left" style="padding:0;Margin:0;width:560px">
<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
<tr>
<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0">
    <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" role="presentation" style="border-collapse:collapse;border-spacing:0px">
        <tr>
            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:20px">
                <a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Facebook" src="https://dzuktc.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
            </td>
            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:20px">
                <a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Twitter" src="https://dzuktc.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Tw" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
            </td>
            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:20px">
                <a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Instagram" src="https://dzuktc.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
            </td>
            <td align="center" valign="top" style="padding:0;Margin:0"><a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Youtube" src="https://dzuktc.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png" alt="Yt" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
            </td>
        </tr>
    </table>
</td>
</tr>
<tr>
<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:18px;color:#666666;font-size:12px">
        You are receiving this email because you have
        visited our site or asked us about the
        regular newsletter. Make sure our messages get
        to your Inbox (and not your bulk or
        junk folders).<br><a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-decoration:underline;color:#333333;font-size:12px" href="https://viewstripo.email">Privacy
            policy</a> | <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-decoration:underline;color:#333333;font-size:12px" href="">Unsubscribe</a></p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>

</html>';

$to = $guest_mail;

$subject = 'Horizon Room Reservation';

$headers  = "From: horizon-reservation@gmail.com";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);


header('Location: thanks.php');

?>
