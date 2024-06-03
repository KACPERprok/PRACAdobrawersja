<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja Budżetu</title>
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
        .budget-form textarea {
            margin: 5px 0;
        }

        .budget-form button {
            background-color: #0d5f2d;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .budget-form button:hover {
            background-color: #0b4e29;
        }
    </style>
</head>
<body>
    <div class="column">
        <section class="budget-form">
            <h3>Edytuj Budżet</h3>
            <form action="connect_edy_budz.php" method="POST">
                <label for="id_budzet">ID budżetu:</label><br>
                <input type="text" name="id_budzet" id="id_budzet"><br>
                <label for="typ">Typ budżetu:</label><br>
                <select name="typ" id="typ">
                    <option value="miesięczny">Miesięczny</option>
                    <option value="roczny">Roczny</option>
                </select><br>
                <label for="kategoria">Nowa kategoria:</label><br>
                <input type="text" name="kategoria" id="kategoria"><br>
                <button type="submit">Edytuj budżet</button>
            </form>
        </section>
    </div>
</body>
</html>
