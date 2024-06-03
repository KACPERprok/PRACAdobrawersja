<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przypisanie Dochodu do Celu Oszczędnościowego</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="icon" href="img/logo_tylko.png">
    <style>
        .assignment-form {
            background-color: #c0c0c0;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            margin: 0 auto;
            width: 50%;
        }

        .assignment-form h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .assignment-form label,
        .assignment-form input,
        .assignment-form button {
            margin: 5px 0;
            display: block;
        }

        .assignment-form input[type="number"],
        .assignment-form input[type="text"] {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .assignment-form button {
            width: 100%;
            background-color: #0d5f2d;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .assignment-form button:hover {
            background-color: #09491b;
        }
    </style>
</head>
<body>
    <div class="column">
        <section class="assignment-form">
            <h3>Przypisz Dochód do Celu Oszczędnościowego</h3>
            <form action="connect_przyp_doch_cel.php" method="POST">
                <label for="id_doch">ID Dochodu:</label>
                <input type="number" id="id_doch" name="id_doch" required>

                <label for="nazwa_celu">Nazwa Celu Oszczędnościowego:</label>
                <input type="text" id="nazwa_celu" name="nazwa_celu" required placeholder="Wprowadź nazwę celu oszczędnościowego">

                <button type="submit">Przypisz Dochód</button>
            </form>
        </section>
    </div>
</body>
</html>
