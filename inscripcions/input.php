<html>
  <head>
    <meta charset="UTF-8">
    <title>Inscripció LAN Party Ripoll</title>
    <h1>Inscripció LAN Party Ripoll</h1>
    <!--<meta http-equiv="refresh" content="10; url=https://www.lanpartyripoll.cat" />-->
  </head>

<?php
include "includes/conn.php";
include "includes/send.php";
include "includes/qr.php";
include "includes/token.php";
include "includes/functions.php";

// Agafo les dades del formulari.
$nom = htmlspecialchars($_POST["nom"]);
$cognoms = htmlspecialchars($_POST["cognoms"]);
$email = htmlspecialchars($_POST["email"]);
$telefon = htmlspecialchars($_POST["telefon"]);
$categories = $_POST["categoria"];

$categoria = htmlspecialchars(implode("-", $categories));

$equip = htmlspecialchars($_POST['equipC']);
if ($equip == "") {
    $equip = htmlspecialchars($_POST['equipMulti']);
}

$nick = htmlspecialchars($_POST["nick"]);
$dni = htmlspecialchars($_POST["dni"]);
$naixement = htmlspecialchars($_POST["dianaixement"]) . "/" . htmlspecialchars($_POST["mesnaixement"]) . "/" . htmlspecialchars($_POST["anynaixement"]);
$naixement = str_replace(' ', '', $naixement);
$poblacio = htmlspecialchars($_POST["poblacio"]);

// Search DB
$busca = mysqli_query($conn, "SELECT id FROM inscripcions WHERE dni = '$dni'");

if($busca->num_rows == 0) {
    $major = getMajor($naixement);
    $pagat = "No";
    $order = "INSERT INTO inscripcions (nom,cognom,email,telefon,categoria,equip,nick,dni,poblacio,naixement,major,pagat) VALUES ('$nom','$cognoms','$email','$telefon','$categoria','$equip','$nick','$dni','$poblacio','$naixement','$major','$pagat')";
    // Si es poden insertar les dades a la base de dades s'envia un correu de confirmació a l'administrador i a l'inscrit.
    if ($dni != "") {
      if (mysqli_query($conn, $order)) {
        generateQR($dni,$conn);
        echo "<p>T'has inscrit correctament, gràcies!<p>";
        echo "<p>Pots baixar el codi d'accés des d'aquest enllaç (també t'hem enviat una còpia per correu-e):</p>";
        $qr = genToken($dni);
        echo $qr;
        enviasmtp($email,$qr);
      }

      else {
        echo "Error: " . $order . "<br>" . mysqli_error($conn);
      }
    }
    else {
      echo "<p>Entrada buida. No s'inserta res a la base de dades.</p>";
    }


}

else {
    echo "<p>Aquesta persona ja està inscrita. Tornant al formulari...</p>";
    header("Refresh:5; url=index.php");
}

mysqli_close($conn);

?>

</html>
