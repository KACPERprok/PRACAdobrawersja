<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_wyd = $_POST['id_wyd'];
    $id_budzet = $_POST['id_budzet'];

    $query = "SELECT kwota FROM Wydatki WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_wyd);
    $stmt->execute();
    $result = $stmt->get_result();
    $wydatek = $result->fetch_assoc();
    $kwota_wydatku = $wydatek['kwota'];
    $stmt->close();

    if ($kwota_wydatku === null) {
        echo "Nie znaleziono wydatku o podanym ID.";
        $conn->close();
        exit();
    }

    $query = "UPDATE Wydatki SET budzet_id = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $id_budzet, $id_wyd);

    if ($stmt->execute()) {
        echo "Wydatek został przypisany do budżetu.<br>";
    } else {
        echo "Wystąpił błąd podczas przypisywania wydatku do budżetu: " . $conn->error . "<br>";
    }
    $stmt->close();

    $query2 = "UPDATE Budzet SET kwota = kwota - ? WHERE id = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('di', $kwota_wydatku, $id_budzet);

    if ($stmt2->execute()) {
        echo "Kwota budżetu została zaktualizowana.<br>";
    } else {
        echo "Wystąpił błąd podczas aktualizacji kwoty budżetu: " . $conn->error . "<br>";
    }
    $stmt2->close();
    $conn->close();
}
?>
