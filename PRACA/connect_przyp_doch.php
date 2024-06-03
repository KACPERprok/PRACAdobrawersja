<?php
include 'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_doch = $_POST['id_doch'];
    $id_budzet = $_POST['id_budzet'];

    $query = "SELECT kwota FROM Dochody WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_doch);
    $stmt->execute();
    $result = $stmt->get_result();
    $dochod = $result->fetch_assoc();
    $kwota_dochodu = $dochod['kwota'];
    $stmt->close();

    if ($kwota_dochodu === null) {
        echo "Nie znaleziono dochodu o podanym ID.";
        $conn->close();
        exit();
    }

    $query = "UPDATE Dochody SET budzet_id = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $id_budzet, $id_doch);

    if ($stmt->execute()) {
        echo "Dochód został przypisany do budżetu.<br>";
    } else {
        echo "Wystąpił błąd podczas przypisywania dochodu do budżetu: " . $conn->error . "<br>";
    }
    $stmt->close();

    $query2 = "UPDATE Budzet SET kwota = kwota + ? WHERE id = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('di', $kwota_dochodu, $id_budzet);

    if ($stmt2->execute()) {
        echo "Kwota budżetu została zaktualizowana.<br>";
    } else {
        echo "Wystąpił błąd podczas aktualizacji kwoty budżetu: " . $conn->error . "<br>";
    }
    $stmt2->close();
    $conn->close();
}
?>
