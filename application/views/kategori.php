<div class="samadiv">
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="row text-center mt-3 ml-5 px-2">


                <?php foreach ($kategori as $k) : ?>
                    <div class="card ml-5 mb-4 " style="width: 12rem; background-color:aqua;">
                        <img src="<?php echo base_url() . '/uploads/' . $k['image'] ?>" class="img-fluid ">
                        <div class="card-body p-1 h-25">
                            <a href="<?php echo base_url('index.php/donasi/show_program_donasi/' . $k['kategori_id']); ?>">
                                <h5 class="card-title mb-1"><?php echo $k['kategori'] ?></h5>
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>