<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasiku extends CI_Controller
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
        $data['judul'] = 'Donasiku';
        $data['isi'] = 'donasiku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'NAMA LENGKAP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'required');
        $this->form_validation->set_rules('nohp', 'NO HP', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates-user/wrapper', $data);
        } else {
            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            $alamat = $this->input->post('alamat');
            $nohp = $this->input->post('nohp');
            $email = $this->input->post('email');
            $jk = $this->input->post('jk');


            // Jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['nama'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '4000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['image'];
                    if ($gambar_lama != 'RIFQI.png') {
                        unlink(FCPATH . 'assets/img/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Gagal mengupdate profile!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>');
                    redirect('Donasiku');
                }
            }
            $this->db->set('nama', $nama);
            $this->db->set('nik', $nik);
            $this->db->set('alamat', $alamat);
            $this->db->set('nohp', $nohp);
            $this->db->where('email', $email);
            $this->db->where('jk', $jk);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('Donasiku');
        }
    }

    //         if ($upload_image) {
    //             $config['allowed_types'] = 'jpg|jpeg|png';
    //             $config['max_size'] = '3048';
    //             $config['max_width'] = '1024';
    //             $config['max_height'] = '1000';
    //             $config['upload_path'] = './assets/img/';

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('image')) {
    //                 $old_image = $data['image'];
    //                 unlink(FCPATH . 'assets/img/' . $old_image);

    //                 $new_image = $this->upload->data('file_name');
    //                 $this->db->set('image', $new_image);
    //             } else {
    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                 Gagal mengupdate profile!
    //                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                 <span aria-hidden="true">&times;</span>
    //                 </button>
    //              </div>');
    //                 redirect('Donasiku');
    //             }
    //         }

    //         $this->db->set('nama', $nama);
    //         $this->db->set('nik', $nik);
    //         $this->db->set('alamat', $alamat);
    //         $this->db->set('nohp', $nohp);
    //         $this->db->where('email', $email);
    //         $this->db->where('jk', $jk);
    //         $this->db->update('user');

    //         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         Berhasil mengupdate profile!
    //        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //         </button>
    //      </div>');
    //         redirect('Donasiku');
    //     }
    // }
}
