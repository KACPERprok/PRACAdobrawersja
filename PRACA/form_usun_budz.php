<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń budżet</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="icon" href="img/logo_tylko.png">
    <style>
        .budget-form {
            background-color: #c0c0c0;
            border-radius: 5px;
            padding: 20px;
        }

        .budget-form h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .budget-form label,
        .budget-form input,
        .budget-form button {
            margin: 5px 0;
        }

        .budget-form button {
            background-color: #c00000;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .budget-form button:hover {
            background-color: #a00000;
        }
    </style>
</head>
<body>
    <div class="column">
        <section class="budget-form">
            <h3>Usuń budżet</h3>
            <form action="connect_usun_budz.php" method="post">
                <label for="id_budzet">ID budżetu:</label><br>
                <input type="number" id="id_budzet" name="id_budzet" required><br>
                <button type="submit" name="usun">Usuń</button>
            </form>
        </section>
    </div>
</body>
</html>
