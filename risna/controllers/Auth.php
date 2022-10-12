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

    }

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You are already logged in!</div>');
        //     redirect(base_url());
        // }

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
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required|numeric|min_length[12]|max_length[13]', [
            'min_length' => 'No Handphone too short!',
            'max_length' => 'No Handphone too long!',
            'numeric' => 'No Handphone must be numeric!'
        ]);
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
        $user = $this->db->get_where('tb_users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function change_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $config = [
            [
                'field' => 'password1',
                'rules' => 'trim|required|min_length[6]|matches[password2]',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                    'min_length' => 'password terlalu pendek',
                    'matches' => 'password tidak sama'
                ]
            ],
            [
                'field' => 'password2',
                'rules' => 'trim|required|min_length[6]|matches[password1]',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                    'min_length' => 'password terlalu pendek',
                    'matches' => 'password tidak sama'
                ]
            ],
        ];

        $data = array('status' => false, 'messages' => array());
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/change-forgot-password');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_users');
            $this->session->unset_userdata('reset_email');
            $this->db->delete('tb_user_token', ['email' => $email]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
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
