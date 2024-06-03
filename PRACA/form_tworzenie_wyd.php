<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tworzenie Wydatku</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="icon" href="img/logo_tylko.png">
    <style>
        .expense-form {
            background-color: #c0c0c0;
            border-radius: 5px;
            padding: 20px;
        }

        .expense-form h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .expense-form label,
        .expense-form input,
        .expense-form textarea,
        .expense-form button {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="column">
        <section class="expense-form">
            <h3>Dodaj Nowy Wydatek</h3>
            <form action="connect_dodaj_wyd.php" method="POST">
                <label for="kategoria">Kategoria:</label><br>
                <input type="text" id="kategoria" name="kategoria" required><br>

                <label for="kwota">Kwota:</label><br>
                <input type="number" step="0.01" id="kwota" name="kwota" required><br>

                <label for="data">Data:</label><br>
                <input type="date" id="data" name="data" required><br>

                <label for="opis">Opis:</label><br>
                <textarea id="opis" name="opis"></textarea><br>

                <button type="submit">Dodaj Wydatek</button>
            </form>
        </section>
    </div>
</body>
</html>
