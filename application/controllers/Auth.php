<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login');
        $this->load->model('dropdown');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth/login');
        } else {
            // validasinya success
            $this->login();
        }
    }


    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->Login->login($email, $password);
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_users.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('link_tiktok', 'Link Tiktok', 'trim|required');
        $this->form_validation->set_rules('link_fb', 'Link Facebook', 'trim|required');
        $this->form_validation->set_rules('link_ig', 'Link Instagram', 'trim|required');
        $this->form_validation->set_rules('link_yutub', 'Link Youtube', 'trim|required');
        $data['provinces'] = $this->dropdown->get_province();

        if ($this->form_validation->run($this) == false) {
            $this->load->view('template/auth/registration', $data);
        } else {
            $this->Login->registration(); //
        }
    }


    public function forgot_password()
    {
        $this->load->view('template/auth/forgot-password');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
