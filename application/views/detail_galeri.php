<div class="samadiv">
    <div class="container" style="margin-top: 150px;">
        <div class="text_sub mb-4"> Gallery </div>
        <div class="row text-center">

            <?php foreach ($galeri as $g) : ?>

                <div class="galeri"><img src="<?= base_url() . '/uploads/' . $g->image_1 ?>">
                    <div style="font-weight: 500;"><?php echo $g->text_1 ?> </div>
                    <div class="galeri"><img src="<?= base_url() . '/uploads/' . $g->image_2 ?>"> </div>
                    <div class="galeri"><img src="<?= base_url() . '/uploads/' . $g->image_3 ?>"> </div>
                    <div style="font-weight: 500;"><?php echo $g->text_2 ?> </div>


                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>