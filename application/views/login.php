<body class="bg-white">



    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-9">



            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center mb-3">
                            <h1 class="h4 text-gray-900 mb-4">Silahkan login</h1>
                            <img src="<?= base_url() ?>assets/img/logo.png" alt="logo">
                        </div>


                        <?php echo $this->session->flashdata('message') ?>
                        <?php echo $this->session->flashdata('pesan') ?>
                        <?php echo $this->session->flashdata('pesan3') ?>


                        <form method="post" action="<?php anchor('auth/login') ?>" class="user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Masukan Username Anda" name="nama">
                                <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password" name="password">
                                <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                            </div>
                            <button type="submit" class="btn btn-sm btn-info form-control">LOGIN</button>
                        </form>
                        <div class="text-center">
                            <div class="medium">
                                <?php echo anchor('Auth/lupapassword', 'Lupa Password? klik aja!') ?>
                            </div>
                            <!-- <a class="medium" href="<?= base_url('Registrasi/lupapassword'); ?>">Lupa Password?</a> -->
                        </div>
                        <div class="text-center">
                            <div class="medium">
                                <?php echo anchor('Auth/register', 'Belum punya akun? Daftar!') ?>
                            </div>
                            <!-- <a class="medium" href="<?php echo base_url('register'); ?>">Belum punya akun? Daftar!</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>

    </div>



</body>

</html>