<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Jajaran Genjang</title>
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
            background: linear-gradient(135deg, #fff5f5 0%, #ffe5e5 100%);
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
            box-shadow: 0 10px 30px rgba(231,76,60,0.1);
            animation: slideIn 0.8s ease;
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
            background: linear-gradient(90deg, #e74c3c, #c0392b);
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
            background: #e74c3c;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
            border-left: 4px solid #e74c3c;
            padding-left: 15px;
            background: #fff9f9;
            padding: 15px;
            border-radius: 0 10px 10px 0;
            transition: all 0.3s ease;
        }

        .form-group:hover {
            transform: translateX(5px) skewX(-2deg);
            background: #fff5f5;
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
            border: 2px solid #ffeded;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: #e74c3c;
            box-shadow: 0 0 0 3px rgba(231,76,60,0.1);
        }

        .submit-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
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
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231,76,60,0.3);
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
            background: #fff5f5;
            border-radius: 10px;
            text-align: center;
            border: 2px solid #e74c3c;
            display: none;
            position: relative;
        }

        .result.show {
            display: block;
            animation: slideUp 0.4s ease;
        }

        .result h3 {
            color: #e74c3c;
            margin-bottom: 10px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
            color: #e74c3c;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #c0392b;
            transform: translateX(-5px);
        }

        .back-link:before {
            content: '←';
            margin-right: 8px;
            font-size: 20px;
        }

        .shape-bg {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 200px;
            height: 100px;
            opacity: 0.1;
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
            transform: skewX(-20deg);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px) skewX(-5deg);
            }
            to {
                opacity: 1;
                transform: translateY(0) skewX(0);
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

        @keyframes float {
            0%, 100% { transform: translateY(0) skewX(-20deg); }
            50% { transform: translateY(-20px) skewX(-20deg); }
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
            }
        }
    </style>
</head>
<body>
    <!-- Parallelogram background decoration -->
    <svg class="shape-bg" viewBox="0 0 200 100" xmlns="http://www.w3.org/2000/svg">
        <path d="M40 10 L160 10 L140 90 L20 90 Z" fill="#e74c3c"/>
    </svg>

    <div class="container">
        <h2>Perhitungan Luas Jajaran Genjang</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="alas">Alas Jajaran Genjang (cm)</label>
                <input type="number" step="any" name="alas" id="alas" required placeholder="Masukkan panjang alas">
            </div>
            
            <div class="form-group">
                <label for="tinggi">Tinggi Jajaran Genjang (cm)</label>
                <input type="number" step="any" name="tinggi" id="tinggi" required placeholder="Masukkan tinggi">
            </div>

            <button type="submit" name="hitung" class="submit-btn">Hitung Luas</button>
        </form>

        <?php
        function luas_jajargenjang($a, $t) {
            return $a * $t;
        }

        if (isset($_POST['hitung'])) {
            $alas = $_POST['alas'];
            $tinggi = $_POST['tinggi'];
            $hasil = luas_jajargenjang($alas, $tinggi);
            echo "<div class='result show'>
                    <h3>Hasil Perhitungan</h3>
                    <p>Luas Jajaran Genjang = $alas × $tinggi = <b>$hasil</b> cm²</p>
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