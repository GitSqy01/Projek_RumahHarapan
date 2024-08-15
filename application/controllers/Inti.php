<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }



    public function detail($donasi_id)
    {
        $data['judul'] = 'detail program';
        $data['isi'] = 'detail_program';
        $data['program'] = $this->ModelProgram->detail_program($donasi_id);

        $this->load->view('templates-user/wrapper', $data);
    }

    public function kategori()
    {
        $data['judul'] = 'kategori';
        $data['isi'] = 'kategori';
        $data['kategori'] = $this->ModelKategori->tampil_data()->result();

        $this->load->view('templates-user/wrapper', $data);
    }

    public function komentar()
    {
        $data['komentar'] = $this->model_komentar->get_comments();
        $this->load->view('templates-user/wrapper', $data);
    }
    public function tambah_komentar()
    {
        $this->form_validation->set_rules('nama', ' Nama', 'required', [
            'required' => 'Komentar harap isi ya!',
        ]);

        $this->form_validation->set_rules('komentar', ' Komentar', 'required', [
            'required' => 'Komentar harap isi ya!',
        ]);

        if ($this->form_validation->run() == false) {
            redirect('home');
        } else {
            $data = array(
                'id' => '',
                'nama' => $this->input->post('nama'),
                'komentar' => $this->input->post('komentar'),
                'tgl_komentar' => time()
            );

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Komentar berhasil terkirim </div>');
            redirect('Home');
        }
    }

    public function form_donasi($donasi_id)
    {
        $data['judul'] = 'pembayaran';
        $data['isi'] = 'form_donasi';
        $data['bank'] = $this->ModelBank->tampil_data();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['program'] = $this->ModelProgram->detail_program($donasi_id);
        $data['programs'] = $this->ModelProgram->tampil_data();
        $data['donasi'] = $this->ModelProgram->get_donasi_by_id($donasi_id);



        $this->load->view('templates-user/wrapper', $data);
    }

    public function proses_donasi()
    {
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelUser'); // Jika Anda perlu mengambil user_id

        // Validasi input dari formulir
        $this->form_validation->set_rules('user_id', 'Nama Donatur', 'trim|required');
        $this->form_validation->set_rules('bank_id', 'Bank', 'required');
        $this->form_validation->set_rules('donasi_id', 'Program Donasi', 'required');
        $this->form_validation->set_rules('jumlah_donasi', 'Jumlah Donasi', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali formulir dengan pesan error
            redirect('inti/form_donasi');
        } else {
            // Ambil user_id (sesuaikan dengan cara Anda mengelola sesi pengguna)
            // $user_id = $this->ModelUser->getUserById($id); // Contoh

            $data_transaksi = array(
                'user_id' =>  $this->input->post('user_id'), // ID pengguna dari sesi
                'donasi_id' => $this->input->post('donasi_id'),
                'bank_id' => $this->input->post('bank_id'),
                'jumlah_donasi' => $this->input->post('jumlah_donasi'),
                'tgl_donasi' => time(),
                'status' => 'Pending' // Status awal transaksi
            );

            $id_transaksi = $this->ModelTransaksi->insert_transaksi($data_transaksi);

            // Redirect ke halaman konfirmasi dengan mengirimkan ID transaksi

            redirect('inti/konfirmasi/' . $id_transaksi);
        }
    }

    public function konfirmasi($id_transaksi)
    {
        $data['judul'] = 'pembayaran';
        $data['isi'] = 'konfirmasi';
        $data['bank'] = $this->ModelBank->tampil_data();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['programs'] = $this->ModelProgram->tampil_data();
        $data['transaksi'] = $this->ModelProgram->get_transaksi_by_id($id_transaksi);



        $this->load->view('templates-user/wrapper', $data);
    }


    public function donasi_berhasil($transaksi_id)
    {
        // Update status transaksi menjadi 'berhasil'
        $this->ModelProgram->update_status_transaksi($transaksi_id, 'Sukses');

        // Simpan data ke detail_transaksi (ambil data dari tabel transaksi)
        $transaksi = $this->ModelProgram->get_transaksi_by_id($transaksi_id);
        // Update dana terkumpul
        $this->ModelProgram->update_dana_terkumpul($transaksi['donasi_id'], $transaksi['jumlah_donasi']);

        $data_detail_transaksi = array(
            'transaksi_id' => $transaksi_id,
            'nama' => $this->session->userdata('nama'),
            'judul' => $transaksi['judul_donasi'], // Ambil dari tabel transaksi
            'jumlah_donasi' => $transaksi['jumlah_donasi'] // Ambil dari tabel transaksi
        );
        $this->ModelTransaksi->insert_detail_transaksi($data_detail_transaksi);

        redirect('inti/sukses');
        // Redirect atau tampilkan pesan sukses
        // ...
    }

    public function donasi_batal($transaksi_id)
    {
        // Update status transaksi menjadi 'batal'
        $this->ModelProgram->update_status_transaksi($transaksi_id, 'Gagal');
        redirect('home');

        // Redirect atau tampilkan pesan
        // ...
    }

    public function sukses()
    {
        $data['judul'] = 'sukses';
        $this->load->view('donasi_sukses');
    }
}
