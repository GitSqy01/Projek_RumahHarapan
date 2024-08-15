<div class="samadiv">
    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <!-- Blog -->

            <div class="blog">
                <div class="container">
                    <div class="row">

                        <!-- Blog Content -->
                        <div class="col-lg-8">
                            <div class="blog_content">
                                <div class="blog_title"><?= $berita->judul ?></div>
                                <div class="blog_meta">
                                    <ul>
                                        <li>Post on <a href="#"><?= $berita->tgl_posting ?></a></li>
                                        <li>By <a href="#"><?= $berita->penulis ?></a></li>
                                    </ul>
                                </div>
                                <div class="blog_image"><img src="images/blog_single.jpg" alt=""></div>
                                <p><?= $berita->deskripsi ?></p>
                                <div class="blog_quote d-flex flex-row align-items-center justify-content-start">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                    <div>“<?= $berita->deskripsi2 ?>”</div>
                                </div>
                                <p><?= $berita->deskripsi3 ?></p>
                                <div class="blog_images">
                                    <div class="row">
                                        <div class="col-lg-6 blog_images_col">
                                            <div class="blog_image_small"><img src="<?= base_url() . '/uploads/' . $berita->image ?>" alt=""></div>
                                        </div>
                                        <div class="col-lg-6 blog_images_col">
                                            <div class="blog_image_small"><img src="images/blog_images_2.jpg" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                                <p><?= $berita->deskripsi4 ?></p>
                            </div>

                            <!-- Comments -->
                            <div class="comments_container">

                            </div>
                        </div>

                        <!-- Blog Sidebar -->
                        <div class="col-lg-4">
                            <div class="sidebar">



                                <!-- Latest News -->
                                <div class="sidebar_section">
                                    <div class="sidebar_section_title">Berita Terkini</div>
                                    <div class="sidebar_latest">

                                        <!-- Latest news -->
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
        </div>
    </div>
</div>