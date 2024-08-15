<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->
            <div class="top_bar">
                <div class="top_bar_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                    <ul class="top_bar_contact_list">
                                        <li>
                                            <div class="question">ingin bertanya sesuatu?</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <a href="https://wa.me/083824607459">
                                                083824607459
                                            </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <a href="mailto: 12220115@bsi.ac.id">
                                                12220115@bsi.ac.id
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="top_bar_login ml-auto">
                                        <?php if ($this->session->userdata('nama')) { ?>
                                            <div class="row">

                                                <div class="h3 text-white mr-4">Selamat Datang <?php echo $this->session->userdata('nama')  ?></div>



                                                <div class="login_button"><?php echo anchor('auth/logout',  'LOGOUT'); ?></div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="login_button"><?php echo anchor('auth/login',  'LOGIN'); ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>