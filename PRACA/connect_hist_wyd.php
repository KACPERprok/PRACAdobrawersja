<?php
include 'connect.php';

$query = "SELECT id, kwota, data, opis, kategoria FROM Wydatki";
$result = $conn->query($query);

$wydatki = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $wydatki[] = $row;
    }
}
$conn->close();
?>
