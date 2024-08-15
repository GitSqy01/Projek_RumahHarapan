<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
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
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['komentar'] = $this->ModelKomentar->get_comments()->result_array();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserByRole(2)->result_array();
        $data['role'] = $this->ModelUser->getRole()->result_array();
        $data['total_dana'] = $this->ModelDonasi->total_dana_terkumpul();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function like_comment($id)
    {
        $this->ModelKomentar->like_comment($id);
        redirect('admin/admin');
    }

    public function add_reply()
    {
        // Ambil data balasan komentar dari form
        $reply_data = array(
            'nama' => $this->input->post('nama'),
            'komentar' => $this->input->post('komentar'),
            'tgl_komentar' => $this->input->post('tgl_komentar'),
            'parent_comment_id' => $this->input->post('parent_comment_id')
        );

        // Simpan balasan ke dalam database
        $this->ModelKomentar->add_comment($reply_data);


        redirect('admin/admin');
    }

    public function hapus_comment()
    {
        $where = ['id' => $this->uri->segment(4)];
        $this->ModelKomentar->hapusKomentar($where);
        redirect('admin/admin');
    }
}
