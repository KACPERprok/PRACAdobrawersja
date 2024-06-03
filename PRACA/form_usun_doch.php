<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń dochód</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="icon" href="img/logo_tylko.png">
</head>
<body>
    <div class="column">
        <section class="goal-form" style="background-color: #c0c0c0; border-radius: 5px; padding: 20px;">
            <h3 style="font-size: 24px; margin-bottom: 10px;">Usuń dochód</h3>
            <form action="connect_usun_doch.php" method="post">
                <label for="dochod_id">ID dochodu:</label><br>
                <input type="number" id="dochod_id" name="dochod_id" required><br>
                <button type="submit" name="usun">Usuń</button>
            </form>
        </section>
    </div>
</body>
</html>
