<div class="samadiv">
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <h1>Konfirmasi Donasi</h1>
        </div>
        <center>
            <div class="mt-3 mb-3">
                <h2>Langkah-langkah donasi</h2>
                <H4>1. Membaca niat donasi</H4>
                <H4>2. lakukan pembayaran</H4>
                <H4>3. Jika sudah melakukan pembayaran klik tombol "Sudah Donasi"</H4>

            </div>
            <a href="<?= base_url('index.php/inti/donasi_berhasil/' . $transaksi['id_transaksi']); ?>" class="btn btn-success mr-3">Sudah Donasi</a>
            <a href="<?= base_url('index.php/inti/donasi_batal/' . $transaksi['id_transaksi']); ?>" class="btn btn-danger">Batal</a>
    </div>
    </center>
</div>