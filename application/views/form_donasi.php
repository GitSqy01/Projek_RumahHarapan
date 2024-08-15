<div class="samadiv">
    <div class="container" style="margin-top: 140px;">
        <div class="mt-4">
            <h3 class="text-dark text-center">Form donasi</h3>
        </div>
    </div>
    <div class="container mt-3">
        <div class="col-lg-10 footer_col">
            <div class="footer_section footer_about">
                <div class="footer_logo_container ml-5 text-center ">
                    <img class="ml-3" src="<?= base_url() ?>assets/img/bri.png">
                    <img class="ml-3" src="<?= base_url() ?>assets/img/BCA.png">
                    <img src="<?= base_url() ?>assets/img/bni.png">
                    <img class="ml-3" src="<?= base_url() ?>assets/img/mandiri.png">
                </div>
            </div>
        </div>
        <form action="<?= base_url('index.php/inti/proses_donasi'); ?>" method="post">

            <div class="form-group">
                <input type="hidden" name="donasi_id" value="<?= $donasi['donasi_id']; ?>">
                <input type="hidden" name="judul_donasi" value="<?= $donasi['judul']; ?>">
                <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                <label for="bank_id">Metode Pembayaran</label>
                <select class="form-control text-dark" id="bank_id" name="bank_id">
                    <option value="">Pilih Metode Pembayaran</option>
                    <?php foreach ($bank as $b) : ?>
                        <option value="<?php echo $b['bank_id']; ?>" data-img-src="<?= base_url('assets/img/bri.png') ?>">
                            <img src="<?php echo base_url('assets/img/' . $b['image']); ?>" alt="<?php echo $b['nama']; ?>" width="50"> <?php echo $b['nama']; ?> - <?php echo $b['no_rekening'] ?> a/n <?php echo $b['pemilik']; ?>
                            <?php echo form_error('bank_id', '<div class="text-danger small ml-3">', '</div>') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">Nama Donatur</label>
                <input type="text" class="form-control text-dark" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                <?php echo form_error('user_id', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="jumlah_donasi">Jumlah Donasi (Rp)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <select class=" text-dark" id="jumlah_donasi_pilihan" name="jumlah_donasi_pilihan">
                        <option value="">Pilih Nominal</option>
                        <option value="100000">100.000</option>
                        <option value="250000">250.000</option>
                        <option value="500000">500.000</option>
                        <option value="1000000">1.000.000</option>
                    </select>
                    <input type="number" class="form-control text-dark" id="jumlah_donasi" name="jumlah_donasi" min="1" value="<?= set_value('jumlah_donasi') ?>">
                    <?php echo form_error('jumlah_donasi', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
            </div>






            <?php foreach ($program as $prg) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-fluid w-75" src="<?php echo base_url() . '/uploads/' . $prg->image ?>">

                    </div>
                    <div class="col-md-8">
                        <table>
                            <tr>
                                <td>Nama Program</td>
                                <td> : <strong><?php echo $prg->judul ?></strong></td>
                            </tr>
                            <tr>
                                <td>Code Program</td>
                                <td> : <strong><?php echo $prg->donasi_id ?></strong></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> : <strong><?php echo $prg->alamat ?></strong></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td> : <strong><?php echo $prg->deskripsi ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary mt-3 mb-3">Donasi Sekarang</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#jumlah_donasi_pilihan').change(function() {
            var nominal = $(this).val();
            $('#jumlah_donasi').val(nominal);
        });
    });
</script>