<?php

function genToken($dni) {

    // Genero el token
    $token = md5(uniqid(rand(), 1));

    // Fitxer on es guarden els tokens
    $fitxer = "/var/www/lanpartyQR/tokens.txt";

    if( !($fd = fopen($fitxer,"a")) )
        die("No s'ha pogut obrir $fitxer!");

    if( !(flock($fd,LOCK_EX)) )
        die("No s'ha pogut bloquejar $fitxer!");

    if( !(fwrite($fd,$token.":$dni\n")) )
        die("No s'ha pogut escriure $fitxer!");

    if( !(flock($fd,LOCK_UN)) )
        die("No s'ha pogut desbloquejar $fitxer!");

    if( !(fclose($fd)) )
        die("No s'ha pogut tancar $fitxer!");

    $sortida = "<a href=\"https://".$_SERVER['HTTP_HOST']."/inscripcions/get_file.php?q=$token\">https://".$_SERVER['HTTP_HOST']."/inscripcions/get_file.php?q=$token</a>\n";

    return $sortida;


}
