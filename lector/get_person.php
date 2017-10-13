<?php

$servername = "localhost";
$username = "people";
$password = "JLmUs4GW2ewdHJfs";
$database = "lanparty";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");

if (isset($_GET['codi'])) {
    $codi = $_GET['codi'];
    $query = "SELECT inscripcions.* FROM inscripcions INNER JOIN tiquets ON inscripcions.id = tiquets.id WHERE qr_id=$codi";
    $sth = mysqli_query($conn, $query);

    if (!empty($sth)) {
        $rows = array();
        while($r = mysqli_fetch_assoc($sth)) {
            $rows[] = $r;
        }
        $res = json_encode($rows);
        echo $res;
        mysqli_free_result($sth);
    }
}

mysqli_close($conn);

?>