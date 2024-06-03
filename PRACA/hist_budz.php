<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Historia Budżetu</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow-x: auto; 
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    h2 {
        background-color: #09491b;
        color: white;
        text-align: center;
        margin: 0;
        padding: 10px 0;
    }
</style>
</head>
<body>
<h2>Twoje Budżety</h2>
<div style="overflow-x:auto;">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Typ</th>
            <th>Kategoria</th>
            <th>Kwota</th>
            <th>Opis</th>
        </tr>
    </thead>
    <tbody>
        <?php include 'connect_hist_budz.php'; ?>
        <?php foreach ($historia_budzetu as $budzet): ?>
            <tr>
                <td><?php echo htmlspecialchars($budzet['id']); ?></td>
                <td><?php echo htmlspecialchars($budzet['typ']); ?></td>
                
                <td><?php echo htmlspecialchars($budzet['kategoria']); ?></td>
                <td><?php echo htmlspecialchars($budzet['kwota']); ?></td>
                <td><?php echo htmlspecialchars($budzet['opis']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</body>
</html>
