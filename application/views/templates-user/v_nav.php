 <!-- Header Content -->
 <div class="header_container">
     <div class="container">
         <div class="row">
             <div class="col">
                 <div class="header_content d-flex flex-row align-items-center justify-content-start">
                     <div class="logo_container">
                         <a href="#">
                             <div class="logo_text judul ">
                                 <img src="<?= base_url() ?>assets/img/logo.png" alt="logo">Rumah<span>Harapan</span>
                             </div>
                         </a>
                     </div>
                     <nav class="main_nav_contaner ml-auto">
                         <ul class="main_nav">
                             <li <?= $this->uri->segment(1) == 'home' ? 'class="active text-info"' : ''  ?> class="nav-item ">
                                 <?php echo anchor('home', 'Beranda') ?>
                             </li>
                             <li <?= $this->uri->segment(1) == 'tentang' ? 'class="active text-info"' : ''  ?> class="nav-item ">
                                 <?php echo anchor('tentang', 'Tentang Kami') ?>
                             </li>
                             <li <?= $this->uri->segment(1) == 'gallery' ? 'class="active text-info"' : '' ?> class="nav-item">
                                 <?php echo anchor('gallery', 'Galeri') ?>
                             </li>
                             <li <?= $this->uri->segment(1) == 'berita' ? 'class="active text-info"' : '' ?> class="nav-item">
                                 <?php echo anchor('berita/berita', 'Berita') ?>
                             </li>

                             <li <?= $this->uri->segment(1) == 'donasiku' ? 'class="active text-info"' : '' ?> class="nav-item">
                                 <?php echo anchor('donasiku', 'Myprofile') ?>
                             </li>
                         </ul>


                         <!-- Hamburger -->


                         <div class="hamburger menu_mm">
                             <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                         </div>
                     </nav>

                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Header Search Panel -->
 <div class="header_search_container">
     <div class="container">
         <div class="row">
             <div class="col">
                 <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                     <form action="#" class="header_search_form">
                         <input type="search" class="search_input" placeholder="Search" required="required">
                         <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                             <i class="fa fa-search" aria-hidden="true"></i>
                         </button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </header>

 <!-- Menu -->

 <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
     <div class="menu_close_container">
         <div class="menu_close">
             <div></div>
             <div></div>
         </div>
     </div>

     <nav class="menu_nav">
         <ul class="menu_mm">
             <li class="menu_mm"><a href="index.html">Beranda</a></li>
             <li class="menu_mm"><a href="#">Tentang</a></li>
             <li class="menu_mm"><a href="#">Donasi</a></li>
             <li class="menu_mm"><a href="#">Galeri</a></li>
             <li class="menu_mm"><a href="#">Acara</a></li>
             <li class="menu_mm"><a href="contact.html">Kontak</a></li>
         </ul>
     </nav>
 </div>