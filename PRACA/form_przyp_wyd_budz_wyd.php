<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przypisywanie Wydatków do Budżetu</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="icon" href="img/logo_tylko.png">
    <style>
        .assignment-form {
            background-color: #c0c0c0;
            border-radius: 5px;
            padding: 20px;
        }

        .assignment-form h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .assignment-form label,
        .assignment-form input,
        .assignment-form button {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="column">
    <section class="assignment-form">
        <h3>Przypisz Wydatek do Budżetu</h3>
        <form action="connect_przyp_wyd.php" method="POST">
            <label for="id_wyd">ID Wydatku:</label><br>
            <input type="number" id="id_wyd" name="id_wyd" required><br>

            <label for="id_budzet">ID Budżetu:</label><br>
            <input type="number" id="id_budzet" name="id_budzet" required><br>

            <button type="submit">Przypisz Wydatek</button>
        </form>
    </section>
</div>
</body>
</html>
