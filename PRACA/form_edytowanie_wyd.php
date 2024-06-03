<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj wydatek</title>
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
            <h3>Edytuj wydatek</h3>
            <form action="connect_edy_wyd.php" method="post">
                <label for="wydatek_id">ID wydatku:</label><br>
                <input type="number" id="wydatek_id" name="wydatek_id" required><br>

                <label for="nowa_kategoria">Nowa kategoria:</label><br>
                <input type="text" id="nowa_kategoria" name="nowa_kategoria"><br>

                <label for="nowa_kwota">Nowa kwota:</label><br>
                <input type="number" id="nowa_kwota" name="nowa_kwota" step="0.01"><br>

                <label for="nowa_data">Nowa data:</label><br>
                <input type="date" id="nowa_data" name="nowa_data"><br>

                <label for="nowy_opis">Nowy opis:</label><br>
                <textarea id="nowy_opis" name="nowy_opis"></textarea><br>

                <button type="submit" name="edytuj">Edytuj</button>
            </form>
        </section>
    </div>
</body>
</html>
