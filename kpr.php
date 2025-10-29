<!DOCTYPE html>
<html>
<head>
    <title>Hitung KPR</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #fff9c4 0%, #fff176 100%);
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
            box-shadow: 0 10px 30px rgba(241,196,15,0.2);
            animation: slideUp 0.8s ease;
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
            background: linear-gradient(90deg, #f1c40f, #f39c12);
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
            width: 100px;
            height: 4px;
            background: #f1c40f;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
            border-left: 4px solid #f1c40f;
            padding: 15px;
            background: #fffef5;
            border-radius: 0 15px 15px 0;
            transition: all 0.3s ease;
        }

        .form-group:hover {
            transform: translateX(5px);
            background: #fff9e6;
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
            border: 2px solid #fff8e1;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: #f1c40f;
            box-shadow: 0 0 0 3px rgba(241,196,15,0.1);
        }

        .currency-prefix {
            position: absolute;
            left: 25px;
            top: 47px;
            color: #666;
        }

        .input-with-prefix {
            padding-left: 35px !important;
        }

        .submit-btn {
            background: linear-gradient(135deg, #f1c40f 0%, #f39c12 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
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
            box-shadow: 0 5px 15px rgba(241,196,15,0.3);
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
            background: #fffef5;
            border-radius: 15px;
            border: 2px solid #f1c40f;
            display: none;
        }

        .result.show {
            display: block;
            animation: fadeIn 0.4s ease;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #ffeaa7;
        }

        .result-item:last-child {
            border-bottom: none;
            font-weight: 600;
            color: #f39c12;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
            color: #f39c12;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #f1c40f;
            transform: translateX(-5px);
        }

        .back-link:before {
            content: '←';
            margin-right: 8px;
            font-size: 20px;
        }

        .house-bg {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 200px;
            height: 200px;
            opacity: 0.1;
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.8em;
            }

            .form-group {
                padding: 12px;
            }

            .result-item {
                flex-direction: column;
            }

            .result-item span:last-child {
                margin-top: 5px;
                font-weight: 500;
            }
        }
    </style>
</head>
<body>
    <!-- House icon background decoration -->
    <svg class="house-bg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 3L4 9v12h16V9l-8-6z" fill="#f1c40f"/>
    </svg>

    <div class="container">
        <h2>Perhitungan Kredit Pemilikan Rumah (KPR)</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="harga">Harga Rumah</label>
                <span class="currency-prefix">Rp</span>
                <input type="number" step="any" name="harga" id="harga" required 
                       class="input-with-prefix" placeholder="Masukkan harga rumah">
            </div>
            
            <div class="form-group">
                <label for="dp">Uang Muka (DP)</label>
                <span class="currency-prefix">Rp</span>
                <input type="number" step="any" name="dp" id="dp" required 
                       class="input-with-prefix" placeholder="Masukkan jumlah DP">
            </div>

            <div class="form-group">
                <label for="bunga">Suku Bunga (% per tahun)</label>
                <input type="number" step="any" name="bunga" id="bunga" required 
                       placeholder="Masukkan persentase bunga">
            </div>

            <div class="form-group">
                <label for="tenor">Lama Cicilan (tahun)</label>
                <input type="number" name="tenor" id="tenor" required 
                       placeholder="Masukkan jangka waktu">
            </div>

            <button type="submit" name="hitung" class="submit-btn">Hitung KPR</button>
        </form>

        <?php
        function hitung_kpr($harga, $dp, $bunga, $tenor) {
            $pinjaman = $harga - $dp;
            $bunga_bulan = $bunga / 12 / 100;
            $bulan = $tenor * 12;
            $angsuran = ($pinjaman * $bunga_bulan) / (1 - pow(1 + $bunga_bulan, -$bulan));
            return [$angsuran, $pinjaman, $bulan];
        }

        if (isset($_POST['hitung'])) {
            $harga = $_POST['harga'];
            $dp = $_POST['dp'];
            $bunga = $_POST['bunga'];
            $tenor = $_POST['tenor'];

            list($angsuran, $pinjaman, $bulan) = hitung_kpr($harga, $dp, $bunga, $tenor);
            echo "<div class='result show'>
                    <div class='result-item'>
                        <span>Harga Rumah:</span>
                        <span>Rp " . number_format($harga, 0, ',', '.') . "</span>
                    </div>
                    <div class='result-item'>
                        <span>Uang Muka:</span>
                        <span>Rp " . number_format($dp, 0, ',', '.') . "</span>
                    </div>
                    <div class='result-item'>
                        <span>Total Pinjaman:</span>
                        <span>Rp " . number_format($pinjaman, 0, ',', '.') . "</span>
                    </div>
                    <div class='result-item'>
                        <span>Lama Cicilan:</span>
                        <span>$bulan bulan (" . $tenor . " tahun)</span>
                    </div>
                    <div class='result-item'>
                        <span>Angsuran per Bulan:</span>
                        <span>Rp " . number_format($angsuran, 0, ',', '.') . "</span>
                    </div>
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