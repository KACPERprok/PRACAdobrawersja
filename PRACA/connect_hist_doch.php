<?php
include 'connect.php';

$query = "SELECT id, zrodlo, kwota, data, opis FROM Dochody";
$result = $conn->query($query);

$dochody = array();
if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dochody[] = $row;
        }
    }
}


?>
