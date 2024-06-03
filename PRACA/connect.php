<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firma";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Połączenie nie udało się: " . $conn->connect_error);
}
?>