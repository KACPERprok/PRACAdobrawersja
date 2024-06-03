<?php
include 'connect.php';

session_start(); 

if (!isset($_SESSION['user_id'])) {
    die("Błąd: Brak zalogowanego użytkownika.");
}


$typ = $_POST['typ'];
$kategoria = $_POST['kategoria'];
$kwota = $_POST['kwota'];
$opis = $_POST['opis'];
$uzytkownik_id = $_SESSION['user_id'];

$sql = "INSERT INTO Budzet (typ, kategoria, kwota, opis, uzytkownik_id) VALUES ('$typ', '$kategoria', '$kwota', '$opis', '$uzytkownik_id')";

if ($conn->query($sql) === TRUE) {
    echo "Budżet dodany pomyślnie";
} else {
    echo "Błąd podczas dodawania budżetu: " . $conn->error;
}


?>
