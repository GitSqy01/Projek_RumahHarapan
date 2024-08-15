<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Rumah Harapan';
        $data['isi'] = 'home';
        $data['komentar'] = $this->ModelKomentar->get_comments()->result_array();
        $data['count'] = $this->db->count_all('komentar');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['latest_berita'] = $this->ModelBerita->latest_berita();
        $data['latest_program'] = $this->ModelProgram->get_latest_program();
        // $data['program'] = $this->model_program->tampil_data()->result();

        $this->load->view('templates-user/wrapper', $data);
    }

    public function like_comment($id)
    {
        $this->ModelKomentar->like_comment($id);
        redirect('admin/admin');
    }
}
