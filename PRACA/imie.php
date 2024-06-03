<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT imie FROM Uzytkownik WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $imie = $row['imie'];
    } else {
        $imie = "Użytkownik";
    }
} else {
    $imie = "Użytkownik";
}
?>
