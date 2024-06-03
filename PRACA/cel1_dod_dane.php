
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nazwa_celu1'])) {
    $nazwa_celu1 = $_POST['nazwa_celu1'];
    $_SESSION['cele'][] = $nazwa_celu1;
}
?>