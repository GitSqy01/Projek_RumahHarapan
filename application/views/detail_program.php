<div class="homes">
    <div class="home_content">

        <div class="container-fluid">
            <div class="card">
                <h5 class="card-header">Detail Program</h5>
                <div class="card-body">

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
                                    <tr>
                                        <td>Status</td>
                                        <?php if ($prg->dana_terkumpul == $prg->dana_dibutuhkan) {
                                            // Panggil fungsi di model untuk mengubah status menjadi terkumpul
                                            $this->ModelProgram->update_status_terkumpul();
                                            echo "Status berhasil diubah menjadi terkumpul.";
                                        } else {
                                            echo "Dana belum terkumpul.";
                                        } ?>
                                        <td> : <strong><?php echo $prg->status ?></strong></td>

                                    </tr>
                                    <tr>
                                        <td>Target</td>
                                        <td> : <div class="btn btn-sm btn-primary">Rp.<?php echo number_format($prg->dana_dibutuhkan, 0, ',', '.') ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Persentase</td>
                                        <td> : <div class="progress bg-dark">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-succes" style="width: <?php echo ($prg->dana_terkumpul / $prg->dana_dibutuhkan) * 100; ?>%;"><?php echo ($prg->dana_terkumpul / $prg->dana_dibutuhkan) * 100; ?>%</div>
                                            </div>

                                        </td>

                                    </tr>
                                </table>
                                <?php
                                if ($prg->dana_terkumpul == $prg->dana_dibutuhkan) {
                                    echo "<i class='disabled btn btn-outline-primary fas fw fa-hourglass'>Sudah target</i>";
                                } else {
                                    echo "<a class='btn btn-sm btn-primary' href='" . base_url('index.php/inti/form_donasi/' . $prg->donasi_id) . "'>Donasi</a>";
                                }
                                ?>
                                <button class="btn btn-sm btn-danger mt-4 ml-2" onclick="window.history.go(-1)"> Kembali</button>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>