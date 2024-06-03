<!DOCTYPE html>
<html>
<head>
    <title>Historia Wydatków</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
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
    <h2>Historia Wydatków</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategoria</th>
                <th>Kwota</th>
                <th>Data</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody id="wydatki-tbody">
            <?php include 'connect_hist_wyd.php'; ?>
            <?php foreach ($wydatki as $wydatek): ?>
            <tr>
                <td><?php echo $wydatek['id']; ?></td>
                <td><?php echo $wydatek['kategoria']; ?></td>
                <td><?php echo $wydatek['kwota']; ?></td>
                <td><?php echo $wydatek['data']; ?></td>
                <td><?php echo $wydatek['opis']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
