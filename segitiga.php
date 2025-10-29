<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Segitiga</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 600px;
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
            font-size: 2em;
            position: relative;
            padding-bottom: 10px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: #3498db;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
            border-left: 4px solid #3498db;
            padding-left: 15px;
            background: #f8fafc;
            padding: 15px;
            border-radius: 0 10px 10px 0;
            transition: transform 0.3s ease;
        }

        .form-group:hover {
            transform: translateX(5px);
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .submit-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .result {
            margin-top: 25px;
            padding: 20px;
            background: #f1f9ff;
            border-radius: 10px;
            text-align: center;
            border: 2px solid #3498db;
            display: none;
        }

        .result.show {
            display: block;
            animation: slideUp 0.4s ease;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #2980b9;
            transform: translateX(-5px);
        }

        .back-link:before {
            content: '←';
            margin-right: 8px;
            font-size: 20px;
        }

        .triangle-bg {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 200px;
            height: 200px;
            opacity: 0.1;
            pointer-events: none;
            animation: rotate 20s linear infinite;
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

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <!-- Triangle background decoration -->
    <svg class="triangle-bg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <path d="M50 15 L85 85 L15 85 Z" fill="#3498db"/>
    </svg>

    <div class="container">
        <h2>Perhitungan Luas Segitiga</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="alas">Alas Segitiga (cm)</label>
                <input type="number" step="any" name="alas" id="alas" required placeholder="Masukkan panjang alas">
            </div>
            
            <div class="form-group">
                <label for="tinggi">Tinggi Segitiga (cm)</label>
                <input type="number" step="any" name="tinggi" id="tinggi" required placeholder="Masukkan tinggi">
            </div>

            <button type="submit" name="hitung" class="submit-btn">Hitung Luas</button>
        </form>

        <?php
        function luas_segitiga($a, $t) {
            return 0.5 * $a * $t;
        }

        if (isset($_POST['hitung'])) {
            $alas = $_POST['alas'];
            $tinggi = $_POST['tinggi'];
            $hasil = luas_segitiga($alas, $tinggi);
            echo "<div class='result show'>
                    <h3>Hasil Perhitungan</h3>
                    <p>Luas Segitiga = 1/2 × $alas × $tinggi = <b>$hasil</b> cm²</p>
                  </div>";
        }
        ?>

        <a href="index.php" class="back-link">Kembali ke Menu Utama</a>
    </div>

    <script>
        // Add show class to result div when it exists
        document.addEventListener('DOMContentLoaded', function() {
            const result = document.querySelector('.result');
            if (result) {
                result.classList.add('show');
            }
        });
    </script>
</body>
</html>