<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Berita extends CI_Controller
{

    public function berita()
    {

        $config["base_url"] = base_url('index.php/Berita/berita');
        $config['total_rows'] = count($this->ModelBerita->total());
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;

        $limit = $config['per_page'];
        $start = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a>';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        $config['full_tag_close']  = '</ul></div>';

        $this->pagination->initialize($config);


        $data = array(
            'paginasi' => $this->pagination->create_links(),
            'latest_berita' => $this->ModelBerita->latest_berita(),
            'berita' => $this->ModelBerita->berita($limit, $start),
            'judul' => 'Berita',
            'isi'   => 'berita'
        );
        $this->load->view('templates-user/wrapper', $data);
    }

    public function detail_berita($id)
    {
        $data = array(
            'judul' => 'Detail Berita',
            'latest_berita' => $this->ModelBerita->latest_berita(),
            'berita' => $this->ModelBerita->detail_berita($id),
            'isi'   => 'detail_berita',
        );
        $this->load->view('templates-user/wrapper', $data);
    }
}
