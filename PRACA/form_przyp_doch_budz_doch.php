<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przypisywanie dochodów do określonych budżetów</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="icon" href="img/logo_tylko.png">
    <style>
        .assignment-form {
            background-color: #c0c0c0;
            border-radius: 5px;
            padding: 20px;
            text-align: center; 
        }

        .assignment-form h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .assignment-form label,
        .assignment-form input,
        .assignment-form button {
            margin: 5px auto; 
            display: block;
        }
    </style>
</head>
<body>
    <div class="column">
        <section class="assignment-form">
            <h3>Przypisz Dochód do Budżetu</h3>
            <form action="connect_przyp_doch.php" method="POST">
                <label for="id_doch">ID Dochodu:</label>
                <input type="number" id="id_doch" name="id_doch" required>

                <label for="id_budzet">ID Budżetu:</label>
                <input type="number" id="id_budzet" name="id_budzet" required>

                <button type="submit">Przypisz Dochód</button>
            </form>
        </section>
    </div>
</body>
</html>
