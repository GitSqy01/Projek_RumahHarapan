<!-- Home -->

<div class="homes">
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">

            <!-- Home Slider Item -->
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url(<?= base_url() ?>front-end/images/rumahharapan.jpg)"></div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="text_slider1">Mari tanamkan rasa keperdulian terhadap sesama bersama kami</div>
                                <div class="home_slider_subtitle">Sistem donasi digital terpercaya</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Home Slider Item -->
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url(<?= base_url() ?>front-end/images/donasi.jpeg)"></div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="text_slider2">Ada banyak pilihan program donasi yang bisa diambil yang insyaallah disalurkan</div>
                                <div class="home_slider_subtitle">Tepat & Amanah</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Home Slider Item -->
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url(<?= base_url() ?>front-end/images/donasi2.jpeg)"></div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="text_slider3">Jangan ragu & jangan bimbang untuk beramal, karena kami</div>
                                <div class="home_slider_subtitle">Gak ribet , kapan saja , dan dimana saja</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Home Slider Nav -->

    <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
    <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
</div>

<!-- Popular donasi -->

<div class="courses">
    <div class="section_background parallax-window" data-parallax="scroll" data-image-src="front-end/images/courses_background.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Program donasi terbaru</h2>
                    <div class="section_subtitle">
                        <p>Beberapa program donasi yang baru kami tampilkan </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center mt-3 ml-5 px-2">


            <?php foreach ($latest_program as $lts) : ?>
                <div class="card ml-5 mb-2 " style="width: 16rem;">
                    <img src="<?php echo base_url() . '/uploads/' . $lts->image ?>" class="img-fluid " alt="...">
                    <div class="card-body p-1 h-25">
                        <h5 class="card-title mb-1"><?php echo $lts->judul ?></h5>
                        <span class="mb-2 badge rounded-pill bg-info text-dark">Target = Rp. <?php echo number_format($lts->dana_dibutuhkan, 0, ',', '.') ?></span><br>
                        <div class="progress bg-dark">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-succes" style="width: <?php echo ($lts->dana_terkumpul / $lts->dana_dibutuhkan) * 100; ?>%;"><?php echo ($lts->dana_terkumpul / $lts->dana_dibutuhkan) * 100; ?>%</div>
                        </div><br>
                        <?php
                        if ($lts->dana_terkumpul == $lts->dana_dibutuhkan) {
                            echo "<i class='disabled btn btn-outline-primary fas fw fa-hourglass'>Sudah target</i>";
                        } else {
                            echo "<a class='btn btn-sm btn-primary' href='" . base_url('index.php/inti/form_donasi/' . $lts->donasi_id) . "'>Donasi</a>";
                        }
                        ?>

                        <?php echo anchor('inti/detail/' . $lts->donasi_id, '<div class="btn btn-sm btn-warning">Detail</div>') ?>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="courses_button trans_200"><a href="<?php echo base_url('index.php/donasi') ?>">lihat semua program</a></div>
        </div>
    </div>
    <br>
    <!-- Berita terkini -->

    <div class="courses">
        <div class="section_background parallax-window" data-parallax="scroll" data-image-src="front-end/images/courses_background.jpg" data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Berita terkini</h2>
                    </div>
                </div>
            </div>

            <div class="row text-center mt-3 ml-5 pl-3 px-2">


                <?php foreach ($latest_berita as $lb) : ?>
                    <div class="card ml-5 mb-2 " style="width: 12rem;">
                        <img src="<?php echo base_url() . '/uploads/' . $lb->image ?>" class="img-fluid " alt="...">
                        <div class="card-body p-1 h-25">
                            <h5 class="course_title"><a href="<?= base_url('index.php/berita/detail_berita/' . $lb->id) ?>"><?php echo $lb->judul ?></a></h5>
                        </div>
                        <div class="course_text">
                            <p><?= substr(strip_tags($lb->deskripsi), 0, 100) ?>...</p>
                        </div>
                        <div class="course_footer">
                            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                <div class="course_info">
                                    <i class="fa fa-clock" aria-hidden="true"></i>
                                    <span><?php echo $lb->tgl_posting ?></span>
                                </div>

                            </div>
                        </div>
                    </div>


                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <!-- Komentar -->
    <div class="container">
        <div class="comments_title"><span><?php echo $count; ?></span> Komentar</div>
        <ul class="comments_list">
            <?php foreach ($komentar as $c) { ?>
                <li>
                    <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                        <div class="comment_content">
                            <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                <div class="comment_author"><?= $c['nama']; ?></div>
                                <div class="comment_time ml-auto"><?= $c['tgl_komentar']; ?></div>
                            </div>
                            <div class="comment_text">
                                <p><?= $c['komentar']; ?></p>
                            </div>
                            <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                <form action="<?= base_url('index.php/home/like_comment/' . $c['id']); ?>" method="post">
                                    <button type="submit"><i class="fa fa-thumbs-up"></i></button>
                                </form>
                                <span class="ml-1 mr-1"> <?= $c['likes']; ?></span>
                                <!-- <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div> -->
                                <!-- <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div> -->
                                <!-- Tampilkan tombol untuk menampilkan/menyembunyikan formulir balasan -->
                                <button class="toggle-reply-form ml-2">Balas</button>
                                <!-- Form untuk balasan -->
                                <form class="reply-form" action="<?= site_url('komentar/add_reply'); ?>" method="post" style="display: none;">
                                    <div class="row ml-3">
                                        <input type="hidden" name="parent_comment_id" value="<?= $c['id']; ?>">
                                        <?php if ($this->session->userdata('role_id') != '2') : ?>
                                            <input type="text" id="nama" name="nama" value="" required="required"><br>
                                        <?php else : ?>
                                            <input type="text" id="nama" name="nama" value="<?= $user['email']; ?>"><br>
                                        <?php endif; ?>

                                        <textarea class="counter_input counter_text_input" name="komentar" placeholder="Tulis balasan Anda"></textarea><br>
                                        <input type="submit" value="Kirim Balasan">
                                    </div>
                                </form>


                                <button class="toggle-reply-form ml-3">Balasan</button>
                                <?php $num_replies = $this->ModelKomentar->count_replies($c['id']); ?>
                                <?php if ($num_replies > 0) : ?>
                                    (<?= $num_replies; ?> balasan)
                                <?php endif; ?>

                                <!-- Daftar balasan -->
                                <ul class="replies" style="display: none;">
                                    <?php $replies = $this->ModelKomentar->get_replies($c['id']); ?>
                                    <?php foreach ($replies as $c) : ?>
                                        <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                            <div class="comment_content">
                                                <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                    <div class="comment_author"><?= $c['nama']; ?></div>
                                                    <div class="comment_time ml-auto"><?= $c['tgl_komentar']; ?></div>
                                                </div>
                                                <div class="comment_text">
                                                    <p><?= $c['komentar']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </ul>



                            </div>
                        </div>
                    </div>

                </li>
            <?php } ?>
        </ul>
    </div>
    <hr>
    <div class="comments_container">
        <div class="counter">
            <div class="counter_background" style="background-image:url(<?= base_url() ?>front-end/images/donasi2.jpeg)"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="counter_content">
                            <h2 class="counter_title">KOMENTAR</h2>
                            <div class="counter_text">
                                <p>Untuk perbaikan pada sistem kami silahkan tinggalkan pesan atau bila anda memiliki pertanyaan silahkan tulis pada kolom komentar</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="counter_form">
                    <div class="row fill_height">
                        <div class="col fill_height">
                            <form class="counter_form_content d-flex flex-column align-items-center justify-content-center" method="post" action="<?= base_url('index.php/komentar/add_comment'); ?>">
                                <div class="counter_form_title">Masukan pesan disini</div>
                                <?php if ($this->session->userdata('role_id') != '2') : ?>
                                    <input type="text" id="nama" name="nama" value="" class="form-control text-dark" required="required"><br>
                                <?php else : ?>
                                    <input type="text" id="nama" name="nama" value="<?= $user['email']; ?>" class="form-control text-dark"><br>
                                <?php endif; ?>
                                <textarea class="counter_input counter_text_input" id="komentar" name="komentar" placeholder="Tulis sesuatu disini" required="required"></textarea>
                                <button type="submit" class="counter_form_button">submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    // Tampilkan atau sembunyikan formulir balasan saat tombol diklik
    document.querySelectorAll('.toggle-reply-form').forEach(button => {
        button.addEventListener('click', () => {
            const replyForm = button.nextElementSibling;
            if (replyForm.style.display === 'none') {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        });
    });
</script>