<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utworzenie Budżetu</title>
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
    color: #0d5f2d;;
    font-size: 16px;
    cursor: pointer;
    transition: ease;
    background-color: #0d5f2d;
}

.budget-form button:hover {
    background-color: #0d5f2d;
}



    </style>
</head>
<body>
    <div class="column">
        <section class="budget-form">
            <h3>Utwórz Budżet</h3>
            <form action="connect_dodaj_budz.php" method="POST">
                <label for="typ">Typ budżetu:</label><br>
                <select name="typ" id="typ">
                    <option value="miesięczny">Miesięczny</option>
                    <option value="roczny">Roczny</option>
                </select><br>
                <label for="kategoria">Kategoria:</label><br>
                <input type="text" name="kategoria" id="kategoria"><br>
                <label for="kwota">Kwota:</label><br>
                <input type="number" name="kwota" id="kwota" min="0" step="0.01" required><br>
                <label for="opis">Opis (opcjonalnie):</label><br>
                <textarea name="opis" id="opis"></textarea><br>
                <input type="hidden" name="uzytkownik_id" value="<?php echo $_SESSION['user_id']; ?>"> 
                <button type="submit">Utwórz budżet</button> 
            </form>
        </section>
    </div>
</body>
</html>
