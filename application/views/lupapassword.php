<body class="bg-white">



    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-9">


            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Lupa Password ya?</h1>
                        </div>


                        <?php echo $this->session->flashdata('message') ?>
                        <?php echo $this->session->flashdata('pesan') ?>
                        <?php echo $this->session->flashdata('pesan3') ?>


                        <form method="post" action="<?php echo base_url('index.php/auth/lupapassword') ?>" class="user">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Email Anda" name="email">
                                <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                            </div>
                            <button type="submit" class="btn btn-sm btn-info btn-user form-control">Reset Password </button>
                        </form>
                        <div class="text-center">
                            <!-- <div class="small">
                                <?php echo anchor('Auth/login', 'Kembali login') ?>
                            </div> -->
                            <a class="small" href="<?php echo base_url('index.php/Auth/login'); ?>">Kembali login</a><br>
                            <img class="mt-3" src="<?= base_url() ?>assets/img/logo.png" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>

    </div>