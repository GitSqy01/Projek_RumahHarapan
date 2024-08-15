<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pembayaran Donasi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Nama</th>
                                <th>Judul Donasi</th>
                                <th>Jumlah Donasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($transaksi as $t) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $t['transaksi_id']; ?></td>
                                    <td><?= $t['nama']; ?></td>
                                    <td><?= $t['judul']; ?></td>
                                    <td><?= $t['jumlah_donasi']; ?></td>

                                </tr>
                            <?php } ?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="container d-flex justify-content-center align-items-center">
                <form action="<?= base_url('index.php/admin/transaksi/pembayaran'); ?>" method="post">
                    <button type="submit" class="btn btn-primary">Refresh Halaman</button>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->