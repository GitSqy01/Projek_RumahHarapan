<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner font-weight-bold text-white">
                            <h4>Jumlah User</h4>
                            <h1><b><?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <a href="<?= base_url('index.php/admin/user/anggota'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner font-weight-bold text-white">
                            <h4>Program Donasi</h4>
                            <h1><b><?= $this->ModelDonasi->getDonasi()->num_rows(); ?></b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-desktop text-white"></i>
                        </div>
                        <a href="<?= base_url('index.php/admin/donasi'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner font-weight-bold text-white">
                            <h4>Total Dana</h4>
                            <h1><b>Rp.<?php echo number_format($total_dana); ?></b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-receipt text-white"></i>
                        </div>
                        <a href="<?= base_url('index.php/admin/transaksi/pembayaran'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner font-weight-bold text-white">
                            <h4>Donasi Berhasil</h4>
                            <h1><b><?= $this->ModelTransaksi->getDetailTransaksi()->num_rows(); ?></b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                        <a href="<?= base_url('index.php/admin/transaksi/'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <hr>
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg connectedSortable">
                    <div class="col-md-0 mx-auto">
                        <!-- USERS LIST -->
                        <div class="card col-lg">
                            <div class="card-header">
                                <h2 class="card-title"><b>Daftar User</b></h2>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table id="table-datatable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aktif</th>
                                            <th>Mendaftar Sejak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($anggota as $a) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $a['nama']; ?></td>
                                                <td><?= $a['email']; ?></td>
                                                <td><?php
                                                    foreach ($role as $r) {
                                                        if ($a['role_id'] == $r['role_id']) {
                                                            echo $r['role'];
                                                        }
                                                    }
                                                    ?></td>
                                                <td><?= $a['is_aktive']; ?></td>
                                                <td><?= date('d-m-Y', $a['tgl_input']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="<?= base_url('index.php/admin/user/anggota'); ?>">See All User</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </section>
                <!-- /.col -->
                <!-- Right col -->
                <section class="col-lg connectedSortable">
                    <div class="col-md-0 mx-auto">
                        <!-- DIRECT CHAT -->
                        <div class="card col-lg">
                            <div class="card-header">
                                <h2 class="card-title"><b>Komentar</b></h2>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" title="Live In Home" data-widget="chat-pane-toggle">
                                        <a href="<?= base_url('#'); ?>"><i class="fas fa-comments"></i></a>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
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
                                                        <form action="<?= base_url('index.php/admin/admin/like_comment/' . $c['id']); ?>" method="post">
                                                            <button type="submit"><i class="fa fa-thumbs-up"></i></button>
                                                        </form>
                                                        <span class="ml-1 mr-1"> <?= $c['likes']; ?></span>
                                                        <!-- <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div> -->
                                                        <!-- <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div> -->
                                                        <!-- Tampilkan tombol untuk menampilkan/menyembunyikan formulir balasan -->
                                                        <button class="toggle-reply-form ml-2">Balas</button>
                                                        <!-- Form untuk balasan -->
                                                        <form class="reply-form" action="<?= site_url('admin/admin/add_reply'); ?>" method="post" style="display: none;">
                                                            <div class="row ml-3">
                                                                <input type="hidden" name="parent_comment_id" value="<?= $c['id']; ?>">
                                                                <?php if ($this->session->userdata('role_id') != '2' && 1 != '1') : ?>
                                                                    <input type="text" id="nama" name="nama" value="" required="required"><br>
                                                                <?php else : ?>
                                                                    <input type="text" id="nama" name="nama" value="<?= $user['nama']; ?>"><br>
                                                                <?php endif; ?>

                                                                <textarea class="counter_input counter_text_input" name="komentar" placeholder="Tulis balasan Anda"></textarea><br>
                                                                <input type="submit" value="Kirim Balasan">
                                                            </div>
                                                        </form>

                                                        <form action="<?= base_url('index.php/admin/admin/hapus_comment/' . $c['id']); ?>" method="post">
                                                            <button class="ml-2" type="submit">Hapus</button>
                                                        </form>



                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    <?php } ?>
                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </section>
                <hr>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



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