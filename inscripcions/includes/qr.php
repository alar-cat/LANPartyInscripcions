<?php
include "libs/phpqrcode/phpqrcode.php";

function generateQR($nom,$cognoms,$dni,$nick,$naixement) {
  // Es comprova si és major d'edat.
  $major = "No";
  $esdeveniment = "05-11-2017"; //Data de la festa per calcular si és major d'edat.
  $naixement = str_replace('/', '-', $naixement);
  $temps = strtotime($naixement);
  if ($temps < (strtotime($esdeveniment) - (18 * 60 * 60 * 24 * 365.25))) {
    $major = "Sí";
  }
  $informacio = "Nom: $nom $cognoms\n";
  $informacio .= "DNI: $dni\n";
  $informacio .= "Nick: $nick\n";
  $informacio .= "Major: $major\n";
  $clau = "password";
  $ruta = "/var/www/lanpartyQR"; //Ruta per guardar els QRs.

  $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM);
  $encrypted = base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_128,hash('sha256', $clau, true),$informacio,MCRYPT_MODE_CBC,$iv));

  QRcode::png($encrypted, "$ruta/$dni.png", 'L', 10, 2); // creates file

}

?>
