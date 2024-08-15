<!-- Footer -->

<footer class="footer">
    <div class="footer_background" style="background-image:url(<?= base_url() ?>front-end/images/footer_background.png)"></div>
    <div class="container">
        <div class="row footer_row">
            <div class="col">
                <div class="footer_content">
                    <div class="row">

                        <div class="col-lg-3 footer_col">

                            <!-- Footer About -->
                            <div class="footer_section footer_about">
                                <div class="footer_logo_container">
                                    <a href="#">
                                        <div class="judul ">Rumah<span class="footer_logo_text">Harapan</span></div>
                                    </a>
                                </div>
                                <div class="footer_about_text">
                                    <p>Ikuti kami di media sosial untuk update berita tentang kami</p>
                                </div>
                                <div class="footer_social">
                                    <ul>
                                        <li><a href="http://twitter.com/"><i class="fa-2x fab fa-twitter"></i></a></li>
                                        <li><a href="http://youtube.com/"><i class="fa-2x fab fa-youtube text-danger" aria-hidden="true"></i></a></li>
                                        <li><a href="http://facebook.com/"><i class="fa-2x fab fa-facebook text-primary" aria-hidden="true"></i></a></li>
                                        <li><a href="http://instagram.com/"><i class="fa-2x fab fa-instagram text-danger" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 footer_col">

                            <!-- Footer Contact -->
                            <div class="footer_section footer_contact">
                                <div class="footer_title">Kontak</div>
                                <div class="footer_contact_info">
                                    <ul>
                                        <li>Email: 12220115@bsi.ac.id</li>
                                        <li>Phone: 083824607469</li>
                                        <li>Jl. Panatayuda I No. 15, Nagasari, Kec.Karawang Barat.,Karawang</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 footer_col">
                            <div class="footer_section footer_about">
                                <div class="footer_logo_container">
                                    <h2 class="text-white">Kami bekerjasama dengan :</h2><br>
                                    <img src="<?= base_url() ?>assets/img/bni.png">
                                    <img class="ml-3" src="<?= base_url() ?>assets/img/BCA.png">
                                    <img class="ml-3" src="<?= base_url() ?>assets/img/bri.png">
                                    <img class="ml-3" src="<?= base_url() ?>assets/img/mandiri.png">
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-3 footer_col clearfix">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<script src="<?= base_url() ?>front-end/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() ?>front-end/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url() ?>front-end/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url() ?>front-end/plugins/greensock/TweenMax.min.js"></script>
<script src="<?= base_url() ?>front-end/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?= base_url() ?>front-end/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?= base_url() ?>front-end/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?= base_url() ?>front-end/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?= base_url() ?>front-end/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url() ?>front-end/plugins/easing/easing.js"></script>
<script src="<?= base_url() ?>front-end/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?= base_url() ?>front-end/plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="<?= base_url() ?>front-end/js/courses.js"></script>
<script src="<?= base_url() ?>front-end/js/blog_single.js"></script>
<script src="<?= base_url() ?>front-end/js/custom.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>


</body>

</html>