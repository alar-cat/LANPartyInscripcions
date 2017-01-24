<?php

// Agafo el token
$token = $_GET['q'];

if( strlen($token)<32 )
{
    die("Token incorrecte!");
}

// Fitxer a baixar
$secretfile = "/var/www/lanpartyQR";

$valid = False;

// Fitxer que conté els tokens.
$fitxer = "/var/www/lanpartyQR/tokens.txt";

// Llegeixo els tokens
$lines = file($fitxer);

// Obro el fitxer
if( !($fd = fopen($fitxer,"r")) )
    die("No s'ha pogut obrir $fitxer!");


foreach ($lines as $line) {
    $codis = explode(":", $line);
    $codi = $codis[0];
    $dni = rtrim($codis[1]);
    if (rtrim($codi) == $token) {
        $valid = True;
        $secretfile = "$secretfile/$dni.png";
        break;
    }
}

if( !(fclose($fd)) )
    die("No s'ha pogut tancar $fitxer!");

if($valid) {
   $data = readfile($secretfile);
    header('Content-Type: image/png');
    echo $secretfile;
}
else {
    print "Enllaç incorrecte!";
}

?>

