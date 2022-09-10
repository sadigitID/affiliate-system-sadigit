<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Model
{
    public function __construct()
    {
        parent::__construct(); //
    }

    public function login($email, $password)
    {
        $user = $this->db->get_where('tb_users', ['email' => $email])->row_array();

        //jika usernya ada 
        if ($user) {
            //jika user active
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == 'Admin') {
                        redirect('admin/administrator');
                    } else {
                        redirect('affiliator/affiliator');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'province_id' => htmlspecialchars($this->input->post('province_id', true)),
            'city_id' => htmlspecialchars($this->input->post('city_id', true)),
            'district_id' => htmlspecialchars($this->input->post('district_id', true)),
            'alamat_lengkap' => htmlspecialchars($this->input->post('alamat_lengkap', true)),
            'email' => htmlspecialchars($email),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'link_tiktok' => htmlspecialchars($this->input->post('link_tiktok', true)),
            'link_fb' => htmlspecialchars($this->input->post('link_fb', true)),
            'link_ig' => htmlspecialchars($this->input->post('link_ig', true)),
            'link_yutub' => htmlspecialchars($this->input->post('link_yutub', true)),
            'role' => 'Affiliator',
            'is_active' => 0,
            'created_at' => time(),
            'updated_at' => time(),
            'deleted_at' => time(),
        ];

        //token
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $this->input->post('email', true),
            'token' => $token,
            'created_at' => time()
        ];


        $this->db->insert('tb_users', $data);
        $this->db->insert('tb_user_token', $user_token);

        $this->_sendEmail($token, 'verify');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat. Silahkan login</div>');
        redirect('auth');
    }

    private function _sendEmail($token, $type)
    {

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '5cd193e14cca6d',
            'smtp_pass' => '6ea6946ee15b3b',
            'crlf' => "\r\n",
            'newline' => "\r\n"
          );

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('gabudbanget@gmail.com', 'Admin');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk verifikasi akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Verifikasi</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify($email, $token)
    {
        $user = $this->db->get_where('tb_users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['created_at'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_users');

                    $this->db->delete('tb_user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah diaktivasi. Silahkan login</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('tb_users', ['email' => $email]);
                    $this->db->delete('tb_user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token kadaluarsa</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email salah</div>');
            redirect('auth');
        }
    }

    public function forgot_password()
    {

        $email = $this->input->post('email');
        $user = $this->db->get_where('tb_users', ['email' => $email, 'is_active' => 1])->row_array();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'created_at' => time()
            ];
            $this->db->insert('tb_user_token', $user_token);
            $this->_sendEmail($token, 'forgot');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda</div>');
            redirect('auth/forgot_password');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum diaktivasi</div>');
            redirect('auth/forgot_password');
        }
    }

    public function resetpassword($email, $token)
    {
        $user = $this->db->get_where('tb_users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email salah</div>');
            redirect('auth');
        }
    }

    public function change_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/change-password');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_users');
            $this->session->unset_userdata('reset_email');
            $this->db->delete('tb_user_token', ['email' => $email]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
            redirect('auth');
        }
    }
}
