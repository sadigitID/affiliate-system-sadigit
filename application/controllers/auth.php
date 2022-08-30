<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login');
    }

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('affiliator/affiliator');
        // }

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
        // if ($this->session->userdata('email')) {
        //     redirect('affiliator/affiliator');
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
            $this->load->view('template/auth/registration');
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
            $this->load->view('template/auth/forgot-password');
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
        $this->load->view('template/auth/blocked');
    }


    public function change_password()
    {
        $data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_lama', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth/change-password', $data);
        } else {

            $password_lama = $this->input->post('password_lama');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($password_lama, $data['tb_users']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('template/auth/change-password');
            } else {
                if ($password_lama == $this->input->post('new_password1')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('template/auth/change-password');
                } else {
                    $password_baru = password_hash($this->input->post('new_password1'), PASSWORD_DEFAULT);
                    $this->db->set('password', $password_baru);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_users');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('template/auth/change-password');
                }
            }
            //$this->Login->change_password();
        }
    }
}
