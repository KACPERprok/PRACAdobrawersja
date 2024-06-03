<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzaj wydatkami</title>
    <link rel="icon" href="logo_tylko.png">
    <style>
        body, h1, h3, h5, h6, p, ul, li {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #0d5f2d;
            color: #fff;
        }

        header img {
            max-height: 50px;
            margin-right: 20px;
        }

        nav {
            margin-left: auto;
        }

        nav ul {
            display: flex;
        }

        nav li {
            margin-left: 20px;
        }

        nav a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .main-section {
            text-align: center;
            background-color: #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 5px;
            margin-bottom: 50px;
        }

        .main-section h1 {
            font-size: 36px;
            color: #0d5f2d;
        }

        .main-section button {
            background-color: #0d5f2d;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .main-section button:hover {
            background-color: #0b4e29;
        }

        .content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .gray-box, .hist-doh {
            width: 30%;
            border-radius: 5px;
            padding: 5px;
            margin-bottom: 10px;
            background-color: #c0c0c0;
        }

        .gray-box {
            margin-bottom: 20px; 
        }

        .hist-doh {
            margin-top: 20px; 
        }

        @media only screen and (max-width: 768px) {
            .gray-box, .hist-doh {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header id="header">
        <img src="logo_obrot.png" alt="Logo">
        <nav>
            <ul id="zakladki">
                <li><a href="strona_glowna.php">Strona główna</a></li>
                <li><a href="strona_budz.php">Zarządzaj budżetem</a></li>
                <li><a href="strona_wyd.php">Zarządzaj wydatkami</a></li>
                <li><a href="strona_doch.php">Zarządzaj dochodami</a></li>
                <li><a href="strona_cele.php">Cele oszczędnościowe</a></li>
                <li><a href="strona_tren.php">Trendy</a></li>
                <li><a href="strona_rap.php">Raport</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-section">
        <h1 id="w">Wydatki</h1>
        <br>
        <div class="content">
            <div class="gray-box">
                <div>
                    <?php include 'form_tworzenie_wyd.php'; ?>
                </div>
            </div>
            <div class="gray-box">
                <div>
                    <?php include 'form_edytowanie_wyd.php'; ?>
                </div>
            </div>
            <div class="gray-box">
                <div>
                    <?php include 'form_usun_wyd.php'; ?>
                </div>
            </div>
            <div class="gray-box">
                <div>
                    <?php include 'form_przyp_wyd_budz_wyd.php'; ?>
                </div>
            </div>
            <div class="gray-box">
                <div>
                    <?php include 'hist_budz.php'; ?>
                </div>
            </div>
            <div class="gray-box hist-doh">
                <div>
                    <?php include 'hist_wyd.php'; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
