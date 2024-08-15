<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="h5 text-gray-900 ">Ubah password untuk akun email :</h4>
                                        <h5 class="h5 mb-4 text-success"><?= $this->session->userdata('reset_email') ?></h5>
                                    </div>


                                    <?php echo $this->session->flashdata('message') ?>
                                    <?php echo $this->session->flashdata('pesan') ?>
                                    <?php echo $this->session->flashdata('pesan3') ?>


                                    <form method="post" action="<?php echo base_url('index.php/auth/ubahpassword') ?>" class="user">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword_1" placeholder="Masukan Password Baru Anda" name="password_1">
                                            <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword_2" placeholder="Masukan Ulang Password Baru Anda" name="password_2">
                                            <?php echo form_error('password_2', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success form-control">Ubah Password </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>