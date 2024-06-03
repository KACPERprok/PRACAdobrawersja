<?php
include 'connect.php';

$user_id = $_SESSION['user_id'];

$queryBudzet = "SELECT kategoria, limit_budzetu FROM Budzet WHERE uzytkownik_id = ?";
$stmtBudzet = $conn->prepare($queryBudzet);
$stmtBudzet->bind_param('i', $user_id);
$stmtBudzet->execute();
$resultBudzet = $stmtBudzet->get_result();

$budzety = [];
while ($row = $resultBudzet->fetch_assoc()) {
    $budzety[$row['kategoria']] = $row['limit_budzetu'];
}

$queryWydatki = "SELECT kategoria, SUM(kwota) as suma_wydatkow FROM Wydatki WHERE uzytkownik_id = ? GROUP BY kategoria";
$stmtWydatki = $conn->prepare($queryWydatki);
$stmtWydatki->bind_param('i', $user_id);
$stmtWydatki->execute();
$resultWydatki = $stmtWydatki->get_result();

$powiadomienia = [];

while ($row = $resultWydatki->fetch_assoc()) {
    $kategoria = $row['kategoria'];
    $suma_wydatkow = $row['suma_wydatkow'];

    if (isset($budzety[$kategoria])) {
        $limit_budzetu = $budzety[$kategoria];

        if ($suma_wydatkow >= $limit_budzetu) {
            $powiadomienia[] = "Przekroczono budżet w kategorii: $kategoria. Suma wydatków: $suma_wydatkow zł, Limit budżetu: $limit_budzetu zł";
        } elseif ($suma_wydatkow >= 0.9 * $limit_budzetu) {
            $powiadomienia[] = "Budżet na wyczerpaniu w kategorii: $kategoria. Suma wydatków: $suma_wydatkow zł, Limit budżetu: $limit_budzetu zł";
        } else {
            $powiadomienia[] = "Budżet w kategorii: $kategoria jest stabilny. Suma wydatków: $suma_wydatkow zł, Limit budżetu: $limit_budzetu zł";
        }
    }
}

if (empty($budzety)) {
    $powiadomienia[] = "Brak budżetu.";
}

$_SESSION['powiadomienia_budz'] = $powiadomienia;
?>
