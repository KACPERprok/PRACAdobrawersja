<?php
include 'connect.php'; 

$id_budzet = $_POST['id_budzet'];

$sql = "DELETE FROM Budzet WHERE id='$id_budzet'";

if ($conn->query($sql) === TRUE) {
    echo "Budżet usunięty pomyślnie";
} else {
    echo "Błąd podczas usuwania budżetu: " . $conn->error;
}

$conn->close();
?>
