<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj dochód</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="icon" href="img/logo_tylko.png">
</head>
<body>
    <div class="column">
        <section class="goal-form" style="background-color: #c0c0c0; border-radius: 5px; padding: 20px;">
            <h3 style="font-size: 24px; margin-bottom: 10px;">Edytuj dochód</h3>
            <form action="edy_doch.php" method="post">
                <label for="dochod_id">ID dochodu:</label><br>
                <input type="number" id="dochod_id" name="dochod_id" required><br>

                <label for="nowe_zrodlo">Nowe źródło:</label><br>
                <input type="text" id="nowe_zrodlo" name="nowe_zrodlo"><br>

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
