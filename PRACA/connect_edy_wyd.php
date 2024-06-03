<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['wydatek_id']) && isset($_POST['nowa_kategoria']) && isset($_POST['nowa_kwota']) && isset($_POST['nowa_data'])) {
        $wydatek_id = $_POST['wydatek_id'];
        $nowa_kategoria = $_POST['nowa_kategoria'];
        $nowa_kwota = $_POST['nowa_kwota'];
        $nowa_data = $_POST['nowa_data'];
        $nowy_opis = isset($_POST['nowy_opis']) ? $_POST['nowy_opis'] : '';

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
            $update_wyd_sql = "UPDATE Wydatki SET kategoria = ?, kwota = ?, data = ?, opis = ? WHERE id = ?";
            $update_wyd_stmt = $conn->prepare($update_wyd_sql);
            $update_wyd_stmt->bind_param("sdsdi", $nowa_kategoria, $nowa_kwota, $nowa_data, $nowy_opis, $wydatek_id);
            
            if ($update_wyd_stmt->execute()) {
                echo "Wydatek zaktualizowany pomyślnie.";
            } else {
                echo "Błąd podczas aktualizowania wydatku: " . $conn->error;
            }
        } else {
            echo "Nieprawidłowy wydatek lub brak dostępu.";
        }
    } else {
        echo "Nieprawidłowe dane formularza.";
    }
} else {
    echo "Metoda żądania nieprawidłowa.";
}
?>