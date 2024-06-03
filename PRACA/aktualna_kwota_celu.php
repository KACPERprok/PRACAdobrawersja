<?php
include 'connect.php';

$sql = "SELECT * FROM Cele";
$stmt = $conn->prepare($sql);

$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $aktualna_kwota = $row['obecna_kwota'];
        echo  $aktualna_kwota;
    }
} else {
    echo "Brak wyników";
}


?>
