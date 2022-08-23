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
                        redirect('admin/bonus');
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
        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
            'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
            'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
            'alamat_lengkap' => htmlspecialchars($this->input->post('alamat_lengkap', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'link_tiktok' => htmlspecialchars($this->input->post('link_tiktok', true)),
            'link_fb' => htmlspecialchars($this->input->post('link_fb', true)),
            'link_ig' => htmlspecialchars($this->input->post('link_ig', true)),
            'link_yutub' => htmlspecialchars($this->input->post('link_yutub', true)),
            'role' => 'Affiliator',
            'is_active' => 1,
            'created_at' => time(),
            'updated_at' => time(),
            'deleted_at' => 0
        ];

        $this->db->insert('tb_users', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat. Silahkan login</div>');
        redirect('auth');
    }
}
