<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: logowanie.php");
    exit();
}

$uzytkownik_id = $_SESSION['user_id'];
$cel_do_usuniecia = $_POST['remove_goal'];

$sql = "DELETE FROM Cele WHERE uzytkownik_id = ? AND nazwa = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $uzytkownik_id, $cel_do_usuniecia);

if ($stmt->execute()) {
    header("Location: strona_cele.php");
    exit();
} else {
    echo "Wystąpił błąd podczas usuwania celu.";
}


?>
