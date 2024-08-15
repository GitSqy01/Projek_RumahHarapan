<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi Donasi</h1>
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
                                <th>Tanggal Transaksi</th>
                                <th>ID User</th>
                                <th>ID Donasi</th>
                                <th>Jumlah Donasi</th>
                                <th>Bank</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($transaksi as $t) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $t['id_transaksi']; ?></td>
                                    <td><?= $t['tgl_donasi']; ?></td>
                                    <td><?= $t['user_id']; ?></td>
                                    <td><?= $t['donasi_id']; ?></td>
                                    <td><?= $t['jumlah_donasi']; ?></td>
                                    <td><?= $t['bank_id']; ?></td>
                                    <td><?= $t['status']; ?></td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="container d-flex justify-content-center align-items-center">
                <form action="<?= base_url('index.php/admin/transaksi'); ?>" method="post">
                    <button type="submit" class="btn btn-primary">Refresh Halaman</button>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->