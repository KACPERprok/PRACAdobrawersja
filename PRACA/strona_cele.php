<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: logowanie.php");
    exit();
}

$uzytkownik_id = $_SESSION['user_id'];

$sql = "SELECT * FROM Cele WHERE uzytkownik_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $uzytkownik_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cele oszczędnościowe</title>
    <link rel="icon" href="logo_tylko.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }

        header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #0d5f2d;
            color: #fff;
        }

        header img {
            max-height: 50px;
            margin-right: 20px;
        }

        nav {
            margin-left: auto;
        }

        nav ul {
            display: flex;
        }

        nav li {
            margin-left: 20px;
            list-style: none;
        }

        nav a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .main-section {
            text-align: center;
            background-color: #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 5px;
            margin-bottom: 50px;
            margin-left: 15px;
            margin-right: 15px;
        }

        .main-section h1 {
            font-size: 36px;
            color: #0d5f2d;
            margin-bottom: 20px;
        }

        .main-section button {
            background-color: #0d5f2d;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
            margin: 10px;
            font-family: Arial, sans-serif;
        }

        .main-section button:hover {
            background-color: #09491b;
        }

        .goals-section {
            width: 100%;
            background-color: #c0c0c0;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
        }

        .current-goals {
            text-align: center;
            margin-top: 20px;
        }

        .goal-container {
            margin-bottom: 10px;
        }

        .goal-container p {
            margin: 5px 0;
            font-size: 18px;
        }

        .remove-button {
            background-color: #fff;
            color: #0d5f2d;
            border: 1px solid #0d5f2d;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            margin: 5px;
        }

        .remove-button:hover {
            background-color: #0d5f2d;
            color: #fff;
        }

        .add-goal-button button {
            background-color: #0d5f2d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 5px;
            font-family: Arial, sans-serif;
        }

        .add-goal-button button:hover {
            background-color: #09491b;
        }

        .goal-info {
            background-color: #ddd;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
        }

        .goal-info h2 {
            margin-bottom: 10px;
            font-size: 24px;
            color: #0d5f2d;
        }

        .goal-info ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .goal-info li {
            margin-bottom: 5px;
            font-size: 16px;
        }

        .additional-info {
            background-color: #ccc;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
        }

        .additional-info h2 {
            margin-bottom: 10px;
            font-size: 24px;
            color: #0d5f2d;
        }

        .additional-info p {
            margin: 10px 0;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <header id="header">
        <img src="logo_obrot.png" alt="Logo">
        <nav>
            <ul id="zakladki">
                <li><a href="strona_glowna.php">Strona główna</a></li>
                <li><a href="strona_budz.php">Zarządzaj budżetem</a></li>
                <li><a href="strona_wyd.php">Zarządzaj wydatkami</a></li>
                <li><a href="strona_doch.php">Zarządzaj dochodami</a></li>
                <li><a href="strona_cele.php">Cele oszczędnościowe</a></li>
                <li><a href="strona_tren.php">Trendy</a></li>
                <li><a href="strona_rap.php">Raport</a></li>
            </ul>
        </nav>
    </header>

    <section class="main-section">
        <h1>Cele oszczędnościowe</h1>
        
        <div class="goals-section">
            <h2>Cele:</h2>
            <div class="current-goals">
                <?php 
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='goal-container'>";
                        echo "<p>Nazwa celu: " . $row["nazwa"] . "</p>";
                        echo "<form method='post' action='usun_cel.php' style='display:inline;'>";
                        echo "<input type='hidden' name='remove_goal' value='" . $row["nazwa"] . "'>";
                        echo "<button type='submit' class='remove-button'>Usuń</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Brak zdefiniowanych celów.</p>";
                }
                ?>
                
                <div class="add-goal-button">
                    <button onclick="window.location.href='form_tworzenie_celi.php'">Dodaj cel nr. 1</button>
                    <button onclick="window.location.href='form_tworzenie_celi2.php'">Dodaj cel nr. 2</button>
                </div>
            </div>
        </div>
    </section>

    <section class="goal-info">
        <h2>Dodatkowe informacje o celach:</h2>
        <ul>
            <?php 
            if ($result && $result->num_rows > 0) {
                mysqli_data_seek($result, 0); 
                while($row = $result->fetch_assoc()) {
                    echo "<li>Nazwa celu: " . $row["nazwa"] . ", Kwota celu: " . $row["kwota_celu"] . ", Data rozpoczęcia: " . $row["data_rozpoczecia"] . ", Data zakończenia: " . $row["data_zakonczenia"] . "</li>";
                }
            } else {
                echo "<p>Brak celi w bazie danych.</p>";
            }
            ?>
        </ul>
    </section>

    <section class="goal-info">
        <h2>Aktualna kwota:</h2>
        <?php include "aktualna_kwota_celu.php" ?>
    </section>
</body>
</html>
