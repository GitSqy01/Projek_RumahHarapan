<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Diblok</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page bg-lime">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="row justify-content-center card card-outline card-primary o-hidden border-0 shadow-lg mx-auto">
            <div class="card-header text-center">
                <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/logo.png" alt="..." style="width: 100px; height: 100px;">
                <hr>
                <div class="text-center">
                    <div class="error mx-auto h1" data-text="403"><b>403</b></div>
                    <p class="h3"><b>Akses Tidak Diizinkan !!</b></p>
                    <p class="text-gray-500 mb-3">Sepertinya Kamu Mengakses Halaman Yang Salah !</p>
                    <a href="<?= base_url('index.php/admin/autentifikasi'); ?>"><b>&larr; Kembali ke Dashboard</b></a>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
</body>

</html>