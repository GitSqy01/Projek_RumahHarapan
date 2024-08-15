<div class="samadiv">
    <div class="container" style="margin-top:150px;">
        <div class="row">
            <div class="box">
                <div class="text">Harapan Kami Akan Kehidupan</div><br>
                <p class="textbae">Tidak ada yang membuat kami lebih bahagia selain menatap matamu dengan penuh kebahagiaan.
                    Jangan biarkan tubuhmu merasa sakit, jiwamu lelah, dan hatimu penuh dengan keputus asaan.
                    Ayo bangkit! kamu pasti bisa, kami akan selalu berdoa agar kamu bisa membaik dalam waktu dekat dan menggapai cita-citamu.
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="tim">
    <div class="container">
        <div class="text_sub mb-4"> Gallery </div>
        <div class="row">


            <?php foreach ($galeri as $g) : ?>
                <div class="col-lg-4 col-md-6 tim_col">

                    <div>
                        <div class="galeri"><img src="<?= base_url() . '/uploads/' . $g->image_1 ?>"> </div>
                        <h4><a href="<?php echo base_url('index.php/gallery/detail/' . $g->id); ?>"><?php echo $g->judul ?></h4></a>


                    </div><br>




                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>