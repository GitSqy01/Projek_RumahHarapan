<div class="samadiv">
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="row text-center mt-3 ml-5 px-2">


                <?php foreach ($program_donasi as $pd) : ?>
                    <div class="card ml-5 mb-2 " style="width: 16rem;">
                        <img src="<?php echo base_url() . '/uploads/' . $pd['image']; ?>" class="img-fluid " alt="...">
                        <div class="card-body p-1 h-25">
                            <h5 class="card-title mb-1"><?php echo $pd['judul']; ?></h5>
                            <span class="mb-2 badge rounded-pill bg-info text-dark">Target = Rp. <?php echo number_format($pd['dana_dibutuhkan'], 0, ',', '.') ?></span><br>
                            <div class="progress bg-dark">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-succes" style="width: <?php echo ($pd['dana_terkumpul'] / $pd['dana_dibutuhkan']) * 100; ?>%;"><?php echo ($pd['dana_terkumpul'] / $pd['dana_dibutuhkan']) * 100; ?>%</div>
                            </div><br>
                            <?php
                            if ($pd['dana_terkumpul'] == $pd['dana_dibutuhkan']) {
                                echo "<i class='disabled btn btn-outline-primary fas fw fa-hourglass'>Sudah target</i>";
                            } else {
                                echo "<a class='btn btn-sm btn-primary' href='" . base_url('index.php/inti/form_donasi/' . $pd['donasi_id']) . "'>Donasi</a>";
                            }
                            ?>
                            <?php echo anchor('inti/detail/' . $pd['donasi_id'], '<div class="btn btn-sm btn-warning">Detail</div>') ?>

                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>