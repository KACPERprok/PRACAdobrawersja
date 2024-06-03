<?php
include 'connect.php';

$query = "SELECT id, typ, kategoria, kwota, opis, id_wydatki, id_dochody FROM Budzet";

$result = $conn->query($query);

$historia_budzetu = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $historia_budzetu[] = $row;
    }
}
$conn->close();
?>
