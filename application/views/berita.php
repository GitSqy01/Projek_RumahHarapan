<div class="courses">
    <div class="container" style="margin-top: 90px;">
        <div class="row">

            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="courses_search_container">
                    <h2>Berita Harapan</h2>
                </div>
                <div class="courses_container">
                    <div class="row courses_row">

                        <!-- berita -->
                        <?php foreach ($berita as $b) { ?>

                            <div class="col-lg-6 course_col">
                                <div class="course">
                                    <div class="course_image"><img src="<?= base_url() . '/uploads/' . $b->image ?>" height="170px" width="100%"></div>
                                    <div class="course_body">
                                        <h3 class="course_title"><a href="<?= base_url('index.php/berita/detail_berita/' . $b->id) ?>"><?= substr(strip_tags($b->judul), 0, 24) ?>...</a></h3>
                                        <div class="course_text">
                                            <p><?= substr(strip_tags($b->deskripsi), 0, 100) ?>...</p>
                                        </div>
                                    </div>
                                    <div class="course_footer">
                                        <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                            <div class="course_info">
                                                <i class="fa fa-clock" aria-hidden="true"></i>
                                                <span><?php echo $b->tgl_posting ?></span>
                                            </div>
                                            <div class="course_info">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <?php echo $b->penulis ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                    <div class="row pagination_row">
                        <div class="col">

                            <?php
                            if (isset($paginasi)) {
                                echo $paginasi;
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Courses Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">



                    <!-- Latest Course -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Berta Terkini</div>
                        <div class="sidebar_latest">



                            <!-- Latest berita -->
                            <?php foreach ($latest_berita as $lb) { ?>

                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image">
                                        <div><img src="<?= base_url() . '/uploads/' . $lb->image ?>" alt=""></div>
                                    </div>
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="<?= base_url('index.php/berita/detail_berita/' . $lb->id) ?>"><?= $lb->judul ?></a></div>
                                        <div class="latest_price"><?php echo $lb->tgl_posting ?></div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
</div>