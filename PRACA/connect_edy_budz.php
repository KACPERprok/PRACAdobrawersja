<?php
include 'connect.php'; 

$id_budzet = $_POST['id_budzet'];
$typ = $_POST['typ'];
$kategoria = $_POST['kategoria'];

$sql = "UPDATE Budzet SET typ='$typ', kategoria='$kategoria' WHERE id='$id_budzet'";

if ($conn->query($sql) === TRUE) {
    echo "Budżet zaktualizowany pomyślnie";
} else {
    echo "Błąd podczas aktualizacji budżetu: " . $conn->error;
}

$conn->close();
?>
