<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT nazwa FROM Cele WHERE uzytkownik_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $cele = [];

    while ($row = $result->fetch_assoc()) {
        $cele[] = $row['nazwa']; 
    }

    $_SESSION['cele'] = $cele;
} else {
    $_SESSION['cele'] = [];
}
?>