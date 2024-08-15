<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style type="text/css">
    .table-data {
        width: 100%;
        border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
        border: 1px solid black;
        font-size: 11pt;
        font-family: Verdana;
        padding: 10px;
    }

    .table-data th {
        background-color: grey;
    }

    h3 {
        font-family: Verdana;
        text-align: center;
    }
</style>
<h3>Laporan Data Transaksi Donasi Yayasan Rumah Harapan</h3>
<br />
<table class="table-data" border="1">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Transaksi</th>
            <th scope="col">Nama User</th>
            <th scope="col">Judul Donasi</th>
            <th scope="col">Jumlah Donasi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $genap = "#CCCCCC";
        $ganjil = "#FFFFFF";
        $no = 1;
        foreach ($transaksi as $t) {
            if ($no % 2 == 0) {
                $warna = $genap;
            } else {
                $warna = $ganjil;
            }
            echo "<tr bgcolor = '$warna'>";
        ?>
            <td scope="row"><?= $no++; ?></td>
            <td><?= $t['transaksi_id']; ?></td>
            <td><?= $t['nama']; ?></td>
            <td><?= $t['judul']; ?></td>
            <td><?= $t['jumlah_donasi']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
    <?php
    $tglcetak = date('Y-m-d');
    echo "<br>";
    echo "<div align='right'> Tanggal Cetak : $tglcetak</div>";
    ?>
</table>