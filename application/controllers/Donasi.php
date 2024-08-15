<?php
class Donasi extends CI_Controller
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

    public function index()
    {
        $data['kategori'] = $this->ModelKategori->tampil_data();
        $data['judul'] = 'kategori';
        $data['isi'] = 'kategori';

        $this->load->view('templates-user/wrapper', $data);
    }

    public function show_program_donasi($kategori_id)
    {
        $data['program_donasi'] = $this->ModelProgram->get_program_donasi_by_kategori($kategori_id);
        $data['judul'] = 'Program donasi';
        $data['isi'] = 'program_donasi';

        $this->load->view('templates-user/wrapper', $data);
    }
}
