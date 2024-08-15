<!DOCTYPE html>
<html>

<head>
    <title>Donasi Berhasil</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            margin: 50px auto;
            max-width: 500px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="<?php echo base_url('assets/images/success.png'); ?>" alt="Success" width="100" height="100">
        <h1 style="color: #4CAF50;">Terima Kasih!</h1>
        <h3>Selamat Donasi anda berhasil <br> terimakasih atas kepercayaan pada pada layanan kami <br> semoga anda selalu dilancarkan rezekinnya</h3>




        <a href="<?php echo site_url('home'); ?>" class="button">Donasi Lagi</a>
    </div>
</body>

</html>