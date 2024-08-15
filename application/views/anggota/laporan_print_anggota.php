<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data User</title>
</head>

<body>
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
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>Laporan Data User Yayasan Rumah Harapan</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No.HP</th>
                <th>Mendaftar Sejak</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $genap = "#CCCCCC";
            $ganjil = "#FFFFFF";
            $no = 1;
            foreach ($anggota as $a) {
                if ($no % 2 == 0) {
                    $warna = $genap;
                } else {
                    $warna = $ganjil;
                }
                echo "<tr bgcolor = '$warna'>";
            ?>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $a['nik']; ?></td>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['jk']; ?></td>
                <td><?= $a['email']; ?></td>
                <td><?= $a['nohp']; ?></td>
                <td><?= date('d F Y', $a['tgl_input']); ?></td>
                <td>
                    <picture>
                        <source srcset="" type="image/svg+xml">
                        <img src="<?= base_url('assets/img/profile/') . $a['image']; ?>" class="img-fluid img-thumbnail" alt="..." style="width:70px;height:80px;">
                    </picture>
                </td>
                </tr>
            <?php } ?>
        </tbody>
        <?php
        $tglcetak = date('Y-m-d');
        echo "<br>";
        echo "<div align='right'> Tanggal Cetak : $tglcetak</div>";
        ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>