<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login');
        $this->load->model('dropdown');

        // if ($this->session->userdata('email')) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You are already logged in!</div>');
        //     redirect(base_url());
        // }
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            // validasinya success
            $this->login();
        }
    }


    private function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->Login->login($email, $password);
    }

    public function registration()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('auth');
        // }

        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('province_id', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('city_id', 'Kabupaten', 'trim|required');
        $this->form_validation->set_rules('district_id', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_users.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('link_tiktok', 'Link Tiktok', 'trim');
        $this->form_validation->set_rules('link_fb', 'Link Facebook', 'trim');
        $this->form_validation->set_rules('link_ig', 'Link Instagram', 'trim');
        $this->form_validation->set_rules('link_yutub', 'Link Youtube', 'trim');

        if ($this->form_validation->run($this) == false) {
            $data['provinces'] = $this->dropdown->get_province();
            $this->load->view('auth/registration', $data);
        } else {
            $this->Login->registration(); //
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $this->Login->verify($email, $token);
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgot-password');
        } else {
            $this->Login->forgot_password();
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $this->Login->resetpassword($email, $token);
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


    
}
