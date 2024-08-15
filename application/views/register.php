<body class="bg-white">



    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-9">

            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-3">
                        <div class="text-center mb-3">
                            <h1 class="h4 text-gray-900 mb-4">FORM PENDAFTARAN</h1>
                            <img src="<?= base_url() ?>assets/img/logo.png" alt="logo">
                        </div>
                        <form method="post" action="<?php anchor('auth/register') ?>" class="user">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nik" id="exampleInputName" placeholder="Masukan NIK anda" value="<?= set_value('nik'); ?>">
                                <?php echo form_error('nik', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nama" id="exampleInputName" placeholder="Masukan usernama anda" value="<?= set_value('nama'); ?>">
                                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="alamat" id="exampleInputName" placeholder="Masukan alamat anda" value="<?= set_value('alamat'); ?>">
                                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="jk">Pilih Jenis Kelamin</label>
                                <input type="radio" name="jk" id="jk" value="M"> Laki-Laki
                                <input type="radio" name="jk" id="jk" value="F"> Perempuan
                                <input type="radio" name="jk" id="jk" value="O"> Lainnya
                                <?php echo form_error('jk', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>

                            <div class=" form-group">
                                <input type="number" class="form-control form-control-user" id="exampleInputNumber" placeholder="Masukan nomor telepon" name="nohp" value="<?= set_value('nohp'); ?>">
                                <?php echo form_error('nohp', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>

                            <div class=" form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan alamat email" name="email" value="<?= set_value('email'); ?>">
                                <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>

                            <div class=" form-group ml-4 mt-2">
                                <label for="">Upload foto anda</label><br>
                                <input type="file" id="exampleInputimage" name="image" value="<?= set_value('image'); ?>">
                                <?php echo form_error('image', '<div class="text-danger small ml-2">', '</div>') ?>
                            </div>

                            <div class=" form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password_1" placeholder="Maukan password anda" value="<?= set_value('password_1'); ?>">
                                    <?php echo form_error('password_1', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class=" col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="password_2" placeholder="Ulangi masukan password" value="<?= set_value('password_2'); ?>">
                                </div>

                            </div>
                            <button type=" submit" class="btn btn-info btn-user btn-block">
                                DAFTAR

                            </button>

                        </form>

                        <div class="text-center">
                            <div class="small">
                                <?php echo anchor('Auth/login', 'Sudah punya akun? Login!') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>