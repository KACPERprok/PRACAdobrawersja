<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'imie.php';
include 'sprawdz_cele.php';  
include 'powiadomienie_cele.php';  
include 'powiadomienie_budz.php'; 
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo_tylko.png">
</head>
<body>
    <header id="header"> 
        <img src="logo_obrot.png">
        <nav>   
            <ul id="zakladki">    
                <li><a href="strona_glowna.php">Strona główna</a></li>    
                <li><a href="strona_budz.php">Zarządzaj budżetem</a></li>    
                <li><a href="strona_wyd.php">Zarządzaj wydatkami</a></li>    
                <li><a href="strona_doch.php">Zarządzaj dochodami</a></li>
                <li><a href="strona_cele.php">Cele oszczędnościowe</a></li>
                <li><a href="strona_tren.php">Trendy</a></li>
                <li><a href="strona_rap.php">Raporty</a></li>
                <li><a href="logowanie.php" id="link-menu">Wyloguj</a></li>
            </ul> 
        </nav> 
    </header>

    <section id="baner">
        <p><?php echo date('Y-m-d'); ?></p>
        <h1><?php echo "Cześć " .  $imie; ?>!</h1>
    </section>

    <section id="cel">
    <h5 id="pcel" style="color: #fff; font-style: italic; font-size: 25px; font-family: Arial, sans-serif; background-color: #0d5f2d; text-align: center; border-radius: 5px; padding: 5px;"><?php echo $_SESSION['powiadomienie']; ?></h5>
        <h3>CELE:</h3>  
        <?php foreach ($_SESSION['cele'] as $cel) : ?>
            <h5><?php echo $cel; ?></h5>
        <?php endforeach; ?>
        <a href="strona_cele.php" class="link-z"><h6>Zarządzaj</h6></a>
    </section>

    <section id="budzet">
        <h3>BUDŻETY:</h3>
        <?php if (!empty($_SESSION['powiadomienia_budz'])): ?>
            <ul>
                <?php foreach ($_SESSION['powiadomienia_budz'] as $powiadomienie): ?>
                    <li><?php echo htmlspecialchars($powiadomienie); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h5>Twój budzet jest w porządku</h5>
        <?php endif; ?>
        <a href="strona_budz.php" class="link-z"><h6>Zarządzaj</h6></a>
    </section>
</body>
</html>
