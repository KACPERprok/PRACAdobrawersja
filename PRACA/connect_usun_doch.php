<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dochod_id = $_POST["dochod_id"];

    $sql = "DELETE FROM Dochody WHERE id=$dochod_id";

    if ($conn->query($sql) === TRUE) {
        echo "Dochód został pomyślnie usunięty";
    } else {
        echo "Błąd usuwania dochodu: " . $conn->error;
    }
}

$conn->close();
?>
