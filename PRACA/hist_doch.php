<!DOCTYPE html>
<html>
<head>
    <title>Historia Dochodów</title>
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

        tbody tr:nth-child{
            background-color: #c0c0c0;
        }

    </style>
</head>
<body>
    <h2>Historia Dochodów</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Źródło</th>
                <th>Kwota</th>
                <th>Data</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'connect_hist_doch.php'; ?>
            <?php foreach ($dochody as $doch): ?>
                <tr>
                    <td><?php echo htmlspecialchars($doch['id']); ?></td>
                    <td><?php echo htmlspecialchars($doch['zrodlo']); ?></td>
                    <td><?php echo htmlspecialchars($doch['kwota']); ?></td>
                    <td><?php echo htmlspecialchars($doch['data']); ?></td>
                    <td><?php echo htmlspecialchars($doch['opis']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
