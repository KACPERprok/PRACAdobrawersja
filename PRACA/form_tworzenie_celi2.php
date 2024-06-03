<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: logowanie.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa = $_POST['nazwa'] ?? '';
    $kwota_celu = $_POST['kwota_celu'] ?? '';
    $data_rozpoczecia = $_POST['data_rozpoczecia'] ?? '';
    $data_zakonczenia = $_POST['data_zakonczenia'] ?? '';

    if (empty($nazwa) || empty($kwota_celu) || empty($data_rozpoczecia) || empty($data_zakonczenia)) {
        echo "Wszystkie pola muszą być wypełnione.";
    } else {
        $uzytkownik_id = $_SESSION['user_id'];

        $sql = "INSERT INTO Cele (nazwa, kwota_celu, data_rozpoczecia, data_zakonczenia, uzytkownik_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdssi", $nazwa, $kwota_celu, $data_rozpoczecia, $data_zakonczenia, $uzytkownik_id);

        if ($stmt->execute()) {
            header("Location: strona_cele.php");
        } else {
            echo "Błąd podczas dodawania celu: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj cel nr. 2</title>
    <link rel="stylesheet" href="style7.css">
    <link rel="icon" href="img/logo_tylko.png">
</head>
<body>
    <section id="baner">
        <h1>Dodaj drugi cel oszczędnościowy</h1>
    </section>

    <section id="form-section">
        <form class="goal-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nazwa">Nazwa celu:</label>
            <input type="text" id="nazwa" name="nazwa" required>

            <label for="kwota_celu">Kwota celu:</label>
            <input type="number" step="0.01" id="kwota_celu" name="kwota_celu" required>

            <label for="data_rozpoczecia">Data rozpoczęcia:</label>
            <input type="date" id="data_rozpoczecia" name="data_rozpoczecia" required>

            <label for="data_zakonczenia">Data zakończenia:</label>
            <input type="date" id="data_zakonczenia" name="data_zakonczenia" required>

            <button type="submit">Dodaj Cel</button>
            <a href="strona_cele.php" class="cancel-button">Anuluj</a>
        </form>
    </section>
</body>
</html>
