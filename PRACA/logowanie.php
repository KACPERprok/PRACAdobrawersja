<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formularz Logowania</title>
<link rel="stylesheet" href="style2.css">
<link rel="icon" href="logo_tylko.png">
</head>
<body>
<div class="container">
<div class="form-container">
<img src="logo_witaj.png" alt="Logo" class="logo">
<form action="connect_logowanie.php" method="post">
    <label for="email">EMAIL</label>
    <input type="email" id="email" name="email" required>

    <label for="password">HASŁO</label>
    <input type="password" id="password" name="password" required>

    <label for="verification_code">DODATKOWY KOD BEZPIECZEŃSTWA</label>
    <input type="text" id="verification_code" name="verification_code" required>

<div class="button-container">
    <a href="rejestracja.php" class="button">Zarejestruj się</a>
    <button  type="submit" class= "button">Zaloguj się</button>
</div>
</form>



</div>
</div>
</body>
</html>
