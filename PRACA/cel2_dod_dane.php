<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nazwa_celu2'])) {
    $nazwa_celu2 = $_POST['nazwa_celu2'];
    $_SESSION['cele'][] = $nazwa_celu2;
}
?>