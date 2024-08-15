<div class="samadiv">
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <h1>Profile</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <?= $this->session->flashdata('pesan'); ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 ml-5 mt-4">

        <?= form_open_multipart('Donasiku'); ?>

        <div class=" form-group row ">
            <label for="nama" class="col-sm-2 col-form-label">NAMA LENGKAP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control text-dark" id="nama" name="nama" value="<?= $user['nama']; ?>">
                <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
            </div>
        </div>
        <div class=" form-group row ">
            <label for="nama" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control text-dark" id="nik" name="nik" value="<?= $user['nik']; ?>" readonly>
                <?php echo form_error('nik', '<div class="text-danger small ml-2">', '</div>') ?>
            </div>
        </div>
        <div class=" form-group row ">
            <label for="nama" class="col-sm-2 col-form-label">ALAMAT</label>
            <div class="col-sm-10">
                <input type="text" class="form-control text-dark" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                <?php echo form_error('alamat', '<div class="text-danger small ml-2">', '</div>') ?>
            </div>
        </div>
        <div class=" form-group row ">
            <label for="nama" class="col-sm-2 col-form-label">NO HP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control text-dark" id="nohp" name="nohp" value="<?= $user['nohp']; ?>">
                <?php echo form_error('nohp', '<div class="text-danger small ml-2">', '</div>') ?>
            </div>
        </div>
        <div class=" form-group row ">
            <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
            <div class="col-sm-10">
                <input type="email" class="form-control text-dark" id="email" name="email" value="<?= $user['email']; ?>" readonly>
            </div>
        </div>
        <div class=" form-group row ">
            <label for="email" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
            <div class="col-sm-10">
                <input type="email" class="form-control text-dark" id="jk" name="jk" value="<?= $user['jk']; ?>" readonly>
            </div>
        </div>

        <div class=" form-group row ">
            <div class="col-sm-2">FOTO</div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="img-thumbnail">

                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label for="image" class="custom-file-label" for="customfile">Pilih file</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-sm btn-success">Edit</button>
            </div>

        </div>

        <?php echo form_close(); ?>

    </div>
</div>

</div>