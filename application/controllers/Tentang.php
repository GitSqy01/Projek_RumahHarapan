<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = 'Tentang Kami';
        $data['isi'] = 'tentang';

        // $this->load->view('templates-user/wrapper', $data);
        // $this->load->view('templates-user/header', $data);
        $this->load->view('templates-user/v_head', $data);
        $this->load->view('templates-user/header', $data);
        $this->load->view('templates-user/v_nav', $data);
        $this->load->view('tentang');
        $this->load->view('templates-user/footer', $data);
    }
}
