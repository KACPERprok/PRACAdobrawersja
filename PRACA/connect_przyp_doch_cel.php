<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: logowanie.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$dochod_id = isset($_POST['id_doch']) ? $_POST['id_doch'] : null;
$nazwa_celu = isset($_POST['nazwa_celu']) ? $_POST['nazwa_celu'] : null;

if (empty($dochod_id) || empty($nazwa_celu)) {
    echo "Wszystkie pola są wymagane.";
    die();
}

$stmt_check_dochod = $conn->prepare("SELECT * FROM Dochody WHERE id = ? AND uzytkownik_id = ?");
$stmt_check_dochod->bind_param("ii", $dochod_id, $user_id);
$stmt_check_dochod->execute();
$result_check_dochod = $stmt_check_dochod->get_result();

if ($result_check_dochod->num_rows == 0) {
    echo "Dochód o podanym ID nie istnieje lub nie należy do Ciebie.";
    die();
}

$dochod = $result_check_dochod->fetch_assoc();
$dochod_kwota = $dochod['kwota'];

$stmt_check_cel = $conn->prepare("SELECT * FROM Cele WHERE nazwa = ? AND uzytkownik_id = ?");
$stmt_check_cel->bind_param("si", $nazwa_celu, $user_id);
$stmt_check_cel->execute();
$result_check_cel = $stmt_check_cel->get_result();

if ($result_check_cel->num_rows == 0) {
    echo "Celu oszczędnościowego o podanej nazwie nie istnieje.";
    die();
}

$cel = $result_check_cel->fetch_assoc();
$cel_id = $cel['id'];

// Zaktualizuj kolumnę cel_id w tabeli Dochody
$stmt_update_dochod = $conn->prepare("UPDATE Dochody SET cel_id = ? WHERE id = ?");
$stmt_update_dochod->bind_param("ii", $cel_id, $dochod_id);

if ($stmt_update_dochod->execute()) {
    // Zaktualizuj obecna_kwota w tabeli Cele
    $stmt_update_cele = $conn->prepare("UPDATE Cele SET obecna_kwota = obecna_kwota + ? WHERE id = ?");
    $stmt_update_cele->bind_param("di", $dochod_kwota, $cel_id);

    if ($stmt_update_cele->execute()) {
        echo "Dochód został przypisany do celu oszczędnościowego.";
    } else {
        echo "Wystąpił błąd podczas aktualizacji wartości celu: " . $stmt_update_cele->error;
    }

    $stmt_update_cele->close();
} else {
    echo "Wystąpił błąd podczas przypisywania dochodu do celu: " . $stmt_update_dochod->error;
}

$stmt_update_dochod->close();
$stmt_check_dochod->close();
$stmt_check_cel->close();

$conn->close();
?>
