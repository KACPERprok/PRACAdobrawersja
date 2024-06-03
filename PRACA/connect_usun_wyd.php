<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wydatek_id = $_POST["wydatek_id"];

    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo "Nie jesteś zalogowany.";
        exit();
    }
    $user_id = $_SESSION['user_id'];
    $check_wyd_sql = "SELECT id FROM Wydatki WHERE id = ? AND uzytkownik_id = ?";
    $check_wyd_stmt = $conn->prepare($check_wyd_sql);
    $check_wyd_stmt->bind_param("ii", $wydatek_id, $user_id);
    $check_wyd_stmt->execute();
    $check_wyd_result = $check_wyd_stmt->get_result();

    if ($check_wyd_result->num_rows == 1) {
        $delete_sql = "DELETE FROM Wydatki WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $wydatek_id);

        if ($delete_stmt->execute()) {
            echo "Wydatek został pomyślnie usunięty";
        } else {
            echo "Błąd usuwania wydatku: " . $conn->error;
        }
    } else {
        echo "Nieprawidłowy wydatek lub brak dostępu.";
    }
}

$conn->close();
?>
