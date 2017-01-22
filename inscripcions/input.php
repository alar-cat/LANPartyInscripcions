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

// Agafo les dades del formulari.
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

$nick = htmlspecialchars($_POST["nick"]);
$dni = htmlspecialchars($_POST["dni"]);
$naixement = htmlspecialchars($_POST["dianaixement"]) . "/" . htmlspecialchars($_POST["mesnaixement"]) . "/" . htmlspecialchars($_POST["anynaixement"]);
$naixement = str_replace(' ', '', $naixement);
$poblacio = htmlspecialchars($_POST["poblacio"]);

// Search DB
$busca = mysqli_query($conn, "SELECT id FROM inscripcions WHERE dni = '$dni'");
if($busca->num_rows == 0) {
     $order = "INSERT INTO inscripcions (nom,cognom,email,telefon,categoria,equip,nick,dni,poblacio,naixement) VALUES ('$nom','$cognoms','$email','$telefon','$categoria','$equip','$nick','$dni','$poblacio','$naixement')";
     generateQR($nom,$cognoms,$dni,$nick,$naixement);
}
else {
    $resultat = mysqli_query($conn, "SELECT equip FROM inscripcions WHERE dni = '$dni'");
    $fila = $resultat->fetch_array(MYSQL_BOTH);
    $inscrit = $fila[0];

    if ($inscrit == "---") {
      $order = "UPDATE inscripcions SET categoria = CONCAT(categoria,'-$categoria'), equip = '$equip' WHERE dni = '$dni'";
    }
    elseif ($equip == "---") {
      $order = "UPDATE inscripcions SET categoria = CONCAT(categoria,'-$categoria')";
    }
    else {
      $order = "UPDATE inscripcions SET categoria = CONCAT(categoria,'-$categoria'), equip = CONCAT(equip,'-$equip') WHERE dni = '$dni'";
    }
}

// Si es poden insertar les dades a la base de dades s'envia un correu de confirmació a l'administrador i a l'inscrit.
if (mysqli_query($conn, $order)) {
  envia($email);
	echo "<p>T'has inscrit correctament, gràcies!<p>";
}

else {
    echo "Error: " . $order . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

</html>
