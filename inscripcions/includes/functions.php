<?php

function getData() {
  $dies = range(1,31);
  $mesos = range(1,12);
  $anys = range(2017,1900);

  $dataconfig = '<select name="dianaixement" required>
  <option selected="selected">---</option>';

  foreach ($dies as $dia) {

    $dataconfig .= '<option value="'. $dia .' ">' . $dia . '</option>';
  }

  $dataconfig .= '</select>
  <select name="mesnaixement" required>
  <option selected="selected">---</option>';
  foreach ($mesos as $mes) {
    $dataconfig .= '<option value="'. $mes .' ">' . $mes . '</option>';
  }

  $dataconfig .= '</select>
  <select name="anynaixement" required>
  <option selected="selected">---</option>';
  foreach ($anys as $any) {
    $dataconfig .= '<option value="'. $any .' ">' . $any . '</option>';
  }

  $dataconfig .= '</select>';

  return $dataconfig;


}

function getInscrits($conn) {
  $rowSQL = mysqli_query($conn, "SELECT MAX(id) AS max FROM inscripcions");
  $resultat = mysqli_fetch_array($rowSQL);
  $inscrits = $resultat['max'];

  return $inscrits;
}

function getMajor($naixement) {
    // Es comprova si és major d'edat.
    $major = "No";
    $esdeveniment = "20-04-2018"; //Data de la festa per calcular si és major d'edat.
    $naixement = str_replace('/', '-', $naixement);
    $temps = strtotime($naixement);

    if ($temps < (strtotime($esdeveniment) - (18 * 60 * 60 * 24 * 365.25))) {
        $major = "Sí";
    }

    return $major;
}

?>