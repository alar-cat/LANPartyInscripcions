<?php
function envia($email) {
  $assumpteInscrit = 'Inscripció LAN Party Ripoll';
  $assumpteAdmin = 'Nova inscripció a la LAN Party';
  $from = 'lanparty@ltec.cat';
  $headers = "From: " . strip_tags('lanparty@ltec.cat') . "\r\n";
  $headers .= "Reply-To: ". strip_tags('amarti@ltec.cat') . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  $message = '<html><body>';
  $message .= '<p>Gràcies per inscriure\'t a la LAN Party Ripoll!</p>';
  $message .= '<p>Recorda que has de portar el teu ordinador amb els perifèrics corresponents, el DNI i l\'autorització si ets menor d\'edat.</p>';
  $message .= '<br>';
  $message .= '<p>Ens veiem el dia 5,</p>';
  $message .= '<p>L\'organització de la LAN Party</p>';
  $message .= '</body></html>';

  $messageAdmin = '<html><body>';
  $messageAdmin .= '<p>Nova inscripció a la LAN Party!</p>';
  mail($email, $assumpteInscrit, $message, $headers);
  mail('amarti@ltec.cat', $assumpteAdmin, $messageAdmin, $headers);
}
?>
