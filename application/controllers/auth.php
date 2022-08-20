<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->view('template/auth/login');
    }


    private function login()
    {
        $this->load->view('template/auth/login');
    }

    public function register()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|requerid|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', [
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('link_tiktok', 'Link Tiktok', 'trim|required');
        $this->form_validation->set_rules('link_fb', 'Link Facebook', 'trim|required');
        $this->form_validation->set_rules('link_ig', 'Link Instagram', 'trim|required');
        $this->form_validation->set_rules('link_yutub', 'Link Youtube', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth/register');
        } else {
            $data = [
                'name'      => htmlspecialchars($this->input->post('name', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'provinsi'  => htmlspecialchars($this->input->post('provinsi', true)),
                'kota'      => htmlspecialchars($this->input->post('kota', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'alamat_lengkap'    => htmlspecialchars($this->input->post('alamat_lengkap', true)),
                'no_hp'     => htmlspecialchars($this->input->post('no_hp', true)),
                'link_tiktok'       => htmlspecialchars($this->input->post('link_tiktok', true)),
                'link_fb'   => htmlspecialchars($this->input->post('link_fb', true)),
                'link_ig'   => htmlspecialchars($this->input->post('link_ig', true)),
                'link_yutub' => htmlspecialchars($this->input->post('link_yutub', true)),
                'image'     => 'default.jpg',
                'role_id'   => 'Affiliator',
                'is_active' => 1,
                'date_created'      => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login!</div>');
            redirect('auth');
        }
    }


    public function forgot_password()
    {
        $this->load->view('template/auth/forgot-password');
    }

    public function logout()
    {
    }
}
