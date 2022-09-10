<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('');
    }

    public function index()
    {
        $data = [
            'view' => 'affiliator/change-password',
            'active' => 'change-password',
            'sub1' => 'change-password',
        ];

        $this->load->view('template/index', $data);
    }

    public function change_password()
    {
        $data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[password1]');

        if ($this->form_validation->run() == false) {
            redirect('affiliator/change_password');
        } else {
            $password = $this->input->post('password');
            $new_password = $this->input->post('password1');
            if (!password_verify($password, $data['tb_users']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('affiliator/change_password');
            } else {
                if ($password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('affiliator/change_password');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_users');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('affiliator/change_password');
                }
            }
        }
    }
}
