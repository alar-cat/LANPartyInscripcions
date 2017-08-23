<?php
$servername = "localhost";
$username = "lanpartyripoll";
$password = "JLmUs4GW2ewdHJfs";
$database = "lanparty";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");
?>
