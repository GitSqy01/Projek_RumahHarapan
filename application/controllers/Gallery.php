<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Gallery extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Gallery';
        $data['isi'] = 'gallery';
        $data['galeri'] = $this->ModelGaleri->tampil_data()->result();

        $this->load->view('templates-user/wrapper', $data);
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail Galeri';
        $data['isi'] = 'detail_galeri';
        $data['galeri'] = $this->ModelGaleri->detail_galeri($id);

        $this->load->view('templates-user/wrapper', $data);
    }
}
