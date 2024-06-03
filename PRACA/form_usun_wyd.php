<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń wydatek</title>
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
        .expense-form button {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="column">
        <section class="expense-form">
            <h3>Usuń wydatek</h3>
            <form action="connect_usun_wyd.php" method="post">
                <label for="wydatek_id">ID wydatku:</label><br>
                <input type="number" id="wydatek_id" name="wydatek_id" required><br>
                <button type="submit" name="usun">Usuń</button>
            </form>
        </section>
    </div>
</body>
</html>
