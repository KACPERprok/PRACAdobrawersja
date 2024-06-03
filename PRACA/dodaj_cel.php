<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: logowanie.php");
    exit();
}

$uzytkownik_id = $_SESSION['user_id'];
$nazwa = isset($_POST['nazwa']) ? trim($_POST['nazwa']) : null;
$kwota_celu = isset($_POST['kwota_celu']) ? trim($_POST['kwota_celu']) : null;
$data_rozpoczecia = isset($_POST['data_rozpoczecia']) ? trim($_POST['data_rozpoczecia']) : null;
$data_zakonczenia = isset($_POST['data_zakonczenia']) ? trim($_POST['data_zakonczenia']) : null;

if (empty($nazwa) || empty($kwota_celu) || empty($data_rozpoczecia) || empty($data_zakonczenia)) {
    echo "Wszystkie pola są wymagane.";
    die();
}

$sql_check = "SELECT id FROM Cele WHERE uzytkownik_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("i", $uzytkownik_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows >= 2) {
    header("Location: strona_cele.php?error=already_exists");
    exit();
}
echo "User ID: $uzytkownik_id<br>"; 

$sql_columns = "SHOW COLUMNS FROM Cele LIKE 'obecna_kwota'";
$result_columns = $conn->query($sql_columns);

if ($result_columns->num_rows == 0) {
    echo "Kolumna 'obecna_kwota' nie istnieje w tabeli 'Cele'.";
    die();
}

$sql = "INSERT INTO Cele (kwota_celu, obecna_kwota, nazwa, data_rozpoczecia, data_zakonczenia, uzytkownik_id) 
        VALUES (?, 0.00, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dsssi", $kwota_celu, $nazwa, $data_rozpoczecia, $data_zakonczenia, $uzytkownik_id);

if ($stmt->execute()) {
    header("Location: strona_cele.php");
    exit();
} else {
    echo "Wystąpił błąd podczas dodawania celu.";
}

$stmt->close();
$conn->close();
?>
