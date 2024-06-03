<?php
function losujPowiadomienie() {
    $powiadomienia = [
        "Każdy krok zbliża Cię do celu!",
        "Nie poddawaj się, jesteś blisko!",
        "Wielkie rzeczy zaczynają się od małych kroków.",
        "Trzymaj kurs, osiągniesz swój cel!",
        "Pracuj ciężko, marzenia się spełniają!",
        "Jedzenie suchego chleba nie może być takie złe",
        "Musisz być twardy!",
        "Każda podróż zaczyna się od pierwszego kroku.",
        "Nie ma rzeczy niemożliwych.",
        "Wytrwałość jest kluczem do sukcesu.",
        "Codziennie jesteś bliżej swojego celu.",
        "Rób małe kroki każdego dnia.",
        "Każdy dzień to nowa szansa.",
        "Nie rezygnuj, gdy jesteś blisko mety.",
        "Wszystko jest możliwe, jeśli w to wierzysz.",
        "Każda przeszkoda to szansa na rozwój.",
        "Nigdy nie jest za późno na realizację marzeń.",
        "Każda porażka to lekcja.",
        "Działaj teraz, marzenia się nie spełnią same.",
        "Twoja determinacja przyniesie owoce."
    ];

    $losowyIndex = array_rand($powiadomienia);
    return $powiadomienia[$losowyIndex];
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['powiadomienie'] = losujPowiadomienie();
?>
