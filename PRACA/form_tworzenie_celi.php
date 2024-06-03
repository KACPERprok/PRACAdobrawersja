<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tworzenie Nowego Celu</title>
    <link rel="stylesheet" href="style7.css">
    <link rel="icon" href="img/logo_tylko.png">
</head>
<body>
    <section id="baner">
        <h1>Dodaj pierwszy cel osczędnościowy</h1>
    </section>

    <section id="form-section">
        <form class="goal-form" action="dodaj_cel.php" method="post">
            <label for="nazwa">Nazwa Celu:</label>
            <input type="text" id="nazwa" name="nazwa" required>

            <label for="kwota_celu">Kwota Celu:</label>
            <input type="number" step="0.01" id="kwota_celu" name="kwota_celu" required>

            <label for="data_rozpoczecia">Data Rozpoczęcia:</label>
            <input type="date" id="data_rozpoczecia" name="data_rozpoczecia" required>

            <label for="data_zakonczenia">Data Zakończenia:</label>
            <input type="date" id="data_zakonczenia" name="data_zakonczenia" required>

            <button type="submit">Dodaj Cel</button>
            <a href="strona_cele.php" class="cancel-button">Anuluj</a>
        </form>
    </section>

    

</body>
</html>
