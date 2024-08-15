<?php
class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKomentar');

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


    public function add_comment()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'komentar' => $this->input->post('komentar')
        );
        $this->ModelKomentar->add_comment($data);
        redirect('home');
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


        redirect('home');
    }
}
