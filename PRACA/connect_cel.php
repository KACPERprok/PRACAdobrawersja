<?php
include 'connect.php';

$nazwa = isset($_POST['nazwa']) ? $_POST['nazwa'] : null;

if ($nazwa === null || $nazwa === '') {
    die("Błąd: wartość 'nazwa' nie może być pusta.");
}


$kwota_celu = $_POST['kwota_celu'];
$data_rozpoczecia = $_POST['data_rozpoczecia'];
$data_zakonczenia = $_POST['data_zakonczenia'];

$sql = "INSERT INTO cele (nazwa, kwota_celu, data_rozpoczecia, data_zakonczenia) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo '<div style="background-color: #f2dede; color: #a94442; padding: 10px; margin-bottom: 10px;">Wystąpił błąd podczas dodawania celu. Spróbuj ponownie.</div>';
    die();
}

$stmt->bind_param("sdss", $nazwa, $kwota_celu, $data_rozpoczecia, $data_zakonczenia);

if ($stmt->execute()) {
    header("Location: strona_cele.php");
    exit();
} else {
    echo '<div style="background-color: #f2dede; color: #a94442; padding: 10px; margin-bottom: 10px;">Wystąpił błąd podczas dodawania celu. Spróbuj ponownie.</div>';
    die();
}
?>