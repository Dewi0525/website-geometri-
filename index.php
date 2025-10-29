<!DOCTYPE html>
<html>
<head>
    <title>Menu Utama Perhitungan Geometri dan KPR</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #c6d3e7ff 0%, #c3cfe2 100%);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 800px;
            width: 100%;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            animation: fadeIn 0.8s ease;
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2em;
            position: relative;
            padding-bottom: 10px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
            border-radius: 2px;
        }

        p {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 10px;
        }

        .menu-item {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-decoration: none;
            color: #2c3e50;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .menu-item:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 0%, rgba(255,255,255,0.2) 100%);
            transition: transform 0.6s ease;
            transform: translateX(-100%);
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .menu-item:hover:before {
            transform: translateX(100%);
        }

        /* Unique colors and icons for each item */
        .menu-item.segitiga {
            border-left: 5px solid #3498db;
        }

        .menu-item.lingkaran {
            border-left: 5px solid #2ecc71;
        }

        .menu-item.jajargenjang {
            border-left: 5px solid #e74c3c;
        }

        .menu-item.kpr {
            border-left: 5px solid #f1c40f;
        }

        .icon {
            font-size: 24px;
            margin-right: 15px;
            min-width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: white;
            animation: iconPulse 3s ease-in-out infinite;
        }

        .segitiga .icon {
            background: #3498db;
        }

        .lingkaran .icon {
            background: #2ecc71;
        }

        .jajargenjang .icon {
            background: #e74c3c;
        }

        .kpr .icon {
            background: #f1c40f;
        }

        .menu-item span {
            font-size: 1.1em;
            font-weight: 600;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes iconPulse {
            0% { background: #3498db; }
            25% { background: #2ecc71; }
            50% { background: #e74c3c; }
            75% { background: #f1c40f; }
            100% { background: #3498db; }
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.8em;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Program Perhitungan Geometri dan KPR</h2>
        <p>Pilih jenis perhitungan yang Anda inginkan:</p>
        <div class="menu-grid">
            <a href="segitiga.php" class="menu-item segitiga">
                <div class="icon">▲</div>
                <span>Hitung Luas Segitiga</span>
            </a>
            <a href="lingkaran.php" class="menu-item lingkaran">
                <div class="icon">⭕</div>
                <span>Hitung Luas Lingkaran</span>
            </a>
            <a href="jajargenjang.php" class="menu-item jajargenjang">
                <div class="icon">⬱</div>
                <span>Hitung Luas Jajaran Genjang</span>
            </a>
            <a href="kpr.php" class="menu-item kpr">
                <div class="icon">🏠</div>
                <span>Hitung Kredit Pemilikan Rumah (KPR)</span>
            </a>
        </div>
    </div>
</body>
</html>
