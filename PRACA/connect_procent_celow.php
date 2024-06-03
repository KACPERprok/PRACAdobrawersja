<?php
include 'connect.php';

$stmt = $conn->prepare("
    SELECT id, kwota_celu, obecna_kwota
    FROM Cele
");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $id_celu = $row['id'];
    $kwota_celu = $row['kwota_celu'];
    $obecna_kwota = $row['obecna_kwota'];

    $stmt_dochody = $conn->prepare("
        SELECT SUM(kwota) AS suma_dochodow
        FROM Dochody
        WHERE id_cel = ?
    ");
    $stmt_dochody->bind_param("i", $id_celu);
    $stmt_dochody->execute();
    $result_dochody = $stmt_dochody->get_result();
    $row_dochody = $result_dochody->fetch_assoc();
    $suma_dochodow = $row_dochody['suma_dochodow'];

    $nowa_kwota_celu = $obecna_kwota + $suma_dochodow;

    $procent_celu = ($nowa_kwota_celu / $kwota_celu) * 100;
    $procent_celu = round($procent_celu, 2);

    $stmt_update_procent = $conn->prepare("
        UPDATE Cele
        SET procent = ?
        WHERE id = ?
    ");
    $stmt_update_procent->bind_param("di", $procent_celu, $id_celu);
    $stmt_update_procent->execute();
}
?>
