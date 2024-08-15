<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        cek_login();
        cek_user();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/autentifikasi/login');
        }
    }

    //Manajemen Donasi
    public function index()
    {
        $data['judul'] = 'Data Program Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->ModelDonasi->getDonasi()->result_array();
        $data['kategori'] = $this->ModelDonasi->getKategori()->result_array();

        $this->form_validation->set_rules('donasi_id', 'Donasi Id', 'required|max_length[7]|min_length[7]', [
            'required' => 'id Donasi Harus Diisi !!',
            'min_length' => 'id Donasi Terlalu Pendek !!',
            'max_length' => 'id Donasi Terlalu banyak !!'
        ]);
        $this->form_validation->set_rules('judul', 'Judul Donasi', 'required|min_length[3]', [
            'required' => 'Judul Donasi Harus Diisi !!',
            'min_length' => 'Judul Donasi Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('kategori_id', 'Kategori Donasi', 'required', [
            'required' => 'Pilih Kategori Yang Sesuai !!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]', [
            'required' => 'Alamat Harus Diisi !!',
            'min_length' => 'Alamat Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Donasi', 'required|min_length[3]', [
            'required' => 'Deskripsi Harus Diisi !!',
            'min_length' => 'Deskripsi Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('dana_dibutuhkan', 'Dana Yang Dibutuhkan', 'required|min_length[3]|numeric', [
            'required' => 'Dana Dibutuhkan Harus Diisi !!',
            'min_length' => 'Dana Dibutuhkan Terlalu Pendek !!',
            'numeric' => 'Yang Anda Masukan Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('dana_terkumpul', 'Dana Yang Terkumpul', 'required|numeric', [
            'required' => 'Dana Terkumpul Harus Diisi !!',
            'min_length' => 'Dana Terkumpul Terlalu Pendek !!',
            'numeric' => 'Yang Anda Masukan Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Harus Diisi !!'
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'donasi_id' => $this->input->post('donasi_id', true),
                'judul' => $this->input->post('judul', true),
                'kategori_id' => $this->input->post('kategori_id', true),
                'alamat' => $this->input->post('alamat', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'dana_dibutuhkan' => $this->input->post('dana_dibutuhkan', true),
                'dana_terkumpul' => $this->input->post('dana_terkumpul', true),
                'status' => $this->input->post('status', true),
                'image' => $gambar
            ];

            $this->ModelDonasi->simpanDonasi($data);
            redirect('admin/donasi');
        }
    }

    public function hapusDonasi()
    {
        $where = ['donasi_id' => $this->uri->segment(4)];
        $this->ModelDonasi->hapusDonasi($where);
        redirect('admin/donasi');
    }

    public function ubahDonasi()
    {
        $data['judul'] = 'Ubah Data Program Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->ModelDonasi->donasiWhere(['donasi_id' => $this->uri->segment(4)])->result_array();
        $kategori = $this->ModelDonasi->joinKategoriDonasi(['donasi_id' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['kategori_id'];
            $data['k'] = $k['kategori'];
        }
        $data['kategori'] = $this->ModelDonasi->getKategori()->result_array();

        $this->form_validation->set_rules('donasi_id', 'Donasi Id', 'required|max_length[7]|min_length[7]', [
            'required' => 'Id Donasi Harus Diisi !!',
            'min_length' => 'id Donasi Terlalu Pendek !!',
            'max_length' => 'id Donasi Terlalu banyak !!'
        ]);
        $this->form_validation->set_rules('judul', 'Judul Donasi', 'required|min_length[3]', [
            'required' => 'Judul Donasi Harus Diisi !!',
            'min_length' => 'Judul Donasi Anda Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required', [
            'required' => 'Pilih Kategori Yang Sesuai !!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat ', 'required|min_length[3]', [
            'required' => 'Alamat Harus Diisi !! ',
            'min_length' => 'Alamat Anda Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[3]', [
            'required' => 'Deskripsi Harus Diisi !!',
            'min_length' => 'Deskripsi Anda Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('dana_dibutuhkan', 'Dana Yang Dibutuhkan', 'required|min_length[3]|numeric', [
            'required' => 'Jumlah Dana Harus Diisi !!',
            'min_length' => 'Jumlah Dana Anda Terlalu Pendek !!',
            'numeric' => 'Yang Anda Masukan Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('dana_terkumpul', 'Dana Yang Terkumpul', 'required|numeric', [
            'required' => 'Jumlah Dana Harus Diisi !!',
            'numeric' => 'Yang Anda Masukan Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Harus Diisi !!'
        ]);

        //Konfigurasi Sebelum Gambar Diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //Memuat atau Memanggil Library Upload
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/ubah_donasi', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }

            $data = [
                'donasi_id' => $this->input->post('donasi_id', true),
                'judul' => $this->input->post('judul', true),
                'kategori_id' => $this->input->post('kategori_id', true),
                'alamat' => $this->input->post('alamat', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'dana_dibutuhkan' => $this->input->post('dana_dibutuhkan', true),
                'dana_terkumpul' => $this->input->post('dana_terkumpul', true),
                'status' => $this->input->post('status', true),
                'image' => $gambar
            ];

            $this->ModelDonasi->updateDonasi($data, ['donasi_id' => $this->input->post('donasi_id')]);
            redirect('admin/donasi');
        }
    }

    //Manajemen Kategori
    public function kategori()
    {
        $data['judul'] = 'Kategori Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelDonasi->getKategori()->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Judul Donasi Harus Diisi !!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori' => $this->input->post('kategori', true)
            ];

            $this->ModelDonasi->simpanKategori($data);
            redirect('admin/donasi/kategori');
        }
    }

    public function ubahKategori()
    {
        $data['judul'] = 'Ubah Data Kategori';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelDonasi->kategoriWhere(['kategori_id' => $this->uri->segment(4)])->result_array();


        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|min_length[3]', [
            'required' => 'Nama Kategori Harus Diisi !!',
            'min_length' => 'Nama Kategori Terlalu Pendek !!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/ubah_kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => $this->input->post('kategori', true)
            ];

            $this->ModelDonasi->updateKategori(['kategori_id' => $this->input->post('kategori_id')], $data);
            redirect('admin/donasi/kategori');
        }
    }

    public function hapusKategori()
    {
        $where = ['kategori_id' => $this->uri->segment(4)];
        $this->ModelDonasi->hapusKategori($where);
        redirect('admin/donasi/kategori');
    }
}
