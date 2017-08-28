<?php
include "libs/phpqrcode/phpqrcode.php";

function generateQR($dni,$conn) {
    // Generate random uid
    $qr_id = uniqid(rand(), 1);

    // Other variables
    $scanned = false;
    $order = "INSERT INTO tiquets (qr_id,scanned) VALUES ('$qr_id','$scanned')";
    $ruta = "/var/www/lanpartyQR"; //Ruta per guardar els QRs.

    if (mysqli_query($conn, $order)) {
        QRcode::png($qr_id, "$ruta/$dni.png", 'Q', 10, 2);
    }

}

?>