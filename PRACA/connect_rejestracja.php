<?php
session_start();

include 'connect.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$verification_code = $_POST['verification_code'];

if ($password !== $confirm_password) {
    echo '<div style="background-color: #f2dede; color: #a94442; padding: 10px; margin-bottom: 10px;">Hasła się nie zgadzają</div>';
    die();
}

$sql = "INSERT INTO Uzytkownik (email, imie, nazwisko, haslo, kod_dodatkowy) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo '<div style="background-color: #f2dede; color: #a94442; padding: 10px; margin-bottom: 10px;">Wystąpił błąd podczas rejestracji. Spróbuj ponownie.</div>';
    die();
}

$stmt->bind_param("sssss", $email, $first_name, $last_name, $password, $verification_code);

if ($stmt->execute()) {
    $user_id = $stmt->insert_id; 
    $_SESSION['user_id'] = $user_id; 
    header("Location: logowanie.php");
    exit();
} else {
    echo '<div style="background-color: #f2dede; color: #a94442; padding: 10px; margin-bottom: 10px;">Wystąpił błąd podczas rejestracji. Spróbuj ponownie.</div>';
    die();
}
?>
