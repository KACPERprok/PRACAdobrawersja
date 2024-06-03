<?php
include 'connect.php';

function displayErrorMessage($message) {
    echo '<div style="background-color: #f2dede; color: #a94442; padding: 10px; margin-bottom: 10px;">' . $message . '</div>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verification_code = $_POST['verification_code'];

    $sql = "SELECT * FROM Uzytkownik WHERE email = ? AND haslo = ? AND kod_dodatkowy = ?";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        displayErrorMessage("Błąd przygotowania zapytania: " . $conn->error);
        die();
    }

    $stmt->bind_param("sss", $email, $password, $verification_code);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];
        header("Location: strona_glowna.php");
        exit();
    } else {
        displayErrorMessage("Błąd logowania. Sprawdź wprowadzone dane.");
    }

   
}


?>
