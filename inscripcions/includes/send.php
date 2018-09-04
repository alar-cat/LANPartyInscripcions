<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "libs/phpmailer/PHPMailer/src/Exception.php";
require "libs/phpmailer/PHPMailer/src/PHPMailer.php";
require "libs/phpmailer/PHPMailer/src/SMTP.php";

// Afegeixo una funció que els envia per SMTP. El correu-e per l'organització, com que el més lògic és que sigui del propi domini i/o servidor el deixo amb la funció mail().
function enviasmtp($email,$qr) {
    $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.gandi.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noreply@alar.cat';                 // SMTP username
    $mail->Password = 'password';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('noreply@alar.cat', 'LAN Party Ripoll');
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('info@alar.cat', 'ALAR');
    $mail->addBCC('secretaria@alar.cat', 'Secretaria ALAR');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Inscripció LAN Party Ripoll';
    $mail->Body    = "<p>Gràcies per inscriure't a la LAN Party Ripoll!</p>
                      <p>Recorda que has de portar el teu ordinador amb els perifèrics corresponents, el DNI, el codi QR i l'autorització si ets menor d'edat.</p>
                      <p>Enllaç per baixar el codi d'accés:</p>
                      {$qr}
                      <br><br>
                      <p>Ens veiem el dia 20,</p>
                      <p>L'organització de la LAN Party</p>";

    $mail->AltBody = "Gràcies per inscriure't a la LAN Party Ripoll!
                      Recorda que has de portar el teu ordinador amb els perifèrics corresponents, el DNI, el codi QR i l'autorització si ets menor d'edat.
                      Enllaç per baixar el codi d'accés:
                      {$qr}

                      Ens veiem el dia 20,
                      L'organització de la LAN Party";

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>
