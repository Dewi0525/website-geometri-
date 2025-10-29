<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Lingkaran</title>
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
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
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
            box-shadow: 0 10px 30px rgba(46,204,113,0.1);
            animation: scaleIn 0.8s ease;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #2ecc71, #27ae60);
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
            background: #2ecc71;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
            border-left: 4px solid #2ecc71;
            padding: 15px;
            background: #f8fff8;
            border-radius: 0 50px 50px 0;
            transition: all 0.3s ease;
        }

        .form-group:hover {
            transform: scale(1.02);
            background: #f0fff0;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e8f5e9;
            border-radius: 25px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2ecc71;
            box-shadow: 0 0 0 3px rgba(46,204,113,0.1);
        }

        .submit-btn {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46,204,113,0.3);
        }

        .submit-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255,255,255,0.2),
                transparent
            );
            transition: 0.5s;
        }

        .submit-btn:hover:before {
            left: 100%;
        }

        .result {
            margin-top: 25px;
            padding: 20px;
            background: #f0fff0;
            border-radius: 25px;
            text-align: center;
            border: 2px solid #2ecc71;
            display: none;
            position: relative;
        }

        .result.show {
            display: block;
            animation: popIn 0.4s ease;
        }

        .result h3 {
            color: #27ae60;
            margin-bottom: 10px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
            color: #2ecc71;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #27ae60;
            transform: translateX(-5px);
        }

        .back-link:before {
            content: '←';
            margin-right: 8px;
            font-size: 20px;
        }

        .circle-bg {
            position: fixed;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(46,204,113,0.1);
            top: 20px;
            right: 20px;
            pointer-events: none;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes popIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            70% {
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulse {
            0%, 100% { 
                transform: scale(1);
                opacity: 0.1;
            }
            50% { 
                transform: scale(1.1);
                opacity: 0.2;
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.8em;
            }

            .form-group {
                padding: 12px;
                border-radius: 0 25px 25px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Circle background decoration -->
    <div class="circle-bg"></div>

    <div class="container">
        <h2>Perhitungan Luas Lingkaran</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="jari">Jari-jari Lingkaran (cm)</label>
                <input type="number" step="any" name="jari" id="jari" required 
                       placeholder="Masukkan panjang jari-jari">
            </div>

            <button type="submit" name="hitung" class="submit-btn">Hitung Luas</button>
        </form>

        <?php
        function luas_lingkaran($r) {
            return 3.141 * pow($r, 2);
        }

        if (isset($_POST['hitung'])) {
            $r = $_POST['jari'];
            $hasil = luas_lingkaran($r);
            echo "<div class='result show'>
                    <h3>Hasil Perhitungan</h3>
                    <p>Luas Lingkaran = π × r² = <b>$hasil</b> cm²</p>
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