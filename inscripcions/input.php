<html>
  <head>
    <meta charset="UTF-8">
    <title>Inscripció LAN Party Ripoll</title>
    <h1>Inscripció LAN Party Ripoll</h1>
    <meta http-equiv="refresh" content="10; url=http://www.lanpartyripoll.cat" />
  </head>

<?php
include 'conn.php';

$nom = htmlspecialchars($_POST["nom"]);
$cognoms = htmlspecialchars($_POST["cognoms"]);
$email = htmlspecialchars($_POST["email"]);
$telefon = htmlspecialchars($_POST["telefon"]);
$categoria = htmlspecialchars($_POST["categoria"]);
if ($categoria == "CSGO") {
  $equip = htmlspecialchars($_POST['equipCSGO']);
  if ($equip == "") {
    $equip = htmlspecialchars($_POST['equipCSGOmulti']);
  }
}
elseif ($categoria == "LoL") {
  $equip = htmlspecialchars($_POST['equipLoL']);
  if ($equip == "") {
    $equip = htmlspecialchars($_POST['equipLoLmulti']);
  }
}
elseif ($categoria == "FIFA16") {
  $equip = "---";
}
//echo $equip;

$nick = htmlspecialchars($_POST["nick"]);
$dni = htmlspecialchars($_POST["dni"]);
$naixement = htmlspecialchars($_POST["dianaixement"]) . "/" . htmlspecialchars($_POST["mesnaixement"]) . "/" . htmlspecialchars($_POST["anynaixement"]);
//echo $naixement;
$poblacio = htmlspecialchars($_POST["poblacio"]);

$order = "INSERT INTO inscripcions (nom,cognom,email,telefon,categoria,equip,nick,dni,poblacio,naixement) VALUES ('$nom','$cognoms','$email','$telefon','$categoria','$equip','$nick','$dni','$poblacio','$naixement')";


if (mysqli_query($conn, $order)) {

	//Codi enviar email
	$assumpteInscrit = 'Inscripció a LAN Party';
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

	echo "<p>T'has inscrit correctament, gràcies!<p>";

}
else {
    echo "Error: " . $order . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

</html>

