<?php
include "libs/phpqrcode/phpqrcode.php";

function generateQR($nom,$cognoms,$dni,$nick,$naixement) {
    // Es comprova si és major d'edat.
    $major = "No";
    $esdeveniment = "17-11-2017"; //Data de la festa per calcular si és major d'edat.
    $naixement = str_replace('/', '-', $naixement);
    $temps = strtotime($naixement);
    if ($temps < (strtotime($esdeveniment) - (18 * 60 * 60 * 24 * 365.25))) {
        $major = "Sí";
    }
    $informacio = "Nom: $nom $cognoms\n";
    $informacio .= "DNI: $dni\n";
    $informacio .= "Nick: $nick\n";
    $informacio .= "Major: $major\n";
    $clau = "JLmUs4GW2ewdHJfs";
    $ruta = "/var/www/lanpartyQR"; //Ruta per guardar els QRs.
    $encrypted = shell_exec('echo -n "' . $informacio . '" | openssl enc -aes-256-cbc -a -k ' . $clau);
    //echo $encrypted;
    QRcode::png($encrypted, "$ruta/$dni.png", 'L', 10, 2);

}

?>
