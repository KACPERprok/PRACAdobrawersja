<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formularz Rejestracji</title>
<link rel="stylesheet" href="style3.css">
<link rel="icon" href="logo_tylko.png">
</head>
<body>
<div class="container">
<div class="form-container">
<img src="logo_główne.png" alt="Logo" class="logo">
<form action="connect_rejestracja.php" method="post"> 
    <label for="first_name">IMIĘ</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="last_name">NAZWISKO</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="email">EMAIL</label>
    <input type="email" id="email" name="email" required>

    <label for="password">HASŁO</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">POTWIERDZENIE HASŁA</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <div class="verification-container">
        <label for="verification_code">DODATKOWY KOD BEZPIECZEŃSTWA</label>
        <input type="text" id="verification_code" name="verification_code" readonly>
        <button type="button" id="generate_code">Generuj kod</button>
    </div>
    
    <button id="button" type="submit">OK</button>
</form>
</div>
</div>

<script>
document.getElementById("generate_code").addEventListener("click", function() {
    
    var randomCode = Math.floor(Math.random() * 900000) + 100000; 
    document.getElementById("verification_code").value = randomCode;
});
</script>

</body>
</html>
